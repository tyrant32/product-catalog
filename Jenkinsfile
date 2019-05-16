pipeline {
    agent any
    environment {
        CI = 'true'
    }
    stages {
        stage('Build') {
            steps {
                sh 'yarn install'
                sh 'composer install'
                sh 'ant'
            }
        }
        stage('Deliver for development') {
            when {
                branch 'develop'
            }
            steps {
                sh 'composer update -o'
                input message: 'Finished using the web site? (Click "Proceed" to continue)'
            }
        }
        stage('Deploy for production') {
            when {
                branch 'prod'
            }
            steps {
                sh 'composer update -o'
                input message: 'Finished using the web site? (Click "Proceed" to continue)'
            }
        }
    }
}
