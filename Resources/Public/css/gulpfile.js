/*
 * Task starten im Verzeichnis dieser Datei
 * gulp build CSS und Scripts
 */
const {series, src, dest} = require('gulp');
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const babel = require('gulp-babel');
const minify = require('gulp-minify');
const uglify = require('gulp-uglify');

var concat = require('gulp-concat');
var sassGlob = require('gulp-sass-glob');

function buildAgenturCSS(cb) {
  return src('./../lib/bootstrap-5.3.2/scss/bootstrap.scss')
      .pipe(src(
          [
              './../lib/theme-1.13.2/jquery-ui.css',
              './../css/ibkroot.css',
              './../scss/ibkcontent.scss'
          ]
      ))
    .pipe(sassGlob())
    .pipe(minify())
    .pipe(sass().on('error', sass.logError))
    .pipe(concat('ibkstyles.css'))
    .pipe(dest('./../css')); 
}

function buildAgenturJS(cb) {
    return src('./../js/jquery-3.7.1.min.js')
        .pipe(src(
            [
                './../lib/theme-1.13.2/jquery-ui.min.js',
                './../lib/bootstrap-5.3.2/dist/js/bootstrap.bundle.min.js',
                './../js/cookie.js',
                './../js/ibkfunctions.js'
            ]
        ))
  .pipe(uglify())
  .pipe(concat('ibkjs.js'))
  .pipe(dest('./../js/'));
}

exports.default = series(buildAgenturCSS, buildAgenturJS);
