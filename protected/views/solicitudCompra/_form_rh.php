<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'solicitud-compra-form',
	'enableAjaxValidation'=>true,
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="form-row">
    <div class="form-group col-md-4">
			<?php echo $form->labelEx( $model,'id_empleado', array('class'=>'className') ); ?>
					<?php $this->widget('bootstrap.widgets.TbSelect2',array(
									'model'=>$model,
									'attribute'=>'id_empleado',
									'data'=>CHtml::listData(Empleados::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
									'options' => array('width' => '100%'),
									'disabled' => true,

					)); ?>
	</div>
	<div class="form-group col-md-4">
	<?php echo $form->datePickerGroup($model,'fecha_solicitud',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),
	'htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
</div>

<div class="form-group col-md-4">
	<?php echo $form->textFieldGroup($model,'total_estimado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')))); ?>
</div>
</div>

<div class="form-row">
	<div class="form-group col-md-12">
<?php
$modelo= new DetalleSolicitudCompra;
?>

<?php $this->widget('booster.widgets.TbGridView',array(
//'id'=>'detalle-solicitud-compra-grid',
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

),
));?>
</div>
</div>

<div class="form-row">
	<div class="form-group col-md-12">

</div>
</div>
<div class="form-row">

	<div class="form-group col-md-6">
<!--**************************************** JEFE INMEDIATO ********************************************************************-->
	<?php if(Yii::app()->user->checkAccess("jefe_inme")){ ?>
	<?php echo $form->radioButton($model,'firma_jefe_inmediato',array('value'=>1,'class'=>'form-check-input','uncheckValue'=>null)).' Autorizar   '; ?>
	<br>
	<?php echo $form->radioButton($model,'firma_jefe_inmediato',array('value'=>2, 'class'=>'form-check-input','uncheckValue'=>null)).' Rechazar';?>
	<br>
	<?php } ?>

<!--**************************************** ENCARGADO DE BODEGA ********************************************************************-->
<?php if(Yii::app()->user->checkAccess("enc_bod")){ ?>
<?php echo $form->radioButton($model,'firma_encargado_almacen',array('value'=>1,'class'=>'form-check-input','uncheckValue'=>null)).' Autorizar   '; ?>
<br>
<?php echo $form->radioButton($model,'firma_encargado_almacen',array('value'=>2, 'class'=>'form-check-input','uncheckValue'=>null)).' Rechazar';?>
<br>
<?php } ?>
<!--**************************************** GERENTE ********************************************************************-->
<?php if(Yii::app()->user->checkAccess("gerente")){ ?>
<?php echo $form->radioButton($model,'firma_encargado_almacen',array('value'=>1,'class'=>'form-check-input','uncheckValue'=>null)); ?>
<label class="form-check-label" for="exampleCheck1">Autorizar</label>
<br>
<?php echo $form->radioButton($model,'firma_encargado_almacen',array('value'=>2, 'class'=>'form-check-input','uncheckValue'=>null));?>
<label class="form-check-label" for="exampleCheck2">Denegar</label>
<br>
<?php } ?>
</div>
<div class="form-group col-md-2">
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Confirmar',
			'icon'=>$model->isNewRecord ? 'plus-sign' : 'folder_close',
		)); ?>
</div>
</div>
</div>

<?php $this->endWidget(); ?>
