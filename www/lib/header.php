<?php

/**
 * Library Functions
 */

// pull in sensitive information from outside the web accessible directory.
$params = require('../../params.php');

/**
 * Helper component that contains library functions
 */
class LibraryHelper
{
  /**
   * public visibility means the function is accessible from outside the class.
   * static keyword means that the function is a 'class method' and not an 'instance method'.
   * see object orientated programming refereneces.
   * @param string $firstName firstName of a user
   * @param mixed $details details of a user
   * @throws \Exception Invalid params
   * This function outputs a users name and their details
   */
  public static function outputData($firstName, $details)
  {
    if (!is_array($details) && count($details) > 0) {
      throw new \Exception('The details parameter is not an array, or there are no entries.');
    }
    if (!isset($firstName)) {
      throw new \Exception('The first argument was not provided');
    }

    /**
     * Notice I can embed variables within double quotes.
     * Convention is to surround these variables with curly braces.
     */
    echo "<h3>{$firstName}</h3><br/>";

    /**
     * Iterate through the array and output user details.
     * This is a pretty useless comment.
     * Your code shouldn't neeed useless comments like these.
     * Your code should be written in such a way that users can read it without the need for comments.
     */
    foreach ($details as $detailKey => $detailValue) {
      echo "<strong>{$detailKey}:</strong> {$detailValue}.<br/>";
    }
  }

} // class