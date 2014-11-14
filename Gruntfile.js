'use strict';
module.exports = function(grunt) {

	// load all tasks
	require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});

    grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
	    makepot: {
	        target: {
	            options: {
	                domainPath: '/languages/',    // Where to save the POT file.
	                potFilename: 'cascade.pot',   // Name of the POT file.
	                type: 'wp-theme',  // Type of project (wp-plugin or wp-theme).
	                updateTimestamp: false
	            }
	        }
	    },
		exec: {
			txpull: { // Pull Transifex translation - grunt exec:txpull
				cmd: 'tx pull -a --minimum-perc=90' // Percentage translated
			},
			txpush_s: { // Push pot to Transifex - grunt exec:txpush_s
				cmd: 'tx push -s'
			},
		},
		dirs: {
			lang: 'languages',
		},
		potomo: {
			dist: {
				options: {
					poDel: false // Set to true if you want to erase the .po
				},
				files: [{
					expand: true,
					cwd: '<%= dirs.lang %>',
					src: ['*.po'],
					dest: '<%= dirs.lang %>',
					ext: '.mo',
					nonull: true
				}]
			}
		},
	});

	// Makepot and push it on Transifex task(s).
    grunt.registerTask( 'txpush', [
    	'makepot',
    	'exec:txpush_s'
    ]);

    // Pull from Transifex and create .mo task(s).
    grunt.registerTask( 'txpull', [
    	'exec:txpull',
    	'potomo'
    ]);

};
