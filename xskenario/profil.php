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

mysql_select_db($database_skenario, $skenario);

$query_rs1 = "SELECT * FROM skenario ".
				"WHERE kd = '$skenkd'";
$rs1= mysql_query($query_rs1, $skenario) or die(mysql_error());
$row_rs1 = mysql_fetch_assoc($rs1);
$totalRows_rs1 = mysql_num_rows($rs1);

//judul
$judul = "$jd010 $row_rs1[judul]";
?>
<html>
<head>
<title><?php echo $judul;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../style/skenario.css" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function cektempat(){

if (document.frmtempat.tempat.value=="") {
alert("Dimana setting tempatnya?")
return false
}

return true
}


function cekwaktu(){

if (document.frmwaktu.waktu.value=="") {
alert("Setting waktunya kapan?")
return false
}

return true
}
// End -->
</SCRIPT>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="5" topmargin="5">
<?php include("../include/header.php"); ?>
<table bgcolor="<?php echo $bgcolor;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" border="<?php echo $border;?>" cellpadding="<?php echo $cellpadding;?>" cellspacing="<?php echo $cellspacing;?>">
  <tr> 
    <td width="150" valign="top"><?php include("../include/menu.php"); ?></td>
    <td width="4" valign="top"></td>
    <td valign="top"><a href="index.php">Daftar Skenario</a> &gt; 
      <?php echo $judul;?> <p><?php echo xheadline($judul);?></p>
      <p><strong>1. Judul : </strong><br>
        <?php echo balikin($row_rs1['judul']);?></p>
      <p><strong>2. Tema : </strong><br>
        <strong> 
        <select name="tema" id="tema" onChange="MM_jumpMenu('parent',this,0)">
          <?
			//tema
			mysql_select_db($database_skenario, $skenario);
			$query_rs_tema = "SELECT * FROM c_tema ".
								"ORDER BY tema ASC";
			$rs_tema = mysql_query($query_rs_tema, $skenario) or die(mysql_error());
			$row_rs_tema = mysql_fetch_assoc($rs_tema);
			$totalRows_rs_tema = mysql_num_rows($rs_tema);
			
			//tema yg dianut
			mysql_select_db($database_skenario, $skenario);
			$query_rs_temax = "SELECT skenario_c_tema.*, c_tema.* ".
								"FROM skenario_c_tema, c_tema ".
								"WHERE skenario_c_tema.kd_tema = c_tema.kd ".
								"AND skenario_c_tema.kd_skenario = '$skenkd'";
			$rs_temax = mysql_query($query_rs_temax, $skenario) or die(mysql_error());
			$row_rs_temax = mysql_fetch_assoc($rs_temax);
			$totalRows_rs_temax = mysql_num_rows($rs_temax);		
			?>
          <? ///nek isih kosong
	if ($totalRows_rs_temax == 0)
		{
		?>
          <option selected>-- Tema --</option>
          <?php
		}	
	
	else if ($totalRows_rs_temax != 0)//nek eneng isine...
	  	{ 
	?>
          <option selected><?php echo balikin($row_rs_temax['tema']);?></option>
          <?php
		}
		?>
          <?
			do 
				{  
				?>
          <option value="profil1.php?skenkd=<? echo cegah($_REQUEST['skenkd']); ?>&amp;temakd=<? echo $row_rs_tema['kd'] ?>"><? echo balikin($row_rs_tema['tema']);?></option>
          <?
				} 
		
			while ($row_rs_tema = mysql_fetch_assoc($rs_tema));
		?>
        </select>
        </strong></p>
      <p><strong>3. Jenis : </strong><br>
        <strong> 
        <select name="jenis" id="jenis" onChange="MM_jumpMenu('parent',this,0)">
          <?
			//jenis
			mysql_select_db($database_skenario, $skenario);
			$query_rs_jenis = "SELECT * FROM c_jenis ".
								"ORDER BY jenis ASC";
			$rs_jenis = mysql_query($query_rs_jenis, $skenario) or die(mysql_error());
			$row_rs_jenis = mysql_fetch_assoc($rs_jenis);
			$totalRows_rs_jenis = mysql_num_rows($rs_jenis);
			
			//jenis yg dianut
			mysql_select_db($database_skenario, $skenario);
			$query_rs_jenisx = "SELECT skenario_c_jenis.*, c_jenis.* ".
								"FROM skenario_c_jenis, c_jenis ".
								"WHERE skenario_c_jenis.kd_jenis = c_jenis.kd ".
								"AND skenario_c_jenis.kd_skenario = '$skenkd'";
			$rs_jenisx = mysql_query($query_rs_jenisx, $skenario) or die(mysql_error());
			$row_rs_jenisx = mysql_fetch_assoc($rs_jenisx);
			$totalRows_rs_jenisx = mysql_num_rows($rs_jenisx);		
			?>
          <? ///nek isih kosong
	if ($totalRows_rs_jenisx == 0)
		{
		?>
          <option selected>-- Jenis --</option>
          <?php
		}	
	
	else if ($totalRows_rs_jenisx != 0)//nek eneng isine...
	  	{ 
	?>
          <option selected><?php echo balikin($row_rs_jenisx['jenis']);?></option>
          <?php
		}
		?>
          <?
			do 
				{  
				?>
          <option value="profil1.php?skenkd=<? echo cegah($_REQUEST['skenkd']); ?>&amp;jeniskd=<? echo $row_rs_jenis['kd'] ?>"><? echo balikin($row_rs_jenis['jenis']);?></option>
          <?
				} 
		
			while ($row_rs_jenis = mysql_fetch_assoc($rs_jenis));
		?>
        </select>
        </strong></p>
      <p><strong>4. Sasaran : </strong><br>
        <strong> 
        <select name="sasaran" id="sasaran" onChange="MM_jumpMenu('parent',this,0)">
          <?
			//sasaran
			mysql_select_db($database_skenario, $skenario);
			$query_rs_sasaran = "SELECT * FROM c_sasaran ".
									"ORDER BY sasaran ASC";
			$rs_sasaran = mysql_query($query_rs_sasaran, $skenario) or die(mysql_error());
			$row_rs_sasaran = mysql_fetch_assoc($rs_sasaran);
			$totalRows_rs_sasaran = mysql_num_rows($rs_sasaran);
			
			//sasaran yg dianut
			mysql_select_db($database_skenario, $skenario);
			$query_rs_sasaranx = "SELECT skenario_c_sasaran.*, c_sasaran.* ".
									"FROM skenario_c_sasaran, c_sasaran ".
									"WHERE skenario_c_sasaran.kd_sasaran = c_sasaran.kd ".
									"AND skenario_c_sasaran.kd_skenario = '$skenkd'";
			$rs_sasaranx = mysql_query($query_rs_sasaranx, $skenario) or die(mysql_error());
			$row_rs_sasaranx = mysql_fetch_assoc($rs_sasaranx);
			$totalRows_rs_sasaranx = mysql_num_rows($rs_sasaranx);		
			?>
          <? ///nek isih kosong
	if ($totalRows_rs_sasaranx == 0)
		{
		?>
          <option selected>-- Sasaran --</option>
          <?php
		}	
	
	else if ($totalRows_rs_sasaranx != 0)//nek eneng isine...
	  	{ 
	?>
          <option selected><?php echo balikin($row_rs_sasaranx['sasaran']);?></option>
          <?php
		}
		?>
          <?
			do 
				{  
				?>
          <option value="profil1.php?skenkd=<? echo cegah($_REQUEST['skenkd']); ?>&amp;sasarankd=<? echo $row_rs_sasaran['kd'] ?>"><? echo balikin($row_rs_sasaran['sasaran']);?></option>
          <?
				} 
		
			while ($row_rs_sasaran = mysql_fetch_assoc($rs_sasaran));
		?>
        </select>
        </strong></p>
      <p><strong>5. Sinopsis : </strong><br>
        [<a href="<?php echo $sumber;?>/xsinopsis/index.php?skenkd=<?php echo $skenkd; ?>">EDIT</a>]</p>
      <p><strong>6. Pemain / Tokoh / Karakter : </strong><br>
      [<a href="<?php echo $sumber;?>/xtokoh/index.php?skenkd=<?php echo $skenkd; ?>">EDIT</a>] </p>
      <form action="profil1.php" method="post" name="frmtempat" id="frmtempat" onSubmit="return cektempat()">
        <strong>7. Setting Tempat :</strong> 
        <?php
		//cek, sudah ada belum
	$SQLtmp = sprintf("SELECT * FROM skenario_set_tempat ".
						"WHERE kd_skenario = '$skenkd'");

	mysql_select_db($database_skenario, $skenario);
	$Rstmp = mysql_query($SQLtmp, $skenario) or die(mysql_error());
	$row_rstmp = mysql_fetch_assoc($Rstmp);
	$totalRows_rstmp = mysql_num_rows($Rstmp);

		?>
        <br>
        <input name="tempat" type="text" id="tempat" value="<?php
				
		//jika iya
	if ($totalRows_rstmp != 0) 
		{
		echo $row_rstmp['tempat'];
		}
	
	else
		{
		echo "-";
		}
		?>" size="40">
        <input name="skenkd" type="hidden" value="<?php echo $skenkd;?>">
        <input type="submit" name="Submit" value="Simpan">
      </form>
      <form action="profil1.php" method="post" name="frmwaktu" id="frmwaktu" onSubmit="return cekwaktu()">
        <strong>8. Setting Waktu :</strong> 
        <?php
		//cek, sudah ada belum
	$SQLwak = sprintf("SELECT * FROM skenario_set_waktu ".
						"WHERE kd_skenario = '$skenkd'");

	mysql_select_db($database_skenario, $skenario);
	$Rswak = mysql_query($SQLwak, $skenario) or die(mysql_error());
	$row_rswak = mysql_fetch_assoc($Rswak);
	$totalRows_rswak = mysql_num_rows($Rswak);

		?>
        <br>
        <input name="waktu" type="text" id="waktu" value="<?php
				
		//jika iya
	if ($totalRows_rswak != 0) 
		{
		echo $row_rswak['waktu'];
		}
	
	else
		{
		echo "-";
		}
		?>" size="40">
        <input name="skenkd" type="hidden" value="<?php echo $skenkd;?>">
        <input type="submit" name="Submit" value="Simpan">
      </form>
      <p>[1,2, . . . 8 ---&gt; <a href="javascript:MM_openBrWindow('preview.php?skenkd=<?php echo $skenkd; ?>','','width=650,height=300,toolbar=no,menubar=no,location=no,scrollbars=yes,resize=no')">PREVIEW</a> 
        - <a href="javascript:MM_openBrWindow('print.php?skenkd=<?php echo $skenkd; ?>','','width=650,height=300,toolbar=no,menubar=no,location=no,scrollbars=yes,resize=no')">PRINT</a>]</p>
      <p><strong>9. Scene Plot : </strong><br>
        [<a href="<?php echo $sumber;?>/xsceneplot/index.php?skenkd=<?php echo $skenkd; ?>">EDIT</a> 
        - <a href="javascript:MM_openBrWindow('<?php echo $sumber;?>/xsceneplot/preview.php?skenkd=<?php echo $skenkd; ?>','','width=650,height=300,toolbar=no,menubar=no,location=no,scrollbars=yes,resize=no')">PREVIEW</a> 
        - <a href="javascript:MM_openBrWindow('<?php echo $sumber;?>/xsceneplot/print.php?skenkd=<?php echo $skenkd; ?>','','width=650,height=300,toolbar=no,menubar=no,location=no,scrollbars=yes,resize=no')">PRINT</a>]</p>
      <p><strong>10. Scene : </strong><br>
        [<a href="<?php echo $sumber;?>/xscene/index.php?skenkd=<?php echo $skenkd; ?>">EDIT</a> 
        - <a href="javascript:MM_openBrWindow('<?php echo $sumber;?>/xscene/preview.php?skenkd=<?php echo $skenkd; ?>','','width=650,height=300,toolbar=no,menubar=no,location=no,scrollbars=yes,resize=no')">PREVIEW</a> 
        - <a href="javascript:MM_openBrWindow('<?php echo $sumber;?>/xscene/print.php?skenkd=<?php echo $skenkd; ?>','','width=650,height=300,toolbar=no,menubar=no,location=no,scrollbars=yes,resize=no')">PRINT</a>]</p>
      <p>&nbsp;&nbsp;</td>
  </tr>
</table>
<?php include("../include/footer.php"); ?>


</body>
</html>
<?php
//diskonek
	xclose;
?>