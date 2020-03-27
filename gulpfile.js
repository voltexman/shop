var syntax        = 'sass', // Syntax: sass or scss;
		gulpversion   = '4'; // Gulp version: 3 or 4

var gulp          = require('gulp');
		gutil         = require('gulp-util' ),
		sass          = require('gulp-sass'),
		browserSync   = require('browser-sync'),
		concat        = require('gulp-concat'),
		uglify        = require('gulp-uglify'),
		cleancss      = require('gulp-clean-css'),
		rename        = require('gulp-rename'),
		autoprefixer  = require('gulp-autoprefixer'),
		notify        = require('gulp-notify'),
		rsync         = require('gulp-rsync');



gulp.task('styles', function() {
	return gulp.src('./frontend/source/'+syntax+'/**/*.'+syntax+'')
	.pipe(sass({ outputStyle: 'expanded' }).on("error", notify.onError()))
	.pipe(rename({ suffix: '.min', prefix : '' }))
	.pipe(autoprefixer(['last 15 versions']))
	.pipe(cleancss( {level: { 1: { specialComments: 0 } } })) // Opt., comment out when debugging
	.pipe(gulp.dest('./frontend/web/css'))
	.pipe(browserSync.stream())
});

gulp.task('scripts', function() {
	return gulp.src([
		'./frontend/source/libs/slick/slick.min.js',
		'./frontend/source/libs/megamenu/jquery.smartmenus.min.js',
		'./frontend/source/libs/nouslider/nouislider.js',
		'./frontend/source/libs/niceselect/jquery.nice-select.min.js',
		'./frontend/source/libs/magnific-popap/jquery.magnific-popup.min.js',
		'./frontend/source/libs/mask/mask.js',
		'./frontend/source/js/common.js' // Always at the end
		])
	.pipe(concat('scripts.min.js'))
	// .pipe(uglify()) // Mifify js (opt.)
	.pipe(gulp.dest('./frontend/web/js'))
	.pipe(browserSync.reload({ stream: true }))
});


if (gulpversion == 4) {
	gulp.task('watch', function() {
		gulp.watch('./frontend/source/'+syntax+'/**/*.'+syntax+'', gulp.parallel('styles'));
		gulp.watch(['./frontend/source/libs/**/*.js', './frontend/source/js/common.js'], gulp.parallel('scripts'), function () {
			gulp.start('scripts');
		});
	});
	gulp.task('default', gulp.parallel('styles', 'scripts', 'watch'));
}

