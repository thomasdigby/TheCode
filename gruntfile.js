module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		banner: '/* <%= pkg.name %> / <%= pkg.author %> */\n',
		watch: {
			gruntfile: {
				files: 'Gruntfile.js',
				tasks: ['default']
			},
			src: {
				files: [
					'themes/thecode/scripts/common.js',
					'themes/thecode/scss/*.scss'
				],
				tasks: ['default']
			}
		},
		sass: {
			dist: {
				files: {
					'themes/thecode/css/style.css': 'themes/thecode/scss/style.scss'
				}
			}
		},
		cmq: {
			your_target: {
				files: {
					'css': ['themes/thecode/css/style.css']
				}
			}
		},
		cssmin: {
			add_banner: {
				options: {
					banner: '<%= banner %>'
				},
				files: {
					'themes/thecode/css/style.min.css': ['themes/thecode/css/style.css']
				}
			}
		},
		concat: {
			options: {
				stripBanners: true,
				banner: '<%= banner %>'
			},
			all: {
				src: [
					'themes/thecode/scripts/idangerous.swiper.min.js',
					'themes/thecode/scripts/common.js'
				],
				dest: 'themes/thecode/scripts/all.js'
			},
		},
		jshint: {
			all: ['Gruntfile.js', 'themes/thecode/scripts/common.js'],
			options: {
				lastsemic: true,
				strict: false,
				unused: true,
				globals: {
					jQuery: true
				}
			}
		},
		uglify: {
			options: {
				banner: '<%= banner %>',
				warnings: false
			},
			build: {
				files: {
					'themes/thecode/scripts/all.min.js': ['themes/thecode/scripts/all.js']
				}
			}
		}
	});

	// Load plugins
	grunt.loadNpmTasks('grunt-combine-media-queries');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');

	// Tasks
	grunt.registerTask('default', ['sass', 'cmq', 'cssmin', 'concat', 'jshint', 'uglify']);

};
