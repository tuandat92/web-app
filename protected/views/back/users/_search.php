<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class'=>'form-horizontal', 'novalidate'=>'novalidate'),
)); ?>
	<fieldset>
	<div class="control-group">
	     <?php echo $form->label($model,'fullname',array('class'=>'control-label')); ?>
	     <div class="controls">
			<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>200,'class'=>'input-large')); ?>
	     </div>
	</div>
	<div class="control-group">
	     <?php echo $form->label($model,'username',array('class'=>'control-label')); ?>
	     <div class="controls">
			<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>200,'class'=>'input-large')); ?>
	     </div>
	</div>
	<div class="control-group">
	     <?php echo $form->label($model,'email',array('class'=>'control-label')); ?>
	     <div class="controls">
			<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>200,'class'=>'input-large')); ?>
	     </div>
	</div>
<!--	<div class="control-group">-->
<!--		--><?php //echo $form->labelEx($model,'active',array('class'=>'control-label','for'=>'active')); ?>
<!--		<div class="controls">-->
<!--			<div class="btn-group" data-toggle="buttons-radio">-->
<!--		       <button onclick="document.getElementById('Users_active').value=1;return false;" class="btn btn-primary --><?php //if($model->active=='1'){echo 'active';}?><!--">True</button>-->
<!--		       <button onclick="document.getElementById('Users_active').value=0;return false;" class="btn btn-primary --><?php //if($model->active=='0'){echo 'active';}?><!--">False</button>-->
<!--		       <button onclick="document.getElementById('Users_active').value='';return false;" class="btn btn-primary --><?php //if($model->active!='1' && $model->active!='0'){echo 'active';}?><!--">None</button>-->
<!--		 	</div>-->
<!--		 	--><?php //echo $form->hiddenField($model,'active'); ?>
<!--		</div>-->
<!--	</div>-->
	<div class="form-actions">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary btn-large')); ?>
	</div>

<?php $this->endWidget(); ?>