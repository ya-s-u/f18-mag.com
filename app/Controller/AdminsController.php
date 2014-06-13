<?php
class AdminsController extends AppController {
	public $name = 'Admins';
	public $uses = array('User','Article','Photo');
	public $helpers = array('Html','Form','Session','Common');
	public $components = array('Auth' => array(
        'authenticate' => array(
            'Form' => array(
                'userModel' => 'User',
                'fields' => array('username' => 'mail' , 'password'=>'password'),
            ),
        ),
        'loginError' => 'パスワードもしくはログインIDをご確認下さい。',
        'authError' => 'ご利用されるにはログインが必要です。',
        'loginAction' => array('action' => 'signin'),
        'loginRedirect' => array('controller' => 'admins', 'action' => 'index'),
        'logoutRedirect' => array('controller' => 'pages', 'action' => 'index'),
    ),'Session','Email');
	
	public function beforeFilter() {
		$this->Auth->allow('signin');
		$this->Auth->allow('signup');
		$id = $this->Auth->user('id');
		$this->set('id',$id);
		$this->set('username',$this->Auth->user('username'));
		$this->set('type',$this->Auth->user('type'));
		
		/* 申請中ユーザー(type=0)をはじく */
		if($this->Auth->user()!=null && $this->Auth->user('type')<10) {
			$this->Auth->logout();
			$this->redirect(array('action'=>'index','controller'=>'pages'));
		};
		
		if($this->Auth->user()!=null) {
			$this->User->id = $id;
			$this->User->save(
			    Array(
			        'last_login' => date("Y-m-d G:i:s"),
			    )
			);
			
			$params = array(
				'order' => 'User.id asc',
				'limit' => 100,
				'conditions' => array(
					'User.type' => 0,
				)
			);
			$this->set('Request_Writers',$this->User->find('all',$params));
		};
	}
	
	
	public function index() {
        $this->layout='admin';
		$this->set('title_for_layout','プロフィール編集');
		
		$params = array(
			'order' => 'Article.modified desc',
			'limit' => 100,
			'conditions' => array(
				'Article.status' => 0,
			)
		);
		$this->set('Articles_0',$this->Article->find('all',$params));
		
		$params = array(
			'order' => 'Article.id desc',
			'limit' => 100,
			'conditions' => array(
				'Article.status' => 1,
			)
		);
		$this->set('Articles_1',$this->Article->find('all',$params));
		
		$params = array(
			'order' => 'Article.id desc',
			'limit' => 100,
			'conditions' => array(
				'Article.status' => 2,
			)
		);
		$this->set('Articles_2',$this->Article->find('all',$params));
		
		$params = array(
			'order' => 'Article.id desc',
			'limit' => 100,
			'conditions' => array(
				'Article.status' => 3,
			)
		);
		$this->set('Articles_3',$this->Article->find('all',$params));
	}
	
	function article_publish() {
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
		
		$email = new CakeEmail('smtp');
		$email->config(array('log' => 'emails'))
	  		->template('default','publish')
	  		->viewVars($vars)
	  		->to('yasu1003@gmail.com')
	  		->bcc('info@f18-mag.com')
	 		->emailFormat('text')
	  		->subject(count($vars['Articles']).'件の記事を公開しました！')
	  		->send();
		$this->redirect($this->referer());
	}
	
