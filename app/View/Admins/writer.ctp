<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>ライター一覧</h2>
			</div>
			<div class="panel-body">
				<table id="" class="table table-striped">
			  		<thead>
			  			<tr class="warning">
			  				<th></th>
							<th>名前</th>
							<th>コメント</th>
							<th>最終ログイン</th>
						</tr>
			  		</thead>
			  		<tbody>
			  			<?php foreach ($Writers as $writer) : ?>
						<tr>
							<td>
							<?php
							if(file_exists('img/users/resized/img-'.$writer['User']['id'].'.jpg')) {
								echo $this->Html->image('users/resized/img-'.$writer['User']['id'].'.jpg',array('width'=>40));
							} else {
								echo $this->Html->image('no_image.gif',array('width'=>40));
							}
							?>
							</td>
							<td><?php echo $writer['User']['username']?></td>
							<td><?php echo $writer['User']['comment']?></td>
							<td><?php echo $this->Common->convert_to_fuzzy_time($writer['User']['last_login'])?></td>
						</tr>
						<?php endforeach; ?>
			  		</tbody>
				</table>
			</div>
		</div>
	</div>
</div>