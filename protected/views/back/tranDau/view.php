<?php
$this->breadcrumbs=array(
	'Tran Daus'=>array('index'),
	$model->ID_trandau,
);

$this->menu=array(
	array('label'=>'List TranDau', 'url'=>array('index')),
	array('label'=>'Create TranDau', 'url'=>array('create')),
	array('label'=>'Update TranDau', 'url'=>array('update', 'id'=>$model->ID_trandau)),
	array('label'=>'Delete TranDau', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_trandau),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TranDau', 'url'=>array('admin')),
);
?>

<h1>View TranDau #<?php echo $model->ID_trandau; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_trandau',
		'ID_GiaiDau',
		'San_Dau',
		'Link_Xem',
		'Ty_So',
		'Trang_Thai',
		'Mo_Ta',
		'So_CDV',
		'ID_Chu_Nha',
		'ID_Doi_Khach',
		'Vong',
		'ThoiGianDienRa',
		'Mua_Giai',
		'trong_tai',
	),
)); ?>
