<?php
// query
include('../../config/koneksi.php');

// ambil dari database

$data_KepalaDesa= $_POST['kepala_desa'];
$data_Tahun = $_POST['tahun'];
$data_Bulan = $_POST['bulan'];
$data_surat = date('d-m-Y');
$query_pendatanglk = "SELECT COUNT(*) AS total FROM mutasi JOIN penduduk ON penduduk.nik=mutasi.nik WHERE MONTH(mutasi.tanggal_mutasi)='$data_Bulan'and YEAR(mutasi.tanggal_mutasi)='$data_Tahun' and penduduk.jk='Laki-laki' and penduduk.status = '2'";
$hasil_pendatanglk = mysqli_query($db, $query_pendatanglk);
$jumlah_pendatanglk = mysqli_fetch_array($hasil_pendatanglk);
$jmlpendatangl =$jumlah_pendatanglk['total'];
// echo "pendatang l'$jmlpendatangl'</br>";

$query_pendatangp = "SELECT COUNT(*) AS total FROM mutasi JOIN penduduk ON penduduk.nik=mutasi.nik WHERE MONTH(mutasi.tanggal_mutasi)='$data_Bulan'and YEAR(mutasi.tanggal_mutasi)='$data_Tahun' and penduduk.jk='Perempuan' and penduduk.status = '2'";
$hasil_pendatangp = mysqli_query($db, $query_pendatangp);
$jumlah_pendatangp = mysqli_fetch_assoc($hasil_pendatangp);
$jmlpendatangp= $jumlah_pendatangp['total'];

// echo "pendatang p'$jmlpendatangp'</br>";

$query_pindahlk = "SELECT COUNT(*) AS total FROM mutasi JOIN penduduk ON penduduk.nik=mutasi.nik WHERE MONTH(mutasi.tanggal_mutasi)='$data_Bulan'and YEAR(mutasi.tanggal_mutasi)='$data_Tahun' and penduduk.jk='Laki-laki' and penduduk.status = '3'";
$hasil_pindahlk= mysqli_query($db, $query_pindahlk);
$jumlah_pindahlk = mysqli_fetch_assoc($hasil_pindahlk);
$jmlpindahl = $jumlah_pindahlk['total'];
// echo "pindah l'$jmlpindahl'</br>";

$query_pindahp = "SELECT COUNT(*) AS total FROM mutasi JOIN penduduk ON penduduk.nik=mutasi.nik WHERE MONTH(mutasi.tanggal_mutasi)='$data_Bulan'and YEAR(mutasi.tanggal_mutasi)='$data_Tahun' and penduduk.jk='Perempuan' and penduduk.status = '3'";
$hasil_pindahp= mysqli_query($db, $query_pindahp);
$jumlah_pindahp = mysqli_fetch_assoc($hasil_pindahp);
$jmlpindahp = $jumlah_pindahp['total'];
// echo "pindah p'$jmlpindahp'</br>";

$query_penduduklk = "SELECT COUNT(*) AS total FROM penduduk WHERE jk = 'Laki-laki' and status = '1' or status='2' ";
$hasil_penduduklk= mysqli_query($db, $query_penduduklk);
$jumlah_penduduklk = mysqli_fetch_assoc($hasil_penduduklk);
$jmlpendudukl=$jumlah_penduduklk['total'];
// echo "jml penduduk l'$jmlpendudukl'</br>";

$query_pendudukp = "SELECT COUNT(*) AS total FROM penduduk WHERE jk = 'Perempuan' and status = '1' or status='2'";
$hasil_pendudukp= mysqli_query($db, $query_pendudukp);
$jumlah_pendudukp = mysqli_fetch_assoc($hasil_pendudukp);
$jmlpendudukp= $jumlah_pendudukp['total'];
// echo "jml penduduk p'$jmlpendudukp'</br>";

