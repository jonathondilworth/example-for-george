<!DOCTYPE html>
<html>
  <head>
    <title>Example Webpage</title>
    <!-- pull in required PHP functions from the library -->
    <?php require 'lib/header.php' ?>
  </head>
  <body>
    <h1>Hello World!</h1>
    <p>Here is an example webpage. We can <?php echo "output PHP like this."; ?>. 
    As a shorthand, we can also <?= "do this" ?>.</p>
    <h2>Library Function Example</h2>
    <?php LibraryHelper::outputData("Jonathon", ['age' => '24', 'hometown' => 'Llandegfan']); ?>
    <hr>
    <h2>Notice (Another Library Function Example)</h2>
    <!-- notice the PHP short hand -->
    <p><?= LibraryHelper::getSuperUserDetails($appParams) ?></p>
    <?php var_dump($appParams) ?>
  </body>
</html>
