<?php
$title=Yii::app()->language=='vi'?'Liên hệ':'Contact Us';
$this->pageTitle = Yii::app()->name . ' - '.$title;
$this->breadcrumbs = array(
    $title,
);
$system = Yii::app()->CSystem;
$lang = Yii::app()->language;
?>
<h1 class="entry-title"><?php echo $title?></h1>
<div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d59589.43450275755!2d105.8312130442543!3d21.019091311784226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1401089878182" width="100%" height="450" frameborder="0" style="border:0"></iframe>
</div>
<div class="row">
    <div class="col-md-6">

    </div>
    <div class="col-md-6">

    </div>
</div>
<br/>
<div class="line"></div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <br>
            <h3>Company's Infomation</h3>
            <br>
            <?php echo $system->info;?>
            <br>
        </div>
        <div class="col-md-6">
        </div>
    </div>
</div>
<br/>
<h3 class="mod_title">
    <?php echo Yii::app()->language=='vi'?'Mail cho chúng tôi!':'Mail Us!'?>
</h3>
<div class="content_detail" style="margin-bottom: 40px">
    <?php if (Yii::app()->user->hasFlash('contact')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('contact'); ?>
        </div>
    <?php else: ?>
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'contact-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions'=>array('role'=>'form')
        )); ?>

        <p class="note"><?php echo $lang == 'vi' ? '<span class="required">*</span>Thông tin bắt buộc' : 'Fields with <span class="required">*</span> are required.' ?></p>
        <div class="row">
            <?php echo $form->errorSummary($model); ?>
            <div class="form-group col-sm-12">
                <?php echo $form->textField($model, 'name',array('class'=>'form-control','placeholder'=>'Name *')); ?>
                <?php echo $form->error($model, 'name'); ?>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-sm-12">
                <?php echo $form->textField($model, 'email',array('class'=>'form-control','placeholder'=>'Email *')); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-sm-12">
                <?php echo $form->textField($model, 'subject',array('size' => 60, 'maxlength' => 128,'class'=>'form-control','placeholder'=>'Subject *')); ?>
                <?php echo $form->error($model, 'subject'); ?>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-sm-12">
                <?php echo $form->textArea($model, 'body',array('rows' => 6, 'cols' => 50,'class'=>'form-control','placeholder'=>'Message *')); ?>
                <?php echo $form->error($model, 'body'); ?>
            </div>
            <div class="clearfix"></div>
            <?php if (CCaptcha::checkRequirements()): ?>
                <div class="form-group col-sm-6">
                    <?php echo $form->labelEx($model, 'verifyCode'); ?>
                    <div class="capcha">
                        <?php $this->widget('CCaptcha', array('buttonLabel' => $lang == 'vi' ? 'Làm mới mã xác nhận' : 'Get a new code')); ?>
                        <?php echo $form->textField($model, 'verifyCode'); ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="hint hidden">
                        <?php echo $lang == 'vi' ? 'Nhập vào mã xác nhận hiển thị bên trên.<br/> Các ký tự không cần viết hoa.' : 'Please enter the letters as they are shown in the image above.
                                <br/>Letters are not case-sensitive.';?>
                    </div>
                    <?php echo $form->error($model, 'verifyCode'); ?>
                </div>
                <div class="clearfix"></div>
            <?php endif; ?>

            <div class="col-sm-6">
                <?php echo CHtml::resetButton($lang == 'vi' ? 'Nhập lại' : 'Clear form',array('class'=>'btn btn-clear')); ?>
                <?php echo CHtml::submitButton($lang == 'vi' ? 'Gửi liên hệ' : 'Send comment',array('class'=>'btn btn-submit')); ?>
            </div>
        </div>
        <?php $this->endWidget(); ?>

    <?php endif; ?>
</div>
