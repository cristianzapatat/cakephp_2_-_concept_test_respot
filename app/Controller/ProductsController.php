<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 */
class ProductsController extends AppController {

	/**
	 * Scaffold
	 *
	 * @var mixed
	 */
	public $scaffold;

	public function _index() {

	}

	public function index() {
		/*$products = $this->paginate($this->Product);*/

		$query = $this->request->query;

		//$this->log($query, 'debug');

		$conditions = [];
		$groups = array(
			
		);

		$modelClass = 'Product';

		$this->log($this->{$modelClass}->find('all', array(
			
		)), 'debug');

		$this->getPaginate($conditions, $groups);

		$filterOrderTable = '';
		$namedes = $this->request->named;

		foreach ($namedes as $key => $value) {
			$filterOrderTable .= $key . ':' . $value . '/';
		}

		$associatedModels = $this->{$modelClass}->getAssociated('hasMany');
		$associatedModels = array_combine($associatedModels, $associatedModels);

		$filters = Configure::read('Filters');

		$this->set('query', $query);
		$this->set('associations', $associatedModels);
		$this->set('filterOrderTable', $filterOrderTable);
		$this->set('products', $this->paginate($modelClass));
	}
}
