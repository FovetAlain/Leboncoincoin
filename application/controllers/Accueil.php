<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Annonce_model');
		$data['annonces'] = $this->Annonce_model->get_all_annonces();
		$this->load->view('accueil/accueil',$data);
	}

	public function autocomplete(){
		$this->load->model('AutoComplete_model');
		if (isset($_GET['term'])){
      		$value = strtolower($_GET['term']);
      		$this->AutoComplete_model->getData($value);
   		}
		
	}

	public function form_annonce(){
		$this->load->model('Annonce_model');
		$localisation = $this->input->post('localisation');
		$prix = $this->input->post('prix');
		$dateDisponibilite = $this->input->post('dateDisponibilite');
		

		$data = array();
		/*if(!empty($dateDisponibilite)){
			$dateDisponibilite = str_replace('/', '-', $dateDisponibilite);
			$date = date('Y-m-d', strtotime($dateDisponibilite));
			$data['dateDisponibilite'] = $date;
		}*/

		if(null !== ($this->input->post('checkboxMaison'))){
			$data['maison'] = $this->input->post('checkboxMaison');
		}

		if(null !== ($this->input->post('checkboxAppartement'))){
			$data['appartement'] = $this->input->post('checkboxAppartement');
		}

		if(!empty($prix) && is_numeric($prix)){
			$data['prix'] = $prix;
		}
		 	

		if(!empty($localisation)){
            $data['cp'] = substr($localisation,0,5);
            $data['ville'] = substr($localisation,6);
		}

		$result['annonces'] = $this->Annonce_model->get_annonce($data);	
		$this->load->view('annonce/annonce', $result);
	}
	
}
