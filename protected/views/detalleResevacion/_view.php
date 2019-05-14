<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_reservacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_reservacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_habitacion')); ?>:</b>
	<?php echo CHtml::encode($data->tipoHabitacion->tipo_habitacioncol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />


</div>