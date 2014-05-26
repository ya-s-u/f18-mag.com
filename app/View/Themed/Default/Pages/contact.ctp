<img id="subtitle" src="img/logo_subtitle.png">
<div id="main">
	<div id="contact">
		<h2>お問い合わせ <?php echo $this->Session->flash(); ?></h2>
		<p>F1.8magazineに関するお問い合せはこちらからお願いいたします。内容によっては対応できかねる場合もございます。コラボなどの声掛けもお待ちしております。</p>
		<p>※ @f18-mag.comドメインの受信を許可しておいてください。</p>
		<?php echo $this->Form->create('Pages',array('action' => 'contact','class'=>'form-horizontal','role'=>'form'));  ?>
		<ul class="form">
			<li>
				<label>メールアドレス<span class="requset">必須</span></label>
				<?php echo $this->Form->input('address',array('required'=>'true','label'=>false)); ?>
			</li>
			<li>
				<label>お名前<span class="free">自由</span></label>
				<?php echo $this->Form->input('name',array('label'=>false)); ?>
			</li>
			<li>
				<label>内容<span class="requset">必須</span></label>
				<?php echo $this->Form->select('category',array('掲載記事について'=>'掲載記事について','取材依頼'=>'取材依頼','ライター、カメラマンについて'=>'ライター、カメラマンについて','その他ご要望等'=>'その他ご要望等'),array('required'=>'true','label'=>false,'legend'=>false)); ?>
			</li>
			<li class="body">
				<label>本文<span class="requset">必須</span></label>
				<?php echo $this->Form->textarea('body',array('required'=>'true','label'=>false)); ?>
			</li>
		</ul>
		<?php echo $this->Form->submit('以上の内容で送信',array('class'=>'btn btn-primary btn-lg btn-block')); ?>
		<?php $this->Form->end(); ?>
	</div>
</div>