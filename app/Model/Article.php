<?php 
App::uses('AuthComponent', 'Controller/Component');

class Article extends AppModel {
	public $name = 'Article';
	
	public $useTable = 'articles_dev';
	
	public $validate = array(
	);
	
	public $belongsTo = array(
		'Writer' => array(
			'className' => 'User',
			'foreignKey' => 'writer_id'
		),
      	'Cameraman' => array(
      		'className' => 'User',
      		'foreignKey' => 'camera_id'
      	),
		'Permit' => array(
			'className' => 'User',
			'foreignKey' => 'permit_id'
		),
	);
    
}
?>


