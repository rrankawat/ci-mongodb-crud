<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$data['items'] = $this->welcome_model->all();

		$data['custom_page'] = 'pages/index';
		$this->load->view('layouts/app', $data);
	}

	public function new() {
		$data['custom_page'] = 'pages/new';
		$this->load->view('layouts/app', $data);
	}

	public function create() {
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'designation' => $this->input->post('designation'),
			'city' => $this->input->post('city')
		);

		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('designation', 'Designation', 'required|callback_check_default');
		$this->form_validation->set_message('check_default', 'Please select designation');
		$this->form_validation->set_rules('city', 'City', 'required');

		if($this->form_validation->run() === FALSE) {
			$data['custom_page'] = 'pages/new';
			$this->load->view('layouts/app', $data);
		} else {

			$response = $this->welcome_model->create($data);

			if(isset($response)) {
				$this->session->set_flashdata('success', 'Customer created');
				redirect('welcome/index');
			}
		}
	}

	public function check_default($element) {
		if($element == '0') {
			return FALSE;
		}
		return TRUE;
	}

	public function edit($id) {
		$response = $this->welcome_model->single($id);

		if(isset($response)) {
			$data['item'] = $response[0];
			$data['item']['id'] = $id;

			$data['custom_page'] = 'pages/edit';
			$this->load->view('layouts/app', $data);
		}
	}

	public function update() {
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'designation' => $this->input->post('designation'),
			'city' => $this->input->post('city')
		);
		$id = $this->input->post('id');

		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('designation', 'Designation', 'required|callback_check_default');
		$this->form_validation->set_message('check_default', 'Please select designation');
		$this->form_validation->set_rules('city', 'City', 'required');

		if($this->form_validation->run() === FALSE) {
			$data['custom_page'] = 'pages/edit';
			$this->load->view('layouts/app', $data);
		} else {

			$response = $this->welcome_model->update($id, $data);

			if(isset($response)) {
				$this->session->set_flashdata('success', 'Customer updated');
				redirect('welcome/index');
			}
		}
	}

	public function delete($id) {
		$response = $this->welcome_model->delete($id);

		if($response) {
			$this->session->set_flashdata('success', 'Record has been deleted');
			redirect('welcome/index');
		}
	}
	
}
