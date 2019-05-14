<?php
$contador=count($model); if ($model !== null):?>
<html>
<head>
<link href="css/reporte.css" rel="stylesheet">
</head>
<body>
<!--mpdf
 <htmlpageheader name="myheader">
 <h1>Reporte</h1>
 <div class='imgRedonda'>
  <table width="95%"><tr>
  <td width="5%">
  </td>
 <td width="45%" style="color:#ffffff; text-indent: 50px;"><span style="font-weight: bold; font-size: 14pt;">Hotel UMG</span>
 <br/> <span style=" font-weight: bold; font-style: oblique; font-size: 14pt;"><?php echo Yii::app()->user->name; ?></span>
</td>
 <td width="50%" style="text-align: right;"><b>Listado de Solicitud de
 <FONT Size="5" COLOR="maroon">Reservaciones</FONT>
 </b></td>
 </tr></table>
 </htmlpageheader>

<htmlpagefooter name="myfooter" >
 <div class="myfooter" style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
 Página {PAGENO} de {nb}
 </div>
 </htmlpagefooter>
</div>
<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
 <sethtmlpagefooter name="myfooter" value="on" />
 mpdf-->
<div style="text-align: right"><b>Fecha: </b><?php echo date("d/m/Y"); ?> </div>
<b>Total Resultados:</b> <?php echo $contador; ?>
 <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse;" cellpadding="6">
 <thead>
 <tr>
 <td width="4.666666666667%">ID</td>
 <td width="4.666666666667%">Fecha Reservacion</td>
 <td width="4.666666666667%">Fecha Ingreso</td>
 <td width="4.666666666667%">Fecha Salida</td>
 <td width="4.666666666667%">Huesped</td>
 <td width="4.666666666667%">Total</td>
 </tr>
 </thead>
 <tbody>
 <!-- ITEMS -->
 <?php foreach($model as $row): ?>
   <tr>
   <td align="center">
   <?php echo $row->id_reservacion; ?>
   </td>
   <td align="center">
   <?php echo $row->fecha_reservacion; ?>
   </td>
   <td align="center">
   <?php echo $row->fecha_ingreso; ?>
   </td>
   <td align="center">
   <?php echo $row->fecha_salida; ?>
   </td>
 <td align="center">
 <?php echo $row->nombre_huesped; ?>
 </td>
 <td align="center">
 <?php echo $row->total; ?>
 </td>
   </tr>
 <?php endforeach; ?>
 <!-- FIN ITEMS -->
 <tr>
 <td class="blanktotal" colspan="6" rowspan="10"></td>
 </tr>
 </tbody>
 </table>
 </body>
 </html>
<?php endif; ?>
