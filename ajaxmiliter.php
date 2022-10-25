<?php
require_once('configs/default.php');


$nrp = $_GET['nrp'];
$db = dbInstance();
$users = $db->get('militer', $nrp );
$data = array(
            'nama'           =>  @$users['nama'],
            'pangkat'        =>  @$users['pangkat'],
            'corps'          =>  @$users['corps'],
            'jabatan'        =>  @$users['jabatan'],);
//tampil data
echo json_encode($data);
?>
