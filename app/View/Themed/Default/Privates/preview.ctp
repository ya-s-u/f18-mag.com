<!DOCTYPE html>
<!-- saved from url=(0023)http://dev.f18-mag.com/ -->
<html>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta http-equiv="expires" content="0">
	
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<meta name="copyright" content="Copyright freepaperDON">
	
	<meta name="description" content="名古屋がさらに魅力的に見えるWEBマガジン。さまざまなイベントのレポートや名古屋の名物・名所紹介に加え、フリーペーパーDONの出張企画があります。">
	<meta name="keywords" content="名古屋,名物,名所,イベント,フリーペーパーDON">
	<link rel="shortcut icon" href="img/favicon.ico">
	
	<title>#プライベート# 記事確認</title>
	
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
		<a href="//f18-mag.com"><img class="logo" src="../img/logo_text.png"></a>
	</div>
</div>

<div id="main" class="view">
	<div id="view">
		<p class="category"><span><?php echo $this->Common->category($article['Article']['category'])?></span></p>
		<h2><?php echo $article['Article']['title']?></h2>
		<ul id="slide">
			<span id="published"><?php echo date("Y/n/j" , strtotime($article['Article']['published']))?></span>
			<span id="next"><img src="../img/arrow-r.png"></span>
			<span id="prev"><img src="../img/arrow-l.png"></span>
			<?php foreach ($Photos as $photo) : ?>
			<li>
				<?php echo $this->Html->image('photos/resized/img-'.$photo['Photo']['id'].'.jpg')?>
				<p class="text"><?php echo nl2br($photo['Photo']['comment'])?></p>
			</li>
			<?php endforeach; ?>
		</ul>	
		<ul id="thumb">
			<?php foreach ($Photos as $photo) : ?>
			<li><?php echo $this->Html->image('photos/thumb/img-'.$photo['Photo']['id'].'.jpg')?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
<div class="container">
	<div class="tab tab1-2 tab-margin">
		<p class="title">掲載情報</p>
		<div class="content">
			<div class="top">
				<?php echo $this->Html->image('informations/resized/img-'.$article['Article']['id'].'.jpg',array('class'=>'pict'))?>
				<h3><?php echo $article['Article']['info_name']?></h3>
				<p><?php
				if(preg_match('/http.+/',$article['Article']['info_url'])) {
					echo '<a href="'.$article['Article']['info_url'].'" target="_blank">'.$article['Article']['info_url'].'</a>';
				} else {
					echo $article['Article']['info_url'];
				}
			?></p>
			<p><?php echo $article['Article']['info_mail']?></p>
			</div>
			<p class="comment"><?php echo nl2br($article['Article']['info_comment'])?></p>
		</div>
	</div>
	<div class="tab tab1-4 tab-margin">
		<p class="title">
		<?php if($article['Writer']['username'] != $article['Cameraman']['username']) echo 'ライター';else echo 'ライター/カメラマン'?>
		</p>
		<div class="content">
			<div class="top">
				<?php echo $this->Html->image('users/resized/img-'.$article['Writer']['id'].'.jpg',array('class'=>'pict'))?>
				<h3><?php echo $article['Writer']['username']?></h3>
				<p><?php
					if(($article['Writer']['fb_link']!=null) && ($article['Writer']['tw_link']==null)) {
						echo '<a href="https://www.facebook.com/'.$article['Writer']['fb_link'].'" target="_blank">Facebook</a>';
					} else if(($article['Writer']['fb_link']==null) && ($article['Writer']['tw_link']!=null)) {
						echo '<a href="https://www.twitter.com/'.$article['Writer']['tw_link'].'" target="_blank">Twitter</a>';
					} else if(($article['Writer']['fb_link']!=null) && ($article['Writer']['tw_link']!=null)) {
						echo '<a href="https://www.facebook.com/'.$article['Writer']['fb_link'].'" target="_blank">Facebook</a><br /><a href="https://www.twitter.com/'.$article['Writer']['tw_link'].'" target="_blank">Twitter</a>';
					}
				?></p>
			</div>
			<p class="comment"><?php echo $article['Writer']['comment']?></p>
		</div>
	</div>
	<?php if($article['Writer']['username'] != $article['Cameraman']['username']) :?>
	<div class="tab tab1-4">
		<p class="title">カメラマン</p>
		<div class="content">
			<div class="top">
				<?php echo $this->Html->image('users/resized/img-'.$article['Cameraman']['id'].'.jpg',array('class'=>'pict'))?>
				<h3><?php echo $article['Cameraman']['username']?></h3>
				<p><?php
					if(($article['Cameraman']['fb_link']!=null) && ($article['Cameraman']['tw_link']==null)) {
						echo '<a href="https://www.facebook.com/'.$article['Cameraman']['fb_link'].'" target="_blank">Facebook</a>';
					} else if(($article['Cameraman']['fb_link']==null) && ($article['Cameraman']['tw_link']!=null)) {
						echo '<a href="https://www.twitter.com/'.$article['Cameraman']['tw_link'].'" target="_blank">Twitter</a>';
					} else if(($article['Cameraman']['fb_link']!=null) && ($article['Cameraman']['tw_link']!=null)) {
						echo '<a href="https://www.facebook.com/'.$article['Cameraman']['fb_link'].'" target="_blank">Facebook</a><br /><a href="https://www.twitter.com/'.$article['Cameraman']['tw_link'].'" target="_blank">Twitter</a>';
					}
				?></p>
			</div>
			<p class="comment"><?php echo $article['Cameraman']['comment']?></p>
		</div>
	</div>
	<?php endif?>
</div>

<div id="footer">
	<div class="container">
		<a href="//f18-mag.com"><img class="logo" src="../img/logo_text.png"></a>
		<p>Copyright (C)2014 F1.8magazine All Rights Reserved.</p>
	</div>
</div>
</body>
</html>