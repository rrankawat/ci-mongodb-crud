<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {

	public function all() {
		return $this->mongo_db->get('customers');
	}

	public function create($data) {
		return $this->mongo_db->insert('customers', $data);
	}

	public function single($id) {
		return $this->mongo_db->where('_id', new MongoDB\BSON\ObjectId($id))->get('customers');
	}

	public function update($id, $data) {
		return $this->mongo_db->set($data)->where('_id', new MongoDB\BSON\ObjectId($id))->update('customers');
	}

	public function delete($id) {
		return $this->mongo_db->where('_id', new MongoDB\BSON\ObjectId($id))->delete('customers');
	}
}