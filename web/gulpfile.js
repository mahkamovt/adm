'use strict';

var gulp = require('gulp'),
    watch = require('gulp-watch'),
    prefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    rigger = require('gulp-rigger'),
    cssmin = require('gulp-minify-css'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    rimraf = require('rimraf'),
    browserSync = require("browser-sync"),
    reload = browserSync.reload;

var path = {
    build: { //Тут мы укажем куда складывать готовые после сборки файлы        
        js: 'web/build/js/',
        css: 'web/build/css/',
        img: 'web/build/img/',
        fonts: 'web/build/fonts/'
    },
    src: { //Пути откуда брать исходники        
        js: 'web/js/main.js',//В стилях и скриптах нам понадобятся только main файлы
        style: 'web/css/main.css',
        img: 'web/img/**/*.*', //Синтаксис img/**/*.* означает - взять все файлы всех расширений из папки и из вложенных каталогов
        fonts: 'fonts/**/*.*'
    },
    watch: { //Тут мы укажем, за изменением каких файлов мы хотим наблюдать        
        js: 'web/js/**/*.js',
        style: 'web/style/**/*.css',
        img: 'web/img/**/*.*',
        fonts: 'web/fonts/**/*.*'
    },
    clean: './build'
};