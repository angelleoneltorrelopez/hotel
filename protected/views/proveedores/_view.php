<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_proveedor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_proveedor),array('view','id'=>$data->id_proveedor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_proveedor')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_proveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nit_proveedor')); ?>:</b>
	<?php echo CHtml::encode($data->nit_proveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion_proveedor')); ?>:</b>
	<?php echo CHtml::encode($data->direccion_proveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />


</div>