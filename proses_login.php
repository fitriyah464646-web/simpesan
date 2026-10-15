<?php

session_start();


include "config/koneksi.php";


$username =
$_POST['username'];


$password =
$_POST['password'];



$query=mysqli_query(
$conn,

"SELECT * FROM admin 
WHERE username='$username'
AND password='$password'"
);



$data=mysqli_fetch_assoc($query);



if($data){


$_SESSION['login']=true;

$_SESSION['nama']=$data['nama'];



header(
"Location: dashboard/index.php"
);


}else{


echo "

<script>

alert('Username atau password salah');

location='login.php';

</script>

";


}


?>