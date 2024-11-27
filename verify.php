<html>
    <body>
    <script type="text/javascript">
            function preback(){window.history.forward();}
            setTimeout("preback()",0);
         window.onunload=function(){null};
    </script>
    </body>
</html>
<?php
  session_start();
  $conn = mysqli_connect("localhost", "root", "", "playdb");
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  
  $eml = $_POST["eid"];
  $pass = $_POST["pwd"];
  $_SESSION['em'] = $eml;
  $_SESSION['pw'] = $pass;
  
  $sql = "SELECT * from playtab where u_password='$pass' and Email='$eml'";
  
  if ($uidd !== null) {
      $sql .= " and uid=$uidd";
  }
  
  $files = glob("img/.");
  $res = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($res) == 1) {
      while ($r = mysqli_fetch_array($res)) {
          $_SESSION['uid']=$r[0];
          $_SESSION['user'] = $r[1];
      }
      header('Location: dashboard.php');
  } else {
      echo "<script>alert('Invalid Email/Password')</script>";
      header('Location: login.html');
  }
  ?>