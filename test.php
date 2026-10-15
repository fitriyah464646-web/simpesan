<?php

include "config/koneksi.php";


$query = mysqli_query($conn,"SHOW TABLES");


while($data=mysqli_fetch_array($query)){

    echo $data[0]."<br>";

}

?>