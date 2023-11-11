<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $F_Name = $_POST['F_Name'];
    $L_Name = $_POST['L_Name'];
    $email = $_POST['email'];
    $email2 = $_POST['email2'];
    $profesi = $_POST['profesi'];

    $file = 'datapribadi.csv';
    $data = "$id, $F_Name, $L_Name, $email, $email2, $profesi\n";
    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        echo 'Data berhasil disimpan.';
    } else {
        echo 'Gagal menyimpan data ke file.';
    }
}
?>
