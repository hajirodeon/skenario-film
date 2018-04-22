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


//ambil nilai
$pageNum_rsx  = cegah($_REQUEST["pageNum_rsx"]);
$totalRows_rsx  = cegah($_REQUEST["totalRows_rsx"]);

$currentPage = $HTTP_SERVER_VARS["PHP_SELF"];

$maxRows_rsx = 10;
$pageNum_rsx = 0;
if (isset($HTTP_GET_VARS['pageNum_rsx'])) {
  $pageNum_rsx = $HTTP_GET_VARS['pageNum_rsx'];
}
$startRow_rsx = $pageNum_rsx * $maxRows_rsx;

mysql_select_db($database_skenario, $skenario);

$query_rsx = "SELECT skenario_sceneplot.*, skenario_sceneplot.kd AS sskd, m_lokasi.*, m_waktu.* ".
				"FROM skenario_sceneplot, m_lokasi, m_waktu ".
				"WHERE skenario_sceneplot.kd_lokasi = m_lokasi.kd ".
				"AND skenario_sceneplot.kd_waktu = m_waktu.kd ".
				"AND skenario_sceneplot.kd_skenario = '$skenkd' ".
				"ORDER BY skenario_sceneplot.nomer ASC";
					
$query_limit_rsx = sprintf("%s LIMIT %d, %d", $query_rsx, $startRow_rsx, $maxRows_rsx);
$rsx = mysql_query($query_limit_rsx, $skenario) or die(mysql_error());
$row_rsx = mysql_fetch_assoc($rsx);

if (isset($HTTP_GET_VARS['totalRows_rsx'])) {
  $totalRows_rsx = $HTTP_GET_VARS['totalRows_rsx'];
} else {
  $all_rsx = mysql_query($query_rsx);
  $totalRows_rsx = mysql_num_rows($all_rsx);
}
$totalPages_rsx = ceil($totalRows_rsx/$maxRows_rsx)-1;

$queryString_rsx = "";
if (!empty($HTTP_SERVER_VARS['QUERY_STRING'])) {
  $params = explode("&", $HTTP_SERVER_VARS['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsx") == false && 
        stristr($param, "totalRows_rsx") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsx = "&" . implode("&", $newParams);
  }
}
$queryString_rsx = sprintf("&totalRows_rsx=%d%s", $totalRows_rsx, $queryString_rsx);

$judul = "$jd016 $row_rs1[judul]";
?>
<html>
<head>
<title><?php echo balikin($judul);?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../style/skenario.css" rel="stylesheet" type="text/css">
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

<body bgcolor="#FFFFFF" text="#000000" leftmargin="5" topmargin="5"><?php include("../include/header.php"); ?>
<table bgcolor="<?php echo $bgcolor;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" border="<?php echo $border;?>" cellpadding="<?php echo $cellpadding;?>" cellspacing="<?php echo $cellspacing;?>">
  <tr> 
    <td width="152" valign="top"><?php include("../include/menu.php"); ?></td>
    <td width="4" valign="top"><p></td>
    <td valign="top"><a href="<?php echo $sumber;?>/xskenario/index.php">Daftar 
        Skenario</a> > <a href="<?php echo $sumber;?>/xskenario/profil.php?skenkd=<?php echo $skenkd;?>">Profil 
        --&gt; <?php echo balikin($row_rs1[judul]);?></a> &gt; <?php echo balikin($judul);?></p>
      <p><?php echo xheadline(strtoupper(balikin($judul)));?> </p>
      <p>[<a href="add.php?skenkd=<?php echo $skenkd;?>">Tambah</a>] 
      </p>
      <p> 
        <? ///nek isih kosong
	if ($totalRows_rsx == 0)
		{
		?>
        <strong>MASIH KOSONG </strong> 
        <?php
		}	
	
	else if ($totalRows_rsx != 0)//nek eneng isine...
	  	{ 
	?>
      </p>
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <?php 
		do
			{
		?>
        <tr valign="top"> 
          <td><select name="nomer" id="nomer" onChange="MM_jumpMenu('parent',this,0)">
              <?
			//nomer 
			mysql_select_db($database_skenario, $skenario);
			$query_rs_nomer = "SELECT * ".
								"FROM skenario_sceneplot ".
								"WHERE kd_skenario = '$skenkd'";
			$rs_nomer = mysql_query($query_rs_nomer, $skenario) or die(mysql_error());
			$row_rs_nomer = mysql_fetch_assoc($rs_nomer);
			$totalRows_rs_nomer = mysql_num_rows($rs_nomer);
			
			
			//nomer yg dianut
			mysql_select_db($database_skenario, $skenario);
			$query_rs_nomerx = "SELECT * ".
								"FROM skenario_sceneplot ".
								"WHERE kd_skenario = '$skenkd' ".
								"AND kd = '$row_rsx[sskd]'";
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
              <option value="index1.php?skenkd=<? echo cegah($_REQUEST['skenkd']); ?>&plotkd=<? echo cegah($row_rs_nomerx['kd']); ?>&amp;nomer=<? echo $i;?>"><? echo $i;?></option>
              <?
				} 
		?>
            </select> <strong>. <? echo balikin($row_rsx['lokasi']); ?> <? echo strtoupper(balikin($row_rsx['tempat'])); ?> - 
            <? echo balikin($row_rsx['waktu']); ?></strong></strong> [<a href="edit.php?skenkd=<?php echo $skenkd;?>&plotkd=<?php echo cegah($row_rsx['sskd']);?>">EDIT</a> 
            - <a href="del.php?skenkd=<?php echo $skenkd;?>&plotkd=<?php echo cegah($row_rsx['sskd']);?>">HAPUS</a>]<br> 
            <? echo balikin($row_rsx['plot']); ?></td>
          <?
			} while ($row_rsx = mysql_fetch_assoc($rsx));
			?>
        </tr>
      </table>
      <p>&nbsp;</p>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr> 
          <td> <?php if ($pageNum_rsx > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_rsx=%d%s", $currentPage, 0, $queryString_rsx); ?>">Awal</a> 
            <?php 
		  		}
		  else
		  		{
				?>
            <font color="#CCCCCC">Awal</font> 
            <?
		  } // Show if not first page ?> <?php if ($pageNum_rsx > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_rsx=%d%s", $currentPage, max(0, $pageNum_rsx - 1), $queryString_rsx); ?>">Sebelumnya</a> 
            <?php 
		  		}
		  else
		  		{
				?>
            <font color="#CCCCCC">Sebelumnya</font> 
            <?
		  } // Show if not first page ?> <?php if ($pageNum_rsx < $totalPages_rsx) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_rsx=%d%s", $currentPage, min($totalPages_rsx, $pageNum_rsx + 1), $queryString_rsx); ?>">Selanjutnya</a> 
            <?php 
		  		}
		  else
		  		{?>
            <font color="#CCCCCC">Selanjutnya</font> 
            <?
		  } // Show if not last page ?> <?php if ($pageNum_rsx < $totalPages_rsx) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_rsx=%d%s", $currentPage, $totalPages_rsx, $queryString_rsx); ?>">Terakhir</a> 
            <?php 
		  		}
		  else
		  		{?>
            <font color="#CCCCCC">Terakhir</font> 
            <?
		  } // Show if not last page ?> </td>
        </tr>
      </table>
      <p> 
        <?php
		}
		?>
        &nbsp;&nbsp;</td>
  </tr>
</table>
<?php include("../include/footer.php"); ?>
</body>
</html>
<?php
//diskonek
	xclose;
?>
