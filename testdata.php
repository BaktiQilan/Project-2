<html>
<head>
    <title>Data Masuk Barang</title>
</head>
<body>
    <h2>Daftar Data Masuk Barang</h2>
    <table width="500" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <tr bgcolor="#999999">
        <th><font color="#FFFFFF">Kode Masuk</font></th>
        <th><font color="#FFFFFF">Kode Barang</font></th>
        <th><font color="#FFFFFF">Tanggal Masuk</font></th>
        <th><font color="#FFFFFF">Jumlah Barang</font></th>
        <th></th>
        <th></th>
    </tr>
    <?php
        $host="localhost";
        $user="root";
        $paswd="";
        $db="proyek-2";
        
        $idkoneksi=@mysqli_connect($host,$user,$paswd) or die("Koneksi <b>Server mysqli</b>tidak berhasil!");
        $iddatabase=@@mysqli_select_db($idkoneksi,$db);
        
        $sqlstr="select *from barang";
        $hasil=@mysqli_query($idkoneksi,$sqlstr);
        
        while($row=mysqli_fetch_array($hasil)):
    ?>
    <tr bgcolor="#FFFFFF">
        <td><?php echo $row["kodebarang"]; ?></td>
        <td><?php echo $row["namabarang"]; ?></td>
        <td><?php echo $row["tanggalmasuk"]; ?></td>
        <td><?php echo $row["jumlah"]; ?></td>
        <td><a href="update_barang.php?kode_masuk=<?php echo $row["kode_masuk"]; ?>">Edit</a></td>
        <td><a href="hasil_delete.php?kode_masuk=<?php echo $row["kode_masuk"]; ?>">Delete</a></td>
    </tr>
    <?php endwhile;?> 
    </table>
<?php
     @mysqli_close($idkoneksi);
?>
</body>
</html>