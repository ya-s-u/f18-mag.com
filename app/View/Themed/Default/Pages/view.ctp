<div id="main" class="view">
	<div id="view">
		<p class="category"><span><?php echo $this->Common->category($article['Article']['category'])?></span></p>
		<h2><?php echo $article['Article']['title']?></h2>
		<ul id="slide">
			<span id="published"><?php echo date("Y/n/j" , strtotime($article['Article']['published']))?></span>
			<span id="next"><img src="img/arrow-r.png"></span>
			<span id="prev"><img src="img/arrow-l.png"></span>
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
<div class="container">
	<div class="tab tab1 tab-margin">
		<p class="title">その他の記事</p>
		<ul class="content">
			<?php foreach ($Articles as $key => $article) : ?>
			<li>
				<a href="/view?post=<?php echo $article['Article']['id']?>">
					<?php echo $this->Html->image('articles/large/img-'.$article['Article']['id'].'.jpg',array('class'=>'thumb'))?>
					<p><?php echo $this->Common->category($article['Article']['category'])?></p>
					<h3><?php echo $article['Article']['title']?></h3>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>