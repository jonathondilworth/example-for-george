<?php

/**
 * Library Functions
 */

/**
 * We might want to implement the accessibility of params through the use of a design pattern
 * called a singleton, see: https://en.wikipedia.org/wiki/Singleton_pattern
 * This would essentially be a globally accessible object that is instanciated at the project
 * root: index.php - but for now, don't worry too much about this. Read into it, but it may be
 * too much information for to take on board from the get go.
 * 
 * For now, you could include parameters in a couple of different ways. You might want to load
 * it in as a 'global variable' at the top of each page, similar to this.
 */
$params = require('../params.php');


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

  /**
   * This function is a little different to the outputData function, because it's not directly outputting
   * anything. It is returning the value, so instead of just calling the function in our 'view', we're
   * going to have to echo the result. This can be done using the following shortform:
   *
   * <?= LibraryHelper::getParamsSuperUser() ?>
   *
   * as it is equivalent to:
   *
   * <?php echo LibraryHelper::getParamsSuperUser() ?>
   *
   * Notice how we document each function using doc comments.
   * @param mixed $config the apps global parameters as requried at the top of the file
   * @return String details regarding the owner of the website.
   */
  public static function getSuperUserDetails($config)
  {
    // accessing data stored within the global $params is equivalent to accessing a multidimensional array
    // the best type of code is simple, and easy to understand. But this may be a little verbose.

    $superUserFirstName = $config['appDetails']['example']['superuser']['name'];
    $superUserJobTitle = $config['appDetails']['example']['superuser']['jobTitle'];

    // how about something like this?

    $superUserDetails = $config['appDetails']['example']['superuser'];
    $suDetailsFirstName = $superUserDetails['name'];
    $suDetailsJobTitle = $superUserDetails['jobTitle'];

    // let's output these details now (remember, your code should read such that it doesn't need commenting)

    return "Website owner first name: {$suDetailsFirstName}. Job title: {$suDetailsJobTitle}";
  }
} // LibraryHelper class


class Connection
{
  /**
   * Open a connection to the db.
   * @param $config, dbname, username, password, options.
   * @return PDO.
   */
  public static function make($config)
  {
    try {
      return new PDO(
        $config['connection'].';dbname='.$config['name'],
        $config['username'],
        $config['password'],
        $config['options']
      );
    
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
}

/**
 * Global PDO to reduce the number of database calls made.
 */
$pdo = Connection::make([
  'connection' => $params['db']['connection'],
  'name' => $params['db']['db_name'],
  'username' => $params['db']['db_username'],
  'password' => $params['db']['db_password'],
  'options' => $params['db']['db_options'],
]);
