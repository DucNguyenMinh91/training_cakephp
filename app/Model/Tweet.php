<?php
App::uses('AppModel', 'Model');
/**
 * Tweet Model
 *
 * @property User $User
 */
class Tweet extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'id';

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
		'user_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'tweet' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => array('Tweet.datetime DESC')
		)
	);

	public function getTweetCount($id){
		$tweet_count = $this->find('count', array('conditions' => array('user_id' => $id)));
		return $tweet_count;
	}
}
