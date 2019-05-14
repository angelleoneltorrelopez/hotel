
<?php
$this->breadcrumbs=array(
	'Retiro Bodega'=>array('admin'),
	$model->id_retiro_bodega,
);

$this->menu=array(
array('label'=>'Crear Retiro Bodega','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Borrar Retiro Bodega','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_retiro_bodega),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
array('label'=>'Actualizar Retiro Bodega','icon'=>'refresh','url'=>array('update','id'=>$model->id_retiro_bodega)),
array('label'=>'Buscar Retiro Bodega','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Vista Retiro Bodega #<?php echo $model->id_retiro_bodega; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	    'id_retiro_bodega',
		 array(
			'name'=>'id_empleado',
			'value'=>$model->idEmpleado->nombre,
			 ),
		'fecha_solicitud',
		'destino',

),
)); ?>
<?php
$detalle= new DetalleRetiroBodega;
?>
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'detalle-retiro-bodega-form',
	'action' => ['DetalleRetiroBodega/create'],
	'enableAjaxValidation'=>true,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($detalle); ?>
<?php $detalle->id_retiro_bodega=$model->id_retiro_bodega;?>
<table>
<tr>
	<td>
	<?php echo $form->textFieldGroup($detalle,'id_retiro_bodega',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly','style'=>'margin-top: 14px;')))); ?>
	</td>
	<td>
		<?php echo $form->labelEx( $detalle,'id_articulo', array('label'=>'Articulo','class'=>'className') ); ?>
				<?php $this->widget('bootstrap.widgets.TbSelect2',array(
				        'model'=>$detalle,
				        'attribute'=>'id_articulo',
				        'data'=>CHtml::listData(Articulos::model()->findAll(array('order'=>'nombre_articulo')), 'id_articulo', 'nombre_articulo'),
								'options' => array(
				                    'width' => '100%' ),
				)); ?>
	</td>
	<td>
	<?php echo $form->textFieldGroup($detalle,'cantidad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','style'=>'margin-top: 14px;')))); ?>
	</td>
	
</tr>
</table>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$detalle->isNewRecord ? 'Crear' : 'Actualizar',
			'icon'=>$detalle->isNewRecord ? 'plus-sign' : 'refresh',
		)); ?>
</div>

<?php $this->endWidget(); ?>
<?php
$modelo= new DetalleRetiroBodega;
?>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'detalle-retiro-bodega-grid',
'dataProvider'=>$modelo->search2($model->id_retiro_bodega),
'enablePagination'=>false,
//'filter'=>$model,
'columns'=>array(
		'id_detalle_retiro_bodega',
		'id_retiro_bodega',
		array(
		'name'=>'id_articulo',
		'value'=>'$data->idArticulo->nombre_articulo',
		),
		'cantidad',
array(
'class'=>'booster.widgets.TbButtonColumn',
'buttons'=>array(
	'view'=>array(
		'visible'=>'false',
	),
	'delete'=>array(
		'url'=>'Yii::app()->createUrl("/detalleRetiroBodega/delete", array("id"=>$data["id_detalle_retiro_bodega"]))',

	),
	'update'=>array(

		'url'=>'Yii::app()->createUrl("/detalleRetiroBodega/update", array("id"=>$data["id_detalle_retiro_bodega"]))',

	),

),
),
),
)); ?>
