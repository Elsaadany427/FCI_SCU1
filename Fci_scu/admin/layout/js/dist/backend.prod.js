"use strict";function confirmation(){var e;e=1==confirm("Press a button!")?"You pressed OK!":"You pressed Cancel!",document.getElementById("demo").innerHTML=e}var browsersync=require("browser-sync").create(),del=require("del"),gulp=require("gulp"),merge=require("merge-stream");function browserSync(e){browsersync.init({server:{baseDir:"./"},port:3e3}),e()}function browserSyncReload(e){browsersync.reload(),e()}function clean(){return del(["./vendor/"])}function modules(){var e=gulp.src("./node_modules/bootstrap/dist/**/*").pipe(gulp.dest("./vendor/bootstrap")),r=gulp.src(["./node_modules/jquery/dist/*","!./node_modules/jquery/dist/core.js"]).pipe(gulp.dest("./vendor/jquery"));return merge(e,r)}function watchFiles(){gulp.watch("./**/*.css",browserSyncReload),gulp.watch("./**/*.html",browserSyncReload)}var vendor=gulp.series(clean,modules),build=gulp.series(vendor),watch=gulp.series(build,gulp.parallel(watchFiles,browserSync));exports.clean=clean,exports.vendor=vendor,exports.build=build,exports.watch=watch,exports.default=build;