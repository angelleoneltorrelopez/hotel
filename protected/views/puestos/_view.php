<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('departamento')); ?>:</b>
	<?php echo CHtml::encode($data->departamento0->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salario_min')); ?>:</b>
	<?php echo CHtml::encode($data->salario_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salario_max')); ?>:</b>
	<?php echo CHtml::encode($data->salario_max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bono')); ?>:</b>
	<?php echo CHtml::encode($data->bono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>
