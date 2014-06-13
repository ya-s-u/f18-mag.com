<?php 
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
	public $name = 'User';
	
	public $useTable = 'users_dev';
		
	public $validate = array(
		'id' => array(
			'rule' => array(
				'notEmpty',
				'isUnique',
				array('maxLength', '10'),
				'alphaNumeric',
			),
			'message' => 'このユーザーIDは既に登録されています'
		),
		'screenname' => array(
			'rule' => array(
				'notEmpty',
				'isUnique',
				array('maxLength', '10'),
			),
			'message' => '10文字以下にしてください'
		),
		'password' => array(
			'rule' => array(
				'notEmpty',
				'alphaNumeric',
			),
			'message' => '必須項目'
		),
		'mail' => array(
			'rule' => array('email', true),
	        'message' => 'メールアドレスを正しく入力してください'
		),
	);
	
    
}
?>


