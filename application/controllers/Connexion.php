<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends CI_Controller {

	// ici est gérée la connexion d'un utilisateur déjà présent en base
	public function index(){
		$this->load->model('personne_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|strip_tags|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|strip_tags');
		$this->form_validation->set_message('required', 'Merci de renseigner ce champ');
		$this->form_validation->set_message('valid_email', 'Merci de renseigner un email valide');

		if($this->form_validation->run() == FALSE){
			if(validation_errors()===""){
				$this->load->view('connexion/connexion');
			}else{
				$result['errorEmail'] = form_error("email");
				$result['errorPassword'] = form_error("password");

				echo json_encode($result);
			}
		}else{
			$data['email'] = $this->input->post('email');
			$passwordAttempt = $this->input->post('password');
			$personne = $this->personne_model->get_personne($data);
			$validPassword = false;

			if(!empty($personne)){
				$validPassword = password_verify($passwordAttempt, $personne[0]->motDePasse);
			}

			if($validPassword){
				$result['closeModal'] = true;
				$sessionData = array(
			        'prenom'  => $personne[0]->prenom,
			        'email'     => $personne[0]->mail,
			        'logged_in' => TRUE
				);

				$this->session->set_userdata($sessionData);
				$result['nav'] = $this->load->view('layout/header', NULL, TRUE);
				echo json_encode($result);
			}else{
				$result['errorEmail'] = "Adresse email / mot de passe inconnu";
				echo json_encode($result);
			}
		}	
	}


	// fonction de déconnexion de l'utilisateur
	public function logout(){
		$this->session->sess_destroy();
		redirect('accueil');
	}
}
