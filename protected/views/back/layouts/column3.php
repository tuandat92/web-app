<?php $this->beginContent('//layouts/main'); ?>
<?php $control= Yii::app()->getController()->getId();?>
<div class="row">
    <div class="span4">
        <div id="sidebar">
            <?php
            $this->widget('ext.treemenu.treemenu');
            ?>
        </div><!-- sidebar -->
    </div>
    <div class="span8">
            <?php echo $content; ?>
    </div>

</div>
<?php $this->endContent(); ?>