<?php


class Annonces extends CI_Controller {

	public function index()
	{

		$this->load->model('Annonce_model');
	}

	public function affiche_Annonce()
	{
		$pIdAnnonce = $this->input->post('idAnnonce');
		$this->load->model('Annonce_model');
		$data['annonces'] = $this->Annonce_model->get_annonce_by_id($pIdAnnonce);
		$data['photos'] = $this->Annonce_model->get_photos_by_idAnnonce($pIdAnnonce);

		$this->load->view("annonce/annonce",$data);
	}

}