<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>

<style>
	body {
	  	background-color: #2483bb;
	}	
	/*from style*/
	.login-form {
		width: 400px;
		height: 350px;
		margin: 200px auto;
		background-color: #FFFFFF;
	}
	
	/*General input style*/
	input{
		width: 80%;
		margin-left: 10%;
		height: 45px;
		font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, "sans-serif"
	}
	
	/*Username input style*/
	input[type=text] {
		margin-top: 15%;
		margin-bottom: 5%;
	}
	
	/*Submit button style*/
	input[type=submit] {
		width: 81.3%;
		margin-left: 10%;
		margin-top: 5%;
		background-color: #2483bb;
		border: none;
		height: 50px;
	}
	
	/*Form text style*/
	.login-form p {
		width: 60%;
		margin-left: 40%;
		font-size: 0.9em;
		color: #747474;
		font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, "sans-serif"
	}
	
	a {
		text-decoration: none;
		color: #2483bb;
	}
	
</style>

</head>

<body>

<?php

if(!empty(filter_input(INPUT_POST, 'submit'))) {

	require_once('dbcon.php');
	
	$un = filter_input(INPUT_POST, 'un') 
		or die('Missing/illegal name parameter');
	$pw = filter_input(INPUT_POST, 'pw') 
		or die('Missing/illegal password parameter');

	$sql = 'SELECT idusers, pwhash FROM users WHERE username=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $un);
	$stmt->execute();
	$stmt->bind_result($uid, $pwhash);

	while ($stmt->fetch()) {} // fill result variables
	
	if (password_verify($pw, $pwhash)){
		// echo 'logged in as user '.$uid; <-- Uncomment to check if the login works
		$_SESSION['uid'] = $uid;
		$_SESSION['un'] = $un;
		echo("<script>location.href = 'http://www.faurholtdesign.com/Login/secretinfo.php';</script>"); //Redirects after submitting form data
	}
	else {
		echo 'illegal username/password combination';
	}
}
?>

<div class="login-form">
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
		<div class="round-img"></div>
    	<input name="un" type="text" placeholder="Username" required /> <br>
    	<input name="pw" type="password" placeholder="Password"  required /> <br>
		<input type="submit" name="submit" value="Login" />
	<p>Not registered? <a href="adduser.php">Create Profile</a></p>
</form>
<div>

</body>
</html>