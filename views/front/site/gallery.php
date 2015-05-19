<?php
$this->pageTitle=Yii::app()->name . ' - Gallery';
?>
<h1 class="title_page"><a href="#" title="Thư viện ảnh">Thư viện ảnh</a></h1>
<div style="width: 940px; margin: auto;position: relative">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/js/gallery/css/galleriffic-2.css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/js/gallery/js/jquery.galleriffic.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/js/gallery/js/jquery.opacityrollover.js"></script>
<div id="gallery" class="content">
    <div id="controls" class="controls"></div>
    <div class="slideshow-container">
            <div id="loading" class="loader"></div>
            <div id="slideshow" class="slideshow"></div>
    </div>
    <div id="caption" class="caption-container"></div>
</div>
<div id="thumbs" class="navigation">
    <ul class="thumbs noscript">
        <?php foreach($gallery as $item):?>
            <li>
                <a class="thumb" name="leaf" href="<?php echo $item->path;?>" title="<?php echo $item->name?>">
                    <img src="<?php echo $item->path;?>" alt="<?php echo $item->name?>" />
                </a>
                <div class="caption">
                        <div class="download">
                        </div>
                        <div class="image-title"><?php echo $item->name?></div>
                        <div class="image-desc"></div>
                </div>
            </li>
        <?php endforeach;?>
    </ul>
</div>
<div class="clear"></div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
        // We only want these styles applied when javascript is enabled
        $('div.navigation').css({'width' : '300px', 'float' : 'left'});
        $('div.content').css('display', 'block');

        // Initially set opacity on thumbs and add
        // additional styling for hover effect on thumbs
        var onMouseOutOpacity = 0.67;
        $('#thumbs ul.thumbs li').opacityrollover({
                mouseOutOpacity:   onMouseOutOpacity,
                mouseOverOpacity:  1.0,
                fadeSpeed:         'fast',
                exemptionSelector: '.selected'
        });

        // Initialize Advanced Galleriffic Gallery
        var gallery = $('#thumbs').galleriffic({
                delay:                     3000,
                numThumbs:                 15,
                preloadAhead:              10,
                enableTopPager:            true,
                enableBottomPager:         true,
                maxPagesToShow:            7,
                imageContainerSel:         '#slideshow',
                controlsContainerSel:      '#controls',
                captionContainerSel:       '#caption',
                loadingContainerSel:       '#loading',
                renderSSControls:          true,
                renderNavControls:         true,
                playLinkText:              'Play Slideshow',
                pauseLinkText:             'Pause Slideshow',
                prevLinkText:              '&lsaquo; Previous Photo',
                nextLinkText:              'Next Photo &rsaquo;',
                nextPageLinkText:          'Next &rsaquo;',
                prevPageLinkText:          '&lsaquo; Prev',
                enableHistory:             false,
                autoStart:                 true,
                syncTransitions:           true,
                defaultTransitionDuration: 900,
                onSlideChange:             function(prevIndex, nextIndex) {
                        // 'this' refers to the gallery, which is an extension of $('#thumbs')
                        this.find('ul.thumbs').children()
                                .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
                                .eq(nextIndex).fadeTo('fast', 1.0);
                },
                onPageTransitionOut:       function(callback) {
                        this.fadeTo('fast', 0.0, callback);
                },
                onPageTransitionIn:        function() {
                        this.fadeTo('fast', 1.0);
                }
        });
});
</script>