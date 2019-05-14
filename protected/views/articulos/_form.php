<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'articulos-form',
	'enableAjaxValidation'=>true,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($model); ?>
<div class="form-row">
    <div class="form-group col-xs-6 col-sm-4">
  <?php echo $form->textFieldGroup($model,'codigo_articulo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'placeholder'=>'Codigo',)))); ?>
</div>
<div class="form-group col-xs-6 col-sm-4">
	<?php echo $form->textFieldGroup($model,'nombre_articulo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45, 'placeholder'=>'Nombre',)))); ?>
</div>
<div class="form-group col-xs-6 col-sm-4">
	<?php echo $form->numberFieldGroup($model,'precio',array('prepend' => 'Q','widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>
</div>
</div>
<div class="form-row">
    <div class="form-group col-xs-12 col-sm-6 col-lg-8">
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
			'icon'=>$model->isNewRecord ? 'plus-sign' : 'refresh',
		)); ?>
</div>
</div>
</div>

<?php $this->endWidget(); ?>
