<?php

require_once 'init.php'; 
require_once 'nav.php'; 
?>

<?php

if(Input::exists()) {

  $validate = new Validate();

  $validation = $validate->check($_POST, [
    'email' => ['required' => true, 'email' => true],
    'password' => ['required' => true],
]);

    if($validate->passed()) {
      $user = new User;
      $login = $user->login(Input::get('email'), Input::get('password'));

      if($login) {
        echo '<a href="admin.php"> &nbsp Login success. Перейдите по ссылке => </a>'; 
      //  header('Location: admin.php'); // не работает
      } else {
        echo "<div class='validate'>" .'Логин или пароль не верны' ."</div>";
      }
    } else {
      foreach($validation->errors() as $error) { 
        echo "<div class='validate'>" . $error . "</div>";
      }
    }
}
?>

<div class="container">
<h1>Login</h1>
<form action="" method="post">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo Input::get('email') ?>">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>