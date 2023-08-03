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
			$query = $con->prepare("SELECT username,email,book_isbn,title,author,category,due_date 
            FROM member m 
            JOIN book_issue_log i 
            ON m.username = i.member 
            JOIN book b 
            ON i.book_isbn = b.isbn
            ORDER BY username");
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
				echo "<table width='100%' cellpadding=10 cellspacing=5>";
				echo "<tr>
						<th>UserName<hr></th>
						<th>Email address<hr></th>
						<th>Book_ISBN<hr></th>
						<th>Book Title<hr></th>
                        <th>Author<hr></th>
                        <th>Semester<hr></th>
                        <th>Due Date<hr></th>
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
                   echo "</td><td>";
                   echo $row[4];
                   echo "</td><td>";
                   echo $row[5];
                   echo "</td><td>";
                   echo $row[6];
                   echo "</td></tr>";
               }
				echo "</table>";
				
				echo "</form>";
			}
			
			
		?>

    </body>

</html>