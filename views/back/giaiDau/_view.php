<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_GiaiDau')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_GiaiDau), array('view', 'id'=>$data->ID_GiaiDau)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ten_GiaiDau')); ?>:</b>
	<?php echo CHtml::encode($data->Ten_GiaiDau); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Img_DaiDien')); ?>:</b>
	<?php echo CHtml::encode($data->Img_DaiDien); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ThoiGian_BD')); ?>:</b>
	<?php echo CHtml::encode($data->ThoiGian_BD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ThoiGian_KT')); ?>:</b>
	<?php echo CHtml::encode($data->ThoiGian_KT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ten_Quoc_Te')); ?>:</b>
	<?php echo CHtml::encode($data->Ten_Quoc_Te); ?>
	<br />


</div>