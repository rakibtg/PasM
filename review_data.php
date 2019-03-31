<?php

$cloneAtReview = $git !== 'No'
  ? '> Clone Project Destination: ' . $cloneAt
  : '';

echo "
Please review all information's listed below 
  > Domain Name: $domainWithoutWWW
  > Domain Alias: $domainAlias
  > Server Admin: $serverAdmin
  > Document Root: $documentRoot
  > Update Permission: $updatePermission
  > Git Repository: $git
  $cloneAtReview
";
  echo NEW_LINE;