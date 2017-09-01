<?php session_start(); ?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>

<style>
	body {
		font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, "sans-serif";
	}
	
	/*Main container*/
	.wrapper {
		max-width: 800px;
		margin: auto;
		margin-top: 80px;
		background-color: #2483bb;
		padding: 20px;
	}
	
	.header {
		width: 90%;
		margin-left: 5%;
		background-color: #FFFFFF;
		padding-bottom: 10px;
		padding-top: 10px;
	}
	
	.header h2 {
		width: 80%;
		margin-left: 10%;
		text-align: center;
		font-size: 3em;
		padding-bottom: 30px;
		border-bottom: 2px solid #2483bb;
	}
	
	.header p {
		text-align: justify;
		margin: 50px;
	}
	
	.content-no1 {
		width: 90%;
		margin-left: 5%;
		margin-top: 20px;
	}
	
	.content-no2 {
		width: 90%;
		margin-left: 5%;
		margin-top: 20px;
	}
	
	.content-no3 {
		width: 90%;
		margin-left: 5%;
		margin-top: 20px;
	}
	
	.content-no4 {
		width: 90%;
		margin-left: 5%;
		margin-top: 20px;
	}
	
	/*profile button style*/
	.profile {
		position: fixed;
		top: 30px;
		right: 100px;
		text-decoration: none;
		color: #FFFFFF;
		background-color: #000000;
		border: solid 2px #000000;
		padding: 5px 10px;
	}
	
	/*Dropdown menu style*/
	.dropbtn {
		width: 40px;
		height: 40px;
		position: fixed;
		top: 30px;
		right: 30px;
		background-image: url(images/setting_wheel.png);
		background-color: transparent;
		border: none;
		cursor: pointer;
	}

	.dropdown {
		position: fixed;
		top: 69px;
		right: 215px;
		display: inline-block;
	}

	.dropdown-content {
		display: none;
		position: absolute;
		background-color: #FFFFFF;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
	}

	.dropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}

	.dropdown-content a:hover {background-color: #f1f1f1}

	.dropdown:hover .dropdown-content {
		display: block;
	}
	
	.no-entry {
		margin-left: 40%;
		margin-top: 100px;
	}
	
</style>

</head>

<body>


<?php
	
	if (!empty($_SESSION['uid'])){
		/*?> Dropdown menu <?php */
		echo '<div class="wrapper">
				
					<div class="dropdown">
						<button class="dropbtn"></button>
						<div class="dropdown-content">
							<a href="secretinfo.php">Home</a>
							<a href="profile.php">Profile</a>
							<a href="logout.php">Logout</a>
						</div>
					</div>
			
					<div class="header"> <h2> Welcome '.$_SESSION['un'].' </h2> 
						<p> This is LOGON, and im glad that you are here. The fact that you are reading this means that you have created a user and uploaded the data to my own MySQL database, and have used this newly created user to login using my PHP files. I havent yet decided what secret info i should display yet, so i just got some random stuff for you.</p>
					
					</div>
					
					<div class="content-no1"> <img src="images/apple.jpg" width="100%" height="auto" alt=""/> </div>
					<div class="content-no2"> <img src="images/eggs.jpg" width="100%" height="auto" alt=""/> </div>
					<div class="content-no3"> <img src="images/eveil.png" width="100%" height="auto" alt=""/> </div>
					<div class="content-no4"> <img src="images/JC.jpg" width="100%" height="auto" alt=""/> </div>
					
					
			  </div>';
		
		echo '<a class="profile" href="profile.php"> '.$_SESSION['un'].' </a>';
		
		/*?> Content <?php */
		
	}
	else {
		echo '<img class="no-entry" src="images/No_entry.png" width="20%" height="auto" alt=""/>';
		echo '<h3> You need to be logged in </h3>';
		echo '<a class="logout" href="logout.php"> Login </a>';
	}
	
?>

</body>
</html>