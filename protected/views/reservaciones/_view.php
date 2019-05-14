<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_reservacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_reservacion),array('view','id'=>$data->id_reservacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_reservacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_reservacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_salida')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_salida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_huesped')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_huesped); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_huesped')); ?>:</b>
	<?php echo CHtml::encode($data->id_huesped); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo_huesped')); ?>:</b>
	<?php echo CHtml::encode($data->correo_huesped); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nacionalidad_huesped')); ?>:</b>
	<?php echo CHtml::encode($data->nacionalidad_huesped); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tel_huesped')); ?>:</b>
	<?php echo CHtml::encode($data->tel_huesped); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad_infantes')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad_infantes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad_adultos')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad_adultos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />

	*/ ?>

</div>