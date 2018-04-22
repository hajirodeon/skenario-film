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

require("../include/fungsi.php"); 
require("../include/config.php"); 

nocache();



//ambil nilai
$skenkd = $_REQUEST['skenkd'];

//koneksi
require_once('../Connections/skenario.php'); 

//nunjukin skenario
mysql_select_db($database_skenario, $skenario);

$query_rs1 = "SELECT member.*, skenario.* FROM member, skenario ".
				"WHERE member.kd = skenario.kd_member ".
				"AND skenario.kd = '$skenkd'";
$rs1= mysql_query($query_rs1, $skenario) or die(mysql_error());
$row_rs1 = mysql_fetch_assoc($rs1);
$totalRows_rs1 = mysql_num_rows($rs1);

//judul
$judul = "$jd011 $row_rs1[judul]";
?>
<html>
<head>
<title><?php echo balikin($judul);?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../style/skenario.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="5" topmargin="5">
<table width="600" border="0" cellpadding="3" cellspacing="0">
  <tr> 
    <td height="642" valign="top"> <p><font color="#000000"><?php echo xheadline($judul);?><br>
        Oleh : <?php echo balikin($row_rs1['nama']);?>, <br>
		Alamat : <?php echo balikin($row_rs1['alamat']);?>, <br>
		Telepon : <?php echo balikin($row_rs1['telp']);?>, <br>
		E-Mail : <?php echo balikin($row_rs1['email']);?></font></p>
      <p><font color="#000000"><strong>1. Judul :</strong> <br>
        <?php echo balikin($row_rs1['judul']);?></font></p>
      <p><font color="#000000"><strong>2. Tema : </strong><br>
        <?php
	  //tema
	  mysql_select_db($database_skenario, $skenario);

$query_rstema = "SELECT skenario_c_tema.*, c_tema.* ".
					"FROM skenario_c_tema, c_tema ".
					"WHERE skenario_c_tema.kd_tema = c_tema.kd ".
					"AND skenario_c_tema.kd_skenario = '$skenkd'";
$rstema= mysql_query($query_rstema, $skenario) or die(mysql_error());
$row_rstema = mysql_fetch_assoc($rstema);
$totalRows_rstema = mysql_num_rows($rstema);

echo balikin($row_rstema['tema']);
	  ?>
        </font></p>
      <p><font color="#000000"><strong>3. Jenis :<br>
        </strong> 
        <?php
	  //jenis
	  mysql_select_db($database_skenario, $skenario);

$query_rsjenis = "SELECT skenario_c_jenis.*, c_jenis.* ".
					"FROM skenario_c_jenis, c_jenis ".
					"WHERE skenario_c_jenis.kd_jenis = c_jenis.kd ".
					"AND skenario_c_jenis.kd_skenario = '$skenkd'";
$rsjenis= mysql_query($query_rsjenis, $skenario) or die(mysql_error());
$row_rsjenis = mysql_fetch_assoc($rsjenis);
$totalRows_rsjenis = mysql_num_rows($rsjenis);

echo balikin($row_rsjenis['jenis']);
	  ?>
        </font></p>
      <p><font color="#000000"><strong>4. Sasaran :<br>
        </strong> 
        <?php
	  //sasaran
	  mysql_select_db($database_skenario, $skenario);

$query_rssasaran = "SELECT skenario_c_sasaran.*, c_sasaran.* ".
						"FROM skenario_c_sasaran, c_sasaran ".
						"WHERE skenario_c_sasaran.kd_sasaran = c_sasaran.kd ".
						"AND skenario_c_sasaran.kd_skenario = '$skenkd'";
$rssasaran= mysql_query($query_rssasaran, $skenario) or die(mysql_error());
$row_rssasaran = mysql_fetch_assoc($rssasaran);
$totalRows_rssasaran = mysql_num_rows($rssasaran);

