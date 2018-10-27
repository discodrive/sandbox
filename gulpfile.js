const gulp     = require("gulp")
const prettier = require("@bdchauvette/gulp-prettier")
const watch    = require('gulp-watch')
const concat   = require('gulp-concat')
const uglify   = require('gulp-uglify')
const sass     = require('gulp-sass')
const plumber  = require('gulp-plumber')
const image    = require('gulp-image')
const font     = require('gulp-font')

const paths = {
  src: {
    js:     "src/js/**/*.js",
    images: "src/images/*",
    fonts:  "src/fonts/*",
    sass:   "src/sass/**/*.+(sass|scss)"
  },
  build: {
    js:     "public/themes/childtheme/assets/js/",
    images: "public/themes/childtheme/assets/images/",
    fonts:  "public/themes/childtheme/assets/fonts/",
    sass:   "public/themes/childtheme/assets/css/"
  }
};

/**
 *
 */
gulp.task('js:compress', () => {
  return gulp
    .src(paths.src.js)
    .pipe(plumber())
    .pipe(uglify())
    .pipe(gulp.dest(paths.build.js))
    .pipe(concat('all.js'))
    .pipe(gulp.dest(paths.build.js))
});

/**
 *
 */
gulp.task("js:prettify", () => {
  return gulp
    .src(paths.src.js)
    .pipe(plumber())
    .pipe(
      prettier({
        singleQuote:   true,
        trailingComma: "all",
        insertPragma: true
      })
    )
    .pipe(gulp.dest(file => file.base))
});

/**
 *
 */
gulp.task('update:fonts', () => {
  return gulp
    .src(paths.src.fonts)
    .pipe(font())
    .pipe(gulp.dest(paths.build.fonts))
});

/**
 *
 */
gulp.task('update:images', () => {
  return gulp
    .src(paths.src.images)
    .pipe(image())
    .pipe(gulp.dest(paths.build.images))
});

/**
 *
 */
gulp.task('update:js', ['js:prettify', 'js:compress']);

/**
 *
 */
gulp.task('update:sass', () => {
  return gulp
    .src(paths.src.sass)
    .pipe(
      sass({
        outputStyle: 'compressed'
      })
      .on('error', sass.logError)
    )
    .pipe(gulp.dest(paths.build.sass))
});

/**
 *
 */
gulp.task('watch:fonts', () =>
  gulp.watch(paths.src.js, ['update:fonts'])
);

/**
 *
 */
gulp.task('watch:images', () =>
  gulp.watch(paths.src.images, ['update:images'])
);

/**
 *
 */
gulp.task('watch:js', () =>
  gulp.watch(paths.src.js, ['update:js'])
);

/**
 *
 */
gulp.task('watch:sass', () =>
  gulp.watch(paths.src.sass, ['update:sass'])
);

/**
 *
 */
gulp.task('watch:all', ['watch:js', 'watch:sass', 'watch:images', 'watch:fonts'])
gulp.task('default', ['watch:all'])
gulp.task('build', ['js:compress', 'update:fonts', 'update:images', 'update:sass'])