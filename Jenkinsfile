pipeline {
  agent any
  stages {
    stage('Set up Enviroment') {
      steps {
        sh 'sudo apt-get -y install software-properties-common apt-transport-https git gnupg sudo nano wget curl zip unzip tcl inetutils-ping net-tools'
        sh '''sudo apt-get install -y php8.2 php8.2-fpm php8.2-bcmath php8.2-curl php8.2-imagick php8.2-intl php-json php8.2-mbstring php8.2-mysql php8.2-xml php8.2-zip

'''
      }
    }

    stage('checkout Repo') {
      steps {
        git(url: 'https://github.com/swoopfx/Terces-jobs', branch: 'dev')
      }
    }

  }
}