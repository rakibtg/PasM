<?php
  
  system('clear');

  const NEW_LINE = "\n";

  /**
   * Take input from command line interface.
   * @return string
   *
   */
  function input () {
    return strtolower( trim( fgets(STDIN) ) );
  }