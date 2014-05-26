<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta http-equiv="expires" content="0">
	
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<title>F1.8 ライターページ</title>
	
	<link rel="shortcut icon" href="http://dev.f18-mag.com/favicon.ico">
	
	<?php
		echo $this->fetch('meta');
		echo $this->fetch('script');
		echo $this->fetch('css');
		
		echo $this->html->script('jquery-2.1.0.min');
		echo $this->html->script('jquery.tablednd.0.8.min');
		echo $this->html->script('jquery.Jcrop.min');
		echo $this->html->script('bootstrap.min');
	
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('jquery.Jcrop.min');
		echo $this->Html->css('dashboard');
	?>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
</head>
<body>
<nav id="head" class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">トグルボタン</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/admins">F1.8 ライターページ</a>
			<button id="write" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#NewArticleModal">新規記事</button>
			<?php
				if($type=20) {
					$num = count($Request_Writers);
					echo '<button id="auth" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#AuthModal">運営パネル <span class="badge">'.$num.'</span></button>';
				}
			?>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li><p class="navbar-text"><?php echo $username?>さん</p></li>
				<li><a href="/admins/logout">ログアウト</a></li>
			</ul>
		</div>
	</div>
</nav>
<div id="menu">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-xs-4">
				<a href="/admins" <?php if($this->action=='index') echo 'class="active"'?>><span class="glyphicon glyphicon-bell"></span>出稿ボード</a>
			</div>
			<div class="col-md-2 col-xs-4">
				<a href="/admins/report" <?php if($this->action=='report') echo 'class="active"'?>><span class="glyphicon glyphicon-th-list"></span>記事管理</a>
			</div>
			<div class="col-md-2 col-xs-4">
				<a href="/admins/writer" <?php if($this->action=='writer') echo 'class="active"'?>><span class="glyphicon glyphicon-user"></span>ライター</a>
			</div>
			<div class="col-md-2 col-xs-4">
				<a href="" <?php if($this->action=='event') echo 'class="active"'?>><span class="glyphicon glyphicon-flag"></span>イベント</a>
			</div>
			<div class="col-md-2 col-xs-4">
				<a href="/admins/manual" <?php if($this->action=='manual') echo 'class="active"'?>><span class="glyphicon glyphicon-book"></span>マニュアル</a>
			</div>
			<div class="col-md-2 col-xs-4">
				<a href="/admins/setting" <?php if($this->action=='setting') echo 'class="active"'?>><span class="glyphicon glyphicon-cog"></span>設定変更</a>
			</div>
		</div>
	</div>
</div>

<!-- New Article Modal -->
<div class="modal fade" id="NewArticleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<?php echo $this->Form->create('Article',array('url'=>'/admins/create','class'=>'form-horizontal','enctype'=>'multipart/form-data')); ?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">新規記事</h4>
			</div>
			<div class="modal-body">
				<fieldset>
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
					<label for="inputEmail" class="col-lg-2 control-label">サムネイル</label>
					<div class="col-lg-10">
						<?php echo $this->Form->input('upfile',array('type'=>'file','name'=>'upfile','class'=>'form-control','id'=>'upfile','label'=>false)); ?>
					</div>
				</div>
				</fieldset>
			</div>
			<div class="modal-footer">
				<?php echo $this->Form->submit('変更する',array('class'=>'btn btn-primary')); ?>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>

<!-- Auth Modal -->
<div class="modal fade" id="AuthModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">運営パネル</h4>
			</div>
			<div class="modal-body">
				<table id="" class="table table-striped">
			  		<thead>
			  			<tr class="warning">
							<th>名前</th>
							<th>アドレス</th>
							<th>申請日時</th>
							<th>操作</th>
						</tr>
			  		</thead>
			  		<tbody>
			  			<?php foreach ($Request_Writers as $writer) : ?>
						<tr>
							<td><?php echo $writer['User']['username']?></td>
							<td><?php echo $writer['User']['mail']?></td>
							<td><?php echo $writer['User']['created']?></td>
							<td><?php echo $this->html->link("許可する",array('action'=>'user_permit',$writer['User']['id']),array('class'=>'btn btn-success btn-sm','type'=>'button'),"本当に許可しますか？");?></td>
						</tr>
						<?php endforeach; ?>
			  		</tbody>
				</table>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>

<div class="container">
	<?php echo $this->fetch('content'); ?>
</div>
</body>
</html>