<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

	public function index()
	{
		$this->load->model('Annonce_model');
		$data['annonces'] = $this->Annonce_model->get_all_annonces();
		$this->load->view('accueil/accueil',$data);
	}

	//fonction utilisée pour l'autocomplete des filtres par ville
	public function autocomplete(){
		$this->load->model('AutoComplete_model');
		if (isset($_GET['term'])){
      		$value = strtolower($_GET['term']);
      		$this->AutoComplete_model->getData($value);
   		}
		
	}

	// récupération des critères de recherche saisis via le formulaire des filtres	
	public function form_annonce(){
		$this->load->model('Annonce_model');
		$localisation = $this->input->post('localisation');
		$prix = $this->input->post('prix');
		$dateDisponibilite = $this->input->post('dateDisponibilite');
		$pieceMin = $this->input->post('pieceMin');
		$pieceMax = $this->input->post('pieceMax');
		$surfaceMin = $this->input->post('surfaceMin');
		$surfaceMax = $this->input->post('surfaceMax');


		$data = array();
		if(!empty($dateDisponibilite)){
			$data['dateDisponibilite'] = $dateDisponibilite;
		}

		if("false" !== ($this->input->post('checkboxMaison'))){
			$data['maison'] = $this->input->post('checkboxMaison');
		}

		if("false" !== ($this->input->post('checkboxAppartement'))){
			$data['appartement'] = $this->input->post('checkboxAppartement');
		}

		if("false" !== ($this->input->post('checkboxCave'))){
			$data['cave'] = $this->input->post('checkboxCave');
		}

		if("false" !== ($this->input->post('checkboxJardin'))){
			$data['jardin'] = $this->input->post('checkboxJardin');
		}

		if("false" !== ($this->input->post('checkboxGarage'))){
			$data['garage'] = $this->input->post('checkboxGarage');
		}

		if(!empty($prix) && is_numeric($prix)){
			$data['prix'] = $prix;
		}

		if(!empty($pieceMin)){
			$data['pieceMin'] = $pieceMin;
		}
		if(!empty($pieceMax)){
			$data['pieceMax'] = $pieceMax;
		}
		if(!empty($surfaceMin)){
			$data['surfaceMin'] = $surfaceMin;
		}
		if(!empty($surfaceMax)){
			$data['surfaceMax'] = $surfaceMax;
		}		 	

		if(!empty($localisation)){
            $data['cp'] = substr($localisation,0,5);
            $data['ville'] = substr($localisation,6);
		}

		$annonces['annonces'] = $this->Annonce_model->get_annonce($data);	
		$result['container'] = $this->load->view('layout/annonce', $annonces, TRUE);
		$result['annonces'] = $annonces['annonces'];
		echo json_encode($result);
	}
	
}
