<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MonCompte extends CI_Controller {

	public function index(){
		$this->load->model('Annonce_model');
		$data['annonces'] = $this->Annonce_model->get_all_annonces();
		 $this->load->model('personne_model');

		 // si il y a des donées en session car un utilisateur est connecté, il faut aller chercher les données en base pour remplir les champs.


		 $this->load->view('monCompte/monCompte', $data);

	}

}