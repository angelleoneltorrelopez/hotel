<?php $contador=count($model); if ($model !== null):?>
<html>
<head>
<style>
 body {font-family: sans-serif;
 font-size: 10pt;
 }
 p { margin: 0pt;
 }
 td { vertical-align: top; }
 .items td {

 border: 0.1mm solid #000000;
 }
 table thead td { background-color: #EEEEEE;
 text-align: center;
 border: 0.1mm solid #000000;
 }
 .items td.blanktotal {
 background-color: #FFFFFF;
 border: 0mm none #000000;
 border-top: 0.1mm solid #000000;
 }
 .items td.totals {
 text-align: right;
 border: 0.1mm solid #000000;
 }
</style>
</head>
<body>

<!--mpdf
 <htmlpageheader name="myheader">
 <table width="100%"><tr>
 <td width="50%" style="color:#0000BB;"><span style="font-weight: bold; font-size: 14pt;"><?php echo CHtml::encode((Yii::app()->name).' '.Yii::app()->params['version']); ?></span>
 <br /> <span style="font-weight: bold; font-style: oblique; font-size: 14pt;"><?php echo Yii::app()->user->name; ?></span>

 <td width="50%" style="text-align: right;"><b>Listado de Solicitud de
 <FONT Size="5" COLOR="maroon">Vacaciones</FONT>
 </b></td>
 </tr></table>
 </htmlpageheader>

<htmlpagefooter name="myfooter">
 <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
 Página {PAGENO} de {nb}
 </div>
 </htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
 <sethtmlpagefooter name="myfooter" value="on" />
 mpdf-->
<div style="text-align: right"><b>Fecha: </b><?php echo date("d/m/Y"); ?> </div>
<div style="text-align: left">Por la presente, y para que quede constancia por escrito, desearía
solicitar los … días de vacaciones correspondientes a este año.</div>
<b>Total Resultados:</b> <?php echo $contador; ?>
 <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse;" cellpadding="6">
 <thead>
 <tr>
 <td width="4.666666666667%">ID</td>
 <td width="30.666666666667%">Empleado</td>
 <td width="10.666666666667%">Fecha solicitud</td>
 <td width="10.666666666667%">Fecha Inicio</td>
 <td width="10.666666666667%">Fecha Fin</td>
 <td width="4.666666666667%">Dias Totales</td>
 </tr>
 </thead>
 <tbody>
 <!-- ITEMS -->
 <?php foreach($model as $row): ?>
 <tr>
 <td align="center">
 <?php echo $row->id; ?>
 </td>
 <?php $emp = Empleados::model()->find('id='.$row->empleado);?>
 <td align="center">
 <?php echo $emp->nombre; ?>
 </td>
 <td align="center">
 <?php echo $row->fecha_solicitud; ?>
 </td>
 <td align="center">
 <?php echo $row->fecha_inicio; ?>
 </td>
 <td align="center">
 <?php echo $row->fecha_fin; ?>
 </td>
  <td align="center">
 <?php echo $row->dias_totales; ?>
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
