<div id="main" class="view">
	<div id="view">
		<p class="category">
			<span id="text"><?php echo $this->Common->category($article['Article']['category'])?></span>
			<span id="published"><?php echo date("Y/n/j" , strtotime($article['Article']['published']))?></span>	
		</p>
		<h2><?php echo $article['Article']['title']?></h2>
		<div id="viewport">
			<ul id="slide">
				<?php foreach ($Photos as $photo) : ?>
				<li>
					<?php echo $this->Html->image('photos/resized/img-'.$photo['Photo']['id'].'.jpg')?>
					<p class="text"><?php echo nl2br($photo['Photo']['comment'])?></p>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<ul id="thumb">
			<?php foreach ($Photos as $key => $photo) : ?>
			<li <?php if($key==0) echo 'class="active"'?>><?php echo $this->Html->image('photos/thumb/img-'.$photo['Photo']['id'].'.jpg')?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
<div class="view container">
	<div class="tab tab2">
		<p class="title">掲載情報</p>
		<div class="content">
			<div class="top">
				<?php echo $this->Html->image('informations/resized/img-'.$article['Article']['id'].'.jpg',array('class'=>'pict'))?>
				<h3><?php echo $article['Article']['info_name']?></h3>
				<div>
					<?php
					if(preg_match('/http.+/',$article['Article']['info_url'])) {
						echo '<a href="'.$article['Article']['info_url'].'" target="_blank">'.$article['Article']['info_url'].'</a>';
					} else {
						echo $article['Article']['info_url'];
					}
					?>
					<p><?php echo $article['Article']['info_mail']?></p>
				</div>
			</div>
			<p class="comment"><?php echo nl2br($article['Article']['info_comment'])?></p>
		</div>
	</div>
</div>
<div class="view container user">
	<div class="tab tab1 r-margin">
		<p class="title">
		<?php if($article['Writer']['username'] != $article['Cameraman']['username']) echo 'ライター';else echo 'ライター/カメラマン'?>
		</p>
		<div class="content">
			<div class="top">
				<?php echo $this->Html->image('users/resized/img-'.$article['Writer']['id'].'.jpg',array('class'=>'pict'))?>
				<h3><?php echo $article['Writer']['username']?></h3>
				<?php
					if(($article['Writer']['fb_link']!=null) && ($article['Writer']['tw_link']==null)) {
						echo '<a href="https://www.facebook.com/'.$article['Writer']['fb_link'].'" target="_blank">Facebook</a>';
					} else if(($article['Writer']['fb_link']==null) && ($article['Writer']['tw_link']!=null)) {
						echo '<a href="https://www.twitter.com/'.$article['Writer']['tw_link'].'" target="_blank">Twitter</a>';
					} else if(($article['Writer']['fb_link']!=null) && ($article['Writer']['tw_link']!=null)) {
						echo '<a href="https://www.facebook.com/'.$article['Writer']['fb_link'].'" target="_blank">Facebook</a><br /><a href="https://www.twitter.com/'.$article['Writer']['tw_link'].'" target="_blank">Twitter</a>';
					}
				?>
			</div>
		</div>
	</div>
	<?php if($article['Writer']['username'] != $article['Cameraman']['username']) :?>
	<div class="tab tab1">
		<p class="title">カメラマン</p>
		<div class="content">
			<div class="top">
				<?php echo $this->Html->image('users/resized/img-'.$article['Cameraman']['id'].'.jpg',array('class'=>'pict'))?>
				<h3><?php echo $article['Cameraman']['username']?></h3>
				<?php
					if(($article['Cameraman']['fb_link']!=null) && ($article['Cameraman']['tw_link']==null)) {
						echo '<a href="https://www.facebook.com/'.$article['Cameraman']['fb_link'].'" target="_blank">Facebook</a>';
					} else if(($article['Cameraman']['fb_link']==null) && ($article['Cameraman']['tw_link']!=null)) {
						echo '<a href="https://www.twitter.com/'.$article['Cameraman']['tw_link'].'" target="_blank">Twitter</a>';
					} else if(($article['Cameraman']['fb_link']!=null) && ($article['Cameraman']['tw_link']!=null)) {
						echo '<a href="https://www.facebook.com/'.$article['Cameraman']['fb_link'].'" target="_blank">Facebook</a><br /><a href="https://www.twitter.com/'.$article['Cameraman']['tw_link'].'" target="_blank">Twitter</a>';
					}
				?>
			</div>
		</div>
	</div>
	<?php endif?>
</div>
<div class="view container">
	<div id="others" class="tab tab2">
		<p class="title">その他の記事</p>
		<ul class="content">
			<?php foreach ($Articles as $key => $article) : ?>
			<li>
				<a href="/view?post=<?php echo $article['Article']['id']?>">
					<?php echo $this->Html->image('articles/medium/img-'.$article['Article']['id'].'.jpg',array('class'=>'thumb'))?>
					<p><?php echo $this->Common->category($article['Article']['category'])?></p>
					<h3><?php echo $article['Article']['title']?></h3>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<script>
$(function(){
	var $pointer = $('ul#thumb li');
	var flipsnap = Flipsnap('ul#slide', {
	    distance: 300
	});
	
	var point=0;
	var flexible = $('ul#slide li').eq(0).height();
	$('ul#slide').height(flexible);
	
	$('ul#thumb li').click(function() {
	    point = $('ul#thumb li').index(this);
	    flipsnap.moveToPoint(point);
	    var flexible = $('ul#slide li').eq(point).height();
	    $('ul#slide').height(flexible);
	});
	
	flipsnap.element.addEventListener('fspointmove', function() {
	    $pointer.filter('.active').removeClass('active');
	    $pointer.eq(flipsnap.currentPoint).addClass('active');
	    
	}, false);
	
	flipsnap.element.addEventListener('fstouchend', function(ev) {
	    if(ev.originalPoint < ev.newPoint) point++;
	    if(ev.originalPoint > ev.newPoint) point--;
	    var flexible = $('ul#slide li').eq(point).height();
		$('ul#slide').height(flexible);
	}, false);
});
</script>