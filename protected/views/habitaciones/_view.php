<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_habitacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_habitacion),array('view','id'=>$data->id_habitacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_habitacion')); ?>:</b>
	<?php echo CHtml::encode($data->tipoHabitacion->tipo_habitacioncol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />


</div>
