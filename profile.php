<?php 
  session_start();
  $host='localhost';
  $conn=mysqli_connect($host,'root','','playdb');
  $person_name = $_SESSION['user'];
  $eml=$_SESSION['em'];
  $pass=$_SESSION['pw'];
  $sql = "SELECT * FROM playtab WHERE f_name = '$person_name' and Email='$eml' and u_password='$pass'";
  $files=glob("img/.");
  $result = mysqli_query($conn, $sql);
  mysqli_query($conn,$sql);
  if (mysqli_connect_error()){
      die('connection failed');
  }
  mysqli_close($conn);
?>

<html>
  <head>
    <title>Beautiful Table</title>
    <style>
      body {
        background-image: url('https://cdn.wallpapersafari.com/58/85/FUtI1N.jpg');
        background-size: cover;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
      }
      
      table {
        border-collapse: collapse;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: auto;
        margin-right: auto;
        max-width: 800px;
        max-height: 5px;
        background-color: rgba(255, 255, 255, 0.8);
        box-shadow: 0px 0px 20px 5px rgba(0, 0, 0, 0.3);
      }
      
      th {
        background-color: #FFDAB9;
        color: #FF6347;
        font-size: 28px;
        font-weight: bold;
        text-align: left;
        padding: 20px;
      }
      
      td {
        font-size: 24px;
        padding: 5px 10px;
      }
      
      img {
        display: block;
        margin: 20px auto;
        max-width: 300px;
        height: auto;
        border-radius: 50%;
        box-shadow: 0px 0px 10px 2px rgba(0, 0, 0, 0.3);
      }
    </style>
  </head>
  <body>
    <table>
      <tr>
        <th colspan="2">User Information</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td>Profile Picture</td>
          <td><img src="<?php echo $row['images']; ?>" alt="User Image"></td>
        </tr>
        <tr>
          <td>Name:</td>
          <td><?php echo $row["f_name"]; ?></td>
        </tr>
        <tr>
          <td>Email ID:</td>
          <td><?php echo $row["Email"]; ?></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><?php echo $row["u_password"]; ?></td>
        </tr>
        <tr>
          <td>Date of Birth:</td>
          <td><?php echo $row["DOB"]; ?></td>
        </tr>
      <?php } ?>
    </table>
  </body>
</html>
