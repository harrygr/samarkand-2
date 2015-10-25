var gulp = require('gulp');

var less = require('gulp-less');
var minifyCSS = require('gulp-minify-css');
var rename = require('gulp-rename');
var notify = require('gulp-notify');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var replace = require('gulp-replace');
var sourcemaps = require('gulp-sourcemaps');

var config = {
    bowerDir: './assets/vendor',
    lessPath: './assets/less'
};

var scripts = [
    config.bowerDir + '/bootstrap/dist/js/bootstrap.js',
    config.bowerDir + '/imagesloaded/imagesloaded.pkgd.js',
    config.bowerDir + '/masonry/dist/masonry.pkgd.js',
    config.bowerDir + '/fancybox/source/jquery.fancybox.js',
    './assets/js/_functions.js',
    './assets/js/_fancybox.js',
    './assets/js/_woocommerce.js',
    './assets/js/_main.js'
];

gulp.task('default', ['fonts', 'less']);
gulp.task('styles', ['default']);

gulp.task('less', ['fonts'],function () {
    return gulp.src('./assets/less/main.less')
        .pipe(sourcemaps.init())
        .pipe(less({
            paths: [
                config.bowerDir + '/fancybox/source',
                config.bowerDir + '/fontawesome/less',
                config.lessPath
            ]
        }).on("error", notify.onError(function (error) {
            return "Error: " + error.message;
        })))
        .pipe(minifyCSS())
        .pipe(sourcemaps.write())
        .pipe(rename('main.min.css'))
        .pipe(gulp.dest('./assets/css'))
        .pipe(notify('LESS Compiled'))
});

gulp.task('scripts', function () {
    return gulp.src(scripts)
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest('./assets/js'))
        .pipe(notify('Scripts Compiled'))
});

gulp.task('fonts', function () { 

    var fontLocations = [
        config.bowerDir + '/fontawesome/fonts/**.*',
        config.bowerDir + '/houzz-icon-font/fonts/**.*'
    ];

    return gulp.src(fontLocations) .pipe(gulp.dest('./assets/fonts')); 
});
