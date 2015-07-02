var autoprefixer = require('autoprefixer-core');
module.exports = function(grunt) {
	'use strict';

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		concat: {
			options: {
				separator: ';',
			},
			dist: {
				src: [
                    'bower_components/jquery/dist/jquery.js',
                    'bower_components/bootstrap/js/collapse.js',
                    'bower_components/bootstrap/js/dropdown.js',
					'webroot/js/src/scripts.js',
				],
				dest: 'webroot/js/build/scripts.js'
			}
		},
		uglify: {
			options: {
				mangle: false
			},
			my_target: {
				files: {
					'webroot/js/build/scripts.min.js': ['webroot/js/build/scripts.js']
				}
			}
		},
		less:	{
			my_target: {
				files: {
					'webroot/css/build/styles.css': 'webroot/css/src/styles.less'
				}
			}
		},
		cssmin: {
			my_target: {
				expand: true,
				cwd: 'webroot/css/build/',
				src: ['*.css', '!*.min.css'],
				dest: 'webroot/css/build/',
				ext: '.min.css'
			}
		},
        watch: {
          jss: {
            files: ['webroot/js/src/*.js'],
               tasks: ['concat', 'uglify']
             },
             css: {
               files: ['webroot/css/src/styles.less'],
               tasks: ['less', 'cssmin', 'postcss']
           }
       },
       bowercopy: {
         options: {
            srcPrefix: 'bower_components',
            destPrefix: 'webroot/css'
          },
          fonts: 'bootstrap/fonts'
      },
      postcss: {
        options: {
          processors: [
            autoprefixer({ browsers: ['last 2 version'] }).postcss
          ]
        },
        dist: { src: 'webroot/css/build/*.css' }
      },
   });

   grunt.loadNpmTasks('grunt-contrib-concat');
   grunt.loadNpmTasks('grunt-contrib-uglify');
   grunt.loadNpmTasks('grunt-contrib-cssmin');
   grunt.loadNpmTasks('grunt-contrib-watch');
   grunt.loadNpmTasks('grunt-contrib-less');
   grunt.loadNpmTasks('grunt-bowercopy');
   grunt.loadNpmTasks('grunt-postcss');
   grunt.registerTask('default', ['concat:dist', 'uglify']);
};
