<?php
include "koneksi.php";
$sql="select * from produk order by id_menu";
$tampil = mysqli_query($koneksi,$sql);
if (mysqli_num_rows($tampil) > 0) {
$no=1;
$response = array();
 $response["data"] = array();
while ($r = mysqli_fetch_array($tampil)) {
 $h['id_menu'] = $r['id_menu'];
 $h['nama_menu'] = $r['nama_menu'];
 $h['jenis_menu'] = $r['jenis_menu'];
 $h['stok'] = $r['stok'];
 $h['harga'] = $r['harga'];
 $h['gambar'] = $r['gambar'];
 array_push($response["data"], $h);
 }
 echo json_encode($response);
}
else {
 $response["message"]="tidak ada data";
 echo json_encode($response);
 }
?>