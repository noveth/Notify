exec { 'apt-get update':
  path => '/usr/bin',
}

file { '/srv/www/':
  ensure => 'directory',
}

package { 'git':
  ensure => 'present',
  require => Exec['apt-get update'],
}

include nginx, php
