<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_retiro_bodega')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_retiro_bodega),array('view','id'=>$data->id_retiro_bodega)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_empleado')); ?>:</b>
	<?php echo CHtml::encode($data->idEmpleado->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_solicitud')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_solicitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destino')); ?>:</b>
	<?php echo CHtml::encode($data->destino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firma_solicitante')); ?>:</b>
	<?php echo CHtml::encode($data->firma_solicitante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firma_encargado_almacen')); ?>:</b>
	<?php echo CHtml::encode($data->firma_encargado_almacen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firma_gerente')); ?>:</b>
	<?php echo CHtml::encode($data->firma_gerente); ?>
	<br />


</div>
