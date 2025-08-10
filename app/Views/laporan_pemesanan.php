<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

th {
  border: 1px solid #000000;
  padding: 8px;
  font-size: 12px;
}
td {
  border: 1px solid #000000;
  padding: 8px;
  font-size: 12px;
}

/* tr:nth-child(even) {
  background-color: #dddddd;
} */
p {
	margin : 5px;
}.center {
  margin-left: 50px;
  margin-right: auto;
}
</style>
</head>
<body>
<p style="text-align:center;font-size: 18px;margin-top:30px;"><b><?=strtoupper($judul)?> <b></p>
<p style="text-align:center;font-size: 16px"><b>PT CATUR DHARMA INTEGRITAS<b></p>

<table  class="center" style="width:50%;text-align: left;margin-left:0px">
	<tr>
		<th width="30px" style="text-align:center;">No</th>
		<th width="120px" style="text-align:center;">Nomor Order</th>
		<th width="120px" style="text-align:center;">Nama Pelanggan</th>
		<th width="140px" style="text-align:center;">Layanan</th>
		<th width="100px" style="text-align:center;">Status</th>
		<th width="100px" style="text-align:center;">Harga</th>
	</tr>
	<?php 
	$x =1;
	$total =0;
	foreach ($laporan_pemesanan as $key => $value) {
		$total +=$value['biaya'];
	?>
	<tr>
		<td style="text-align:center;"><?=$x++?></td>
		<td style="text-align:center;"><?=$value['kode_pemesanan'];?></td>
		<td style="text-align:center;"><?=$value['nama_pelanggan'];?></td>
		<td style="text-align:center;"><?=$value['layanan'];?></td>
		<td style="text-align:center;"><?=$value['status_order']?></td>
		<td style="text-align:center;"><?=number_format($value['biaya']);?></td>
	</tr>
	<?php } ?>
	
	
	
	<tr>
		<td style="text-align:right;" colspan="5">T O T A L</td>
		<td style="text-align:center;"><?=number_format($total);?></td>
	</tr>
</table>


<p style="margin-top:30dp;font-size:8px">Printed Date : <?=date('d-M-Y H:i:s')?></p>
</body>
</html>

