<?php
@error_reporting(E_ALL^E_NOTICE);
require('config.php');

if($_GET['show_source'] === '1') {
    highlight_file(__FILE__);
    exit;
}

$user = null;

// connect to the users database

if(!empty($_POST['data'])) {
    try {
        $data = json_decode($_POST['data'], true);
    } catch (Exception $e) {
        die('bad input');
    }

    $username = $data['username'];
    $password = $data['password'];
   
    if($users[$username] && $users[$username] == $password) {
        $user = $username;
    }
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
      <link rel="stylesheet" href="style.css">
</head>

<body>
  <html lang="en-US">
    <div class="jumbotron">
        <div class="container">
            <h1>Login as Admin</h1>
        </div>
    </div>

    <div class="container">
        <div class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="?show_source=1" target="_blank">Source Code</a>
                </div>
            </div>
        </div>
    </div>

    <div id="login">
      <form action="." method="POST" id='form_login'>
<?php if(!$user): ?>
        <span class="fontawesome-user"></span>
          <input type="text" id="username" name="username" placeholder="Username">
       
        <span class="fontawesome-lock"></span>
          <input type="password" id="password" name="password" placeholder="Password">

        <span class="fontawesome-key"></span>
          <input type="text" name="keyA" placeholder="Secret Key A">

        <span class="fontawesome-key"></span>
          <input type="text" name="keyB" placeholder="Secret Key B">
        
        <input type="hidden" name="data" id="login_data" value="{}">
        <input type="submit" value="Login">

  <?php if(!$user && isset($_POST['data'])): ?>
        <div class="alert">Login failed !</div>
  <?php endif; ?>

<?php else: ?>
        <div class="success">Login as <code><?=htmlentities($username)?></code> !</div>
        <p><?=sprintf("Welcome! You %s admin!", $user == 'admin' ? "are" : "are not")?></p>

        <?php 
          if($user === 'admin'){
            if( strcmp( $_POST['keyA'], base64_encode($flag) ) == 0 &&
                strcmp( $_POST['keyB'], md5($flag) ) == 0           &&
                sha1($_POST['keyA']) === sha1($_POST['keyB']) ){
                  printf("<code>%s</code>", htmlentities($flag));
            }
            else{
                  echo '<div class="alert">Wrong Key !</div>';
            }

          }  
        ?>
<?php endif; ?>

      </form>
      <div>
          <p>
              You can login with <code>guest</code> / <code>guest</code>.
          </p>
      </div>
    </div>


    <script>
      form_login.onsubmit = function () {
          login_data.value = JSON.stringify({
              username: username.value,
              password: password.value
          });
          username.value = null;
          password.value = null;
      };
    </script>
  
</body>
</html>
