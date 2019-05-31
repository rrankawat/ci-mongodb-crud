<?php

if(!empty($custom_page)) {
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
	$this->load->view('templates/messages');
	$this->load->view($custom_page);
	$this->load->view('templates/footer');
} else {
	show_404();
}