var gulp=require('gulp'),
    sass=require('gulp-sass'),
    minify=require('gulp-minify-css'),
    uglify=require('gulp-uglify'),
    rename=require('gulp-rename');

var path={
    'resources':{
       'sass':'./resources/assets/sass'
    },

    'public':{
        'css':'./public/assets/css'
    },
    'sass':'./resources/assets/sass/**/*.scss'
   // 'js':'./public/assets/js'
};


gulp.task('task_app_sass',function(){
    return gulp.src(path.resources.sass+'/app.scss')
        .pipe(sass({onError:console.error.bind(console,'SASS ERROR')}))
        .pipe(minify())
        .pipe(rename({suffix:'.min'}))
        .pipe(gulp.dest(path.public.css))
});

//ici knacss

gulp.task('task_knacss_sass',function(){
    return gulp.src(path.resources.sass+'/knacss/sass/knacss.scss')
        .pipe(sass({onError:console.error.bind(console,'SASS ERROR')}))
        .pipe(minify())
        .pipe(rename({suffix:'.min'}))
        .pipe(gulp.dest(path.public.css))
});


gulp.task('watch',function(){
    gulp.watch(path.sass,['task_app_sass', 'task_knacss_sass']);

});

gulp.task('default',['watch']);
//pour lancer gulp

