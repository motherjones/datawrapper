<?php
// This file generated by Propel 1.6.5 convert-conf target
// from XML runtime conf file /Users/gka/clients/datawrapper/1.0/lib/core/runtime-conf.xml
$conf = array (
  'datasources' => 
  array (
    'datawrapper' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'bfc797e8be8eb2:d784b6cd@us-cdbr-east-05.cleardb.net/heroku_94cb0220ab02e5b',
        //'dsn' => 'mysql://bfc797e8be8eb2:d784b6cd@us-cdbr-east-05.cleardb.net/heroku_94cb0220ab02e5b?reconnect=true',
        'user' => 'bfc797e8be8eb2',
        'password' => 'd784b6cd',
      ),
    ),
    'default' => 'datawrapper',
  ),
  'generator_version' => '1.6.8',
);
$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-datawrapper-conf.php');
return $conf;
