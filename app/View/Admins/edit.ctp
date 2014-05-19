<div id="edit" class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>記事情報</h2>
			</div>
			<div class="panel-body">
				<span class="label label-<?php echo $this->Common->status_css($article['Article']['status'])?>" style="font-size:24px;"><?php echo $this->Common->status($article['Article']['status'])?></span>
			</div>
			<ul class="list-group">
			    <li class="list-group-item">
					<label>作成日　</label> <?php echo date("Y/n/j H:i" , strtotime($article['Article']['created']))?><br />
					<label>最終変更</label> <?php echo $this->Common->convert_to_fuzzy_time($article['Article']['modified'])?>
			    </li>
			</ul>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>サムネイル</h2>
			</div>
			<div class="panel-body">
				<fieldset>
					<div class="form-group">
						<div class="col-lg-10 thumb">
							<?php echo $this->Html->image('articles/large/img-'.$article_id.'.jpg?xxxxx',array('class'=>'thumbnail','style'=>'height:120px;float:left;'))?>
							<?php echo $this->Html->image('articles/medium/img-'.$article_id.'.jpg?xxxxx',array('class'=>'thumbnail','style'=>'height:120px;float:left;'))?>
							<?php echo $this->Html->image('articles/small/img-'.$article_id.'.jpg?xxxxx',array('class'=>'thumbnail','style'=>'height:120px;float:left;'))?>
							
						</div>
					</div>
				</fieldset>
			</div>
			<ul class="list-group">
			    <li class="list-group-item">
					<a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#CropLargeModal">トリミング(大)</a>
					<a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#CropMediumModal">トリミング(中)</a>
					<a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#CropSmallModal">トリミング(小)</a>
			    </li>
			    <li class="list-group-item">
					<?php echo $this->Form->create('Admin',array('url'=>'/admins/upload_img_article/'.$article_id,'class'=>'upfile1 form-horizontal','enctype'=>'multipart/form-data','style'=>'display:inline')); ?>
			    	<script>
					$(function () {
						$("#upfile1").change(function () {
							$(this).closest("form.upfile1").submit();
						});
					});
					</script>
					<a class="up btn btn-primary btn-sm">画像を変更<?php echo $this->Form->input('upfile1',array('type'=>'file','name'=>'upfile1','class'=>'form-control','id'=>'upfile1','label'=>false)); ?></a>
			    </li>
			  </ul>
			  <?php echo $this->Form->end(); ?>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>追加情報</h2>
			</div>
			<div class="panel-body">
				<fieldset>
					<div class="form-group" style="margin:0;">
				    	<label for="exampleInputEmail1">画像</label>
						<?php echo $this->Html->image('informations/resized/img-'.$article_id.'.jpg?xxxxx',array('class'=>'thumbnail','style'=>'height:120px;'))?>
				  	</div>
				 </fieldset>
			</div>
			<ul class="list-group">
			    <li class="list-group-item">
					<?php echo $this->Form->create('Admin',array('url'=>'/admins/upload_img_info/'.$article_id,'class'=>'upfile2 form','enctype'=>'multipart/form-data','style'=>'display:inline')); ?>
					<script>
						$(function () {
							$("#upfile2").change(function () {
								$(this).closest("form.upfile2").submit();
							});
						});
						</script>
			    	<a class="up btn btn-primary btn-sm">画像を変更<?php echo $this->Form->input('upfile2',array('type'=>'file','name'=>'upfile2','class'=>'form-control','id'=>'upfile2','label'=>false)); ?></a>
					<?php echo $this->Form->end(); ?>
			    </li>
			</ul>
			<div class="panel-body">
				<fieldset>
					<?php echo $this->Form->create('Article',array('class'=>'form')); ?>
					<div class="form-group">
				    	<label for="exampleInputEmail1">タイトル</label>
						<?php echo $this->Form->input('info_name',array('class'=>'form-control','label'=>false)); ?>
				  	</div>
					<div class="form-group">
				    	<label for="exampleInputEmail1">URL</label>
						<?php echo $this->Form->input('info_url',array('class'=>'form-control','label'=>false)); ?>
				  	</div>
					<div class="form-group">
				    	<label for="exampleInputEmail1">連絡先</label>
						<?php echo $this->Form->input('info_mail',array('class'=>'form-control','label'=>false)); ?>
				  	</div>
					<div class="form-group">
				    	<label for="exampleInputEmail1">紹介文</label>
						<?php echo $this->Form->textarea('info_comment',array('rows'=>8,'class'=>'form-control','label'=>false)); ?>
				  	</div>
				</fieldset>
			</div>
			<ul class="list-group">
			    <li class="list-group-item">
			    	<?php echo $this->Form->submit('変更する',array('class'=>'btn btn-primary btn-sm')); ?>
			    </li>
			</ul>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>基本情報</h2>
			</div>
			<div class="panel-body">
				<fieldset>
					<?php echo $this->Form->create('Article',array('class'=>'form')); ?>
					<div class="form-group">
				    	<label for="exampleInputEmail1">記事タイトル</label>
				    	<?php echo $this->Form->input('title',array('class'=>'form-control','label'=>false)); ?>
				  	</div>
					<div class="form-group">
				    	<label for="exampleInputEmail1" style="display:block;">カテゴリー</label>
						<?php echo $this->Form->radio('category',array('report'=>'イベントレポ','majiaho'=>'マジアホ','interview'=>'インタビュー','sightseeing'=>'名物・名所'),array('class'=>'radio-inline','label'=>false,'legend'=>false)); ?>
				  	</div>
					<div class="form-group">
				    	<label for="exampleInputEmail1">ライター</label>
				    	<?php
				    		$writer_select = array();
				    		foreach($Writers as $writer) {
				    			$id = $writer['User']['id'];
				    			$name = $writer['User']['username'];
				    			$writer_select += array(
				    				$id => $name,
				    			);
				    		}
				    	?>
						<?php echo $this->Form->select('writer_id',$writer_select,array('type'=>'text','class'=>'form-control','label'=>false)); ?>
				  	</div>
					<div class="form-group">
				    	<label for="exampleInputEmail1">カメラマン</label>
						<?php echo $this->Form->select('camera_id',$writer_select,array('type'=>'text','class'=>'form-control','label'=>false)); ?>
				  	</div>
				</fieldset>
			</div>
			<ul class="list-group">
			    <li class="list-group-item">
			    	<?php echo $this->Form->submit('変更する',array('class'=>'btn btn-primary btn-sm')); ?>
			    </li>
			</ul>
			<?php echo $this->Form->end(); ?>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>記事編集</h2>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<div id="debugArea"></div>
				  	<table id="edit" class="table">
