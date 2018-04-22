<?php
//Sistem Informasi ini berbasis OPEN SOURCE dengan lisensi GNU/GPL. 
//
//OmahBIASAWAE dengan segala hormat tidak bertanggung jawab dan tidak memiliki pertanggungjawaban
//kepada apapun atau siapa pun akibat terjadinya kehilangan atau kerusakan yang mungkin muncul yang berasal
//dari buah karya ini.
//
//Sistem Informasi ini akan selalu dikembangkan dan jika ditemukan kesalahan logika ataupun kesalahan program,
//hal ini bukanlah disengaja. Melainkan hal tersebut adalah salah satu dari tahapan pengembangan lebih lanjut. 

//Sistem Informasi Skenario Film (SISFOSKENFI) v1.0, dikembangkan oleh OmahBIASAWAE (Agus Muhajir).
//Dan didistribusikan oleh BIASAWAE PRODUCTION (http://www.omahbiasawae.com)
//
//Bila Anda mempunyai pertanyaan, komentar, saran maupun kritik layangkan saja ke hajirodeon@yahoo.com atau
//hajirodeon@gmail.com .
//
//Semoga program ini berguna bagi Anda.
//
//Ikutilah perkembangan terbaru Sistem Informasi ini di BIASAWAE PRODUCTION.

//////////////////////////////////////////// FUNGSI - FUNGSI ////////////////////////////////////////////
//enkriptsi wae!
function kript($str) {
    $str = md5(md5($str));
	return $str;
  }
  
//untuk mencegah si jahil
function cegah($str) {
    $str = trim(htmlentities($str));
	$str = ereg_replace("%", "persen", $str);
	$str = ereg_replace("1=1", "1smdgan1", $str);
	$str = ereg_replace("/", "gmring", $str);
	$str = ereg_replace("!", "pentung", $str);
	$str = ereg_replace("'", "psiji", $str);
	return $str;
  }

//untuk anti-sql
function nosql($str) {
    $str = trim(mysql_real_escape_string(htmlentities(addslashes(htmlspecialchars($str)))));
	$str = ereg_replace("%", "persen", $str);
	$str = ereg_replace("1=1", "1smdgan1", $str);
	$str = ereg_replace("/", "gmring", $str);
	$str = ereg_replace("!", "pentung", $str);
	$str = ereg_replace("'", "psiji", $str);
	$str = ereg_replace("select", "NOSQL", $str);
	$str = ereg_replace("delete", "NOSQL", $str);
	$str = ereg_replace("update", "NOSQL", $str);
	$str = ereg_replace("alter", "NOSQL", $str);
	$str = ereg_replace("insert", "NOSQL", $str);
	$str = ereg_replace("grant", "NOSQL", $str);
	return $str;
  }
 
//balikino. . o . . .. o. . .. . balikin
function balikin($str) {
	$str = ereg_replace("persen", "%", $str);
	$str = ereg_replace("1smdgan1", "1=1", $str);
	$str = ereg_replace("gmring", "/", $str);
	$str = ereg_replace("pentung", "!", $str);
	$str = ereg_replace("&amp;", "&", $str);
	$str = ereg_replace("psiji", "'", $str);
	$str = ereg_replace(CHR(13), "", $str);
	$str = ereg_replace(CHR(10) & CHR(10), "</P><P>", $str);
	$str = ereg_replace(CHR(10), "<BR>", $str);
	return $str;
  }
  
//xclose
function xclose() {
	mysql_close($skenario);
	}

//xkapital
function xkapital($str) {
	echo strtoupper("$str");
	}

//xheadline
function xheadline($str) {
	echo strtoupper("<big><strong>$str</strong></big>");
	}

function xloc($str) {
	header("location:$str");
	}
	
function pekem($str,$str1) {
	echo "<script>alert('$str');location.href='$str1'</script>";
	}

function nocache() {
	//kosongkan cache
	"header('cache-control:private') \n ".
	"header('pragma:no-cache') \n ".
	"header('cache-control:no-cache') \n ".
	"flush()";
	}
			
////////////////////////////////////////////////// KHUSUS //////////////////////////////////////////////

//pengatur random session
$hajirobe = md5(md5(md5(rand(1,1000000000000))));

//ambil saat ini
//$today = date("Ymd H:i:s");
$tahun = date("Y");
$bulan = date("m");
$tanggal = date("d");
$jam = date("H");
$menit = date("i");
$detik = date("s");
$today = "$tahun:$bulan:$tanggal $jam:$menit:$detik";

//atur random untuk kode
$x = md5(md5(md5(rand(1,1000000000000))));

//pass baru
$passx = rand(1,100000);

//Tabel Utama
$width = 1000;
$height = 300;
$border = 0;
$cellpadding = 3;
$cellspacing = 0;
$bgcolor = "#000000";


//////////////////////////////////// PESAN - PESAN //////////////////////////////////////////////////////
$msg001 = "Username sudah ada. Silahkan diganti!";
$msg002 = "Anda Berhasil Membuat Akses. Silahkan LOGIN!";
$msg003 = "Profil Berhasil Di-UPDATE.";
$msg004 = "Terjadi kesalahan INPUT";
$msg005 = "Password berhasil diganti!";
$msg006 = "Password lama salah. Silahkan diulangi!";
$msg007 = "Jawaban salah. Silahkan diulangi!";
$msg008 = "Anda berhasil Keluar. Jangan Lupa Seringlah Login!";
$msg009 = "Login Salah, Harap Diulangi ;-)";
$msg010 = "Skenario sudah ada, Silahkan diganti judulnya!";
$msg011 = "Tokoh sudah ada, Silahkan diganti!";
$msg012 = "Anda Harus Login Terlebih Dahulu!";

////////////////////////////////////// JUDUL - JUDUL ///////////////////////////////////////////////////
$jd001 = "Daftar / Mendapatkan Akses";
$jd002 = "Profil";
$jd003 = "Ganti Password";
$jd004 = "Lupa Password";
$jd005 = "Login MEMBER";
$jd006 = "Profil Tokoh/Pemain/Karakter --> ";
$jd007 = "Tokoh - Tokoh --> ";
$jd008 = "Edit Tokoh/Pemain/Karakter --> ";
$jd009 = "Tambah Tokoh/Pemain/Karakter --> ";
$jd010 = "Profil Skenario --> ";
$jd011 = "Skenario Film --> ";
$jd012 = "Daftar Skenario";
$jd013 = "Edit Judul Skenario --> ";
$jd014 = "Tambah Skenario Film";
$jd015 = "Edit Sinopsis --> ";
$jd016 = "Scene Plot --> ";
$jd017 = "Edit Scene Plot";
$jd018 = "Tambah Scene Plot";
$jd019 = "Scene --> ";
$jd020 = "Tambah Dialog";
$jd021 = "Edit Dialog";
$jd022 = "Tambah Deskripsi";
$jd023 = "Edit Deskripsi";
$jd024 = "Daftar Istilah";
?>