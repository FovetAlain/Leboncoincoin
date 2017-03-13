<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends CI_Controller {

	public function index(){
		$this->load->model('inscription_model'); // a choisir si on sinscrit en loc ou en proprio
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nomLocataire', 'Nom', 'trim|required|max_length[25]|strip_tags');
		$this->form_validation->set_rules('prenomLocataire', 'Prenom', 'trim|required|max_length[25]|strip_tags');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|matches[confirmEmail]|strip_tags');
		$this->form_validation->set_rules('confirmEmail', 'Confirmation du mail', 'trim|required|strip_tags');
		$this->form_validation->set_rules('password', 'Mot de passe', 'trim|min_length[6]|required|matches[confirmPassword]|strip_tags|callback_valid_pass');
		$this->form_validation->set_rules('confirmPassword', 'Confirmation du mot de passe', 'trim|required|strip_tags');

		$this->form_validation->set_message('required', 'Merci de renseigner ce champ');
		$this->form_validation->set_message('max_length', ' %s: le nombre de caractère maximum est %s');
		$this->form_validation->set_message('min_length', ' %s: le nombre de caractère minimum est %s');
		$this->form_validation->set_message('matches', ' %s: doit correspondre à %s');
		$this->form_validation->set_message('valid_pass', ' Le mot de passe doit contenir au moins 6 caractères, un chiffre et un caractère spécial (*,$,/,-, etc)');

		if($this->form_validation->run() == FALSE){		
			if(validation_errors()===""){
				$this->load->view('inscription/inscription_locataires');
			}else{
				$result['errorNomLocataire'] = form_error("nomLocataire");
				$result['errorPrenomLocataire'] = form_error("prenomLocataire");
				$result['errorEmail'] = form_error("email");
				$result['errorConfirmEmail'] = form_error("confirmEmail");
				$result['errorPassword'] = form_error("password");	
				$result['errorConfirmPassword'] = form_error("confirmPassword");

				echo json_encode($result);
			}
		}else{
			$result['closeModal'] = true;
			echo json_encode($result);
		}
		

	}
	function valid_pass($candidate) {
    	if (preg_match('#[\d]#', $candidate) && preg_match('#[\w]#', $candidate) && preg_match('#[\W]#', $candidate)) {
     		return TRUE;
   		}
   		return FALSE;
	}

}
