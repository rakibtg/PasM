<?php

  // This is the final command that will be run in the system.
  $command = '';

  // Make sure mod_rewrite is enabled.
  $command .= 'sudo a2enmod rewrite; sudo systemctl restart apache2; ';

  // Move the domain conf file.
  $command .= 'mv ' 
    . $_confFilePath 
    . ' /etc/apache2/sites-available/' 
    . $domainWithoutWWW 
    . '.conf; ';

  // Enable the site.
  $command .= 'sudo a2ensite ' . $domainWithoutWWW;

  // Create document root directories.
  $command .= 'mkdir -p ' . $documentRoot . '; ';

  // Update permission.
  if( $updatePermission === 'Yes' ) {
    $command .= 'sudo chown -R www-data: /var/www/' . $domainWithoutWWW . '/';
  }

  // Clone from git.
  if( $git !== 'No' ) {
    $command .= 'cd ' . $cloneAt . '; ';
    $command .= 'git init; ';
    $command .= 'git remote add origin '. $git .'; ';
    $command .= 'git pull origin master; ';
  } else {
    // Create an index.htm file.
    $command .= 'cd ' . $documentRoot . '; ';
    $command .= 'touch index.html; ';
    $command .= 'echo "<h1>Welcome to ' . $domainWithoutWWW . '</h1>" >> index.html';
  }

  system($command);

  echo NEW_LINE;
  echo NEW_LINE;
  echo "Server was created!";
  echo NEW_LINE;
  echo NEW_LINE;