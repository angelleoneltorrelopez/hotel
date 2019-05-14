<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_solicitud_compra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_solicitud_compra),array('view','id'=>$data->id_solicitud_compra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_empleado')); ?>:</b>
	<?php echo CHtml::encode($data->empleado0->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_solicitud')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_solicitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_estimado')); ?>:</b>
	<?php echo CHtml::encode($data->total_estimado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firma_solicitante')); ?>:</b>
	<?php echo CHtml::encode($data->firma_solicitante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firma_jefe_inmediato')); ?>:</b>
	<?php echo CHtml::encode($data->firma_jefe_inmediato); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('firma_encargado_almacen')); ?>:</b>
	<?php echo CHtml::encode($data->firma_encargado_almacen); ?>
	<br />

	*/ ?>

</div>
