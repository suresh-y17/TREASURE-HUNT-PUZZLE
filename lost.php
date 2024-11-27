<!DOCTYPE html>
<html>
  <head>
    <title>Game Over</title>
    <style>
      body {
        background-image: url("https://i.ytimg.com/vi/9fO8oJkbP-0/maxresdefault.jpg");
        background-size: cover;
        font-family: Arial, sans-serif;
      }
      h1 {
        color: white;
        text-align: center;
        font-size: 64px;
        margin-top: 40px;
        text-shadow: 2px 2px 5px #000;
      }
      h3{
        color:white;
        text-align: center;
        font-size: 25px;
        margin-top: -30px;
        text-shadow: 2px 2px 5px #000;
      }
      a {
        color: gold;
        text-decoration: none;
        font-weight: bold;
        border: 2px solid gold;
        padding: 12px 24px;
        border-radius: 4px;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
        display: inline-block;
        margin-top: 30px;
        margin-left: auto;
        margin-right: auto;
      }
      a:hover {
        background-color: #e5b700;
      }
      .logout {
        text-align: right;
        margin-top: -250px;
        font-size: 24px;
      }
      .logout a {
        color: #fff;
        font-weight: bold;
        text-decoration: none;
        transition: color 0.3s ease;
      }
      .logout a:hover {
        color: gold;
      }
    </style>
  </head>
  <body>
    <?php
      session_start();
      echo '<h1>Sorry ' . $_SESSION["user"] . ', you lost the game</h1>';
    ?>
      <script type="text/javascript">
            function preback(){window.history.forward();}
            setTimeout("preback()",0);
         window.onunload=function(){null};
    </script>
    <div class="button-wrapper">
      <h3>Click here to play the game again <a href="play.html">Play Again</a></h3>
    </div>
    <div class="logout">
    <a href="logout.php">Logout</a>
    </div>
  </body>
</html>
