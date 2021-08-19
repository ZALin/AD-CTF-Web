<?php require('config/config.php'); ?>

<!DOCTYPE html>
<html>
  <head>

    <title>Ping for you</title>

  </head>
  <body>

    <form method="get" action="index.php">
      IP address: <input type="text" name="ip" placeholder="Give me one IP address" /> <input type="submit"/>
    </form>

    <hr />

    <div>
       <?php
        global $bad_list;
        if (!isset($_GET['ip']))
              die("Give me something");

        $ip = $_GET['ip'];
        write_log($ip);

        foreach ($bad_list as $bad) {
            if (stristr($ip, $bad)) {
                echo "<pre>\"$bad\" is not allow</pre><br/>";
                die('You are the bad guy!');
            }
        }
      
        echo "<pre>".htmlentities(`ping -c1 {$ip}`)."</pre>";

        ?>

    </div>

  </body>
</html>

