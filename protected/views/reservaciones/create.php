<?php
$this->breadcrumbs=array(
	'Reservaciones'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Reservaciones','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Reservaciones</h1>

  <!-- contenido informacion adicional -->
  
  
    <div class="form">

        <?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
           
            'enableAjaxValidation'=>true,
        )); ?>
        <div class="row bg-info text-center">
       <h5 >Verificar disponibilidad</h5> 
        </div>

        <div class="row well">
		<div class="form-group col-md-3">
		<?php echo $form->datePickerGroup($busqueda,'entrada',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
		</div>
		<div class="form-group col-md-3">
		<?php echo $form->datePickerGroup($busqueda,'salida',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
		</div>
			<div class="form-group col-md-4 ">
            <?php echo $form->labelEx( $busqueda,'tipo_habitacion', array('class'=>'className') ); ?>

            <?php $this->widget('bootstrap.widgets.TbSelect2',array(
                                    'model'=>$busqueda,
                                    'attribute'=>'tipo_habitacion',
                                    'data'=>CHtml::listData(TipoHabitacion::model()->findAll(array('order'=>'tipo_habitacioncol')), 'id_tipo_habitacion', 'tipo_habitacioncol'),
                                    'options' => array('width' => '100%',),
                    )); ?>

            </div>
       
            <div class="form-actions col-md-2" style='padding-top:25px;'>
            <?php $this->widget('booster.widgets.TbButton', array(
                    'buttonType'=>'submit',
                    'context'=>'primary',
                   
                    'label'=>'Buscar',
                    'icon'=>'search',
                )); ?>
        </div>
        </div>
        <div class="row">
        <?php 
        if($estado==1){
            echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, $msg);
            
        }
        if($estado==2){
            echo TbHtml::alert(TbHtml::ALERT_COLOR_DANGER, $msg); 
            
        }
         ?>
        </div>
       

<?php $this->endWidget(); ?>
		</div><!-- form -->


<?php $model->fecha_ingreso=$busqueda->entrada;
	$model->fecha_salida=$busqueda->salida;
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
