<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>記事一覧</h2>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="" class="table table-striped">
				  		<thead>
				  			<tr class="warning">
								<th>状態</th>
								<th>タイトル</th>
								<th>コメント</th>
								<th>ライター</th>
								<th>作成</th>
								<th>最終更新</th>
							</tr>
				  		</thead>
				  		<tbody>
				  			<?php foreach ($Articles as $article) : ?>
							<tr>
								<td><span class="label label-<?php echo $this->Common->status_css($article['Article']['status'])?>"><?php echo $this->Common->status($article['Article']['status'])?></span></td>
								<td><?php echo $article['Article']['title']?> 
								<?php if($article['Article']['status']!=4 && ($article['Article']['writer_id']==$id || $type=20)) echo '<a href="/admins/edit/'.$article['Article']['id'].'">edit</a>'?> 
								<?php //if($type=20) echo $this->Html->link('delete','/admins/delete_article/'.$article['Article']['id'],null,'really?')?>
								</td>
								<td><?php echo $this->Common->category($article['Article']['category'])?></td>
								<td><?php echo $article['Writer']['username']?></td>
								<td><?php echo $this->Common->convert_to_fuzzy_time($article['Article']['modified'])?></td>
								<td></td>
							</tr>
							<?php endforeach; ?>
				  		</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>