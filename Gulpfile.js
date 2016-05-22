
var uglify = require('gulp-uglify');
var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var cssnano = require('cssnano');
var webpack = require('webpack-stream');

gulp.task('default', ['style', 'js']);

gulp.task('js', function(){
return gulp.src('./js/app.js')
  .pipe(webpack({
    output: {
        filename: 'main.js',
     },
     module: {
      loaders: [{
       test: /\.js$/,
       exclude: /(node_modules)/,
       loader: 'babel',
       query: {
        presets: ['es2015']
       }
      }],
     },
  }))
  .pipe(uglify())
  .pipe(gulp.dest('./public/'));
});

gulp.task('style', function() {
    var processors = [
        autoprefixer({browsers: ['last 2 version']}),
        cssnano(),
    ];
    return gulp.src('./style/*.scss')
     .pipe(sass().on('error', sass.logError))
     .pipe(postcss(processors))
     .pipe(concat('main.css'))
     .pipe(gulp.dest('./public'));  
});
