<div id="page-title" class="clearfix">		
	<ul class="breadcrumb">
		<li>
			<?php
echo CHtml::link('Home',array('/site/index'));
?>
			<span class="divider">/</span>
		</li>
		<li>
			<?php
echo CHtml::link('GiaiDau',array('admin'));
?>
			<span class="divider">/</span>
		</li>
		<li class="active">Update GiaiDau</li>
	</ul>		
</div> <!-- /.page-title -->
<div class="row">			
	<div class="span8">
		<div id="validation" class="widget highlight widget-form">
	      			
	      	<div class="widget-header">	      				
	      		<h3>
	      			<i class="icon-pencil"></i>
	      			Update GiaiDau					
      			</h3>	
      		</div> <!-- /widget-header -->

			<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>