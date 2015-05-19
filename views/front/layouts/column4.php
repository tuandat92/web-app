<?php 
$this->beginContent('//layouts/main');
$system = Yii::app()->CSystem;
?>
<div class="page_white">
    <div class="container">
        <?php if(isset($this->breadcrumbs)):?>
            <div>
                <?php
                echo Yii::app()->language=='vi'?'Duyệt :':'Browse :';
                ?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
                    'separator'=>' / ',
                    'homeLink' => CHtml::link(Yii::app()->language=='vi'?'Trang chủ':'Home', Yii::app()->homeUrl),
                    'tagName'=>'span'
                )); ?><!-- breadcrumbs -->
            </div>
        <?php endif?>
    </div>
    <?php echo $content; ?>
</div>
<?php $this->endContent(); ?>