var gulp = require('gulp');

var less = require('gulp-less');
var minifyCSS = require('gulp-minify-css');
var rename = require('gulp-rename');
var notify = require('gulp-notify');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');

var config = {
    bowerDir: './assets/vendor' ,
    lessPath: './assets/less'
}

var scripts = [
    config.bowerDir + '/bootstrap/dist/js/bootstrap.js',
    config.bowerDir + '/imagesloaded/imagesloaded.pkgd.js',
    config.bowerDir + '/masonry/dist/masonry.pkgd.js',
    './assets/js/_woocommerce.js',
    './assets/js/_main.js'
];

gulp.task('default', ['less']);


gulp.task('less', function() {
    return gulp.src('./assets/less/main.less')
        .pipe(less({
            paths: [
                config.lessPath,
                config.bowerDir + '/fontawesome/less'
            ]
        }).on("error", notify.onError(function (error) {
            return "Error: " + error.message;
        })))
        .pipe(minifyCSS())
        .pipe(rename('main.min.css'))
        .pipe(gulp.dest('./assets/css'))
        .pipe(notify('LESS Compiled'))
});

gulp.task('scripts', function() {
    return gulp.src(scripts)
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest('./assets/js'))
        .pipe(notify('Scripts Compiled'))
});

gulp.task('icons', function() { 
    return gulp.src(config.bowerDir + '/fontawesome/fonts/**.*') 
    .pipe(gulp.dest('./assets/fonts')); 
});

gulp.task('greet', function () {
    console.log('Hello world!');
});