pipeline {
  agent any
  stages {
    stage('Set up Enviroment') {
      steps {
        git(url: 'https://github.com/swoopfx/Terces-jobs', branch: 'dev')
      }
    }

    stage('checkout Repo') {
      steps {
        git(url: 'https://github.com/swoopfx/Terces-jobs', branch: 'dev')
      }
    }

  }
}