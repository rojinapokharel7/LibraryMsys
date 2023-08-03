<?php
    require "../db_connect.php";
    require "../message_display.php";
	require "verify_librarian.php";
	require "header_librarian.php";
?>

<html>
	<head>
		<title>LMS</title>
		<link rel="stylesheet" type="text/css" href="../member/css/home_style.css" />
        <link rel="stylesheet" type="text/css" href="../css/global_styles.css">
		<link rel="stylesheet" type="text/css" href="../css/home_style.css">
		<link rel="stylesheet" type="text/css" href="../member/css/custom_radio_button_style.css">
	</head>
	<body>

    <?php
			$query = $con->prepare("SELECT name,email,username,balance FROM member ORDER BY username ");
			$query->execute();
			$result = $query->get_result();
			if(!$result)
				die("ERROR: Couldn't fetch members");
			$rows = mysqli_num_rows($result);
			if($rows == 0)
				echo "<h2 align='center'>No member available</h2>";
			else
			{
				echo "<form class='cd-form'>";
				echo "<div class='error-message' id='error-message'>
						<p id='error'></p>
					</div>";
				echo "<table width='100%' cellpadding=10 cellspacing=10>";
				echo "<tr>
						<th>Name<hr></th>
						<th>Email Address<hr></th>
						<th>Username<hr></th>
						<th>User Balance<hr></th>
					</tr>";
			   while($row = mysqli_fetch_array($result)){
                   echo "<tr><td>";
                   echo $row[0];
                   echo "</td> <td>";
                   echo $row[1];
                   echo "</td><td>";
                   echo $row[2];
                   echo "</td><td>";
                   echo $row[3];
                   echo "</td></tr>";
               }
				echo "</table>";
				
				echo "</form>";
			}
			

		?>
			
    </body>

</html>