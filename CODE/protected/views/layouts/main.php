<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name='AUTHOR' content='<?php echo Language::t(Setting::s('META_AUTHOR','System'));?>'>
<meta name='COPYRIGHT' content='<?php echo Language::t(Setting::s('META_COPYRIGHT','System'));?>'>
<meta name="keywords" content= "<?php echo Language::t(Setting::s('META_KEYWORD','System'));?>">
<meta name="desc" content="<?php echo Language::t(Setting::s('META_DESCRIPTION','System'));?>">
<link rel="shortcut icon" href="<?php Yii::app()->request->getBaseUrl(true)?>/images/front/fav.png" type="image/x-icon" />
<!--css default-->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true)?>/css/front/css.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true)?>/css/front/ihb.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true)?>/css/front/nivo-slider.css">
<!--js default-->
<script type="text/javascript" src="<?php echo Yii::app()->request->getBaseUrl(true)?>/js/front/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->getBaseUrl(true)?>/js/front/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->getBaseUrl(true)?>/js/front/UTM_Amerika_Sans_400.font.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->getBaseUrl(true)?>/js/front/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->getBaseUrl(true)?>/js/front/main.slider.js"></script>

<script type="text/javascript">
	Cufon.replace('.hoi-dap label');
	Cufon.replace('.category');
	Cufon.replace('.tin-da-dang');
	Cufon.replace('.winget-title label');
	Cufon.replace('.small-title label');
	Cufon.replace('.search-title label');
</script>
<title><?php echo Language::t(Setting::s('FRONT_SITE_TITLE','System'));?></title>
</head>
<body>
<!--header-->
<div class="bg-header header">
	<div class="_header">
    	<div class="logo floatleft">&nbsp;</div>
        <div class="navigation floatleft">
        	<?php $this->widget('wMenu',array('group'=>Category::GROUP_USER_TOP_MENU,'view'=>'menu-top'))?>
        </div>
        <div class="search bg-search floatleft">
        	<?php $this->widget('wQuickSearch')?>
        </div>
        <div class="box-languate floatright">
        	<a href="#"><?php echo Language::t('Tiếng Việt');?></a><span>|</span>
        	<a href="#"><?php echo Language::t('English');?></a>
        </div>
    </div>
</div>
<p class="clear-15">&nbsp;</p>
<!--end header-->
<!--container-->
<div class="container overflow-hidden">
	<!--box banner-->
	<div class="box-banner">
    	<div class="bg-menu-left menu-left floatleft">
    		<?php $this->widget('wMenu',array('group'=>Category::GROUP_USER_MAIN_MENU,'view'=>'menu-main'))?>
        </div>
        <div class="_banner floatleft">
        	<?php $this->widget('wBanner',array('code'=>Banner::CODE_HEADLINE,'view'=>'head-line'))?>
        </div>
        <div class="box-contact-online floatleft">
        	<?php $this->widget('wBookOnline')?>
        </div>
    </div>
    <!--end box banner-->
    <p class="clear-15">&nbsp;</p>
    <!--content-->
    <div class="_container display-block overflow-hidden">
    	<div class="column-left floatleft">
        	<div class="menu-left">
				<?php $this->widget('wMenu',array('group'=>Category::GROUP_USER_LEFT_MENU,'view'=>'menu-left'))?>
            </div>
            <div class="adv-left">
        		<?php $this->widget('wBanner',array('code'=>Banner::CODE_LEFT,'view'=>'banner-left'));?>
        	</div>
        </div>

        <div class="column-middle floatleft">
        <!-- Echo $content -->
        	<?php echo $content;?>
        </div>
        <div class="column-right floatleft">
            <div class="pice-online display-block">
            	<h1 class="truc-tuyen">&nbsp;</h1>
                <a href="#" class="baokim display-block">&nbsp;</a>
                <a href="#" class="nganluong display-block">&nbsp;</a>
            </div>
            <?php $this->widget('wBanner',array('code'=>Banner::CODE_RIGHT,'view'=>'banner-left'));?>
    	</div>
    </div>
    <!--end content-->
    	<p class="clear-10">&nbsp;</p>
    <!--sub news-->
    <div class="__container">
    	<div class="___container">
    		<?php $this->widget('wCategory')?>
        </div>
    </div>
    <!--end sub news-->
</div>
<!--end container-->
<p class="clear-15">&nbsp;</p>
<!--footer-->
<div class="footer">
	<div class="menu-footer">
    	<div class="_menu-footer">
    		<?php $this->widget('wMenu',array('group'=>Category::GROUP_USER_FOOTER_MENU,'view'=>'menu-footer'))?>
        </div>
    </div>
    <div class="ft-add">
    	<div class="logo_ft display-inlineblock">
    		<a href="#" class="logo_1 display-inlineblock"></a>
        </div>
        <div class="add_ft display-inlineblock">
        	<p><?php echo Language::t('Bản Quyền © 2012 - kcbtn.vn');?></p>
            <a href="#"><?php echo Language::t('Điều khoản sử dụng');?> | </a>
            <a href="#"><?php echo Language::t('Quyền riêng tư');?> | </a>
            <a href="#"><?php echo Language::t('Thắc mắc thường gặp:');?> | </a>
            <a href="<?php echo Yii::app()->createUrl('lien-he')?>"><?php echo Language::t('Liên hệ:');?></a>
        	<p><?php echo Language::t('Các thông tin trên kcbtn.vn chỉ là thông tin tham khảo, không dùng để chữa bệnh. Cần tham khảo ý kiến bác sĩ trong từng trường hợp cụ thể. kcbtn.vn không chịu trách nhiệm với các trường hợp tự ý sử dụng thông tin trên kcbtn.vn để chữa bệnh');?>.</p>
        </div>
    </div>
</div>
<div class="_footer-line"></div>
<!--end footer-->
</body>
</html>