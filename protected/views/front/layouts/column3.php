<?php 
$articles=Article::model()->findAllByAttributes(array('publish'=>1,'cid'=>3),array('order'=>'t.order DESC'));
$keywords=Yii::app()->CSystem->getMetaKeyword();
$tags=explode(',',$keywords);
$this->beginContent('//layouts/main'); ?>
<div class="container">
    <div class="content_page">
        <div class="row">
            <div class="col-md-9">
                <?php echo $content; ?>
            </div>
            <div class="col-md-3">
                <div class="mod_service">
                    <img alt="<?php echo Yii::app()->language=='vi'?'Dịch vụ':'Services';?>" src="<?php echo Yii::app()->request->baseUrl.'/themes/centro/images/services.jpg'?>" />
                    <h3><?php echo Yii::app()->language=='vi'?'Dịch vụ':'Services';?></h3>
                </div>
                <div class="mod_right">
                    <ul class="article_list">
                        <?php
                        foreach($articles as $arow){
                            $title= Yii::app()->language=='vi'?$arow->title:$arow->en_title;
                            echo '<li>'.CHtml::link($title,array('article/view','id'=>$arow->id.'-'.MString::convertToAlias($title)),array('class'=>'a_item')).'</li>';
                        }
                        ?>
                    </ul>
                </div>
                <div class="mod_right">
                    <h3>Tag</h3>
                    <?php
                    if(!empty($tags)){
                        foreach($tags as $tag){
                            echo CHtml::link($tag,array('search/tags','key'=>$tag),array('class'=>'tag')).', ';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>