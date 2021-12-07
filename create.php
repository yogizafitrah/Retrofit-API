<?php
require("koneksi.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nama = $_POST["nama"];
    $jk = $_POST["jk"];
    $alamat = $_POST["alamat"];
    $tgl = $_POST["tgl"];
    $tspt = $_POST["tspt"];
    $bpm = $_POST["bpm"];
    $irr = $_POST["irr"];
    $irrlokal = $_POST["irrlokal"];
    $hr = $_POST["hr"];

    $perintah = "INSERT INTO recordecg (nama,jk,alamat,tgl,tspt,bpm,irr,irrlokal,hr) VALUE('$nama','$jk','$alamat','$tgl','$tspt','$bpm','$irr','$irrlokal','$hr')";
    $eksekusi = mysqli_query($konek,$perintah);
    $cek      = mysqli_affected_rows($konek);

    if($cek > 0){
        $response["kode"]=1;
        $response["pesan"]="Simpan data Berhasil";
    } else{
        $response["kode"]=0;
        $response["pesan"]="Gagal Menyimpan Data";
    }
}
else{
    $response["kode"]=0;
    $response["pesan"]="Tidak Ada Post Data";   
}

echo json_encode($response);
mysqli_close($konek);