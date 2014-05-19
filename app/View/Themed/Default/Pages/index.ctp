<img id="subtitle" src="img/logo_subtitle.png">
<div id="main">
	<ul id="top">
		<?php foreach ($Articles as $key => $article) {
			$max = count($Articles);
			if($key%5==0) {
				$tab_num[$key] = 3;
				$size[$key] = 'large';
			} else if($key%5==4) {
				$tab_num[$key] = 2;
				$size[$key] = 'medium';
			} else {
				$tab_num[$key] = 1;
				$size[$key] = 'small';
			}
			if($max%5 == 1) {
				if($max-$key == 1) {
					$tab_num[$key-3] = 1;
					$size[$key-3] = 'small';
					$tab_num[$key-2] = 3;
					$size[$key-2] = 'large';
					$tab_num[$key-1] = 3;
					$size[$key-1] = 'large';
					$tab_num[$key] = 1;
					$size[$key] = 'small';
				}
			}
			if($max%5 == 3) {
				if($max-$key == 1) {
					$tab_num[$key-2] = '2 margin';
					$size[$key-2] = 'medium';
					$tab_num[$key-1] = 1;
					$size[$key-1] = 'small';
					$tab_num[$key] = 1;
					$size[$key] = 'small';
				}
			}
			if($max%5 == 4) {
				if($max-$key == 1) {
					$tab_num[$key] = 3;
					$size[$key] = 'large';
				}
			}
		}
		?>
		<?php foreach ($Articles as $key => $article) : ?>
		<li class="tab<?php echo $tab_num[$key]?>">
			<a href="view?post=<?php echo $article['Article']['id']?>">
				<?php echo $this->Html->image('articles/'.$size[$key].'/img-'.$article['Article']['id'].'.jpg',array('class'=>'thumb'))?>
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