<?php
$this->breadcrumbs=array(
	'Giai Daus'=>array('index'),
	$model->ID_GiaiDau,
);

$this->menu=array(
	array('label'=>'List GiaiDau', 'url'=>array('index')),
	array('label'=>'Create GiaiDau', 'url'=>array('create')),
	array('label'=>'Update GiaiDau', 'url'=>array('update', 'id'=>$model->ID_GiaiDau)),
	array('label'=>'Delete GiaiDau', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_GiaiDau),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GiaiDau', 'url'=>array('admin')),
);
?>

<h1>View GiaiDau #<?php echo $model->ID_GiaiDau; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_GiaiDau',
		'Ten_GiaiDau',
		'Img_DaiDien',
		'ThoiGian_BD',
		'ThoiGian_KT',
		'Ten_Quoc_Te',
	),
)); ?>
