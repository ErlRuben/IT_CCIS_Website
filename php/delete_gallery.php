<!DOCTYPE HTML>
<?php
	session_start();
	if (!isset($_SESSION['user'])){
		header('Location: login_screen.php');
	}
?>

<html>
	<head>
		<title>Malayan Colleges Mindanao</title>
		<link rel="stylesheet" href="assets/css/delete_php.css" />

	</head>

	<body class="is-preload">

		<!--- HEADING --->
		<ul class = "e">
			<section class="wrapper2">
				<header class="special">
					<h2 class = "hh">DELETE GALLERY PAGE</h2>
				<header>
			</section>
		</ul>
		<!--- MAIN SCREEN OF ANNOUNCEMENTS --->
		<ul class = "ee">

			<div class="announcement_menu">
					<div class="btn-group">
						
						<a id="mybutton" >
						<button class ="button" onclick="window.location.href = 'admin_gallery.php';"><span>Back Gallery</span></button>

						</a>
					</div>
					
			</div>

                    <form class = "t" action="delete_gallery_success.php" method="post">
					<!---DATABASE CODE --->
					<?php 
						$conn = new mysqli("localhost", "root", "", "db_ccis");
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						$sql = "SELECT id, author, title, directory, stat  FROM albums_tb";
						$result = $conn->query($sql);
						//ARCHIVING ANNOUNCEMENTS
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								if ($row['stat'] != 'archived'){
									echo '<p class="identifier">
											<input type="checkbox" name="'.$row['id'].'">';
									echo "TITLE: ".$row['title']." ID:".$row['id']."";
									echo '</p>';
								}
							
							}
						} else {
							echo "no albums";
						}

						$conn->close();
					?>
			
					<div class="btnn-group">
						<a id="mybutton" >
							<button class="button" value="DELETE TICKED ALBUMS" type="submit" ><span>Delete Album</span></button>
					
						</a>
					</div>
					</form>
					
			</ul>	
		<!--- SCRIPTS --->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>