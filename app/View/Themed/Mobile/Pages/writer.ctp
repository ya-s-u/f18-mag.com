<div id="main">
	
	<ul id="writer">
		<h2>運営メンバー</h2>
			<li>
				<p id="position">編集長</p>
				<?php
				$key = 1;
				if(file_exists('img/users/resized/img-'.$Members[$key]['User']['id'].'.jpg')) {
					echo $this->Html->image('users/resized/img-'.$Members[$key]['User']['id'].'.jpg');
				} else {
					echo $this->Html->image('no_image.gif');
				}
				?>
				<div class="caption">
					<h3><?php echo $Members[$key]['User']['username']?></h3>
					<div class="link">
					<?php
						if(($Members[$key]['User']['fb_link']!=null) && ($Members[$key]['User']['tw_link']==null)) {
							echo '<a href="https://www.facebook.com/'.$Members[$key]['User']['fb_link'].'" target="_blank">Facebook</a>';
						} else if(($Members[$key]['User']['fb_link']==null) && ($Members[$key]['User']['tw_link']!=null)) {
							echo '<a href="https://www.twitter.com/'.$$Members[$key]['User']['tw_link'].'" target="_blank">Twitter</a>';
						} else if(($Members[$key]['User']['fb_link']!=null) && ($Members[$key]['User']['tw_link']!=null)) {
							echo '<a href="https://www.facebook.com/'.$Members[$key]['User']['fb_link'].'" target="_blank">Facebook</a> / <a href="https://www.twitter.com/'.$Members[$key]['User']['tw_link'].'" target="_blank">Twitter</a>';
						}
					?>
					</div>
					<p><?php echo $Members[$key]['User']['comment']?></p>
				</div>
			</li>
			<li>
				<p id="position">副編集長</p>
				<?php
				$key = 2;
				if(file_exists('img/users/resized/img-'.$Members[$key]['User']['id'].'.jpg')) {
					echo $this->Html->image('users/resized/img-'.$Members[$key]['User']['id'].'.jpg');
				} else {
					echo $this->Html->image('no_image.gif');
				}
				?>
				<div class="caption">
					<h3><?php echo $Members[$key]['User']['username']?></h3>
					<div class="link">
					<?php
						if(($Members[$key]['User']['fb_link']!=null) && ($Members[$key]['User']['tw_link']==null)) {
							echo '<a href="https://www.facebook.com/'.$Members[$key]['User']['fb_link'].'" target="_blank">Facebook</a>';
						} else if(($Members[$key]['User']['fb_link']==null) && ($Members[$key]['User']['tw_link']!=null)) {
							echo '<a href="https://www.twitter.com/'.$$Members[$key]['User']['tw_link'].'" target="_blank">Twitter</a>';
						} else if(($Members[$key]['User']['fb_link']!=null) && ($Members[$key]['User']['tw_link']!=null)) {
							echo '<a href="https://www.facebook.com/'.$Members[$key]['User']['fb_link'].'" target="_blank">Facebook</a> / <a href="https://www.twitter.com/'.$Members[$key]['User']['tw_link'].'" target="_blank">Twitter</a>';
						}
					?>
					</div>
					<p><?php echo $Members[$key]['User']['comment']?></p>
				</div>
			</li>
			<li>
				<p id="position">デザイン</p>
				<?php
				$key = 3;
				if(file_exists('img/users/resized/img-'.$Members[$key]['User']['id'].'.jpg')) {
					echo $this->Html->image('users/resized/img-'.$Members[$key]['User']['id'].'.jpg');
				} else {
					echo $this->Html->image('no_image.gif');
				}
				?>
				<div class="caption">
					<h3><?php echo $Members[$key]['User']['username']?></h3>
					<div class="link">
					<?php
						if(($Members[$key]['User']['fb_link']!=null) && ($Members[$key]['User']['tw_link']==null)) {
							echo '<a href="https://www.facebook.com/'.$Members[$key]['User']['fb_link'].'" target="_blank">Facebook</a>';
						} else if(($Members[$key]['User']['fb_link']==null) && ($Members[$key]['User']['tw_link']!=null)) {
							echo '<a href="https://www.twitter.com/'.$$Members[$key]['User']['tw_link'].'" target="_blank">Twitter</a>';
						} else if(($Members[$key]['User']['fb_link']!=null) && ($Members[$key]['User']['tw_link']!=null)) {
							echo '<a href="https://www.facebook.com/'.$Members[$key]['User']['fb_link'].'" target="_blank">Facebook</a> / <a href="https://www.twitter.com/'.$Members[$key]['User']['tw_link'].'" target="_blank">Twitter</a>';
						}
					?>
					</div>
					<p><?php echo $Members[$key]['User']['comment']?></p>
				</div>
			</li>
			<li>
				<p id="position">開発</p>
				<?php
				$key = 0;
				if(file_exists('img/users/resized/img-'.$Members[$key]['User']['id'].'.jpg')) {
					echo $this->Html->image('users/resized/img-'.$Members[$key]['User']['id'].'.jpg');
				} else {
					echo $this->Html->image('no_image.gif');
				}
				?>
				<div class="caption">
					<h3><?php echo $Members[$key]['User']['username']?></h3>
					<div class="link">
					<?php
						if(($Members[$key]['User']['fb_link']!=null) && ($Members[$key]['User']['tw_link']==null)) {
							echo '<a href="https://www.facebook.com/'.$Members[$key]['User']['fb_link'].'" target="_blank">Facebook</a>';
						} else if(($Members[$key]['User']['fb_link']==null) && ($Members[$key]['User']['tw_link']!=null)) {
							echo '<a href="https://www.twitter.com/'.$$Members[$key]['User']['tw_link'].'" target="_blank">Twitter</a>';
						} else if(($Members[$key]['User']['fb_link']!=null) && ($Members[$key]['User']['tw_link']!=null)) {
							echo '<a href="https://www.facebook.com/'.$Members[$key]['User']['fb_link'].'" target="_blank">Facebook</a> / <a href="https://www.twitter.com/'.$Members[$key]['User']['tw_link'].'" target="_blank">Twitter</a>';
						}
					?>
					</div>
					<p><?php echo $Members[$key]['User']['comment']?></p>
				</div>
			</li>
	</ul>
	<ul id="writer">
		<h2>ライターメンバー</h2>
		<?php foreach ($Writers as $writer) : ?>
			<li>
			<?php
				if(file_exists('img/users/resized/img-'.$writer['User']['id'].'.jpg')) {
					echo $this->Html->image('users/resized/img-'.$writer['User']['id'].'.jpg');
				} else {
					echo $this->Html->image('no_image.gif');
				}
				?>
				<div class="caption">
					<h3><?php echo $writer['User']['username']?></h3>
					<div class="link">
					<?php
						if(($writer['User']['fb_link']!=null) && ($writer['User']['tw_link']==null)) {
							echo '<a href="https://www.facebook.com/'.$writer['User']['fb_link'].'" target="_blank">Facebook</a>';
						} else if(($writer['User']['fb_link']==null) && ($writer['User']['tw_link']!=null)) {
							echo '<a href="https://www.twitter.com/'.$writer['User']['tw_link'].'" target="_blank">Twitter</a>';
						} else if(($writer['User']['fb_link']!=null) && ($writer['User']['tw_link']!=null)) {
							echo '<a href="https://www.facebook.com/'.$writer['User']['fb_link'].'" target="_blank">Facebook</a> / <a href="https://www.twitter.com/'.$writer['User']['tw_link'].'" target="_blank">Twitter</a>';
						}
					?>
					</div>
					<p><?php echo $writer['User']['comment']?></p>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</div>