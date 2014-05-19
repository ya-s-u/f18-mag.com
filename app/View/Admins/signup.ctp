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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48276900-1', 'f18-mag.com');
  ga('send', 'pageview');

</script>

<style>
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>

</head>
<body>
<?php echo $this->Session->flash(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>ライター申請</h2>
				</div>
				<div class="panel-body">
					<fieldset>
						<?php echo $this->Form->create('User',array('class'=>'form-horizontal','enctype'=>'multipart/form-data')); ?>
						<div class="form-group">
							<label for="inputEmail" class="col-lg-4 control-label">ライター名</label>
							<div class="col-lg-8">
								<?php echo $this->Form->input('username',array('class'=>'form-control','label'=>false)); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-lg-4 control-label">メールアドレス</label>
							<div class="col-lg-8">
								<?php echo $this->Form->input('mail',array('class'=>'form-control','label'=>false)); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-lg-4 control-label">パスワード</label>
							<div class="col-lg-8">
								<?php echo $this->Form->input('password',array('class'=>'form-control','label'=>false)); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-lg-4 control-label">Facebookアカウント</label>
							<div class="col-lg-8">
								<?php echo $this->Form->input('fb_link',array('class'=>'form-control','label'=>false)); ?>
								<span class="help-block">https://facebook.com/xxxのxxx部分のみを入力</span>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-lg-4 control-label">Twitterアカウント</label>
							<div class="col-lg-8">
								<?php echo $this->Form->input('tw_link',array('class'=>'form-control','label'=>false)); ?>
								<span class="help-block">https://twitter.com/xxxのxxx部分のみを入力</span>
							</div>
						</div>
						<div class="form-group">
							<label for="textArea" class="col-lg-4 control-label">自己紹介</label>
							<div class="col-lg-8">
								<?php echo $this->Form->textarea('comment',array('rows'=>3,'class'=>'form-control','label'=>false)); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-lg-4 control-label">プロフィール画像</label>
							<div class="col-lg-8">
								<?php echo $this->Form->input('upfile',array('type'=>'file','name'=>'upfile','class'=>'form-control','id'=>'upfile','label'=>false)); ?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-8 col-lg-offset-4">
								<?php echo $this->Form->submit('申請する',array('class'=>'btn btn-primary')); ?>
							</div>
						</div>
					</fieldset>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>