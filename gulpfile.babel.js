import { src, dest, watch, series, parallel } from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';
import del from 'del';
import webpack from 'webpack-stream';


const PRODUCTION = yargs.argv.prod;

export const CompressStyles = () => {
    return src('src/scss/bundle.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
        .pipe(dest('dist/css'));
}

export const BundleScripts = () => {
    return src('src/js/bundle.js')
        .pipe(webpack({
            module: {
                rules: [
                    {
                        test: /\.js$/,
                        use: {
                            loader: 'babel-loader',
                            options: {
                                presets: []
                            }
                        }
                    }
                ]
            },
            mode: PRODUCTION ? 'production' : 'development',
            devtool: !PRODUCTION ? 'inline-source-map' : false,
            output: {
                filename: 'bundle.js'
            },
        }))
        .pipe(dest('dist/js'));
}

export const copySrcFiles = () => {
    return src(['src/**/*','!src/{images,js,scss}','!src/{images,js,scss}/**/*'])
        .pipe(dest('dist'));
}

export const cleanDist = () => del(['dist']);

export const watchForChanges = () => {
    watch('src/scss/**/*.scss', CompressStyles);
    watch('src/js/**/*.js',BundleScripts);
    watch(['src/**/*','!src/{images,js,scss}','!src/{images,js,scss}/**/*'], copySrcFiles);
}

export const dev = series(cleanDist, parallel(CompressStyles, copySrcFiles, BundleScripts), watchForChanges)
export const build = series(cleanDist, parallel(CompressStyles, copySrcFiles, BundleScripts))
export default dev;

