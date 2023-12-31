pipeline {
  agent any
  stages {
    stage('Set up Enviroment') {
      steps {
        git(url: 'https://github.com/swoopfx/Terces-jobs', branch: 'dev')
        sh 'sudo apt-get -y install software-properties-common apt-transport-https git gnupg sudo nano wget curl zip unzip tcl inetutils-ping net-tools'
      }
    }

    stage('checkout Repo') {
      steps {
        git(url: 'https://github.com/swoopfx/Terces-jobs', branch: 'dev')
      }
    }

  }
}