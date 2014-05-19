<div class="row">
	<div class="col-md-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>プロフィール編集</h2>
			</div>
			<div class="panel-body">
				<fieldset>
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">プロフィール画像</label>
						<div class="col-lg-10">
							<?php echo $this->Html->image('users/resized/img-'.$id.'.jpg?xxxxx',array('class'=>'user_thumb thumbnail'))?>
							<?php echo $this->Form->create('User',array('url'=>'/admins/upload_img_user','id'=>'upfile_sub','class'=>'form-horizontal','enctype'=>'multipart/form-data','style'=>'display:inline')); ?>
							<script>
							$(function () {
								$("input#upfile").change(function () {
									$(this).closest("form#upfile_sub").submit();
								});
							});
							</script>
							<a class="up btn btn-primary btn-sm">画像を変更<?php echo $this->Form->input('upfile',array('type'=>'file','name'=>'upfile','class'=>'form-control','id'=>'upfile','label'=>false)); ?></a>
							<?php echo $this->Form->end(); ?>
							<a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#CropModal">トリミング</a>
						</div>
					</div>
					<?php echo $this->Form->create('User',array('class'=>'form-horizontal')); ?>
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">ユーザー名</label>
						<div class="col-lg-10">
							<?php echo $this->Form->input('username',array('class'=>'form-control','label'=>false)); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">メールアドレス</label>
						<div class="col-lg-10">
							<?php echo $this->Form->input('mail',array('class'=>'form-control','label'=>false)); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Facebookアカウント</label>
						<div class="col-lg-10">
							<?php echo $this->Form->input('fb_link',array('class'=>'form-control','label'=>false)); ?>
							<span class="help-block">https://facebook.com/xxxのxxx部分のみを入力</span>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Twitterアカウント</label>
						<div class="col-lg-10">
							<?php echo $this->Form->input('tw_link',array('class'=>'form-control','label'=>false)); ?>
							<span class="help-block">https://twitter.com/xxxのxxx部分のみを入力</span>
						</div>
					</div>
					<div class="form-group">
						<label for="textArea" class="col-lg-2 control-label">自己紹介</label>
						<div class="col-lg-10">
							<?php echo $this->Form->textarea('comment',array('rows'=>3,'class'=>'form-control','label'=>false)); ?>
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

<!-- Crop Modal -->
<div class="modal fade" id="CropModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<?php echo $this->Form->create('Admin',array('url'=>'/admins/crop_img_user','class'=>'form-horizontal')); ?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">範囲を指定</h4>
			</div>
			<div class="modal-body">
				<script>
				$(function(){
					$('#crop').Jcrop({
						minSize: [200, 200],
						aspectRatio: 1 / 1,
						onChange: showCoords,
						onSelect: showCoords,
					});
				});
				
				function showCoords(c){
					jQuery('#x1').val(c.x);
					jQuery('#y1').val(c.y);
					jQuery('#w').val(c.w);
					jQuery('#h').val(c.h);
				};
				</script>
				<?php echo $this->Html->image('users/original/img-'.$id.'.jpg',array('id'=>'crop'))?>
				<?php echo $this->Form->hidden('x1',array('class'=>'form-control','id'=>'x1')); ?>
				<?php echo $this->Form->hidden('y1',array('class'=>'form-control','id'=>'y1')); ?>
				<?php echo $this->Form->hidden('w',array('class'=>'form-control','id'=>'w')); ?>
				<?php echo $this->Form->hidden('h',array('class'=>'form-control','id'=>'h')); ?>	
			</div>
			<div class="modal-footer">
				<?php echo $this->Form->submit('変更する',array('class'=>'btn btn-primary')); ?>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>