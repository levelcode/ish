/*
 * Michael ALfonso
 * Developer:  Michael Alfonso Martinez <michael950626@gmail.com>
 */
var gulp = require('gulp');
var pump = require('pump');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var cssclean = require('gulp-clean-css');
var cssclean = require('gulp-clean-css');
var javascriptObfuscator = require('gulp-javascript-obfuscator');


var bowerFolder = 'bower_components/';
var nodemodules = 'node_modules/';
var librariesFolder = 'libraries/';
var vendorDependencies = [
  bowerFolder + 'jquery/dist/jquery.min.js',
  bowerFolder + 'js-base64/base64.min.js',
  bowerFolder + 'moment/moment.js',
  bowerFolder + 'bootstrap/dist/js/bootstrap.min.js',
  bowerFolder + 'jScrollPane/script/jquery.mousewheel.js',
  bowerFolder + 'jScrollPane/script/jquery.jscrollpane.min.js',
  bowerFolder + 'sweetalert2/dist/sweetalert2.min.js',
  bowerFolder + 'datatables.net/js/jquery.dataTables.min.js',
  nodemodules + 'formvalidation/dist/js/formValidation.min.js',
  nodemodules + 'formvalidation/dist/js/framework/bootstrap.min.js',
];
gulp.task('watch', function(){
  gulp.watch('js/scripts.js', ['compile-js']);
  gulp.watch('scss/*.scss', ['compile-sass']);
  gulp.watch('scss/**/*.scss', ['compile-sass']);
});
gulp.task('compile-vendor-files', function(cb) {
  pump([
    gulp.src(vendorDependencies),
    concat('vendors.min.js'),
    uglify(),
    // javascriptObfuscator({
    //   compact:true
    // }),
    gulp.dest('./js/'),
  ], cb);
});
gulp.task('compile-sass', function(cb) {
  pump([
    gulp.src('scss/styles.scss'),
    sass().on('error', sass.logError),
    cssclean(),
    rename('styles.min.css'),
    gulp.dest('./css/'),
  ], cb);
});
gulp.task('compile-js', function(cb) {
  pump([
    gulp.src('js/scripts.js'),
    rename('scripts.min.js'),
    uglify(),
    // javascriptObfuscator({
    //   compact:true
    // }),
    gulp.dest('./js/'),
  ], cb);
});
gulp.task('compile', ['compile-sass', 'compile-js', 'compile-vendor-files']);
gulp.task('default', ['compile']);
