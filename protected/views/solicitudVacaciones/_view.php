<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('empleado')); ?>:</b>
	<?php echo CHtml::encode($data->empleado0->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_solicitud')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_solicitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dias_totales')); ?>:</b>
	<?php echo CHtml::encode($data->dias_totales); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firma_solicitante')); ?>:</b>
	<?php echo CHtml::encode($data->firma_solicitante); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('firma_jefe_inmediato')); ?>:</b>
	<?php echo CHtml::encode($data->firma_jefe_inmediato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firma_RH')); ?>:</b>
	<?php echo CHtml::encode($data->firma_RH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firma_gerencia')); ?>:</b>
	<?php echo CHtml::encode($data->firma_gerencia); ?>
	<br />

	*/ ?>

</div>
