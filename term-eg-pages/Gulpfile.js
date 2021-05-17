'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var ejs = require("gulp-ejs");
const rename = require('gulp-rename')
sass.compiler = require('node-sass');

gulp.task('sass', function() {
    return gulp.src('./src/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./dist/css'));
});

gulp.task('ejs', function() {
    return gulp.src("./src/*.ejs")
        .pipe(ejs({ title: 'gulp-ejs' }))
        .pipe(rename({ extname: '.html' }))
        .pipe(gulp.dest("./dist"))
});

gulp.task('watch', function() {
    gulp.watch('./src/scss/**/*.scss', gulp.series('sass'));
    gulp.watch('./src/**/*.ejs', gulp.series('ejs'));
});