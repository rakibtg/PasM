<?php
  echo 'Please provide all the information\'s very carefully (ctrl+c to exit)';
  echo NEW_LINE . NEW_LINE;
  
  echo 'Domain Name (without www): ';
  $domainWithoutWWW = input();
  echo NEW_LINE;

  echo 'Add www domain alias? (y/n): ';
  $domainWithWWW = strtolower( input() );
  if( $domainWithWWW === 'y' ) $domainAlias = 'www.' . $domainWithoutWWW;
  else $domainAlias = $domainWithoutWWW;
  echo NEW_LINE;

  echo 'Server admin (press enter to use the default webmaster@example.com): ';
  $serverAdmin = input();
  if( empty($serverAdmin) ) $serverAdmin = 'webmaster@example.com';
  echo NEW_LINE;

  $publicDirectory = 'public';
  $documentRoot = '/var/www/' . $domainWithoutWWW . '/';
  echo 'Add a "public" directory at your document root ('.$documentRoot.')? (y/n): ';
  if( input() === 'y' ) {
    $documentRoot = $documentRoot . $publicDirectory;
  } else {
    $publicDirectory = false;
  }
  echo NEW_LINE;

  // Create the site conf file.
  require_once __DIR__ . '/example.conf.php';

  echo 'Update permission for apache user? (if you are not sure press y) (y/n): ';
  if( input() === 'n' ) $updatePermission = 'No';
  else $updatePermission = 'Yes';
  echo NEW_LINE;

  echo 'Git repository URL (press enter to skip): ';
  $git = input();
  if( empty( $git ) ) $git = 'No';
  echo NEW_LINE;

  if( ($git !== 'No') AND ($publicDirectory !== false) ) {
    echo 'Clone repository in the public directory? (y/n): ';
    $cloneAt = input();
    if( $cloneAt === 'y' ) {
      $cloneAt = $documentRoot;
    } else {
      $cloneAt = '/var/www/' . $domainWithoutWWW . '/';
    }
  } else {
    $cloneAt = $documentRoot;
  }