<script>
$(function(){	
	/*for (var i=0; i<$('table#edit tbody tr').length; i++) {
		$("table#edit tbody tr td input").eq(i).val(i+1);
	};*/
	
	/*$("table#edit").tableDnD({
		dragHandle: "table#edit tbody tr td.drug",
		onDrop: function() {
			for (var i=0; i<$('table#edit tbody tr').length; i++) {
        		$("table#edit tbody tr td input").eq(i).val(i+1);
			}
    	}
	});*/
});
</script>
				  		<tbody>
				  		<?php //echo $this->Form->create('Align',array('url'=>'/admins/photo_align/'.$article_id,'class'=>'form')); ?>
				  			<?php foreach ($Photos as $key => $photo) : ?>
							<tr id="photo<?php echo ++$key?>">
								<td><?php echo $this->Html->image('photos/resized/img-'.$photo['Photo']['id'].'.jpg',array('class'=>'thumbnail','style'=>'width:200px;'))?></td>
								<td class="drug"><?php echo $photo['Photo']['comment']?></td>
								<td class="pencil" style="vertical-align:middle">
									<span data-toggle="modal" data-target="#EditPhotoModal<?php echo $photo['Photo']['id']?>" class="glyphicon glyphicon-pencil"></span>
									<?php //echo $this->Form->input('photo'.$key,array('default'=>$photo['Photo']['order'],'class'=>'form-control','label'=>false,'style'=>'padding:5px'))?>
									<?php //echo $this->Form->input('photo'.$key,array('class'=>'form-control','label'=>false))?>
									<?php echo $this->Html->link('delete','/admins/delete_photo/'.$photo['Photo']['id'],null,'really?')?>
								</td>
							</tr>
							<?php endforeach; ?>
				  		</tbody>
					</table>
				</div>
				<div class="form-group">
					<p class="btn btn-primary btn-block" data-toggle="modal" data-target="#AddPhotoModal">写真追加</p>
				</div>
			</div>
			<ul class="list-group">
			    <li class="list-group-item">
			    	<?php //echo $this->Form->submit('変更する',array('class'=>'btn btn-primary btn-sm')); ?>
						<?php //echo $this->Form->end(); ?>
			    </li>
			</ul>
		</div>
	</div>
	
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>記事操作</h2>
			</div>
			<div class="panel-body">
				<?php if($article['Article']['status']==0)echo $this->html->link("原稿完了、校正待ち",array('action'=>'article_set1',$article_id),array('class'=>'btn btn-danger btn-block','type'=>'button'),"間違いありませんか？");?>
				<?php if($article['Article']['status']==1 && $type==20)echo $this->html->link("校正完了、ストック",array('action'=>'article_set2',$article_id),array('class'=>'btn btn-danger btn-block','type'=>'button'),"間違いありませんか？");?>
				<?php if($article['Article']['status']==2 && $type==20) {
					echo $this->Form->create('Article',array('class'=>'form'));
					echo $this->Form->input('published', array('type' => 'datetime', 'label' => '掲載開始日', 'class'=>'input-small', 'dateFormat' => 'YMD', 'timeFormat' => '24', 'monthNames' => false, 'empty' => false, 'interval' => 15, 'minYear' => 2012));
					echo '<script>$(function(){$("input#exe").val(3);});</script>';
					echo $this->Form->input('status', array('id'=>'exe'));
			    	echo $this->Form->submit('投稿予約する',array('class'=>'btn btn-primary btn-sm'));
					echo $this->Form->end();
					}
				?>
				<?php if($article['Article']['status']==3 && $type==20) {
					echo $this->Form->create('Article',array('class'=>'form'));
					echo $this->Form->input('published', array('type' => 'datetime', 'label' => '掲載開始日', 'class'=>'input-small', 'dateFormat' => 'YMD', 'timeFormat' => '24', 'monthNames' => false, 'empty' => false, 'interval' => 15, 'minYear' => 2012));
			    	echo $this->Form->submit('予約変更する',array('class'=>'btn btn-primary btn-sm'));
					echo $this->Form->end();
					}
				?>
			</div>
		</div>
	</div>
