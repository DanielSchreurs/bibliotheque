module.exports=function(grunt){
    require('load-grunt-tasks')(grunt);
    grunt.initConfig({
        watch: {
            dist: {
                files: ['js/*.js'],
                tasks: ['default'],
                options: {
                    spawn: true,
                },
            },
        },
        jshint: {
            all: ['js/*.js']
        },
        uglify: {
            my_target: {
                files: {
                    'js/min/app.js': ['js/app.js']
                }
        }
    },
    phpcs: {
        application: {
            src: ['author/*.php']
        },
        options: {
            bin: 'vendor/bin/phpcs',
            standard: 'PSR2'
            }
    },
    cssmin: {
        options: {
            shorthandCompacting: false,
            roundingPrecision: -1
        },
        target: {
            files: {
                './min/style-min.css': ['./css/style.css']
        }
  }
}
});
grunt.registerTask('default',['jshint','uglify','phpcs']);
}
