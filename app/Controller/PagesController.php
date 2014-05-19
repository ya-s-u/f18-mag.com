<?php
class PagesController extends AppController {
	public $name = 'Pages';
	public $uses = array('User','Article','Photo');
	public $helpers = array('Html','Form','Session','Common');
	public $components = array('Session','Email');

	public $view = 'Theme';
 
    public function beforeFilter() {
        if ($this->InsAuth) {
            $this->InstructorAuth();
        }
        if ($this->AdminAuth) {
            $this->AdminAuth();
        }
        if ($this->FreeAuth) {
            $this->FreeAuth();
        }
 
        $useragents = array(
            'iPhone',   // Apple iPhone
            'iPod',     // Apple iPod touch
            'Android'   // Android
        );
        $pattern = '/'.implode('|', $useragents).'/i';
        if($_ua = preg_match($pattern, $_SERVER['HTTP_USER_AGENT'])){
        	$this->layout='common_mobile';
            $this->theme = "mobile";
        }else{
        	$this->layout='common_default';
            $this->theme = "default";
        }
    }
	
	public function index() {
		$this->set('title_for_layout','プロフィール編集');
		
		$params = array(
			'order' => 'Article.published desc',
			'limit' => 100,
			'conditions' => array(
				'Article.status' => 4,
			)
		);
		$this->set('Articles',$this->Article->find('all',$params));
	}
	
	public function about() {
		$this->set('title_for_layout','プロフィール編集');
	}
	
	public function writer() {
		$this->set('title_for_layout','プロフィール編集');
		$params = array(
			'order' => 'User.id asc',
			'limit' => 100,
			'conditions' => array(
				'User.type' => array(20),
				'NOT' => array(
					'User.username' => NULL
				),
			)
		);
		$this->set('Members',$this->User->find('all',$params));
		
		$params = array(
			'order' => 'User.id asc',
			'limit' => 100,
			'conditions' => array(
				'User.type' => array(10),
				'NOT' => array(
					'User.username' => NULL
				),
			)
		);
		$this->set('Writers',$this->User->find('all',$params));
	}
	
	public function view() {
		$this->set('title_for_layout','プロフィール編集');
		
		$id = $this->params['url']['post'];
		
		$params = array(
			'conditions' => array(
				'Article.id' => $id,
			)
		);
		$article = $this->Article->find('first',$params);
		$this->set('article',$article);
		
		if($article['Article']['status'] != 4) {
			$this->redirect('//f18-mag.com');
		};
		
		$this->Article->id = $id;
		$increment = array(  
    		'Article' => array(  
        		'id' => $id,  
        		'pv_count' => $this->Article->field('pv_count') + 1,  
        		'modified' => false
        	) 
		);
		$this->Article->id = $id;
		$this->Article->save($increment, false, array('pv_count'));
	
		$params = array(
			'order' => 'Photo.order asc',
			'limit' => 100,
			'conditions' => array(
				'Photo.article_id' => $id,
			)
		);
		$this->set('Photos',$this->Photo->find('all',$params));
		
		$params = array(
			'order' => 'rand()',
			'limit' => 6,
			'conditions' => array(
				'Article.status' => 4,
				'Not' => array(
					'Article.id' => $id,
				)
			)
		);
		$this->set('Articles',$this->Article->find('all',$params));
	}
	
}