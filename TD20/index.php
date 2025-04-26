<?php
require '../functions.php';
require 'Person.php';

$john = new Person("John Doe", "john.doe@gmail.com");
$john->setGender("Male");
$john->setBirthdate("2000-12-25");
?>

<h3><?= $john->getWelcomeMessage() ?></h3>
<p>Your Birthdate is <?= $john->getBirthdate() ?></p>
<p>Your age is: <?= $john->getAge() ?></p>

<!-- <h3>Welcome <?= $john->getName() ?></h3>
<p>Your email is <?= $john->getEmail() ?></p>
<p>Your Gender is <?= $john->getGender() ?></p>
<p>Your Birthdate is <?= $john->getBirthdate() ?></p> -->