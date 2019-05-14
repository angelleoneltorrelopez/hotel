<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_habitacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_habitacion),array('view','id'=>$data->id_tipo_habitacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_habitacioncol')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_habitacioncol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tarifa')); ?>:</b>
	<?php echo CHtml::encode($data->tarifa); ?>
	<br />


</div>