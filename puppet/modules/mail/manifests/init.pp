class mail {
  package { 'mailutils':
    ensure => 'present',
    require => Exec['apt-get update'],
  }
}
