module.exports = function ( grunt ) {

	const sass = require('node-sass');

	// require it at the top and pass in the grunt instance
	require( 'time-grunt' )( grunt );

	// Load all Grunt tasks
	require( 'jit-grunt' )( grunt, {
		makepot: 'grunt-wp-i18n'
	} );

	grunt.initConfig( {

		pkg: grunt.file.readJSON( 'package.json' ),

		// Concat and Minify our js.
		uglify: {
			prod: {
				files: {
					'assets/js/main.min.js': 'assets/js/main.js',
					'includes/admin/assets/js/metabox.min.js': 'includes/admin/assets/js/metabox.js',
					'includes/customizer/assets/js/customizer.min.js': 'includes/customizer/assets/js/customizer.js',
				}
			}
		},

		// Compile our sass.
		sass: {
			dev: {
				options: {
					implementation: sass,
					outputStyle: 'nested',
					sourceMap: false
				},
				files: {
					'assets/css/style.css': 'assets/css/style.scss',
				}
			},
			prod: {
				options: {
					outputStyle: 'compressed',
					sourceMap: false
				},
				files: {
					'assets/css/style.min.css': 'assets/css/style.scss'
				}
			}
		},

		// Autoprefixer.
		autoprefixer: {
			options: {
				browsers: [
					'last 8 versions', 'ie 8', 'ie 9'
				]
			},
			main: {
				files: {
					'assets/css/style.css': 'assets/css/style.css',
					'assets/css/style.min.css': 'assets/css/style.min.css',
				}
			}
		},

		// Sorting our CSS properties.
		csscomb: {
			options: {
				config: '.csscomb.json'
			},
			main: {
				files: {
					'assets/css/style.css': [ 'assets/css/style.css' ]
				}
			}
		},

		// Newer files checker
		newer: {
			options: {
				override: function ( detail, include ) {
					if ( detail.task === 'php' || detail.task === 'sass' ) {
						include( true );
					} else {
						include( false );
					}
				}
			}
		},

		// Watch for changes.
		watch: {
			options: {
				livereload: true,
				spawn: false
			},
			scss: {
				files: [ 'assets/css/**/*.scss' ],
				tasks: [
					'newer:sass:dev',
					'newer:autoprefixer:main',
				]
			},
			js: {
				files: [ 'assets/js/**/*.js' ],
			}
		},

		// Copy the theme into the build directory
		copy: {
			build: {
				expand: true,
				src: [
					'**',
					'!node_modules/**',
					'!build/**',
					'!.git/**',
					'!Gruntfile.js',
					'!package.json',
					'!.csscomb.json',
					'!.tern-project',
					'!.gitignore',
					'!.jshintrc',
					'!.DS_Store',
					'!*.map',
					'!**/*.map',
					'!**/Gruntfile.js',
					'!**/package.json',
					'!**/*~'
				],
				dest: 'build/<%= pkg.name %>/'
			}
		},

		makepot: {
			target: {
				options: {
					domainPath: '/languages/', // Where to save the POT file.
					exclude: [ // Exlude folder.
						'build/.*',
						'assets/.*',
						'readme/.*',
						'sass/.*',
						'bower_components/.*',
						'node_modules/.*'
					],
					potFilename: '<%= pkg.name %>.pot', // Name of the POT file.
					type: 'wp-plugin', // Type of project (wp-plugin or wp-theme).
					updateTimestamp: true, // Whether the POT-Creation-Date should be updated without other changes.
					processPot: function ( pot, options ) {
						pot.headers[ 'report-msgid-bugs-to' ] = 'https://oceanwp.org/support/';
						pot.headers[ 'plural-forms' ] = 'nplurals=2; plural=n != 1;';
						pot.headers[ 'last-translator' ] = 'OceanWP\n';
						pot.headers[ 'language-team' ] = 'OceanWP\n';
						pot.headers[ 'x-poedit-basepath' ] = '..\n';
						pot.headers[ 'x-poedit-language' ] = 'English\n';
						pot.headers[ 'x-poedit-country' ] = 'UNITED STATES\n';
						pot.headers[ 'x-poedit-sourcecharset' ] = 'utf-8\n';
						pot.headers[ 'x-poedit-searchpath-0' ] = '.\n';
						pot.headers[ 'x-poedit-keywordslist' ] = '_esc_attr__;esc_attr_x;esc_attr_e;esc_html__;esc_html_e;esc_html_x;__;_e;__ngettext:1,2;_n:1,2;__ngettext_noop:1,2;_n_noop:1,2;_c;_nc:4c,1,2;_x:1,2c;_ex:1,2c;_nx:4c,1,2;_nx_noop:4c,1,2;\n';
						pot.headers[ 'x-textdomain-support' ] = 'yes\n';
						return pot;
					}
				}
			}
		}

	} );

	// Dev task
	grunt.registerTask( 'default', [
		'uglify:prod',
		'sass:dev'
	] );

	// Production task
	grunt.registerTask( 'build', [
		'newer:uglify:prod',
		'sass:prod',
		'autoprefixer:main',
		'csscomb:main',
		'copy'
	] );

	// Package task
	grunt.registerTask( 'package', [
		'compress',
	] );

};