</div>

<!-- Crop Modal -->
<div class="modal fade" id="CropLargeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<?php echo $this->Form->create('Admin',array('url'=>'/admins/crop_img_article/'.$article_id.'/large','class'=>'form-horizontal')); ?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">範囲を指定</h4>
			</div>
			<div class="modal-body">
				<script>
				$(function(){
					$('#crop_large').Jcrop({
						minSize: [750, 330],
						aspectRatio: 750 / 330,
						onChange: showCoords,
						onSelect: showCoords,
					});
				});
				
				function showCoords(c){
					jQuery('.x1').val(c.x);
					jQuery('.y1').val(c.y);
					jQuery('.w').val(c.w);
					jQuery('.h').val(c.h);
				};
				</script>
				<?php echo $this->Html->image('articles/original/img-'.$article_id.'.jpg',array('id'=>'crop_large','class'=>'thumbnail'))?>
				<?php echo $this->Form->hidden('x1',array('class'=>'form-contro x1')); ?>
				<?php echo $this->Form->hidden('y1',array('class'=>'form-control y1')); ?>
				<?php echo $this->Form->hidden('w',array('class'=>'form-control w')); ?>
				<?php echo $this->Form->hidden('h',array('class'=>'form-control h')); ?>
			</div>
			<div class="modal-footer">
				<?php echo $this->Form->submit('変更する',array('class'=>'btn btn-primary')); ?>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>