	public function signup() {
        $this->layout='';
		$this->set('title_for_layout','プロフィール編集');
		require_once "../../lib/WideImage/WideImage.php";
	
		if($this->request->isPost()) {
			$this->User->set($this->request->data);
       		$this->User->validates();
        	$vars = array (
        		'username'=> $this->request->data['User']['username'],
        		'mail'=> $this->request->data['User']['mail'],
        		'password'=> $this->request->data['User']['password'],
        		'comment'=> $this->request->data['User']['comment'],
        		'fb_link'=> $this->request->data['User']['fb_link'],
        		'tw_link'=> $this->request->data['User']['tw_link'],
        	);
			$email = new CakeEmail('smtp');
			try {
				$email->config(array('log' => 'emails'))
			  		->template('default','signup')
			  		->viewVars($vars)
			  		->to($this->request->data['User']['mail'])
			  		->bcc('info@f18-mag.com')
			 		->emailFormat('text')
			  		->subject($this->request->data['User']['username'].'さんのライター登録申請が完了しました')
			  		->send();
				$this->User->create();
				$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
				$this->request->data['User']['type'] = 0;
				$this->request->data['User']['created'] = date("Y-m-d G:i:s");
				$this->request->data['User']['last_login'] = date("Y-m-d G:i:s");
				$this->User->save($this->data);
				
				if(is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
					$image = WideImage::loadFromFile($_FILES['upfile']['tmp_name']);
					$id = $this->User->getLastInsertID();
					
					$resized1 = $image->resize(858,null,'inside');
					$resized1->saveToFile('../../app/webroot/img/users/original/img-'.$id.'.jpg');
					
					$resized = $image->resize(200,200,'outside');
					$cropped = $resized->crop('center','center',200,200);
					$cropped->saveToFile('../../app/webroot/img/users/resized/img-'.$id.'.jpg');
				}
				$this->redirect(array('action'=>'index','controller'=>'pages'));
			} catch(SocketException $e) {
 	  			$this->Session->setFlash('エラー：メールアドレスが正しくありません');
			}
		}
	}
	
	public function signin() {
        $this->layout='';
		$this->set('title_for_layout','ログイン');
		
		if($this->request->isPost()) {
			if($this->Auth->login()) {
				$this->redirect(array('action'=>'index','controller'=>'admins'));
			} else {
				$this->Session->setFlash('<span class="icon-checkmark"></span>エラー');
			}
		}
	}
	
	public function logout() {
		$this->set('title_for_layout','ログアウト');
		$this->Auth->logout();
		
		$this->redirect(array('action'=>'index','controller'=>'pages'));
	}
	
	public function create() {
		require_once "../../lib/WideImage/WideImage.php";
		
        if($this->request->isPost()) {
			$this->Article->set($this->request->data);
       		$this->Article->validates();
			$this->Article->create();
			$id = $this->Auth->user('id');
			$this->request->data['Article']['writer_id'] = $id;
			$this->request->data['Article']['status'] = 0;
			$this->request->data['Article']['modified'] = date("Y-m-d G:i:s");
			$this->request->data['Article']['created'] = date("Y-m-d G:i:s");
			$this->Article->save($this->data);
			
			$id = $this->Article->getLastInsertID();
			
			if(is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
				$image = WideImage::loadFromFile($_FILES['upfile']['tmp_name']);
				
				$resized = $image->resize(750,null,'outside');
				$resized->saveToFile('../../app/webroot/img/articles/original/img-'.$id.'.jpg');
				
				$cropped = $resized->crop('center','center',750,330);
				$cropped->saveToFile('../../app/webroot/img/articles/large/img-'.$id.'.jpg');
				
				$cropped = $resized->crop('center','center',498,330);
				$cropped->saveToFile('../../app/webroot/img/articles/medium/img-'.$id.'.jpg');
				
				$cropped = $resized->crop('center','center',246,330);
				$cropped->saveToFile('../../app/webroot/img/articles/small/img-'.$id.'.jpg');
			}
		}
		$this->redirect(array('action'=>'edit','controller'=>'admins',$id));
	}
	
	public function edit($id) {
        $this->layout='admin';
		$this->set('title_for_layout','プロフィール編集');
		
		$this->set('article_id',$id);
		
		$params = array(
			'conditions' => array(
				'Article.id' => $id,
			)
		);
		$this->set('article',$this->Article->find('first',$params));
		
		$params = array(
			'order' => 'Photo.order asc',
			'limit' => 100,
			'conditions' => array(
				'Photo.article_id' => $id,
			)
		);
		$Photos = $this->Photo->find('all',$params);
		$this->set('Photos',$Photos);
		
		$params = array(
			'order' => 'User.last_login desc',
			'limit' => 100,
			'conditions' => array(
				'User.type' => array(10,20),
				'NOT' => array(
					'User.username' => NULL
				),
			)
		);
		$this->set('Writers',$this->User->find('all',$params));
		
		$this->Article->id = $id;
		if($this->request->is('get')) {
			$this->request->data = $this->Article->read();
		} else {
			$this->request->data['Article']['modified'] = date("Y-m-d G:i:s");
			$this->Article->save($this->request->data['Article']);
			$this->redirect($this->referer());
		}
	}
	
