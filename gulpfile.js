var gulp = require('gulp'),
    uglify = require("gulp-uglify"),
    autoprefixer = require('gulp-autoprefixer'),
    cleanCSS = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    minifyCSS = require('gulp-csso');

var path = {
    css: {
        src: [
            'frontend/web/css/vendor/bootstrap-custom.min.css',
            'frontend/web/css/style.css',
            'frontend/web/css/style_addon.css',
            'frontend/web/css/ico_aside.css'
        ],
        build: 'frontend/web/build'
    },
    cssAdmin: {

    },
    js: {
        src: [
            'frontend/web/js/YouTube.js',
            'frontend/web/js/functions.js',
            'frontend/web/js/b2b.js',
            'frontend/web/js/invest.js',
            'frontend/web/js/leadership_modal.js',
        ],
        build: 'frontend/web/build'
    },
    jsAdmin: {
        src: 'web_tpl/static/shared/styles/*.css',
        build: 'web_tpl/static/shared/'
    }
};

gulp.task('css', function () {
    return gulp.src(path.css.src)
        .pipe(concat('styles.min.css'))
        .pipe(autoprefixer(['last 15 versions']))
        .pipe(cleanCSS())
        .pipe(minifyCSS())

        .pipe(gulp.dest(path.css.build))
});

gulp.task('js', function () {
    return gulp.src(path.js.src)
        .pipe(concat('script.min.js'))
        // .pipe(uglify())
        .pipe(gulp.dest(path.js.build))
});


gulp.task('watch', ['css', 'js'], function () {
    gulp.watch(path.css.src, ['css']);
    gulp.watch(path.css.src, ['js']);
});


gulp.task('default', ['watch']);
