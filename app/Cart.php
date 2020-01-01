<?php
namespace App;

class Cart{

	public $items = null;
	public function __construct($oldCart){

		if($oldCart){
			$this->items = $oldCart->items;
		}
	}
	public function add($product){
		$this->items[$product['id']] = $product;
	}
	public function delete($id){
		unset($this->items[$id]);
	}
}
?>