	public function report() {
        $this->layout='admin';
		$this->set('title_for_layout','プロフィール編集');
		$params = array(
			'order' => 'Article.id desc',
			'limit' => 100,
			'conditions' => array(
			)
		);
		$this->set('Articles',$this->Article->find('all',$params));
	}
	
	public function writer() {
        $this->layout='admin';
		$this->set('title_for_layout','プロフィール編集');
		
		$params = array(
			'order' => 'User.last_login desc',
			'limit' => 100,
			'conditions' => array(
				'User.type' => array(10,20),
				'NOT' => array(
					'User.username' => NULL
				),
			)
		);
		$this->set('Writers',$this->User->find('all',$params));
	}
	
	public function manual() {
        $this->layout='admin';
		$this->set('title_for_layout','プロフィール編集');
	}
	
	public function setting() {
        $this->layout='admin';
		$this->set('title_for_layout','プロフィール編集');
		require_once "../../lib/WideImage/WideImage.php";
		$id = $this->Auth->user('id');
		
		$this->User->id = $this->Auth->user('id');
		if($this->request->is('get')) {
			$this->request->data = $this->User->read();
		} else {
			if(is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
				//対象画像のロード
				$image = WideImage::loadFromFile($_FILES['upfile']['tmp_name']);
				
				$resized1 = $image->resize(858,null,'inside');
				$resized1->saveToFile('../../app/webroot/img/users/original/img-'.$id.'.png');
				
				$resized = $image->resize(200,200,'outside');
				$cropped = $resized->crop('center','center',200,200);
				$cropped->saveToFile('../../app/webroot/img/users/resized/img-'.$id.'.png');
			}
			if($this->User->save($this->request->data)) {
				$this->Session->setFlash('<span class="icon-checkmark"></span>変更しました');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('エラーが発生しました');
			}
		}
	}
	
	public function add_photo($id) {
		require_once "../../lib/WideImage/WideImage.php";
		
		$params = array(
			'limit' => 100,
			'conditions' => array(
				'Photo.article_id' => $id,
			)
		);
		$order = $this->Photo->find('count',$params);
		
		
		$this->Article->id = $id;
		$this->Article->save(
		    Array(
		        'modified' => date("Y-m-d G:i:s"),
		    )
		);
		
		$this->Photo->create();
		$this->request->data['Photo']['article_id'] = $id;
		$this->request->data['Photo']['order'] = $order+1;
		$this->request->data['Photo']['created'] = date("Y-m-d G:i:s");
		$this->request->data['Photo']['modified'] = date("Y-m-d G:i:s");
		$this->Photo->save($this->data);
		
		if(is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
			$id = $this->Photo->getLastInsertID();
			
			//対象画像のロード
			$image = WideImage::loadFromFile($_FILES['upfile']['tmp_name']);
			
			$image->saveToFile('../../app/webroot/img/photos/original/img-'.$id.'.jpg');
			
			$resized = $image->resize(1012,608,'outside');
			$cropped = $resized->crop('center','center',1012,608);
			$cropped->saveToFile('../../app/webroot/img/photos/resized/img-'.$id.'.jpg');
			
			$resized = $image->resize(200,200,'outside');
			$cropped = $resized->crop('center','center',200,200);
			$cropped->saveToFile('../../app/webroot/img/photos/thumb/img-'.$id.'.jpg');
		}
		
		$this->redirect($this->referer());
	}
	
