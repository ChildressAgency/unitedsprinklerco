const gulp = require('gulp');
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const order = require('gulp-order');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const cssnano = require('cssnano');
const babel = require('gulp-babel');

gulp.task('sass', function () {
  const processors = [
    autoprefixer,
    cssnano
  ];
  return gulp.src('dev/scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(postcss(processors))
    .pipe(sourcemaps.write('../dev/maps'))
    .pipe(gulp.dest('wp-theme-files'))
});

gulp.task('js', function () {
  return gulp.src('dev/js/**/*.js')
    .pipe(sourcemaps.init())
    .pipe(order([
      'vendor/**/*.js',
      '9_custom-scripts.js'
    ]))
    .pipe(babel({
      presets: ['@babel/env']
    }))
    .pipe(concat('custom-scripts.min.js'))
    .pipe(uglify({
      output: {
        comments: '/^!/'
      }
    }))
    .pipe(sourcemaps.write('../../dev/maps', {includeContent: false, sourceRoot: 'wp-theme-files'}))
    .pipe(gulp.dest('wp-theme-files/js'))
});

gulp.task('watch', function () {
  gulp.watch('dev/scss/**/*.scss', gulp.series('sass'));
  gulp.watch('dev/js/*.js', gulp.series('js'));
});

gulp.task('default', gulp.parallel(['js', 'sass', 'watch']));