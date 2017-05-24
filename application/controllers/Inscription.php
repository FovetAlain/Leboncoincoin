<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//ici est gérée l'inscription d'un utilisateur sur le site
class Inscription extends CI_Controller {

	public function index(){
		$this->load->model('personne_model');
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nom', 'Nom', 'trim|required|max_length[25]|strip_tags|xss_clean');
		$this->form_validation->set_rules('prenom', 'Prenom', 'trim|required|max_length[25]|strip_tags|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|matches[confirmEmail]|strip_tags|xss_clean|is_unique[personnes.mail]');
		$this->form_validation->set_rules('confirmEmail', 'Confirmation du mail', 'trim|required|strip_tags|xss_clean');
		$this->form_validation->set_rules('password', 'Mot de passe', 'trim|min_length[6]|required|matches[confirmPassword]|strip_tags|callback_valid_pass');
		$this->form_validation->set_rules('confirmPassword', 'Confirmation du mot de passe', 'trim|required|strip_tags');

		$this->form_validation->set_message('required', 'Merci de renseigner ce champ');
		$this->form_validation->set_message('valid_email', 'Merci de renseigner un email valide');
		$this->form_validation->set_message('max_length', ' %s: le nombre de caractère maximum est %s');
		$this->form_validation->set_message('min_length', ' %s: le nombre de caractère minimum est %s');
		$this->form_validation->set_message('matches', ' %s: doit correspondre à %s');
		$this->form_validation->set_message('valid_pass', ' Le mot de passe doit contenir au moins 6 caractères, un chiffre et un caractère spécial (*,$,/,-, etc)');
		$this->form_validation->set_message('is_unique', 'Cet Email est déjà utilisé');

		if($this->form_validation->run() == FALSE){		
			if(validation_errors()===""){
				$this->load->view('inscription/inscription');
			}else{
				$result['errorNom'] = form_error("nom");
				$result['errorPrenom'] = form_error("prenom");
				$result['errorEmail'] = form_error("email");
				$result['errorConfirmEmail'] = form_error("confirmEmail");
				$result['errorPassword'] = form_error("password");	
				$result['errorConfirmPassword'] = form_error("confirmPassword");

				echo json_encode($result);
			}
		}else{
			$result['closeModal'] = true;		
			$data['nom'] = $this->input->post('nom');
			$data['prenom'] = $this->input->post('prenom');
			$data['email'] = $this->input->post('email');
			$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$this->personne_model->create_personne($data);

			$sessionData = array(
			        'prenom'  => $this->input->post('prenom'),
			        'email'     => $this->input->post('email'),
			        'logged_in' => TRUE
			);

			$this->session->set_userdata($sessionData);
			$result['nav'] = $this->load->view('layout/header', NULL, TRUE);
			echo json_encode($result);
		}
		

	}

	// fonction qui permet de vérifier si le password rempli les critères de sécurité requis
	
	function valid_pass($candidate) {
    	if (preg_match('#[\d]#', $candidate) && preg_match('#[\w]#', $candidate) && preg_match('#[\W]#', $candidate)) {
     		return TRUE;
   		}
   		return FALSE;
	}

}
