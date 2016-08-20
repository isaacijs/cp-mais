var gulp = require('gulp'),
    browserSync = require('browser-sync').create(),
    sass = require('gulp-sass'),
    concatCss = require('gulp-concat-css'),
    runSequence = require('run-sequence'),
    browserify = require('browserify'),
    urlLocal = "http://localhost/work/cpmais/repo/"; // Mude para sua URL Local

gulp.task('browser-watch', ['sync'], function(){
  gulp.watch(['asset/**/**.css','src/**/**.scss','asset/**/**.js','index.php']).on('change', browserSync.reload);
});

gulp.task('sync', function(){
  browserSync.init({
    proxy: urlLocal
  })
});

gulp.task('sass-watch', function(){
 gulp.watch("src/sass/*.scss", ['sass', 'css-concat']);
});

gulp.task('sass', function(){
  return gulp.src("src/sass/*.scss")
             .pipe(sass())
             .pipe(gulp.dest("temp/css/"))
});

gulp.task('css-concat', function(){
  return gulp.src('temp/**/*.css')
             .pipe(concatCss("style.css"))
             .pipe(gulp.dest("asset/css/"));
});

gulp.task('default', function(cb){
  return runSequence('sass-watch', ['browser-watch'], cb);
});
