<?php

$virtualHostsFile = "<VirtualHost *:80>
      ServerName $domainWithoutWWW
      ServerAlias $domainAlias
      ServerAdmin $serverAdmin
      DocumentRoot $documentRoot

      <Directory $documentRoot>
          Options -Indexes +FollowSymLinks
          AllowOverride All
      </Directory>

      ErrorLog \${APACHE_LOG_DIR}/$domainWithoutWWW-error.log
      CustomLog \${APACHE_LOG_DIR}/$domainWithoutWWW-access.log combined
  </VirtualHost>";

$_confFilePath = __DIR__ . '/sites/' . $domainWithoutWWW . '.conf';

file_put_contents( $_confFilePath, $virtualHostsFile );