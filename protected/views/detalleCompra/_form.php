<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'detalle-compra-form',
	'enableAjaxValidation'=>true,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'id_ingreso_bodega',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')))); ?>

	<?php echo $form->labelEx( $model,'id_articulo', array('class'=>'className') ); ?>
			<?php $this->widget('bootstrap.widgets.TbSelect2',array(
							'model'=>$model,
							'attribute'=>'id_articulo',
							'data'=>CHtml::listData(Articulos::model()->findAll(array('order'=>'nombre_articulo')), 'id_articulo', 'nombre_articulo'),
							'options' => array(
													'width' => '100%',),
			)); ?>
			
	<?php echo $form->textFieldGroup($model,'precio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'cantidad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'total',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
			'icon'=>$model->isNewRecord ? 'plus-sign' : 'refresh',
		)); ?>
</div>

<?php $this->endWidget(); ?>
