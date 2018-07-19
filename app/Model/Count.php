<?php
App::uses('AppModel', 'Model');
/**
 * Count Model
 *
 * @property Count $Count
 * @property User $User
 */
class Count extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'count_id, user_id, value';


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
			'order' => ''
		)
	);
}
