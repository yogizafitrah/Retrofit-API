<?php
require("koneksi.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $jk = $_POST["jk"];
    $alamat = $_POST["alamat"];
    // $tgl = $_POST["tgl"];
    // $tspt = $_POST["tspt"];
    // $bpm = $_POST["bpm"];
    // $irr = $_POST["irr"];
    // $irrlokal = $_POST["irrlokal"];

    $perintah = "UPDATE recordecg SET nama = '$nama', jk = '$jk',alamat='$alamat' WHERE id = '$id'";
    $eksekusi = mysqli_query($konek,$perintah);
    $cek      = mysqli_affected_rows($konek);

    if($cek > 0){
        $response["kode"]=1;
        $response["pesan"]="Data berhasil diubah";
        
    } else {
        $response["kode"] = 0;
        $response["pesan"] = "Data gagal diubah";   
    }
}
else{
    $response["kode"]=0;
    $response["pesan"]="Tidak Ada Post Data";   
}

echo json_encode($response);
mysqli_close($konek);