echo balikin($row_rssasaran['sasaran']);
	  ?>
        </font></p>
      <p><font color="#000000"><strong>5. Sinopsis :<br>
        </strong> 
        <?php
	  //sinopsis
	  mysql_select_db($database_skenario, $skenario);

$query_rssin = "SELECT * FROM skenario_sinopsis ".

				"WHERE kd_skenario = '$skenkd'";
$rssin= mysql_query($query_rssin, $skenario) or die(mysql_error());
$row_rssin = mysql_fetch_assoc($rssin);
$totalRows_rssin = mysql_num_rows($rssin);

echo balikin($row_rssin['sinopsis']);
	  ?>
        </font></p>
      <p><font color="#000000"><strong>6. Pemain / Tokoh / Karakter : <br>
        </strong> 
        <?php
	  //pemain
	  mysql_select_db($database_skenario, $skenario);

$query_rspem = "SELECT * FROM skenario_tokoh ".
				"WHERE kd_skenario = '$skenkd' ".
				"ORDER BY nama ASC";
$rspem= mysql_query($query_rspem, $skenario) or die(mysql_error());
$row_rspem = mysql_fetch_assoc($rspem);
$totalRows_rspem = mysql_num_rows($rspem);

if ($totalRows_rspem == 0)
	{
?>
        ........................... 
        <?php 
	}
else
	{
		do
			{			  
			?>
        <strong>*<?php echo strtoupper(balikin($row_rspem['nama'])); ?></strong><br>
        --> Panggilan : <?php echo balikin($row_rspem['panggilan']); ?><br>
        --> Usia : <?php echo balikin($row_rspem['usia']); ?> tahun<br>
        --> Gambaran Fisik : <?php echo balikin($row_rspem['fisik']); ?><br>
        --> Gambaran Psikis : <?php echo balikin($row_rspem['psikis']); ?><br>
        --> Status : <?php echo balikin($row_rspem['status']); ?><br>
        --> Agama : <?php echo balikin($row_rspem['agama']); ?><br>
        --> Profesi : <?php echo balikin($row_rspem['profesi']); ?><br>
        --> Ciri Khusus : <?php echo balikin($row_rspem['cirikhusus']); ?><br>
        --> Latar Belakang : <?php echo balikin($row_rspem['latarbelakang']); ?><br>
        --> Peran : <?php echo balikin($row_rspem['peran']); ?><br>
        <br>
        <br>
        <?
			} while ($row_rspem = mysql_fetch_assoc($rspem));
		}
			?>
        </font></p>
      <p><font color="#000000"><strong>7. Setting Tempat : <br>
        </strong> 
        <?php
	  //tempat
	  mysql_select_db($database_skenario, $skenario);

$query_rstempat = "SELECT * FROM skenario_set_tempat ".
					"WHERE kd_skenario = '$skenkd'";
$rstempat= mysql_query($query_rstempat, $skenario) or die(mysql_error());
$row_rstempat = mysql_fetch_assoc($rstempat);
$totalRows_rstempat = mysql_num_rows($rstempat);

if ($totalRows_rstempat == 0)
	{
	echo "-";
	}
else
	{
	echo balikin($row_rstempat['tempat']);
	}
	  ?>
        </font></p>
      <p><font color="#000000"><strong>8. Setting Waktu : <br>
        </strong> 
        <?php
	  //waktu
	  mysql_select_db($database_skenario, $skenario);

$query_rswak = "SELECT * FROM skenario_set_waktu ".
					"WHERE kd_skenario = '$skenkd'";
$rswak= mysql_query($query_rswak, $skenario) or die(mysql_error());
$row_rswak = mysql_fetch_assoc($rswak);
$totalRows_rswak = mysql_num_rows($rswak);

if ($totalRows_rswak == 0)
	{
	echo "-";
	}
else
	{
	echo balikin($row_rswak['waktu']);
	}
	  ?>
        </font></p></td>
  </tr>
</table>
</body>
</html>
<?php
//diskonek
	xclose;
?>
