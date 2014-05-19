<div class="row">
	<div class="col-md-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>記事編集</h2>
			</div>
			<div class="panel-body">
				<div class="panel-body">
				  <fieldset>
				   
				<?php echo $this->Form->create('Article',array('class'=>'form-horizontal')); ?>
				    <div class="form-group">
				      <label for="inputEmail" class="col-lg-2 control-label">記事タイトル</label>
				      <div class="col-lg-10">
				      	<?php echo $this->Form->input('title',array('class'=>'form-control','label'=>false)); ?>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="col-lg-2 control-label">カテゴリー</label>
				      <div class="col-lg-10">
				      	<?php echo $this->Form->radio('category',array('report'=>'イベントレポ','majiaho'=>'マジアホ','interview'=>'インタビュー','sightseeing'=>'名物・名所'),array('class'=>'radio-inline','label'=>false,'legend'=>false)); ?>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="col-lg-2 control-label">ライター</label>
				      <div class="col-lg-10">
				      	<?php echo $this->Form->input('writer_id',array('type'=>'text','class'=>'form-control','label'=>false)); ?>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="col-lg-2 control-label">カメラマン</label>
				      <div class="col-lg-10">
				      	<?php echo $this->Form->input('cameraman_id',array('type'=>'text','class'=>'form-control','label'=>false)); ?>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="textArea" class="col-lg-2 control-label">インフォタイトル</label>
				      <div class="col-lg-10">
				      	<?php echo $this->Form->input('info_name',array('class'=>'form-control','label'=>false)); ?>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="textArea" class="col-lg-2 control-label">インフォURL</label>
				      <div class="col-lg-10">
				      	<?php echo $this->Form->input('info_url',array('class'=>'form-control','label'=>false)); ?>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="textArea" class="col-lg-2 control-label">インフォアドレス</label>
				      <div class="col-lg-10">
				      	<?php echo $this->Form->input('info_mail',array('class'=>'form-control','label'=>false)); ?>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="textArea" class="col-lg-2 control-label">インフォ紹介文</label>
				      <div class="col-lg-10">
				      	<?php echo $this->Form->textarea('info_comment',array('rows'=>5,'class'=>'form-control','label'=>false)); ?>
				      </div>
				    </div>
				    <div class="form-group">
				      <div class="col-lg-10 col-lg-offset-2">
				        <?php echo $this->Form->submit('変更する',array('class'=>'btn btn-primary')); ?>
				      </div>
				    </div>
				  </fieldset>
				<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>


<script>
$(function(){
	$("table#edit").tableDnD({
		onDrop: function(table, row) {
        alert($.tableDnD.serialize());
    }
	});
});
</script>

	<div class="col-md-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>記事編集</h2>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
				  	<table id="edit" class="table table-striped">
				  		<thead>
				  			<tr class="warning" style="cursor: move;">
								<th>操作</th>
								<th>写真</th>
								<th>文章</th>
							</tr>
				  		</thead>
				  		<tbody>
				  			<?php $i=1?>
				  			<?php foreach ($Photos as $photo) : ?>
							<tr id="<?php echo $i++?>" style="cursor: move;">
								<td><span class="glyphicon glyphicon-align-justify"></span></td>
								<td><?php echo $this->Html->image('photos/resized/img-'.$photo['Photo']['id'].'.jpg')?></td>
								<td><?php echo $photo['Photo']['comment']?></td>
							</tr>
							<?php endforeach; ?>
				  		</tbody>
					</table>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">写真追加</button>
					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-lg">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title" id="myModalLabel">写真を追加</h4>
					      </div>
					      <div class="modal-body">
					      
					      	
					        
					      
			<?php echo $this->Form->create('Photo',array('url'=>'/admins/add_photo','class'=>'form-horizontal','enctype'=>'multipart/form-data')); ?>
						<?php echo $this->Form->input('upfile',array('type'=>'file','name'=>'upfile','class'=>'form-control','id'=>'upfile','label'=>false)); ?>	
				      	<?php echo $this->Form->textarea('comment',array('class'=>'form-control','label'=>false)); ?>
					        
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <?php echo $this->Form->submit('変更する',array('class'=>'btn btn-primary')); ?>
					      <?php echo $this->Form->end(); ?>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>