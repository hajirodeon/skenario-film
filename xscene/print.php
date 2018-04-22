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


//daftar sceneplot
mysql_select_db($database_skenario, $skenario);

$query_rsx = "SELECT skenario_sceneplot.*, skenario_sceneplot.kd AS sskd, m_lokasi.*, m_waktu.* ".
				"FROM skenario_sceneplot, m_lokasi, m_waktu ".
				"WHERE skenario_sceneplot.kd_lokasi = m_lokasi.kd ".
				"AND skenario_sceneplot.kd_waktu = m_waktu.kd ".
				"AND skenario_sceneplot.kd_skenario = '$skenkd' ".
				"ORDER BY skenario_sceneplot.nomer ASC";
$rsx= mysql_query($query_rsx, $skenario) or die(mysql_error());
$row_rsx = mysql_fetch_assoc($rsx);
$totalRows_rsx = mysql_num_rows($rsx);

$judul = "$jd019 $row_rs1[judul]";
?>
<html>
<head>
<title><?php echo balikin($judul);?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../style/skenario.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="5" topmargin="5" onLoad="window.print();return false">
<table width="600" border="0" cellpadding="3" cellspacing="0">
  <tr> 
    <td height="642" valign="top"> <p><font color="#000000"><font color="#000000"><?php echo xheadline($judul);?><br>
        Oleh : <?php echo balikin($row_rs1['nama']);?>, <br>
        Alamat : <?php echo balikin($row_rs1['alamat']);?>, <br>
        Telepon : <?php echo balikin($row_rs1['telp']);?>, <br>
        E-Mail : <?php echo balikin($row_rs1['email']);?></font></font></p>
      <p> <font color="#000000"> 
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
        </font></p>
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <?php 
		do
			{

		?>
        <tr valign="top" bgcolor="<? echo $warna; ?>"> 
          <td> <font color="#000000"><strong><? echo balikin($row_rsx['nomer']); ?>. <? echo balikin($row_rsx['lokasi']); ?> <? echo strtoupper(balikin($row_rsx['tempat'])); ?> - 
            <? echo balikin($row_rsx['waktu']); ?></strong></strong> <br>
            <?php
			//deskripsi
			mysql_select_db($database_skenario, $skenario);

			$query_rsdesk = "SELECT * FROM skenario_scene_deskripsi ".
								"WHERE kd_sceneplot = '$row_rsx[sskd]'";
			$rsdesk= mysql_query($query_rsdesk, $skenario) or die(mysql_error());
			$row_rsdesk = mysql_fetch_assoc($rsdesk);
			$totalRows_rsdesk = mysql_num_rows($rsdesk);
			
			?>
            </font> <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <?
		do
			{
		?>
              <tr valign="top"> 
                <td><p><font color="#000000"><em><?php echo balikin($row_rsdesk['deskripsi']);?></em></font></p>
                  <font color="#000000"> 
                  <?php
			//dialog
			mysql_select_db($database_skenario, $skenario);

			$query_rsdi = "SELECT * FROM skenario_scene_dialog ".
								"WHERE kd_deskripsi = '$row_rsdesk[kd]'";
			$rsdi= mysql_query($query_rsdi, $skenario) or die(mysql_error());
			$row_rsdi = mysql_fetch_assoc($rsdi);
			$totalRows_rsdi = mysql_num_rows($rsdi);
			
			if ($totalRows_rsdi == 0)
				{
			?>
                  ........................... 
                  <?php
				}
			else
				{
				?>
                  </font> <table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <?php
					do
						{?>
                    <tr valign="top"> 
                      <td width="8%">&nbsp;</td>
                      <td width="92%"><font color="#000000"><strong><?php echo strtoupper(balikin($row_rsdi['pemain']));?></strong><br>
                        <?php echo balikin($row_rsdi['dialog']);?> </font></td>
                    </tr>
                    <?
			} while ($row_rsdi = mysql_fetch_assoc($rsdi));
			?>
                  </table>
                  <font color="#000000"> 
                  <?php
				  }
				  ?>
                  </font></td>
              </tr>
              <?
			} while ($row_rsdesk = mysql_fetch_assoc($rsdesk));
			?>
            </table></td>
          <?
			} while ($row_rsx = mysql_fetch_assoc($rsx));
			?>
        </tr>
      </table>
      <p> <font color="#000000"> 
        <?php
		}
		?>
        &nbsp;</font></p></td>
  </tr>
</table>
</body>
</html>
<?php
//diskonek
	xclose;
?>
