<?php
session_start();

if (isset($_GET['score'])) {
  $score = filter_var($_GET['score'], FILTER_SANITIZE_NUMBER_INT);
} 

$uid = $_SESSION['uid'];
$name = $_SESSION['user'];

$conn = mysqli_connect("localhost", "root", "", "playdb");

$sql = "INSERT INTO users (uid, name, score,status) VALUES ('$uid', '$name', '$score','active')";
mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Treasure Hunt Game Result</title>
	<style>
		body {
			background:url("coin2.gif");
			background-size: cover;
			font-family: Arial, sans-serif;
		}

		h1 {
			font-size: 3em;
			font-weight: bold;
			color: gold;
			font-family: 'fantasy', cursive;
			margin-top: 50px;
			margin-bottom: 30px;
			text-align: center;
			text-shadow: 2px 2px 2px rgba(0,0,0,0.5);
		}

		.container {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 100px;
		}

		.result {
			background-color: rgba(255,255,255,0.8);
			padding: 30px;
			border-radius: 10px;
			box-shadow: 2px 2px 10px rgba(0,0,0,0.5);
		}

		.play-again {
			margin-top: 50px;
			text-align: center;
		}

		.play-again a {
			display: inline-block;
			background-color: gold;
			color: #222;
			padding: 10px 20px;
			border-radius: 5px;
			font-weight: bold;
			text-decoration: none;
			transition: background-color 0.3s;
		}

		.play-again a:hover {
			background-color: #ffc107;
		}

		.logout {
			margin-top: 50px;
			text-align: center;
		}

		.logout a {
			display: inline-block;
			background-color: gold;
			color: #222;
			padding: 10px 20px;
			border-radius: 5px;
			font-weight: bold;
			text-decoration: none;
			transition: background-color 0.3s;
		}

		.logout a:hover {
			color: #ffc107;
		}
		.view-dashboard {
			margin-top: 50px;
			text-align: center;
		}

		.view-dashboard a {
			display: inline-block;
			background-color: gold;
			color: #222;
			padding: 10px 20px;
			border-radius: 5px;
			font-weight: bold;
			text-decoration: none;
			transition: background-color 0.3s;
		}

		.view-dashboard a:hover {
			color: #ffc107;
		}
	</style>
</head>
<body>
<script type="text/javascript">
            function preback(){window.history.forward();}
            setTimeout("preback()",0);
         window.onunload=function(){null};
    </script>
	<div class="container">
		<h1>Treasure Hunt Game Result</h1>
		<div class="result">
			<h2>Your final score is: <?php echo $score; ?></h2>
		</div>
		<div class="play-again">
			<a href="play.html">Play Again</a>
		</div>
		<div class="view-dashboard">
			<a href="dashboard.php">View Dashboard</a>
		</div>
		<div class="logout">
			<a href="logout.php">Logout</a>
		</div>
	</div>
</body>
</html>
