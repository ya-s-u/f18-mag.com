<?php
class PrivatesController extends AppController {
	public $name = 'Privates';
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
        	$this->layout='';
            $this->theme = "mobile";
        }else{
        	$this->layout='';
            $this->theme = "default";
        }
    }
	
	
	public function index() {
	}
	
	public function preview() {
		$this->set('title_for_layout','プロフィール編集');
		
		$id = (sqrt($this->params['url']['post'])-3)*10/1993;
		
		$params = array(
			'conditions' => array(
				'Article.id' => $id,
			)
		);
		$article = $this->Article->find('first',$params);
		
		if($article['Article']['status'] == 2) {
			$this->set('article',$article);
		} else {
			$this->redirect('//f18-mag.com');
		}
	
		$params = array(
			'order' => 'Photo.order asc',
			'limit' => 100,
			'conditions' => array(
				'Photo.article_id' => $id,
			)
		);
		$this->set('Photos',$this->Photo->find('all',$params));
		
	}
	
}