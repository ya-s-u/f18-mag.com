<?php

/* Cron
/usr/bin/php5.3 /home/tabinote/f18-mag.com/public_html/dev.f18-mag.com/app/Console/cake.php Update article_publish -app /home/tabinote/f18-mag.com/public_html/dev.f18-mag.com/app
/usr/bin/php5.3 /home/tabinote/f18-mag.com/public_html/dev.f18-mag.com/app/Console/Command/UpdateShell.php Update article_publish -app /home/tabinote/f18-mag.com/public_html/dev.f18-mag.com/app
*/

class UpdateShell extends AppShell {
    public $uses = array( 'Article' );

	unction article_publish() {
		$Articles = $this->Article->find('all',array(
			'conditions' => array(
				'Article.status' => 3,
			)
		));
		
		$i = 0;
		foreach($Articles as $article) {
			if(date("Ynj",strtotime($article['Article']['published'])) <= date("Ynj",time())) {
				$this->Article->id = $article['Article']['id'];
				$this->Article->save(
				    Array(
				        'status' => 4,
				    )
				);
				$vars['Articles']['title'][++$i] =  $article['Article']['title'];
			}
		}
		
		/*$email = new CakeEmail('smtp');
		$email->config(array('log' => 'emails'))
	  		->template('default','publish')
	  		->viewVars($vars)
	  		->to('yasu1003@gmail.com')
	  		->bcc('info@f18-mag.com')
	 		->emailFormat('text')
	  		->subject(count($vars['Articles']).'件の記事を公開しました！')
	  		->send();
		$this->redirect($this->referer());*/
	}
	
}