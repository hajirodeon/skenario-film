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

session_start();

require("../include/cek.php"); 

nocache();



//koneksi
require_once('../Connections/skenario.php'); 

//ambil nilai
$skenkd = cegah($_REQUEST['skenkd']);

$judul = $jd018;
?>
<html>
<head>
<title><?php echo balikin($judul);?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../style/skenario.css" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function cek(){

if (document.frmplot.lokasi.value=="") {
alert("Lokasi belum dipilih!")
return false
}

if (document.frmplot.tempat.value=="") {
alert("Tempat kejadiannya dimana?")
return false
}

if (document.frmplot.waktu.value=="") {
alert("Kapan terjadinya?")
return false
}

if (document.frmplot.plot.value=="") {
alert("Plot dari cerita belum ditulis.")
return false
}

return true
}
// End -->
</SCRIPT>
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="5" topmargin="5">
<?php include("../include/header.php"); ?>
<table bgcolor="<?php echo $bgcolor;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" border="<?php echo $border;?>" cellpadding="<?php echo $cellpadding;?>" cellspacing="<?php echo $cellspacing;?>">
  <tr> 
    <td width="150" valign="top"><?php include("../include/menu.php"); ?></td>
    <td width="4" valign="top"></td>
    <td valign="top"><a href="index.php?skenkd=<?php echo $skenkd;?>">Daftar 
      Scene Plot</a> &gt; Tambah </p> <p><?php echo xheadline(balikin($judul));?></p>
      <form action="add1.php" method="post" name="frmplot" id="frmplot" onSubmit="return cek()">
        <p>Lokasi : <br>
          <select name="lokasi" id="lokasi">
            <?
			//lokasi
			mysql_select_db($database_skenario, $skenario);
			$query_rs_lokasi = "SELECT * FROM m_lokasi ".
								"ORDER BY lokasi ASC";
			$rs_lokasi = mysql_query($query_rs_lokasi, $skenario) or die(mysql_error());
			$row_rs_lokasi = mysql_fetch_assoc($rs_lokasi);
			$totalRows_rs_lokasi = mysql_num_rows($rs_lokasi);
			?>
            <option selected>-Lokasi-</option>
            <?
			do 
				{  
				?>
            <option value="<? echo $row_rs_lokasi['kd'] ?>"><? echo balikin($row_rs_lokasi['lokasi']);?></option>
            <?
				} 
		
			while ($row_rs_lokasi = mysql_fetch_assoc($rs_lokasi));
		?>
          </select>
        </p>
        <p>Tempat :<br>
          <input name="tempat" type="text" id="tempat" size="40">
        </p>
        <p>Waktu :<br>
          <select name="waktu" id="waktu">
            <?
			//waktu
			mysql_select_db($database_skenario, $skenario);
			$query_rs_waktu = "SELECT * FROM m_waktu ".
								"ORDER BY waktu ASC";
			$rs_waktu = mysql_query($query_rs_waktu, $skenario) or die(mysql_error());
			$row_rs_waktu = mysql_fetch_assoc($rs_waktu);
			$totalRows_rs_waktu = mysql_num_rows($rs_waktu);
			?>
            <option selected>-Waktu-</option>
            <?
			do 
				{  
				?>
            <option value="<? echo $row_rs_waktu['kd'] ?>"><? echo balikin($row_rs_waktu['waktu']);?></option>
            <?
				} 
		
			while ($row_rs_waktu = mysql_fetch_assoc($rs_waktu));
		?>
          </select>
        </p>
        <p>Plot :<br>
          <textarea name="plot" cols="60" rows="10" wrap="VIRTUAL" id="lokasi4"></textarea>
        </p>
        <p> 
          <input name="skenkd" type="hidden" value="<?php echo $skenkd;?>">
          <input type="reset" name="Reset" value="Batal">
          <input name="Submit" type="submit" id="Submit" value="Simpan">
        </p>
      </form>
      <p>&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>
<?php include("../include/footer.php"); ?>
</body>
</html>
<?php
//diskonek
	xclose;
?>
