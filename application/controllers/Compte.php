<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte extends CI_Controller {

	public function index()
	{
		$this->load->model('Annonce_model');
		$data['annonces'] = $this->Annonce_model->get_all_annonces();
		$this->load->model('Personne_model');


		if(isset($this->session->logged_in) && $this->session->logged_in === true)
		 	{
		 	$data['utilisateurConnecte'] = $this->Personne_model->get_personne(array('email' => $this->session->email)); // recupere en base l'utilisateur grace au mail stocké en session
		 	$data['email']=$this->session->email;
		 	$this->load->view('compte/compte', $data);
			}
		else{
				redirect('accueil');
			}
	}

	public function update_email()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('Personne_model');

		$this->form_validation->set_rules('nouvelEmail', 'Email', 'trim|required|valid_email|matches[confirmNouvelEmail]|strip_tags|xss_clean|is_unique[personnes.mail]');
		$this->form_validation->set_rules('confirmNouvelEmail', 'Confirmation du mail', 'trim|required|strip_tags|xss_clean');
		$this->form_validation->set_rules('motDePasse', 'Mot de passe', 'trim|required|strip_tags|callback_valid_pass');

		$this->form_validation->set_message('required', 'Merci de renseigner ce champ');
		$this->form_validation->set_message('valid_email', 'Merci de renseigner un email valide');
		$this->form_validation->set_message('matches', ' %s: doit correspondre à %s');
		$this->form_validation->set_message('is_unique', 'Cet Email est déjà utilisé');
		$this->form_validation->set_message('valid_pass', 'Mot de passe incorrect ');

		$data['emailActuel'] = $this->session->email;

		if($this->form_validation->run() == FALSE){		
			if(validation_errors()===""){
				$this->load->view("compte/updateEmail", $data);
			}else{
				$result['errorEmail'] = form_error("nouvelEmail");
				$result['errorConfirmEmail'] = form_error("confirmNouvelEmail");
				$result['errorPassword'] = form_error("motDePasse");	
				echo json_encode($result);
			}
		}else{
			$result['closeModal'] = true;		
			$data['nouvelEmail'] = $this->input->post('nouvelEmail');
			$data['emailActuel'] = $this->session->email;
			$result['nouvelEmail'] = $this->input->post('nouvelEmail');
			$this->Personne_model->change_email($data);

			$sessionData = array(
			        'email'     => $this->input->post('nouvelEmail'),
			        'logged_in' => TRUE
			);
			$this->session->set_userdata($sessionData);
			echo json_encode($result);		
		}

	}

	public function update_mot_de_passe()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('Personne_model');

		$this->form_validation->set_rules('nouveauMotDePasse', 'Nouveau mot de passe', 'trim|min_length[6]|required|matches[confirmNouveauMotDePasse]|strip_tags|xss_clean|callback_valid_mdp');
		$this->form_validation->set_rules('confirmNouveauMotDePasse', 'Confirmation du nouveau mot de passe', 'trim|required|strip_tags|xss_clean');
		$this->form_validation->set_rules('motDePasse', 'Mot de passe Actuel', 'trim|required|strip_tags');

		$this->form_validation->set_message('required', 'Merci de renseigner ce champ');
		$this->form_validation->set_message('valid_pass', 'Mot de passe incorrect ');
		$this->form_validation->set_message('max_length', ' %s: le nombre de caractère maximum est %s');
		$this->form_validation->set_message('min_length', ' %s: le nombre de caractère minimum est %s');
		$this->form_validation->set_message('matches', ' %s: doit correspondre à %s');
		$this->form_validation->set_message('valid_mdp', ' Le mot de passe doit contenir au moins 6 caractères, un chiffre et un caractère spécial (*,$,/,-, etc)');

		if($this->form_validation->run() == FALSE){		
			if(validation_errors()===""){
				$this->load->view("compte/updatePassword");
			}else{
				$result['errorMotDePasse'] = form_error("nouveauMotDePasse");
				$result['errorConfirmNouveauMotDePasse'] = form_error("confirmNouveauMotDePasse");
				$result['errorPassword'] = form_error("motDePasse");	
				echo json_encode($result);
			}
		}else{
			
			$data['closeModal'] = true;
			$data['email'] = $this->session->email;
			$data['nouveauMotDePasse'] = password_hash($this->input->post('nouveauMotDePasse'), PASSWORD_DEFAULT);

			$result['closeModal'] = true;	
			$result['email'] = $this->session->email;
			$result['nouveauMotDePasse'] = $this->input->post('nouveauMotDePasse');

			$this->Personne_model->change_mot_de_passe($data);
			echo json_encode($result);		
		}
	}

	public function valid_pass($candidate)
	{
		$this->load->model('personne_model');
		$data['email'] = $this->session->email;

			$personne = $this->personne_model->get_personne($data);
			$validPassword = false;

			if(!empty($personne)){
				$validPassword = password_verify($candidate, $personne[0]->motDePasse);
			}
		if($validPassword)
			return TRUE;
		else
			return FALSE;

	}

	public function valid_mdp($candidate) {
    	if (preg_match('#[\d]#', $candidate) && preg_match('#[\w]#', $candidate) && preg_match('#[\W]#', $candidate)) {
     		return TRUE;
   		}
   		return FALSE;
	}
}