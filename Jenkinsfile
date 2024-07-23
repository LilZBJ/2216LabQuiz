pipeline {
    agent any

    environment {
        COMPOSER_CACHE_DIR = "${WORKSPACE}/.composer/cache"
    }

    stages {
        stage('Checkout SCM') {
            steps {
                git 'https://github.com/LilZBJ/JenkinsDependencyCheckTest.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                script {
                    if (fileExists('composer.json')) {
                        sh 'composer install'
                    } else {
                        echo 'composer.json not found'
                    }
                }
            }
        }

        stage('Run Unit Tests') {
            steps {
                script {
                    if (fileExists('phpunit.xml') || fileExists('phpunit.xml.dist')) {
                        sh './vendor/bin/phpunit'
                    } else {
                        echo 'phpunit.xml not found'
                    }
                }
            }
        }

        stage('Dependency Check') {
            steps {
                dependencyCheck additionalArguments: '--format HTML --format XML', odcInstallation: 'Dependency-Check'
            }
        }

        stage('UI Testing') {
            steps {
                // Placeholder for UI testing commands
                echo 'Running UI tests...'
            }
        }
    }

    post {
        always {
            junit 'logs/unitreport.xml'
            dependencyCheckPublisher pattern: 'dependency-check-report.xml'
        }
    }
}
