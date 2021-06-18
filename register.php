<?php require_once 'init.php'; ?>
<?php require_once 'nav.php'; ?>
<?php
 

if(Input::exists()) {

    $validate = new Validate();

    $validation = $validate->check($_POST, [
        'name' => [
            'required' => true,
            'min' => 2,
            'max' => 15,
            'unique' => 'users'
        ],
        'password' => [
            'required' => true,
            'min' => 3
        ],
        'password_confirm' => [
            'required' => true,
            'matches' => 'password'
        ],
    ]);

    if($validation->passed()) {
        echo '<a href="login.php"> &nbsp Пользователь успешно зарегистрирован. Перейдите по ссылке => </a>';
        //  header('Location: login.php'); // не работает
    } else {
        foreach($validation->errors() as $error) { 
          echo "<div class='validate'>" . $error . "</div>";
        }
    }

    $user = new User;
    $user->create([
        "name" => Input::get('name'),
        "email" => Input::get('email'),
        "pass" => Input::get('password'),
        "password" => password_hash(Input::get('password'),PASSWORD_DEFAULT),
        // "password" => password_hash(Input::get('password'),PASSWORD_DEFAULT),
    ]);

}
// header('Location: /index.php');
?>

<div class="container">
<h1>Register</h1>
<form action="" method="post">
    
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="name" class="form-control" id="name" name="name"  value="<?php echo Input::get('name'); ?>">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email"
    value="<?php echo Input::get('email'); ?>">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="password_confirm" class="form-label">Password</label>
    <input type="password" class="form-control" id="password_confirm" name="password_confirm">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>