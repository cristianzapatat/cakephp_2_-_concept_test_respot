<?php
App::uses('ProductsController', 'Controller');

/**
 * ProductsController Test Case
 *
 */
class ProductsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product',
		'app.category',
		'app.entry',
		'app.output'
	);

}
