<?php $contador=count($model); if ($model !== null):?>
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
    <td width="5%"></td>
   <td width="45%" style="color:#ffffff; text-indent: 50px;"><span style="font-weight: bold; font-size: 14pt;">Hotel UMG</span>
   <br/> <span style=" font-weight: bold; font-style: oblique; font-size: 14pt;"><?php echo Yii::app()->user->name; ?></span>
  </td>
   <td width="50%" style="text-align: right;"><b>Listado de Solicitud de
   <FONT Size="5" COLOR="maroon">Mantenimiento</FONT>
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
 <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse;" cellpadding="8">
 <thead>
 <tr>
 <td width="4.666666666667%"><b>ID</b></td>
 <td width="30.666666666667%"><b>Empleado</b></td>
 <td width="10.666666666667%"><b>Fecha</b></td>
 <td width="10.666666666667%"><b>Departamento</b></td>
 <td width="10.666666666667%"><b>Objeto</b></td>
 <td width="4.666666666667%"><b>Diagnostico</b></td>
 <td width="4.666666666667%"><b>Solucion</b></td>
 <td width="4.666666666667%"><b>Autorizacion</b></td>
 </tr>
 </thead>
 <tbody>
 <!-- ITEMS -->
 <?php foreach($model as $row): ?>
 <tr>
 <td align="center">
 <?php echo $row->id; ?>
 </td>
 <?php $emp = Empleados::model()->find('id='.$row->id_empleado);?>
 <td align="center">
 <?php echo $emp->nombre; ?>
 </td>
 <td align="center">
 <?php echo $row->fecha; ?>
 </td>
 <td align="center">
   <?php $dep = Departamentos::model()->find('id='.$row->id_departamento);?>
 <?php echo $dep->nombre; ?>
 </td>
 <td align="center">
 <?php echo $row->objeto; ?>
 </td>
  <td align="center">
 <?php echo $row->diagnostico; ?>
 </td>
 <td align="center">
 <?php echo $row->solucion; ?>
 </td>
 <td align="center">
   <?php if ($row->autorizacion_jefe == 0){echo "Pendiente";}
   else{echo "Aprovado";} ?>
 </td>

 </tr>
 <?php endforeach; ?>
 <!-- FIN ITEMS -->
 <tr>
 <td class="blanktotal" colspan="8" rowspan="10"></td>
 </tr>
 </tbody>
 </table>
 </body>
 </html>
<?php endif; ?>