	public function edit_photo($id) {
		require_once "../../lib/WideImage/WideImage.php";
		
		if(is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
			//対象画像のロード
			$image = WideImage::loadFromFile($_FILES['upfile']['tmp_name']);
			
			$image->saveToFile('../../app/webroot/img/photos/original/img-'.$id.'.jpg');
			
			$resized = $image->resize(1012,608,'outside');
			$cropped = $resized->crop('center','center',1012,608);
			$cropped->saveToFile('../../app/webroot/img/photos/resized/img-'.$id.'.jpg');
			
			$resized = $image->resize(200,200,'outside');
			$cropped = $resized->crop('center','center',200,200);
			$cropped->saveToFile('../../app/webroot/img/photos/thumb/img-'.$id.'.jpg');
		}
		
		$this->Photo->id = $id;
		if($this->request->is('post')) {
			$this->request->data['Photo']['modified'] = date("Y-m-d G:i:s");
			$this->Photo->save($this->request->data['Photo']);
		}
		
		$this->redirect($this->referer());
	}
	
	public function delete_photo($id) {
		if($this->Photo->delete($id)) {
			if(file_exists('../../app/webroot/img/photos/original/img-'.$id.'.jpg')){
				unlink('../../app/webroot/img/photos/original/img-'.$id.'.jpg');
			}
			if(file_exists('../../app/webroot/img/photos/resized/img-'.$id.'.jpg')){
				unlink('../../app/webroot/img/photos/resized/img-'.$id.'.jpg');
			}
			if(file_exists('../../app/webroot/img/photos/thumb/img-'.$id.'.jpg')){
				unlink('../../app/webroot/img/photos/thumb/img-'.$id.'.jpg');
			}
		}
		$this->redirect($this->referer());
	}
	
	public function photo_align($id) {
		$params = array(
			'limit' => 100,
			'conditions' => array(
				'Photo.article_id' => $id,
			)
		);
		$Photo = $this->Photo->find('all',$params);
		
		foreach($Photo as $key => $photo) {
			$this->Photo->id = $photo['Photo']['id'];
			$this->Photo->save(
			    Array(
			        'order' => $this->request->data['Align']['photo'.($key+1)],
			    )
			);
		};
		$this->redirect($this->referer());
	}
	
	public function delete_article($id) {
		if($this->Article->delete($id)) {
		};
		$this->redirect($this->referer());
	}
	
	public function upload_img_article($id) {
		require_once "../../lib/WideImage/WideImage.php";
		if(is_uploaded_file($_FILES['upfile1']['tmp_name'])) {
			$image = WideImage::loadFromFile($_FILES['upfile1']['tmp_name']);
			
			$resized = $image->resize(750,null,'outside');
			$resized->saveToFile('../../app/webroot/img/articles/original/img-'.$id.'.jpg');
			
			$cropped = $resized->crop('center','center',750,330);
			$cropped->saveToFile('../../app/webroot/img/articles/large/img-'.$id.'.jpg');
			
			$cropped = $resized->crop('center','center',498,330);
			$cropped->saveToFile('../../app/webroot/img/articles/medium/img-'.$id.'.jpg');
			
			$cropped = $resized->crop('center','center',246,330);
			$cropped->saveToFile('../../app/webroot/img/articles/small/img-'.$id.'.jpg');
			
		}
		$this->Article->id = $id;
		$this->Article->save(
		    Array(
		        'modified' => date("Y-m-d G:i:s"),
		    )
		);
		$this->redirect($this->referer());
	}
	
	public function upload_img_info($id) {
		require_once "../../lib/WideImage/WideImage.php";
		if(is_uploaded_file($_FILES['upfile2']['tmp_name'])) {
			$image = WideImage::loadFromFile($_FILES['upfile2']['tmp_name']);
			
			$resized1 = $image->resize(858,null,'outside');
			$resized1->saveToFile('../../app/webroot/img/informations/original/img-'.$id.'.jpg');
			
			$resized = $image->resize(200,200,'outside');
			$cropped = $resized->crop('center','center',200,200);
			$cropped->saveToFile('../../app/webroot/img/informations/resized/img-'.$id.'.jpg');
			
		}
		$this->Article->id = $id;
		$this->Article->save(
		    Array(
		        'modified' => date("Y-m-d G:i:s"),
		    )
		);
		$this->redirect($this->referer());
	}
	
