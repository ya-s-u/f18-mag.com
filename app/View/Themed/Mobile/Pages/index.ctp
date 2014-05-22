<div id="main">
	<ul id="top">
		<?php foreach ($Articles as $key => $article) : ?>
		<li class="tab2">
			<a href="view?post=<?php echo $article['Article']['id']?>">
				<?php echo $this->Html->image('articles/small/img-'.$article['Article']['id'].'.jpg',array('class'=>'thumb'))?>
				<div class="sub">
					<p><?php echo $this->Common->Category($article['Article']['category'])?></p>
					<div><h2><?php echo $article['Article']['title']?></h2></div>
				</div>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
<!--<div class="container">
	<p id="more">もっと見る</p>
	date("Y/n/j H:i" , strtotime($article['Article']['created']))
</div>-->