<!-- Crop Modal -->
<div class="modal fade" id="CropMediumModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<?php echo $this->Form->create('Admin',array('url'=>'/admins/crop_img_article/'.$article_id.'/medium','class'=>'form-horizontal')); ?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">範囲を指定</h4>
			</div>
			<div class="modal-body">
				<script>
				$(function(){
					$('#crop_medium').Jcrop({
						minSize: [498, 330],
						aspectRatio: 498 / 330,
						onChange: showCoords,
						onSelect: showCoords,
					});
				});
				</script>
				<?php echo $this->Html->image('articles/original/img-'.$article_id.'.jpg',array('id'=>'crop_medium','class'=>'thumbnail'))?>
				<?php echo $this->Form->hidden('x1',array('class'=>'form-control x1')); ?>
				<?php echo $this->Form->hidden('y1',array('class'=>'form-control y1')); ?>	
				<?php echo $this->Form->hidden('w',array('class'=>'form-control w')); ?>
				<?php echo $this->Form->hidden('h',array('class'=>'form-control h')); ?>
			</div>
			<div class="modal-footer">
				<?php echo $this->Form->submit('変更する',array('class'=>'btn btn-primary')); ?>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>

<!-- Crop Modal -->
<div class="modal fade" id="CropSmallModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<?php echo $this->Form->create('Admin',array('url'=>'/admins/crop_img_article/'.$article_id.'/small','class'=>'form-horizontal')); ?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">範囲を指定</h4>
			</div>
			<div class="modal-body">
				<script>
				$(function(){
					$('#crop_small').Jcrop({
						minSize: [246, 330],
						aspectRatio: 246 / 330,
						onChange: showCoords,
						onSelect: showCoords,
					});
				});
				</script>
				<?php echo $this->Html->image('articles/original/img-'.$article_id.'.jpg',array('id'=>'crop_small','class'=>'thumbnail'))?>
				<?php echo $this->Form->hidden('x1',array('class'=>'form-control x1')); ?>
				<?php echo $this->Form->hidden('y1',array('class'=>'form-control y1')); ?>
				<?php echo $this->Form->hidden('w',array('class'=>'form-control w')); ?>
				<?php echo $this->Form->hidden('h',array('class'=>'form-control h')); ?>	
			</div>
			<div class="modal-footer">
				<?php echo $this->Form->submit('変更する',array('class'=>'btn btn-primary')); ?>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="AddPhotoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">写真を追加</h4>
			</div>
			<div class="modal-body">
			
				<?php echo $this->Form->create('Photo',array('url'=>'/admins/add_photo/'.$article_id,'class'=>'form-horizontal','enctype'=>'multipart/form-data')); ?>
				<?php echo $this->Form->input('upfile',array('type'=>'file','name'=>'upfile','class'=>'form-control','id'=>'upfile','label'=>false)); ?>	
				<?php echo $this->Form->textarea('comment',array('class'=>'form-control','label'=>false,'rows'=>10)); ?>
			
			</div>
			<div class="modal-footer">
				<?php echo $this->Form->submit('追加する',array('class'=>'btn btn-primary')); ?>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>

<!-- Edit Modal -->
<?php foreach ($Photos as $key => $photo) : ?>
<div class="modal fade" id="EditPhotoModal<?php echo $photo['Photo']['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">記事を編集</h4></h4>
			</div>
			<div class="modal-body">
			<?php echo $this->Form->create('Photo',array('url'=>'/admins/edit_photo/'.$photo['Photo']['id'],'class'=>'form-horizontal','enctype'=>'multipart/form-data')); ?>
				<?php echo $this->Html->image('photos/resized/img-'.$photo['Photo']['id'].'.jpg',array('class'=>'thumbnail','style'=>'width:200px;'))?>
				<?php echo $this->Form->input('upfile',array('type'=>'file','name'=>'upfile','class'=>'form-control','id'=>'upfile','label'=>false)); ?>	
				<?php echo $this->Form->textarea('comment',array('rows'=>5,'class'=>'form-control','label'=>false,'default'=>$photo['Photo']['comment'])); ?>
			
			</div>
			<div class="modal-footer">
			<?php echo $this->Form->submit('変更する',array('class'=>'btn btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>