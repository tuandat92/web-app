<div class="widget-content">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'giai-dau-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal', 'novalidate'=>'novalidate'),
)); ?>

	<?php if($form->errorSummary($model)):?>
			<div class="alert alert-block">
				<a class="close" data-dismiss="alert" href="#">&times;</a>
				<h4 class="alert-heading"><?php echo $form->errorSummary($model); ?></h4>
			</div>
	<?php endif;?>
	<fieldset>
	<div class="control-group">
		<?php echo $form->labelEx($model,'Ten_GiaiDau',array('class'=>'control-label','for'=>'Ten_GiaiDau')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'Ten_GiaiDau',array('size'=>60,'maxlength'=>255,'class'=>'input-large')); ?>
		<?php echo $form->error($model,'Ten_GiaiDau'); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'Img_DaiDien',array('class'=>'control-label','for'=>'Img_DaiDien')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'Img_DaiDien',array('size'=>60,'maxlength'=>255,'class'=>'input-large')); ?>
		<?php echo $form->error($model,'Img_DaiDien'); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'ThoiGian_BD',array('class'=>'control-label','for'=>'ThoiGian_BD')); ?>
		<div class="controls">
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	        'model' => $model,
	        'attribute' => 'ThoiGian_BD',
	        // additional javascript options for the date picker plugin
	        'options' => array(
	            'showAnim' => 'fold',
	            'language' => 'vi',
	            'dateFormat' => 'dd/mm/yy',
	            'changeYear' => true,
	            'changeMonth' => true,
	        ),
	        'htmlOptions' => array(
		        'style' => 'height:20px;'
	        ),
       	)); ?>
		<?php echo $form->error($model,'ThoiGian_BD'); ?>
		</div>
	</div>
			<div class="control-group">
		<?php echo $form->labelEx($model,'ThoiGian_KT',array('class'=>'control-label','for'=>'ThoiGian_KT')); ?>
		<div class="controls">
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	        'model' => $model,
	        'attribute' => 'ThoiGian_KT',
	        // additional javascript options for the date picker plugin
	        'options' => array(
	            'showAnim' => 'fold',
	            'language' => 'vi',
	            'dateFormat' => 'dd/mm/yy',
	            'changeYear' => true,
	            'changeMonth' => true,
	        ),
	        'htmlOptions' => array(
		        'style' => 'height:20px;'
	        ),
       	)); ?>
		<?php echo $form->error($model,'ThoiGian_KT'); ?>
		</div>
	</div>
			<div class="control-group">
		<?php echo $form->labelEx($model,'Ten_Quoc_Te',array('class'=>'control-label','for'=>'Ten_Quoc_Te')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'Ten_Quoc_Te',array('size'=>60,'maxlength'=>255,'class'=>'input-large')); ?>
		<?php echo $form->error($model,'Ten_Quoc_Te'); ?>
		</div>
	</div>
	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-large')); ?>
		<?php echo CHtml::link('Cancel',array('/giai-dau/admin'),array('class'=>'btn btn-large')); ?>
	</div>
	</fieldset>
<?php $this->endWidget(); ?>
</div><!-- form -->