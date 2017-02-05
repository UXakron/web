
module.exports = function(grunt) {

  // Configuration
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      dist: {
        options: {
          style: 'compressed'
        },
        files: {
        'assets/css/style.css': 'assets/sass/style.scss',
        'assets/css/critical.css': 'assets/css/critical.css'
        }
      }
    },
    criticalcss: {
      custom: {
        options: {
          url: "http://uxakron.web",
                width: 1200,
                height: 900,
                outputfile: "assets/css/critical.css",
                filename: "assets/css/style.css", // Using path.resolve( path.join( ... ) ) is a good idea here
                buffer: 800*1024,
                ignoreConsole: false
        }
      }
    },
    uglify: {
      my_target: {
        files: {
          'assets/js/min/scripts-min.js': ['assets/js/*.js']
        }
      }
    },
    autoprefixer: {
      your_target: {
        files: {
          'assets/css/style.css': 'assets/css/style.css'
        }
      },
    },
    watch: {
      css: {
				files: '**/sass/*.scss',
				tasks: ['sass', 'autoprefixer'],
        options: {
          livereload: true,
        },
			},
      js: {
				files: '**/js/*.js',
				tasks: ['uglify'],
        options: {
          livereload: true,
        },
			},
      html: {
        files: ['*.html'],
        options: {
          spawn: false,
          livereload: true
        }
      }
    }
  });

  // Plugins
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-criticalcss');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-shell');

  // Tasks
  grunt.registerTask('default', ['watch']);
  grunt.registerTask('critical', ['criticalcss']);
};
