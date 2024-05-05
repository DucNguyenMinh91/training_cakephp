<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Follower $Follower
 * @property Tweet $Tweet
 */
class User extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'name';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
			'rule'    => array('between', 4, 20),
			'message' => 'name range 4-20 letters'
		),
		'username' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
			'isunique'=>array(
				'rule'=>array('isunique'),
				'message' => 'Username already taken',
			),
			'rule'    => array('between', 4, 20),
			'message' => 'username range 4-20 letters'
		),
		'password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'mail' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Enter a valid email address',
			),
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'datetime' => array(
			'datetime' => array(
				'rule' => array('datetime'),
			),
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'Follower' => array(
			'className' => 'Follower',
			'foreignKey' => 'followee_user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Tweet' => array(
			'className' => 'Tweet',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => array('Tweet.datetime DESC'),
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function checkUsername($username){
		$result = $this->find('first', array('conditions' => array('username' => $username)));
		if($result!=null){
			return false;
		}
		else{
			return true;
		}

	}
}
