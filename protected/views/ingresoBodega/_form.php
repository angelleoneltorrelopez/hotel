<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'ingreso-bodega-form',
	'enableAjaxValidation'=>true,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->labelEx( $model,'id_proveedor', array('class'=>'className') ); ?>
			<?php $this->widget('bootstrap.widgets.TbSelect2',array(
							'model'=>$model,
							'attribute'=>'id_proveedor',
							'data'=>CHtml::listData(Proveedores::model()->findAll(array('order'=>'nombre_proveedor')), 'id_proveedor', 'nombre_proveedor'),
							'options' => array('width' => '100%',),
			)); ?>


	<?php echo $form->labelEx( $model,'id_solicitud_compra', array('class'=>'className') ); ?>
			<?php $this->widget('bootstrap.widgets.TbSelect2',array(
							'model'=>$model,
							'attribute'=>'id_solicitud_compra',
							'data'=>CHtml::listData(SolicitudCompra::model()->findAll(array('order'=>'id_solicitud_compra')), 'id_solicitud_compra', 'id_solicitud_compra'),
							'options' => array('width' => '100%',),
			)); ?>

	<?php echo $form->textFieldGroup($model,'numero_factura',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->datePickerGroup($model,'fecha_factura',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

	<?php //echo $form->textFieldGroup($model,'total',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
			'icon'=>$model->isNewRecord ? 'plus-sign' : 'refresh',
		)); ?>
</div>

<?php $this->endWidget(); ?>
