/* jshint strict: global, node: true */
"use strict";

import gulp from "gulp";
const { src, dest, lastRun, series, parallel, watch } = gulp;

import { createGulpEsbuild } from "gulp-esbuild";
import pug from "gulp-pug";
import sourcemaps from "gulp-sourcemaps";
import gulpIf from "gulp-if";
import * as changed from "gulp-changed";
import touch from "gulp-touch-fd";
import progeny from "gulp-progeny";
import filter from "gulp-filter";
import dartSass from "sass";
import gulpSass from "gulp-sass";
import postcss from "gulp-postcss";
import path from "path";
import autoprefixer from "autoprefixer";
import svgInliner from "postcss-inline-svg"; //({ paths: [__dirname] });
import yargs from "yargs";
import { hideBin } from "yargs/helpers";
import browserSync from "browser-sync";

//const gulpChanged = changed.default;
//console.log(gulpChanged);

const sass = gulpSass(dartSass);

const argv = yargs(hideBin(process.argv))
  .option("env", {
    alias: "e",
    type: "string",
    description: "target environment",
    choices: ["dev", "prod"],
    default: "dev",
  })
  .option("output", {
    alias: "o",
    type: "string",
    description: "build folder",
    default: "",
  }).argv;

const distDir = path.join(argv.output, "./");
const themeDir = path.join(argv.output, "./");

const CONFIG = {
  templatesSrc: "src/templates/**/*.pug",
  templatesDist: distDir,
  assetsSrc: "src/assets/**/*.*",
  assetsDist: distDir,
  scriptsSrc: "src/scripts/*.js",
  scriptsToWatchSrc: "src/scripts/**/*.js",
  scriptsDist: path.join(distDir, "js"),
  stylesSrc: "src/styles/**/*.scss",
  stylesDist: distDir,
  env: argv.env,
};

Object.freeze(CONFIG);

const IS_DEV_MODE = CONFIG.env === "dev";
const IS_PROD_MODE = CONFIG.env === "prod";

let scriptsBuilder = createGulpEsbuild();

function setEsBuildToIncrementalMode(done) {
  scriptsBuilder = createGulpEsbuild({ incremental: true });
  done();
}

function scripts() {
  return src(CONFIG.scriptsSrc)
    .pipe(
      scriptsBuilder({
        sourcemap: IS_DEV_MODE ? "inline" : false,
        define: { __DEBUG__: IS_DEV_MODE.toString() },
        minifyWhitespace: true,
        minifyIdentifiers: false,
        minifySyntax: IS_PROD_MODE,
        target: ["es2020"],
        legalComments: "none",
        bundle: true,
        format: "esm",
      })
    )
    //.pipe(gulpChanged(CONFIG.scriptsDist, { hasChanged: changed.compareContents }))
    .pipe(dest(CONFIG.scriptsDist))
    .pipe(dest(themeDir + 'js'));
}

function templates() {
  return (
    src([CONFIG.templatesSrc], {
      since: lastRun(templates),
    })
      .pipe(progeny())
      .pipe(filter(["src/templates/*.pug"]))
      .pipe(
        pug({
          pretty: true,
        })
      )
      //.pipe(gulpChanged(CONFIG.templatesDist, { hasChanged: changed.compareContents }))
      // .pipe(require("gulp-debug")())
      .pipe(dest(CONFIG.templatesDist))
      .pipe(gulpIf(IS_PROD_MODE, touch()))
  );
}

async function styles() {
  const plugins = [svgInliner, autoprefixer()];

  if (IS_PROD_MODE) {
    const cssnano = (await import("cssnano")).default;
    const csso = (await import("postcss-csso")).default;

    plugins.unshift(
      cssnano({
        preset: ["advanced"],
      }),
      csso
    );
  }

  return (
    src(CONFIG.stylesSrc, { since: lastRun(styles) })
      .pipe(progeny())
      .pipe(filter(["**/*.scss", "!**/_*.scss"]))
      .pipe(gulpIf(IS_DEV_MODE, sourcemaps.init()))
      .pipe(
        sass
          .sync({
            outputStyle: "compressed",
          })
          .on("error", sass.logError)
      )
      .pipe(postcss(plugins))
      .pipe(gulpIf(IS_DEV_MODE, sourcemaps.write()))
      //.pipe(gulpChanged(CONFIG.stylesDist, { hasChanged: changed.compareContents }))
      // .pipe(require("gulp-debug")())
      .pipe(dest(CONFIG.stylesDist))
      .pipe(dest(themeDir))
      .pipe(gulpIf(IS_PROD_MODE, touch()))
  );
}

function assets() {
  return src(CONFIG.assetsSrc, { since: lastRun(assets) })
    //.pipe(gulpChanged(CONFIG.assetsDist, { hasChanged: changed.compareContents }))
    .pipe(dest(distDir))
    .pipe(dest(themeDir))
    .pipe(gulpIf(IS_PROD_MODE, touch()));
}

let browserSyncInstance;

function livereload(done) {
  browserSyncInstance.reload();
  done();
}

function serve() {
  browserSyncInstance = browserSync.create();
  browserSyncInstance.init({
    proxy: "xpiktech.local",
    open: false,
    ghostMode: false,
    online: false,
    ui: false,
    logSnippet: false,
    reloadDebounce: 100,
    middleware: function (req, res, next) {
      res.setHeader("Cache-Control", "no-store, must-revalidate");
      next();
    },
  });
}

function watchForChanges() {
  browserSyncInstance.watch(`${distDir}/**/*.css`).on("change", browserSyncInstance.reload);
  watch("./src/templates", series(templates, livereload));
  watch([CONFIG.stylesSrc], styles);
  watch(CONFIG.scriptsToWatchSrc, series(scripts, livereload));
  watch(CONFIG.assetsSrc, series(assets, livereload));
  watch("./**/*.php", livereload);
}

const buildTask = parallel(templates, styles, scripts, assets);
const devTask = series(setEsBuildToIncrementalMode, buildTask, parallel(serve, watchForChanges));

export { buildTask as build, devTask as dev };
