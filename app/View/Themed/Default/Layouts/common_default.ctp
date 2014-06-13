<!DOCTYPE html>
<!-- For Desktop Pages -->
<html>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW,NOARCHIVE">
	
	<meta http-equiv="expires" content="0">
	
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<meta name="copyright" content="Copyright freepaperDON">
	
	<meta name="description" content="名古屋がさらに魅力的に見えるWEBマガジン。さまざまなイベントのレポートや名古屋の名物・名所紹介に加え、フリーペーパーDONの出張企画があります。">
	<meta name="keywords" content="名古屋,名物,名所,イベント,フリーペーパーDON">
	
	<meta property="og:title" content="F1.8 magazine">
	<meta property="og:description" content="名古屋がさらに魅力的に見えるWEBマガジン。さまざまなイベントのレポートや名古屋の名物・名所紹介に加え、フリーペーパーDONの出張企画があります。">
	<meta property="og:url" content="http://f18-mag.com">
	<meta property="og:image" content="http://f18-mag.com/img/ogp.png">
	
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@F18mag">
	<meta name="twitter:title" content="F1.8magazine">
	<meta name="twitter:description" content="名古屋がさらに魅力的に見えるWEBマガジン。さまざまなイベントのレポートや名古屋の名物・名所紹介に加え、フリーペーパーDONの出張企画があります。">
	<meta name="twitter:creator" content="@F18mag">
	<meta name="twitter:image:src" content="http://f18-mag.com/img/ogp.png">
	<meta name="twitter:domain" content="http://f18-mag.com">
	<meta name="twitter:app:name:iphone" content="">
	<meta name="twitter:app:name:ipad" content="">
	<meta name="twitter:app:name:googleplay" content="">
	<meta name="twitter:app:url:iphone" content="">
	<meta name="twitter:app:url:ipad" content="">
	<meta name="twitter:app:url:googleplay" content="">
	<meta name="twitter:app:id:iphone" content="">
	<meta name="twitter:app:id:ipad" content="">
	<meta name="twitter:app:id:googleplay" content="">
	
	<link rel="shortcut icon" href="img/favicon.ico">
	
	<title>#開発環境# F1.8 magazine</title>
	
	<?php
		echo $this->fetch('meta');
		echo $this->fetch('script');
		echo $this->fetch('css');
		
		echo $this->html->script('jquery-2.1.0.min');
		echo $this->html->script('html5media.min');
		echo $this->html->script('slide');
	
		echo $this->Html->css('pc');
	?>

</head>
<body>
<div id="header">
	<div class="container">
		<?php echo $this->Html->link($this->Html->image('logo_text.png',array('class'=>'logo')),'/',array('escape' => false));?>
		<ul class="menu">
			<li><a href="/about">F1.8とは</a></li>
			<li><a href="/writer">ライター</a></li>
			<li><a href="/contact">お問い合わせ</a></li>
		</ul>
		<div id="sns">
			<iframe id="fb" src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Ff1.8magazine&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
			<a href="https://twitter.com/share" class="twitter-share-button" data-via="F18mag" data-lang="ja"  data-url="http://f18-mag.com">ツイート</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.async = true;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		</div>
	</div>
</div>
<?php echo $this->fetch('content'); ?>
<div id="footer">
	<div class="container">
		<?php echo $this->Html->link($this->Html->image('logo_text.png',array('class'=>'logo')),'/',array('escape' => false));?>
		<p>Copyright (C)2014 F1.8magazine All Rights Reserved.</p>
	</div>
</div>
</body>
</html>