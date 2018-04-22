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
$scenekd = cegah($_REQUEST['scenekd']);

mysql_select_db($database_skenario, $skenario);

$query_rs1 = "SELECT * FROM skenario ".
				"WHERE kd = '$skenkd'";
$rs1= mysql_query($query_rs1, $skenario) or die(mysql_error());
$row_rs1 = mysql_fetch_assoc($rs1);
$totalRows_rs1 = mysql_num_rows($rs1);

//judul
$judul = "$jd019 $row_rs1[judul]";
?>
<html>
<head>
<title><?php echo balikin($judul);?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../style/skenario.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="5" topmargin="5">
<?php include("../include/header.php"); ?>
<table bgcolor="<?php echo $bgcolor;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" border="<?php echo $border;?>" cellpadding="<?php echo $cellpadding;?>" cellspacing="<?php echo $cellspacing;?>">
  <tr> 
    <td width="150" valign="top"><?php include("../include/menu.php"); ?></td>
    <td width="4" valign="top"><p>    </td>
    <td valign="top"><a href="<?php echo $sumber;?>/xskenario/index.php">Daftar 
        Skenario</a> > <a href="<?php echo $sumber;?>/xskenario/profil.php?skenkd=<?php echo $skenkd;?>">Profil 
        --&gt; <?php echo balikin($row_rs1[judul]);?></a> &gt; <?php echo balikin($judul);?></p>
      <p><?php echo xheadline(balikin($judul));?> </p>
      <p><strong>Scene : </strong><br>
        <select name="scene" id="scene" onChange="MM_jumpMenu('parent',this,0)">
          <?
			//scene
			mysql_select_db($database_skenario, $skenario);
			$query_rsscene = "SELECT skenario_sceneplot.*, skenario_sceneplot.kd AS sckd, m_lokasi.*, ".
								"m_waktu.* ".
								"FROM skenario_sceneplot, m_lokasi, m_waktu ".
								"WHERE skenario_sceneplot.kd_lokasi = m_lokasi.kd ".
								"AND skenario_sceneplot.kd_waktu = m_waktu.kd ".
								"AND skenario_sceneplot.kd_skenario = '$skenkd' ".
								"ORDER BY skenario_sceneplot.nomer ASC";
			$rsscene = mysql_query($query_rsscene, $skenario) or die(mysql_error());
			$row_rsscene = mysql_fetch_assoc($rsscene);
			$totalRows_rsscene = mysql_num_rows($rsscene);			
			?>
          <?
			if ($scenekd == "")
				{
				echo "<option selected>--Pilih Scene--</option>";
				}
				
			else
			
				{
				?>
          <option selected> 
          <?
			//scene terpilih
			mysql_select_db($database_skenario, $skenario);
			$query_rsscenex = "SELECT skenario_sceneplot.*, m_lokasi.*, m_waktu.* ".
								"FROM skenario_sceneplot, m_lokasi, m_waktu ".
								"WHERE skenario_sceneplot.kd_lokasi = m_lokasi.kd ".
								"AND skenario_sceneplot.kd_waktu = m_waktu.kd ".
								"AND skenario_sceneplot.kd_skenario = '$skenkd' ".
								"AND skenario_sceneplot.kd = '$scenekd'";
			$rsscenex = mysql_query($query_rsscenex, $skenario) or die(mysql_error());
			$row_rsscenex = mysql_fetch_assoc($rsscenex);
			$totalRows_rsscenex = mysql_num_rows($rsscenex);			
			?>
          <? echo $row_rsscenex['nomer']; ?>. <? echo balikin($row_rsscenex['lokasi']); ?> <? echo strtoupper(balikin($row_rsscenex['tempat'])); ?> 
          - <? echo balikin($row_rsscenex['waktu']); ?></option>
          <?
				}
			?>
          <?
			do 
				{  
				?>
          <option value="index.php?skenkd=<? echo $skenkd; ?>&amp;scenekd=<? echo $row_rsscene['sckd'] ?>"><? echo $row_rsscene['nomer']; ?>. 
          <? echo balikin($row_rsscene['lokasi']); ?><? echo strtoupper(balikin($row_rsscene['tempat'])); ?> 
          - <? echo balikin($row_rsscene['waktu']); ?></option>
          <?
				} 
		
			while ($row_rsscene = mysql_fetch_assoc($rsscene));
			
			$rows = mysql_num_rows($rsscene);
  				if($rows > 0) 
						{
      					mysql_data_seek($rsscene, 0);
						$row_rsscene = mysql_fetch_assoc($rsscene);
  						}
		?>
        </select>
        <?php
	  //jika scene belum dipilih
	  if ($_REQUEST['scenekd'] == "")
	  	{
		?>
        <font color="#FF0000"><strong>Silahkan Scene dipilih!</strong></font> 
        <?php
		}
	else
		{
		?>
        [<a href="javascript:MM_openBrWindow('preview_i.php?scenekd=<?php echo $scenekd; ?>','','width=650,height=300,toolbar=no,menubar=no,location=no,scrollbars=yes,resize=no')">PREVIEW</a> 
        - <a href="javascript:MM_openBrWindow('print_i.php?scenekd=<?php echo $scenekd; ?>','','width=650,height=300,toolbar=no,menubar=no,location=no,scrollbars=yes,resize=no')">PRINT</a>] 
      </p>
      <p><strong>PLOT : </strong><br>
        <? echo balikin($row_rsscenex['plot']); ?> 
        <script language="JavaScript">
<!-- Begin
function cek(){

if (document.frmpem.pemain.value=="") {
alert("Pemainnya siapa?")
return false
}

return true
}
// End -->
</script>
      </p>
      <form action="index1.php" method="post" name="frmpem" id="frmpem" onSubmit="return cek()">
        Pemain : <br>
        <?php
		mysql_select_db($database_skenario, $skenario);
			$query_rspem = "SELECT * FROM skenario_scene_pemain ".
								"WHERE kd_skenario = '$skenkd' ".
								"AND kd_sceneplot = '$scenekd'";
			$rspem = mysql_query($query_rspem, $skenario) or die(mysql_error());
			$row_rspem = mysql_fetch_assoc($rspem);
			$totalRows_rspem = mysql_num_rows($rspem);
		?>
        <input name="pemain" type="text" id="pemain" value="<?php
		//jika kosong
		if ($row_rspem['pemain'] == "")
			{
			echo "-";
			}
		else
			{
			echo strtoupper($row_rspem['pemain']);
			}
		
		?>" size="70">
        <input name="skenkd" type="hidden" value="<?php echo $_REQUEST['skenkd'];?>">
        <input name="scenekd" type="hidden" value="<?php echo $_REQUEST['scenekd'];?>">
        <input type="submit" name="Submit" value="Simpan">
      </form>
      <p>[<a href="desk_post.php?skenkd=<?php echo $skenkd;?>&scenekd=<?php echo $scenekd;?>">TAMBAH 
        DESKRIPSI</a>]</p>
      <p> 
        <?php
		//scenex
		mysql_select_db($database_skenario, $skenario);
		$query_rsscenex2 = "SELECT * FROM skenario_scene_deskripsi ".
							"WHERE kd_skenario = '$skenkd' ".
							"AND kd_sceneplot = '$scenekd' ".
							"ORDER BY nomer ASC";
		$rsscenex2 = mysql_query($query_rsscenex2, $skenario) or die(mysql_error());
		$row_rsscenex2 = mysql_fetch_assoc($rsscenex2);
		$totalRows_rsscenex2 = mysql_num_rows($rsscenex2);
		
		if ($totalRows_rsscenex2 == 0)
			{
			?>
        ........................... 
      <p> 
        <?
			}
		else
			{
		?>
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <?
		do
			{
		?>
        <tr valign="top"> 
          <td valign="top"> <select name="deski" id="deski" onChange="MM_jumpMenu('parent',this,0)">
              <?
			//nomer 
			mysql_select_db($database_skenario, $skenario);
			$query_rs_nomer = "SELECT * ".
								"FROM skenario_scene_deskripsi ".
								"WHERE kd_skenario = '$skenkd' ".
								"AND kd_sceneplot = '$scenekd'";
			$rs_nomer = mysql_query($query_rs_nomer, $skenario) or die(mysql_error());
			$row_rs_nomer = mysql_fetch_assoc($rs_nomer);
			$totalRows_rs_nomer = mysql_num_rows($rs_nomer);
			
			
			//nomer yg dianut
			mysql_select_db($database_skenario, $skenario);
			$query_rs_nomerx = "SELECT * ".
								"FROM skenario_scene_deskripsi ".
								"WHERE kd_skenario = '$skenkd' ".
								"AND kd_sceneplot = '$scenekd' ".
								"AND kd = '$row_rsscenex2[kd]'";
			$rs_nomerx = mysql_query($query_rs_nomerx, $skenario) or die(mysql_error());
			$row_rs_nomerx = mysql_fetch_assoc($rs_nomerx);
			$totalRows_rs_nomerx = mysql_num_rows($rs_nomerx);		
			?>
              <? ///nek isih kosong
	if ($row_rs_nomerx['nomer'] == "")
		{
		?>
              <option selected>-Nomer-</option>
              <?php
		}	
	
	else if ($totalRows_rs_nomerx != 0)//nek eneng isine...
	  	{ 
	?>
              <option selected><?php echo balikin($row_rs_nomerx['nomer']);?></option>
              <?php
		}
		?>
              <?
			for ($i=1; $i<=$totalRows_rs_nomer;$i++) 
				{  
				?>
              <option value="index1.php?skenkd=<? echo $skenkd; ?>&scenekd=<? echo $scenekd; ?>&deskkd=<? echo cegah($row_rs_nomerx['kd']); ?>&nodeski=<? echo $i;?>"><? echo $i;?></option>
              <?
				} 
		?>
            </select> <em><?php echo $row_rsscenex2['deskripsi'];?></em><br>
            [<a href="desk_edit.php?deskkd=<?php echo $row_rsscenex2['kd'];?>&skenkd=<?php echo $skenkd;?>&scenekd=<?php echo $scenekd;?>">EDIT</a> 
            - <a href="desk_del.php?deskkd=<?php echo $row_rsscenex2['kd'];?>&skenkd=<?php echo $skenkd;?>&scenekd=<?php echo $scenekd;?>">HAPUS</a>] 
            - [<a href="dialog_post.php?deskkd=<?php echo $row_rsscenex2['kd'];?>&skenkd=<?php echo $skenkd;?>&scenekd=<?php echo $scenekd;?>">TAMBAH 
            DIALOG</a>] <br> <br> 
            <?php 
			//tampilin dialognya man.. .
			mysql_select_db($database_skenario, $skenario);
			$query_rsdi = "SELECT * ".
								"FROM skenario_scene_dialog ".
								"WHERE kd_skenario = '$skenkd' ".
								"AND kd_sceneplot = '$scenekd' ".
								"AND kd_deskripsi = '$row_rsscenex2[kd]' ".
								"ORDER BY nomer ASC";
			$rsdi = mysql_query($query_rsdi, $skenario) or die(mysql_error());
			$row_rsdi = mysql_fetch_assoc($rsdi);
			$totalRows_rsdi = mysql_num_rows($rsdi);
			
			if ($totalRows_rsdi == 0)
				{			
			?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="8%">&nbsp;</td>
                <td width="92%">........................... </td>
              </tr>
            </table>
            <p>&nbsp;</p>
            <p> 
              <?php
				}
			else if($totalRows_rsdi != 0)
				{
				?>
            </p>
            <table width="100%" border="0" cellspacing="0" cellpadding="10">
              <?php 
			  do
			  	{
				?>
              <tr valign="top"> 
                <td width="8%">&nbsp;</td>
                <td width="92%" valign="top"> <p> 
                    <select name="diai" id="diai" onChange="MM_jumpMenu('parent',this,0)">
                      <?
			//nomer 
			mysql_select_db($database_skenario, $skenario);
			$query_rsnodi = "SELECT * ".
								"FROM skenario_scene_dialog ".
								"WHERE kd_skenario = '$skenkd' ".
								"AND kd_sceneplot = '$scenekd' ".
								"AND kd_deskripsi = '$row_rsscenex2[kd]'";
			$rsnodi = mysql_query($query_rsnodi, $skenario) or die(mysql_error());
			$row_rsnodi = mysql_fetch_assoc($rsnodi);
			$totalRows_rsnodi = mysql_num_rows($rsnodi);
			
			
			//nomer yg dianut
			mysql_select_db($database_skenario, $skenario);
			$query_rsnodix = "SELECT * ".
								"FROM skenario_scene_dialog ".
								"WHERE kd_skenario = '$skenkd' ".
								"AND kd_sceneplot = '$scenekd' ".
								"AND kd_deskripsi = '$row_rsscenex2[kd]' ".
								"AND kd = '$row_rsdi[kd]'";
			$rsnodix = mysql_query($query_rsnodix, $skenario) or die(mysql_error());
			$row_rsnodix = mysql_fetch_assoc($rsnodix);
			$totalRows_rsnodix = mysql_num_rows($rsnodix);		
			?>
                      <? ///nek isih kosong
	if ($row_rsnodix['nomer'] == "")
		{
		?>
                      <option selected>-Nomer-</option>
                      <?php
		}	
	
	else if ($totalRows_rsnodix != 0)//nek eneng isine...
	  	{ 
	?>
                      <option selected><?php echo balikin($row_rsnodix['nomer']);?></option>
                      <?php
		}
		?>
                      <?
			for ($i=1; $i<=$totalRows_rsnodi;$i++) 
				{  
				?>
                      <option value="index1.php?skenkd=<? echo $skenkd; ?>&scenekd=<? echo $scenekd; ?>&dikd=<? echo cegah($row_rsnodix['kd']); ?>&nodi=<? echo $i;?>"><? echo $i;?></option>
                      <?
				} 
		?>
                    </select>
                    <strong><?php echo strtoupper(balikin($row_rsdi['pemain']));?></strong><br>
                    <?php echo balikin($row_rsdi['dialog']);?><br>
                    [<a href="dialog_edit.php?dikd=<?php echo $row_rsdi['kd'];?>&skenkd=<?php echo $skenkd;?>&scenekd=<?php echo $scenekd;?>">EDIT</a> 
                    - <a href="dialog_del.php?dikd=<?php echo $row_rsdi['kd'];?>&skenkd=<?php echo $skenkd;?>&scenekd=<?php echo $scenekd;?>">HAPUS</a>]</p></td>
              </tr>
              <?php
			  } while ($row_rsdi = mysql_fetch_assoc($rsdi));
			  ?>
            </table>
            <?php
				}
				?>
          </td>
        </tr>
        <?php
			} while ($row_rsscenex2 = mysql_fetch_assoc($rsscenex2));
		?>
      </table>
      <?
		}
		}
	  ?>
&nbsp;</td>
  </tr>
</table>
<?php include("../include/footer.php"); ?>
</body>
</html>
<?php
//diskonek
	xclose;
?>
