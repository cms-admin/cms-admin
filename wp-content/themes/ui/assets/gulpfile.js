/* Needed gulp config */
var gulp          = require('gulp');
var neat          = require('node-neat').includePaths;
var sass          = require('gulp-sass');
var uglify        = require('gulp-uglify');
var rename        = require('gulp-rename');
var notify        = require('gulp-notify');
var minifycss     = require('gulp-minify-css');
var concat        = require('gulp-concat');
var plumber       = require('gulp-plumber');
var autoprefixer  = require('gulp-autoprefixer');
var sourcemaps    = require('gulp-sourcemaps');
var imagemin      = require('gulp-imagemin');
var browserSync   = require('browser-sync');
var reload        = browserSync.reload;

/* Call at first start, after changes in bower.json or in gulp.js */
gulp.task('build', function (cb) {
  runSequence('svg', 'images', 'sass', 'scripts', cb);
});

/* Scripts task */
gulp.task('scripts', function() {
  return gulp.src([
    /* Add your JS files here, they will be combined in this order */
    'js/vendors/*.js',
    'js/functions.js',
    ])
    .pipe(concat('main.js'))
    .pipe(gulp.dest('js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('js'));
});

/* Sass task */
gulp.task('sass', function () {
  gulp.src('scss/style.scss')
    .pipe(plumber())
    .pipe(sass({
      includePaths: ['scss'].concat(neat)
    }))
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe(gulp.dest('../'))
    /* Create minify file */
    .pipe(rename({suffix: ".min"}))
    .pipe(minifycss())
    .pipe(gulp.dest('../'));

  /* Create source map file */
  gulp.src('scss/style.scss')
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(sourcemaps.write({includeContent: false}))
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('../'))
    /* Reload the browser CSS after every change */
    .pipe(reload({stream:true}))
});

/* Images production file packaging */
gulp.task('images', function () {
  gulp.src(['images/*'])
    .pipe(imagemin())
    .pipe(gulp.dest('images/min'))
});

/* Reload task */
gulp.task('bs-reload', function () {
    browserSync.reload();
});

/* Prepare Browser-sync for localhost */
gulp.task('browser-sync', function() {
  browserSync.init(['css/*.css', 'js/*.js'], {
    /*
     I like to use a vhost, WAMP guide: https://www.kristengrote.com/blog/articles/how-to-set-up-virtual-hosts-using-wamp, XAMP guide: http://sawmac.com/xampp/virtualhosts/
    */
    proxy: 'http://cms-admin.loc'
    /* For a static server you would use this: */
    /*
    server: {
      baseDir: './'
    }
    */
  });
});

/* Only watch */
gulp.task('watch', ['scripts', 'sass'], function(){
  /* Watch scss, run the sass task on change. */
  gulp.watch(['scss/*.scss', 'scss/**/*.scss'], ['sass'])
  /* Watch app.js file, run the scripts task on change. */
  gulp.watch(['js/vendors/*.js', 'js/functions.js'], ['scripts']);
});

/* Watch scss, js and html files, doing different things with each. */
gulp.task('default', ['scripts', 'sass', 'browser-sync'], function () {
  /* Watch scss, run the sass task on change. */
  gulp.watch(['scss/*.scss', 'scss/**/*.scss'], ['sass'])
  /* Watch app.js file, run the scripts task on change. */
  gulp.watch(['js/libs/*.js', 'js/common/*.js', 'js/functions.js'], ['scripts'])
  /* Watch .html files, run the bs-reload task on change. */
  gulp.watch(['**/views/*.twig'], ['**/views/*/*.twig'], ['**/views/*/*/*.twig'], ['bs-reload']);
});
