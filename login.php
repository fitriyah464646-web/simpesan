<?php

session_start();


if(isset($_SESSION['login'])){

header("Location: dashboard/index.php");

exit;

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn,
"SELECT * FROM admin
WHERE username='$username'
AND password='$password'");

}

?>


<!DOCTYPE html>
<html>
<head>

<title>
Login SIMPESAN
</title>


<link rel="stylesheet" 
href="assets/css/style.css">


<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


</head>


<body class="login-body">


<div class="login-box">


<img src="assets/img/logomahad.png">


<h2>
SIMPESAN
</h2>


<p>
Sistem Monitoring Pelanggaran Santri
</p>


<form action="proses_login.php"
method="POST">


<div class="input">

<i class="fa fa-user"></i>

<input 
type="text"
name="username"
placeholder="Username"
required>

</div>


<div class="input">


<i class="fa fa-lock"></i>

<input 
type="password"
name="password"
placeholder="Password"
required>
</div>

<button type="submit">

LOGIN

</button>

</form>

</div>


</body>
</html>