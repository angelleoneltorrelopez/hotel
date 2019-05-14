<?php
$this->breadcrumbs=array(
	'Solicitud Compras'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Crear Solicitud Compra','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Borrar Solicitud Compra','icon'=>'remove-sign','url'=>'#',
'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_solicitud_compra),
'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
array('label'=>'Buscar Solicitud Compra','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Solicitud de Compra #<?php echo $model->id_solicitud_compra; ?></h1>

<!--************************************************************************************************** -->
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'solicitud-compra-form',
	'enableAjaxValidation'=>true,
)); ?>

<div class="form-row">
    <div class="form-group col-md-6">
<?php echo $form->labelEx( $model,'id_empleado', array('class'=>'className') ); ?>
		<?php $this->widget('bootstrap.widgets.TbSelect2',array(
						'model'=>$model,
						'attribute'=>'id_empleado',
						'data'=>CHtml::listData(Empleados::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
						'options' => array('width' => '100%',),
						'disabled'=>true,
		)); ?>
</div>
<div class="form-group col-md-2">
	<?php echo $form->textFieldGroup($model,'fecha_solicitud',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5',
	'value'=>date('Y-m-d'),'readOnly'=>'readOnly','maxlength'=>255)))); ?>
</div>
<div class="form-group col-md-4">
<?php echo $form->textFieldGroup($model,'total_estimado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5',
'readOnly'=>'readOnly','maxlength'=>255)))); ?>
</div>
</div>
<?php $this->endWidget(); ?>
<!--************************************************************************************************** -->
<?php
$detalle= new DetalleSolicitudCompra;
?>
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'detalle-solicitud-compra-form',
	'action' => ['DetalleSolicitudCompra/create'],
	'enableAjaxValidation'=>true,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($detalle); ?>
<?php $detalle->id_solicitud_compra=$model->id_solicitud_compra;?>
<table>
	<tr>
		<td>
		<?php echo $form->textFieldGroup($detalle,'id_solicitud_compra',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5',
		'readonly'=>'readonly','style'=>'margin-top: 14px;')))); ?>

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

<div class="form-row">
    <div class="form-group col-md-1">
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$detalle->isNewRecord ? 'Agregar' : 'Actualizar',
			'icon'=>$detalle->isNewRecord ? 'plus-sign' : 'refresh',
		)); ?>
</div>
</div>

<div class="form-group col-md-6">
<?php $this->widget('booster.widgets.TbButton',array(
   'context'=>'primary',
   'label'=>'Finalizar',
	 'icon'=>'ok',
   'buttonType' =>'link',
   'url'=>Yii::app()->createUrl("/solicitudCompra/view2", array("id"=>$model->id_solicitud_compra)),
));?>
</div>
</div>



<?php $this->endWidget(); ?>
<?php
$modelo= new DetalleSolicitudCompra;
?>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'detalle-solicitud-compra-grid',
'dataProvider'=>$modelo->search2($model->id_solicitud_compra),
//'filter'=>$model,
'enablePagination'=>false,
//'dataProvider'=>$model->search(),
//'filter'=>$model,
'columns'=>array(
		array(
		'name'=>'id_articulo',
		'value'=>'$data->idArticulo->nombre_articulo',
		),
		'cantidad',
		'total',
array(
'class'=>'booster.widgets.TbButtonColumn',
'buttons'=>array(
	'view'=>array(
		'visible'=>'false',
	),
	'delete'=>array(
		'url'=>'Yii::app()->createUrl("/detalleSolicitudCompra/delete", array("id"=>$data["id_detalle_solicitud_compra"]))',
	),
	'update'=>array(

		'url'=>'Yii::app()->createUrl("/detalleSolicitudCompra/update", array("id"=>$data["id_detalle_solicitud_compra"]))',
	),
),
),//fin de botones
),
)); ?>
