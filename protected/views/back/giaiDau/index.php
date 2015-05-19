<?php
$this->breadcrumbs=array(
	'Giai Daus',
);

$this->menu=array(
	array('label'=>'Create GiaiDau', 'url'=>array('create')),
	array('label'=>'Manage GiaiDau', 'url'=>array('admin')),
);
?>

<h1>Giai Daus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
