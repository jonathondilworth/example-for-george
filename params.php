<?php

/**
 * Sensitive information such as usernames and passwords live here.
 */

/**
 * Replace the db_username and db_password with actual values.
 * You may want to change the connection string if, for instance: your db
 * is hosted on another machine, or you change the name of the database.
 */

return [
  'db' => [
    'connection' => 'mysql:host=127.0.0.1;dbname=example-app',
    'db_name' => 'example-app',
    'db_username' => '',
    'db_password' => '',
    'db_options' => [],
  ],
  'appDetails' => [
    'example' => [
      'superuser' => [
        'name' => 'Jonathon',
        'surname' => 'Helloington',
        'jobTitle' => 'Full Stack Web Developer',
      ],
    ],
  ],
];
