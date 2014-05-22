<!DOCTYPE html>
<!-- For Mobile Pages -->
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=320,user-scalable=yes">
	
	
	<meta http-equiv="expires" content="0">
	
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<meta name="copyright" content="Copyright freepaperDON">
	
	<meta name="description" content="名古屋がさらに魅力的に見えるWEBマガジン。さまざまなイベントのレポートや名古屋の名物・名所紹介に加え、フリーペーパーDONの出張企画があります。">
	<meta name="keywords" content="名古屋,名物,名所,イベント,フリーペーパーDON">
	
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
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

	<title>F1.8 magazine</title>
		

	<?php
		echo $this->fetch('meta');
		echo $this->fetch('script');
		echo $this->fetch('css');
		
		echo $this->html->script('jquery-2.1.0.min');
		echo $this->html->script('html5media.min');
		echo $this->html->script('jquery.flipsnap.min');
	
		echo $this->Html->css('sp');
	?>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-48276900-1', 'f18-mag.com');
	  ga('send', 'pageview');
	
	</script>

</head>
<body>
<div id="header">
	<a href="/"><img class="logo" src="img/logo_text.png"></a>
	<ul class="menu">
		<li><a href="/about">F1.8とは</a></li>
		<li><a href="/writer">ライター</a></li>
		<li><a href="">お問い合わせ</a></li>
	</ul>
</div>
<?php echo $this->fetch('content'); ?>
<div id="foot_sns">
		<iframe id="fb" src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Ff1.8magazine&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
		<a href="https://twitter.com/share" class="twitter-share-button" data-via="F18mag" data-lang="ja"  data-url="http://f18-mag.com">ツイート</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.async = true;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	</div>
<div id="footer">
	<div class="container">
		<p>Copyright (C)2014 F1.8magazine All Rights Reserved.</p>
	</div>
</div>
</body>
</html>