	public function upload_img_user() {
		require_once "../../lib/WideImage/WideImage.php";
		$id = $this->Auth->user('id');
		if(is_uploaded_file($_FILES['upfile']['tmp_name'])) {
			$image = WideImage::loadFromFile($_FILES['upfile']['tmp_name']);
			
			$resized1 = $image->resize(858,null,'outside');
			$resized1->saveToFile('../../app/webroot/img/users/original/img-'.$id.'.jpg');
			
			$resized = $image->resize(200,200,'outside');
			$cropped = $resized->crop('center','center',200,200);
			$cropped->saveToFile('../../app/webroot/img/users/resized/img-'.$id.'.jpg');
			
		}
		$this->redirect($this->referer());
	}
	
	public function crop_img_article($id,$size) {
		require_once "../../lib/WideImage/WideImage.php";

		$x = $this->request->data['Admin']['x1'];
		$y = $this->request->data['Admin']['y1'];
		$w = $this->request->data['Admin']['w'];
		$h = $this->request->data['Admin']['h'];
		
		$image = WideImage::loadFromFile('../../app/webroot/img/articles/original/img-'.$id.'.jpg');
		
		$cropped = $image->crop($x,$y,$w,$h);
		if($size=='large') $w = 750;
		else if($size=='medium') $w = 498;
		else if($size=='small') $w = 246;
		$resized = $cropped->resize($w,330,'outside');
		$resized->saveToFile('../../app/webroot/img/articles/'.$size.'/img-'.$id.'.jpg');
		
		$this->Article->id = $id;
		$this->Article->save(
		    Array(
		        'modified' => date("Y-m-d G:i:s"),
		    )
		);
		$this->redirect($this->referer());
	}
	
	public function crop_img_user() {
		require_once "../../lib/WideImage/WideImage.php";
		$id = $this->Auth->user('id');
		
		$x = $this->request->data['Admin']['x1'];
		$y = $this->request->data['Admin']['y1'];
		$w = $this->request->data['Admin']['w'];
		$h = $this->request->data['Admin']['h'];
		
		$image = WideImage::loadFromFile('../../app/webroot/img/users/original/img-'.$id.'.jpg');
		
		$cropped = $image->crop($x,$y,$w,$h);
		$resized = $cropped->resize(200,200,'outside');
		$resized->saveToFile('../../app/webroot/img/users/resized/img-'.$id.'.jpg');
		
		$this->redirect($this->referer());
	}
	
	public function user_permit($id) {
		if($id==NULL) {
			$this->redirect($this->referer());
		}
		$this->User->id = $id;
		$this->User->save(
		    Array(
		        'type' => 10,
		    )
		);
		$user = $this->User->read(null,$id);
    	$vars = array (
    		'username'=> $user['User']['username'],
    		'mail'=> $user['User']['mail'],
    	);
		$email = new CakeEmail('smtp');
		$email->config(array('log' => 'emails'))
	  		->template('default','permit')	
	  		->viewVars($vars)
	  		->to($user['User']['mail'])
	  		->bcc('info@f18-mag.com')
	 		->emailFormat('text')
	  		->subject($user['User']['username'].'さんのライター登録が完了しました')
	  		->send();
		$this->redirect($this->referer());
	}
	
	public function article_set1($id) {
		if($id==NULL) {
			$this->redirect($this->referer());
		}
		$this->Article->id = $id;
		$this->Article->save(
		    Array(
		        'status' => 1,
		        'modified' => date("Y-m-d G:i:s"),
		    )
		);
		$this->redirect($this->referer());
	}
	
	public function article_set2($id) {
		if($id==NULL) {
			$this->redirect($this->referer());
		}
		$this->Article->id = $id;
		$this->Article->save(
		    Array(
		        'status' => 2,
		    )
		);
		$this->redirect($this->referer());
	}
	
	public function article_set3($id) {
		if($id==NULL) {
			$this->redirect($this->referer());
		}
		$this->Article->id = $id;
		$this->Article->save(
		    Array(
		        'status' => 3,
		    )
		);
		$this->redirect($this->referer());
	}
}
