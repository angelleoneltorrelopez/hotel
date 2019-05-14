<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_detalle')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_detalle),array('view','id'=>$data->id_detalle)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entrada')); ?>:</b>
	<?php echo CHtml::encode($data->entrada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salida')); ?>:</b>
	<?php echo CHtml::encode($data->salida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_habitacion')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_habitacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('habitacion')); ?>:</b>
	<?php echo CHtml::encode($data->habitacion); ?>
	<br />


</div>