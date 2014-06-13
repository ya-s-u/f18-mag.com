<?php 
App::uses('AuthComponent', 'Controller/Component');

class Photo extends AppModel {
	public $name = 'Photo';
	
	public $useTable = 'photos_dev';
	
	public $validate = array(
	);
    
}
?>

