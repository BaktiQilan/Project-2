<?php
    require ("config.php");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sqlstr="insert into users (username, password) Values ('$username','$password')";
    $hasil=@mysqli_query($conn,"INSERT INTO users (username, password) Values ('$username','$password')");
    if($hasil)
    {
        echo ("User berhasil dibuat!");
    }else
    {
        echo("Data gagal disimpan!<br>");
    }
?>