<?php
include ('conn.php');

$q = $_GET['term']; // variabel $q untuk mengambil inputan user
$sql = mysql_query("SELECT * FROM tks WHERE nama_tks LIKE '%".$q."%'"); // menampilkan data yg ada didatabase yg sesuai dengan inputan user ( nik )
while ($data = mysql_fetch_array($sql)){

        $row['nama_tks']    =$data['nama_tks'];
        $row['nit']    =$data['nit'];
        $row['nama']    =$data['nama'];
        $row['alamat']    =$data['alamat'];
        $row_set[]        =$row;
}
//echo json_encode($result);
echo json_encode($row_set);
?>