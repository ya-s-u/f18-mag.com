<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>出稿ボード</h2>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
					  	<table id="board" class="table table-striped">
					  		<thead>
					  			<tr style="background:#999">
									<th>原稿中</th>
								</tr>
					  		</thead>
					  		<tbody>
								<?php foreach ($Articles_0 as $article) : ?>
								<tr>
									<td><?php
											if(file_exists('img/articles/large/img-'.$article['Article']['id'].'.jpg')) {
												echo $this->Html->image('articles/large/img-'.$article['Article']['id'].'.jpg',array('class'=>'thumbnail'));
											} else {
												echo $this->Html->image('no_img.png',array('class'=>'thumbnail'));
											}
										?>
										<?php echo $article['Article']['title']?><br />
										<span class="glyphicon glyphicon-user"></span><?php echo $article['Writer']['username']?>　<span class="glyphicon glyphicon-time"></span><?php echo $this->Common->convert_to_fuzzy_time($article['Article']['modified'])?>
										<?php
										$id = pow((int)$article['Article']['id']*1993/10+3,2);
										echo '<a href="/privates/preview?post='.$id.'" target="_blank">preview</a>';
										?>
									</td>
								</tr>
								<?php endforeach; ?>
					  		</tbody>
						</table>
					</div>
					<div class="col-md-3">
					  	<table id="board" class="table table-striped">
					  		<thead>
					  			<tr style="background:#428bca">
									<th>原稿完了、校正待ち</th>
								</tr>
					  		</thead>
					  		<tbody>
								<?php foreach ($Articles_1 as $article) : ?>
								<tr>
									<td><?php
											if(file_exists('img/articles/large/img-'.$article['Article']['id'].'.jpg')) {
												echo $this->Html->image('articles/large/img-'.$article['Article']['id'].'.jpg',array('class'=>'thumbnail'));
											} else {
												echo $this->Html->image('no_img.png',array('class'=>'thumbnail'));
											}
										?>
										<?php echo $article['Article']['title']?><br />
										<span class="glyphicon glyphicon-user"></span><?php echo $article['Writer']['username']?>　<span class="glyphicon glyphicon-time"></span><?php echo $this->Common->convert_to_fuzzy_time($article['Article']['modified'])?>
										<?php
										$id = pow((int)$article['Article']['id']*1993/10+3,2);
										echo '<a href="/privates/preview?post='.$id.'" target="_blank">preview</a>';
										?>
									</td>
								</tr>
								<?php endforeach; ?>
					  		</tbody>
						</table>
					</div>
					<div class="col-md-3">
					  	<table id="board" class="table table-striped">
					  		<thead>
					  			<tr style="background:#5cb85c">
									<th>校正完了、ストック</th>
								</tr>
					  		</thead>
					  		<tbody>
								<?php foreach ($Articles_2 as $article) : ?>
								<tr>
									<td><?php
											if(file_exists('img/articles/large/img-'.$article['Article']['id'].'.jpg')) {
												echo $this->Html->image('articles/large/img-'.$article['Article']['id'].'.jpg',array('class'=>'thumbnail'));
											} else {
												echo $this->Html->image('no_img.png',array('class'=>'thumbnail'));
											}
										?>
										<?php echo $article['Article']['title']?><br />
										<span class="glyphicon glyphicon-user"></span><?php echo $article['Writer']['username']?>　<span class="glyphicon glyphicon-time"></span><?php echo $this->Common->convert_to_fuzzy_time($article['Article']['modified'])?>
										<?php
										$id = pow((int)$article['Article']['id']*1993/10+3,2);
										echo '<a href="/privates/preview?post='.$id.'" target="_blank">preview</a>';
										?>
									</td>
								</tr>
								<?php endforeach; ?>
					  		</tbody>
						</table>
					</div>
					<div class="col-md-3">
					  	<table id="board" class="table table-striped">
					  		<thead>
					  			<tr class="warning">
									<th>公開予約済み</th>
								</tr>
					  		</thead>
					  		<tbody>
								<?php foreach ($Articles_3 as $article) : ?>
								<tr>
									<td><?php
											if(file_exists('img/articles/large/img-'.$article['Article']['id'].'.jpg')) {
												echo $this->Html->image('articles/large/img-'.$article['Article']['id'].'.jpg',array('class'=>'thumbnail'));
											} else {
												echo $this->Html->image('no_img.png',array('class'=>'thumbnail'));
											}
										?>
										<?php echo $article['Article']['title']?><br />
										<span class="glyphicon glyphicon-user"></span><?php echo $article['Writer']['username']?>　<span class="glyphicon glyphicon-time"></span><?php echo $this->Common->convert_to_fuzzy_time($article['Article']['modified'])?>
										<?php
										$id = pow((int)$article['Article']['id']*1993/10+3,2);
										echo '<a href="/privates/preview?post='.$id.'" target="_blank">preview</a>';
										?>
									</td>
								</tr>
								<?php endforeach; ?>
					  		</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>