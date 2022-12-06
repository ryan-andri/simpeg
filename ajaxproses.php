<?php
require_once('configs/default.php');

$id = $_GET['id'];
$devisi = $_GET['devisi'];

$db = dbInstance();
if ($devisi == 'tni') {
    $db->where('nrp', $id);
    $users = $db->getOne('militer');
    $data = array(
        'nama'           =>  @$users['nama'],
        'pangkat'        =>  @$users['pangkat'],
        'corps'          =>  @$users['corps'],
        'jabatan'        =>  @$users['jabatan'],
    );
} else if ($devisi == 'pns') {
    $db->where('nip', $id);
    $users = $db->getOne('pns');
    $data = array(
        'nama'           =>  @$users['nama'],
        'golongan'        =>  @$users['golongan'],
        'penugasan'        =>  @$users['penugasan'],
        'jabatan'        =>  @$users['jabatan'],
    );
} else if ($devisi == 'tks') {
    $db->where('nit', $id);
    $users = $db->getOne('tks');
    $data = array(
        'nama'           =>  @$users['nama'],
        'penugasan'        =>  @$users['penugasan'],
    );
}

//tampil data
echo json_encode($data);
