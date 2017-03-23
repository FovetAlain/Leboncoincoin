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
		 	$lData['email']=$this->session->email; // prend l'email stocké en session pour aller chercher le reste en base
		 	$data['utilisateurConnecte'] = $this->Personne_model->get_personne($lData); // recupere en base l'utilisateur grace au mail stocké en session
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
			$data['emailActuel'] = $this->input->post('emailActuel');
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
}