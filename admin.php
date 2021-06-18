<?php

require_once 'init.php'; 
require_once 'nav.php'; 

$users = Database::getInstance()->getAll('users'); 
?>

<h1>Admin panel</h1>
<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Pass not hash</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($users->results() as $user): ?>
    <tr>
      <th scope="row"><?= $user->id; ?></th>
      <td><?= $user->name; ?></td>
      <td><?= $user->email; ?></td>
      <td><?= $user->password; ?></td>
      <td><?= $user->pass; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>



<?php
$user = new User;
if($user->isLoggedIn()) {
    echo "<b>Hi, {$user->data()->name}</b>";
}


//var_dump($users); 




