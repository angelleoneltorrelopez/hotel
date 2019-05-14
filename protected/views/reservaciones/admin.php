<?php
$this->breadcrumbs=array(
	'Reservaciones',
	'Buscar',
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('recep')){
$this->menu=array(
array('label'=>'Crear Reservaciones', 'icon'=>'plus-sign', 'url'=>array('create')),
);
}


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('reservaciones-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Reservaciones</h1>
<?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/pdf.png",'PDF',array("title"=>"Exportar a PDF")),array("generarpdf"));?>
<p>
	Exportar a PDF.
</p>

<?php
if($user->checkAccess('gerente')||$user->checkAccess('recep')){

$this->widget('booster.widgets.TbGridView',array(
'id'=>'reservaciones-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_reservacion',
		'fecha_reservacion',
		'fecha_ingreso',
		'fecha_salida',
		'nombre_huesped',
		/*
		'correo_huesped',
		'nacionalidad_huesped',
		'tel_huesped',
		'cantidad_infantes',
		'cantidad_adultos',
		'total',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
));} ?>

<?php
if($user->checkAccess('enc_hab')){

$this->widget('booster.widgets.TbGridView',array(
'id'=>'reservaciones-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_reservacion',
		'fecha_reservacion',
		'fecha_ingreso',
		'fecha_salida',
		'nombre_huesped',
		/*
		'correo_huesped',
		'nacionalidad_huesped',
		'tel_huesped',
		'cantidad_infantes',
		'cantidad_adultos',
		'total',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',

'buttons'=>array(

	'delete'=>array(
		'visible'=>'false',

	),
	'update'=>array(
				'visible'=>'false',

	),

),
),
),
));}?>
