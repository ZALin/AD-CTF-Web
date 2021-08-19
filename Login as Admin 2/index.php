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
    extract($data);
    if($users[$username] && $users[$username] === $password) {
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
        
        <input type="hidden" name="data" id="login_data" value="{}">
        <input type="submit" value="Login">

  <?php if(!$user && isset($_POST['data'])): ?>
        <div class="alert">Login failed !</div>
  <?php endif; ?>

<?php else: ?>
        <div class="success">Login as <code><?=htmlentities($username)?></code> !</div>
        <p><?=sprintf("You login from %s", $_SERVER['REMOTE_ADDR'] )?></p>
        
        <?php 
          if($user === 'admin'){
            if( $_SERVER['REMOTE_ADDR'] === '127.0.0.1' ){
                  printf("<code>%s</code>", htmlentities($flag));
            }
            else{
                  echo '<div class="alert">admin only can login from 127.0.0.1!</div>';
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
