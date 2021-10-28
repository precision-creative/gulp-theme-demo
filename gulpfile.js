/**
 * This file is responsible for our Gulp commands
 * @link https://gulpjs.com/docs/en/api/src
 * @author Grayson Gantek <ggantek@precisioncreative.com>
 * @since 3.0.0
 */

const yargs = require('yargs/yargs')
const { hideBin } = require('yargs/helpers')
const argv = yargs(hideBin(process.argv)).argv
const { src, dest, parallel, series, watch } = require('gulp')
const sass = require('gulp-sass')(require('sass'))
const sourcemaps = require('gulp-sourcemaps')
const autoprefixer = require('gulp-autoprefixer')
const cleanCSS = require('gulp-clean-css')
const babel = require('gulp-babel')
const uglify = require('gulp-uglify')
const gulpif = require('gulp-if')

/**
 * Get the current environment
 * @returns {boolean}
 */
function isProduction() {
  return argv.prod === 'true' ? true : false
}

/**
 * Transpiles our SCSS to CSS files
 * If in production mode, prefixes our CSS and minifies our CSS
 * @link https://www.npmjs.com/package/gulp-sass
 * @link https://www.npmjs.com/package/gulp-autoprefixer
 * @link https://www.npmjs.com/package/gulp-clean-css
 * @link https://www.npmjs.com/package/gulp-sourcemaps
 * @returns {stream}
 */
function styles() {
  return src('assets/scss/**/*.scss')
    .pipe(gulpif(!isProduction(), sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(isProduction(), autoprefixer()))
    .pipe(gulpif(isProduction(), cleanCSS({ compatibility: 'ie8' })))
    .pipe(gulpif(!isProduction(), sourcemaps.write()))
    .pipe(dest('dist/css'))
}

/**
 * Transpiles our JS into older syntax for better browser support
 * If in production mode, minifies our JS files
 * @link https://www.npmjs.com/package/gulp-babel
 * @link https://www.npmjs.com/package/gulp-uglify
 * @link https://www.npmjs.com/package/gulp-sourcemaps
 * @returns {stream}
 */
function scripts() {
  return src('assets/js/**/*.js')
    .pipe(gulpif(!isProduction(), sourcemaps.init()))
    .pipe(babel({ presets: ['@babel/env'] }))
    .pipe(gulpif(isProduction(), uglify()))
    .pipe(gulpif(!isProduction(), sourcemaps.write()))
    .pipe(dest('dist/js'))
}

/**
 * Watch our files for changes
 * @link https://gulpjs.com/docs/en/getting-started/watching-files
 */
function watchAssets() {
  watch('assets/scss/**/*.scss', { ignoreInitial: false }, styles)
  watch('assets/js/**/*.js', { ignoreInitial: false }, scripts)
}

exports.styles = styles
exports.scripts = scripts
exports.watch = watchAssets
exports.default = series(scripts, styles)
