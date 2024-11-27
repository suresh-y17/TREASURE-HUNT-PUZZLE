<!DOCTYPE html>
<html>
<head>
	<title>Player Scores</title>
	<style>
        body{
            background:url("treasures.jpg");
            background-size:cover;
        }
		table {
			border-collapse: collapse;
			margin: 20px auto;
			font-family: Arial, sans-serif;
			min-width: 300px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
		}
        td{
            color:gold;
        }
		th, td {
			padding: 10px;
			text-align: center;
			border: 1px solid gold;
		}

		th {
			background-color: #f2f2f2;
		}

		tr:nth-child(even) td {
			background-color: black;
		}

		caption {
			margin: 10px;
			font-weight: bold;
			font-size: 20px;
			text-align: center;
            color:gold;
		}
	</style>
</head>
<body>
	<?php
		$db = new mysqli("localhost", "root", "", "playdb");
		$sql = "SELECT name, score FROM users WHERE status = 'active' ORDER BY score DESC";
		$result = $db->query($sql);
	?>

	<table>
	<caption>Player Scores</caption>
		<thead>
			<tr>
				<th>Name</th>
				<th>Score</th>
			</tr>
		</thead>
		<tbody>
			<?php while($row = $result->fetch_assoc()): ?>
				<tr>
					<td><?= $row['name'] ?></td>
					<td><?= $row['score'] ?></td>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>

	<?php $db->close(); ?>
</body>
</html>