$query_matilk = "SELECT COUNT(*) AS total FROM kematian JOIN penduduk ON penduduk.nik=kematian.nik WHERE MONTH(kematian.tgl_mati)='$data_Bulan'and YEAR(kematian.tgl_mati)='$data_Tahun' and penduduk.jk='Laki-laki' and penduduk.status = '4'";
$hasil_matilk= mysqli_query($db, $query_matilk);
$jumlah_matilk = mysqli_fetch_assoc($hasil_matilk);
$jmlmatil=$jumlah_matilk['total'];
// echo "jml mati l'$jmlmatil'</br>";

$query_matip = "SELECT COUNT(*) AS total FROM kematian JOIN penduduk ON penduduk.nik=kematian.nik WHERE MONTH(kematian.tgl_mati)='$data_Bulan'and YEAR(kematian.tgl_mati)='$data_Tahun' and penduduk.jk='Perempuan' and penduduk.status = '4'";
$hasil_matip= mysqli_query($db, $query_matip);
$jumlah_matip = mysqli_fetch_assoc($hasil_matip);
$jmlmatip= $jumlah_matip['total'];
// echo "jml mati p'$jmlmatip'</br>";

$query_kelahiranlk = "SELECT COUNT(*) AS total FROM kelahiran WHERE  MONTH(kelahiran.tgl_kelahiran)='$data_Bulan'and YEAR(kelahiran.tgl_kelahiran)='$data_Tahun' and jk_anak ='Laki-laki'";
$hasil_kelahiranlk= mysqli_query($db, $query_kelahiranlk);
$jumlah_lahirlk = mysqli_fetch_assoc($hasil_kelahiranlk);
$jmllahirl=$jumlah_lahirlk['total'];

$query_kelahiranp = "SELECT COUNT(*) AS total FROM kelahiran WHERE  MONTH(kelahiran.tgl_kelahiran)='$data_Bulan'and YEAR(kelahiran.tgl_kelahiran)='$data_Tahun' and jk_anak ='Perempuan'";
$hasil_kelahiranp= mysqli_query($db, $query_kelahiranp);
$jumlah_lahirp = mysqli_fetch_assoc($hasil_kelahiranp);
$jmllahirp=$jumlah_lahirp['total'];

$jmlakhirl = $jmlpendudukl + $jmlpendatangl + $jmllahirl - $jmlmatil - $jmlpindahl;
$jmlakhirp = $jmlpendudukp + $jmlpendatangp +$jmllahirp - $jmlmatip - $jmlpindahp;




// memanggil dan membaca template dokumen yang telah kita buat
$document = file_get_contents('../../surat/laporan.rtf');

// document dokumen dinyatakan dalam bentuk string
 $document = str_replace('=datangL=', $jmlpendatangl, $document);
 $document = str_replace('=datangP=', $jmlpendatangp, $document);
 $document = str_replace('=awalL=', $jmlpendudukl, $document);
 $document = str_replace('=awalP=', $jmlpendudukp, $document);
 $document = str_replace('=matiL=', $jmlmatil, $document);
 $document = str_replace('=matiP=', $jmlmatip, $document);
 $document = str_replace('=lahirL=', $jmllahirl, $document);
 $document = str_replace('=lahirP=', $jmllahirp, $document);
 $document = str_replace('=pindahL=', $jmlpindahl, $document);
 $document = str_replace('=pindahP=', $jmlpindahp, $document);
 $document = str_replace('=akhirL=', $jmlakhirl, $document);
 $document = str_replace('=akhirP=', $jmlakhirp, $document);
 $document = str_replace('=Bulan=', $data_Bulan, $document);
 $document = str_replace('=TGL=', $data_surat, $document);
 $document = str_replace('=KepalaDesa=', $data_KepalaDesa, $document);
// header untuk membuka file output RTF dengan MS. Word
header("Content-type: application/msword");
header("Content-disposition: inline; filename=laporan.doc");
header("Content-length: ".strlen($document));
echo $document;
?>