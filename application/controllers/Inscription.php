<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends CI_Controller {

	public function index(){
		$this->load->model('inscription_model'); // a choisir si on sinscrit en loc ou en proprio
	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nomLocataire', 'Nom', 'required');
		$this->form_validation->set_rules('prenomLocataire', 'Prenom', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('inscriptions/inscription_locataires');
		}else{
			echo json_encode(false);
		}
		

	}

}
