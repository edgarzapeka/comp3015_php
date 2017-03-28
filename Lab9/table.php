<?php
	$host = 'localhost';
	$username = 'root';
	$password = 'password';
	$database = 'lesson9';

	$connect = mysqli_connect($host, $username, $password, $database);
	
	$result = mysqli_query($connect, "SELECT * FROM books");
?>
<html>
<body>
	<table>
		<tr>
			<th>id</th>
			<th>Title</th>
			<th>Author</th>
			<th>published_year</th>
		</tr>
		<?php
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<th>". $row['id'] ."</th>";
				echo "<th>". $row['title']."</th>";
				echo "<th>".$row['author']."</th>";
				echo "<th>".$row['published_year']."</th>";
				echo "</tr>";
			}
			mysqli_close($connect);
		?>
	</table>
</body>
</html>