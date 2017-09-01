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
	.adduser-form {
		width: 400px;
		height: 500px;
		margin: 200px auto;
		padding-top: 30px;
		background-color: #FFFFFF;
	}
	
	/*General input style*/
	input{
		width: 80%;
		margin-left: 10%;
		margin-top: 5%;
		height: 45px;
		font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, "sans-serif"
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
	.refer {
		width: 60%;
		margin-left: 40%;
		font-size: 0.9em;
		color: #747474;
		font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, "sans-serif"
	}
	
	.confirmation {
		padding: 15px 0;
		text-align: center;
		background-color: #1AFF00;
		width: 100%;
		margin-top: 50px;
		font-size: 0.9em;
		color: #000000;
		font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, "sans-serif"
	}
	
	.error {
		padding: 15px 0;
		text-align: center;
		background-color: #FF0004;
		width: 100%;
		margin-top: 50px;
		font-size: 0.9em;
		color: #FFFFFF;
		font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, "sans-serif"
	}
	
	a {
		text-decoration: none;
		color: #2483bb;
	}
	
</style>
</head>
<body>

<div class="adduser-form">
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    	<input name="first" type="text" placeholder="First name" required />
    	<input name="last" type="text" placeholder="Last name" required />
    	<input name="un" type="text" placeholder="Username" required/>
    	<input name="pw" type="password" placeholder="Password"  required/>
    	<input name='email' type="email" placeholder="E-mail" required/>
    	<input type="submit" name="submit" value="Create user"/>
    	<p class="refer">Already have a Profile? <a href="index.php">Login</a></p>
		
<?php
if(!empty(filter_input(INPUT_POST, 'submit'))) {
	
	require_once('dbcon.php');
	$first = filter_input(INPUT_POST, 'first') 
		or die('Missing/illegal name parameter');
	$last = filter_input(INPUT_POST, 'last') 
		or die('Missing/illegal name parameter');
	$un = filter_input(INPUT_POST, 'un') 
		or die('Missing/illegal name parameter');
	$pw = filter_input(INPUT_POST, 'pw') 
		or die('Missing/illegal password parameter');
	$email = filter_input(INPUT_POST, 'email') 
		or die('Missing/illegal e-mail parameter');

	// hash and salt the password
	$pw = password_hash($pw, PASSWORD_DEFAULT); 
	
//	echo 'Creating user: '.$un.' => '.$pw;
	
	$sql = 'INSERT INTO users (first_name, last_name, username, pwhash, email) VALUES (?,?,?,?,?)';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('sssss', $first, $last, $un, $pw, $email);
	$stmt->execute();
	
	if ($stmt->affected_rows >0){
		echo '<p class="confirmation"> user '.$un.' is added.</p>';
	}
	else {
		echo '<p class="error"> Error !! User '.$un.' does already exist? </p>';
	}
}
?>

	</form>
</div>

</body>
</html>