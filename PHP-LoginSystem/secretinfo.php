<?php session_start(); ?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>

<style>
	body {
		font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, "sans-serif";
	}
	
	.hello-div {
		width: 90%;
		margin-left: 5%;
		margin-top: 80px;
	}
	
	.hello-div h2 {
		font-size: 6em;
		text-align: center;
		color: #2483bb;
	}
	
	.hello-div h3 {
		font-size: 3em;
		text-align: center;
	}
	
	.no-entry {
		margin-left: 40%;
		margin-top: 100px;
	}
	
	.hello-div p {
		font-size: 2em;
		text-align: center;
		width: 50%;
		margin-left: 25%;
		color: #2483bb;
	}
	
	/*profile button style*/
	.profile {
		position: fixed;
		top: 30px;
		right: 130px;
		text-decoration: none;
		color: #FFFFFF;
		background-color: #2483bb;
		border: solid 2px #2483bb;
		padding: 5px 10px;
	}
	
	.header {
		width: 80%;
		margin-left: 10%;
		border: solid 2px #2483bb;
	}
	
	.content {
		width: 80%;
		margin-left: 10%;
		margin-top: 20px;
		border: solid 2px #2483bb;
	}
	
	/*profile button style*/
	.profile {
		position: fixed;
		top: 30px;
		right: 100px;
		text-decoration: none;
		color: #FFFFFF;
		background-color: #2483bb;
		border: solid 2px #2483bb;
		padding: 5px 10px;
	}
	
	.header {
		width: 80%;
		margin-left: 10%;
		border: solid 2px #2483bb;
	}
	
	.content {
		width: 80%;
		margin-left: 10%;
		margin-top: 20px;
		border: solid 2px #2483bb;
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
	
</style>

</head>

<body>

<div class="hello-div">
<?php
	
	if (!empty($_SESSION['uid'])){
		/*?> Dropdown menu <?php */
		echo '<div class="dropdown">
					<button class="dropbtn"></button>
					<div class="dropdown-content">
						<a href="secretinfo.php">Home</a>
						<a href="profile.php">Profile</a>
						<a href="logout.php">Logout</a>
					</div>
			  </div>';
		
		echo '<a class="profile" href="profile.php"> '.$_SESSION['un'].' </a>';
		
		/*?> Content <?php */
		echo '<div class="header"> <h2> Welcome '.$_SESSION['un'].' </h2> </div>';
		echo '<div class="content"><p> I’m glad that you are here. <br> Because that means that you have successfully registered yourself in my very own MySQL database and logged in trough my PHP files. </p></div>';
	}
	else {
		echo '<img class="no-entry" src="images/No_entry.png" width="20%" height="auto" alt=""/>';
		echo '<h3> You need to be logged in </h3>';
		echo '<a class="logout" href="logout.php"> Login </a>';
	}
	
?>

</div>



</body>
</html>