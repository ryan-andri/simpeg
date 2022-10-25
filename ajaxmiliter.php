<?php
require_once('configs/default.php');


$nrp = $_GET['nrp'];
$db = dbInstance();
$db->where('nrp', $nrp);
$users = $db->getOne('militer');
$data = array(
    'nama'           =>  @$users['nama'],
    'pangkat'        =>  @$users['pangkat'],
    'corps'          =>  @$users['corps'],
    'jabatan'        =>  @$users['jabatan'],
);
//tampil data
echo json_encode($data);
