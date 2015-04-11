module.exports = function(grunt) {

	require('load-grunt-tasks')(grunt);
	require('time-grunt')(grunt);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		// Make sure code styles are up to par and there are no obvious mistakes
		jshint: {
			options: {
				jshintrc: '.jshintrc',
				reporter: require('jshint-stylish'),
			},
			all: [
				'Gruntfile.js',
				'scripts/*.js',
				'!scripts/vendor/*.js'
			]
		},
		uglify: {
			options: {
				mangle: false
			},
			all: {
				src: 'scripts/**/*.js',
			    dest: '../scripts/main.min.js'
			}
		},
		imagemin: {
			all: {
				options: {
					expand: true,
					cwd: 'images',
					src: '**/*.{png,jpg,jpeg,gif}',
					dest: '../images'
				}
			}
		},
		svgmin: {
			all: {
				options: {
					plugins: [{ removeViewBox: false },{ removeUselessStrokeAndFill: false }],
					expand: true,
					cwd: 'images/',
					src: ['**/*.svg'],
					dest: '../images/',
					ext: '.min.svg'
				}
			}
		},
		// Compiles Sass to CSS and generates necessary files if requested
		compass: {
			all: {
				options: {
					sassDir: 'styles',
					cssDir: '../styles',
					imagesDir: '../images',
					javascriptsDir: '../scripts',
					spriteLoadPath: 'images',
					relative: true,
					outputStyle: 'compressed',
					noLineComments: true
				}
			}
		},
		watch: {
			js: {
				files: ['scripts/**/*.js'],
				tasks: ['jshint', 'uglify']
			},
			compass: {
				files: ['styles/**/*.scss'],
				tasks: ['compass']
			},
			html: {
				files: ['../*.html']
			},
			svg: {
				files: ['images/**/*.svg'],
				tasks: ['svgmin']
			},
			img: {
				files: ['images/**/*.{png,jpg,jpeg,gif}'],
				tasks: ['imagemin']
			}
		}
	});

	grunt.registerTask('default', ['svgmin', 'imagemin' ,'watch']);
};
