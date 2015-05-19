<div class="widget-toolbar clearfix">
	<?php
		Yii::app()->clientScript->registerScript('searchtag', "
		$('.pull-left .btn').click(function(){
			var tag=$(this).attr('for');
			$('#'+tag).toggle();
			if($('#'+tag).css('display')!='none'){
				$(this).addClass('active');
			}
			else{
				$(this).removeClass('active');
			}
			return false;
		});
		");
		?>
		<div class="pull-left">
		Search By:&nbsp;&nbsp;
			<div class="btn-group" data-toggle="buttons-checkbox">
			<button for="Ten_GiaiDau" class="btn btn-small active">Ten  Giai Dau</button>
					    <button for="Img_DaiDien" class="btn btn-small">Img  Dai Dien</button>
					    <button for="ThoiGian_BD" class="btn btn-small">Thoi Gian  Bd</button>
					    <button for="ThoiGian_KT" class="btn btn-small">Thoi Gian  Kt</button>
					    <button for="Ten_Quoc_Te" class="btn btn-small">Ten  Quoc  Te</button>
					    		</div>
	</div>
</div> <!-- /.widget-toolbar -->
<div class="widget-content">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class'=>'form-horizontal', 'novalidate'=>'novalidate'),
)); ?>
	<fieldset>
	<div id="Ten_GiaiDau" class="control-group" >
		<?php echo $form->label($model,'Ten_GiaiDau',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'Ten_GiaiDau',array('size'=>60,'maxlength'=>255,'class'=>'input-large')); ?>
		</div>
	</div>
	<div id="Img_DaiDien" class="control-group" style="display: none">
		<?php echo $form->label($model,'Img_DaiDien',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'Img_DaiDien',array('size'=>60,'maxlength'=>255,'class'=>'input-large')); ?>
		</div>
	</div>
	<div id="ThoiGian_BD" class="control-group" style="display: none">
		<?php echo $form->label($model,'ThoiGian_BD',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'ThoiGian_BD'); ?>
		</div>
	</div>
	<div id="ThoiGian_KT" class="control-group" style="display: none">
		<?php echo $form->label($model,'ThoiGian_KT',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'ThoiGian_KT'); ?>
		</div>
	</div>
	<div id="Ten_Quoc_Te" class="control-group" style="display: none">
		<?php echo $form->label($model,'Ten_Quoc_Te',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'Ten_Quoc_Te',array('size'=>60,'maxlength'=>255,'class'=>'input-large')); ?>
		</div>
	</div>
	<div class="form-actions">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary btn-large')); ?>
	</div>
	</fieldset>
<?php $this->endWidget(); ?>

</div><!-- search-form -->