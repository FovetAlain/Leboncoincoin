<?php


class Annonces extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
    }

	public function index()
	{
		if(isset($this->session->logged_in) && $this->session->logged_in === true){
		 	$this->load->view("annonce/formAnnonce", array('error' => ' ' ));
		}
		else{
			$this->session->set_flashdata('category_error', 'Vous devez être connecté pour déposer une annonce');
			redirect('accueil');
		}
	}

	// fonction d'affichage d'une annonce, récupère les données d'une annonce et appele la vue 
	public function affiche_Annonce()
	{
		$pIdAnnonce = $this->input->post('idAnnonce');
		$this->load->model('Annonce_model');
		$data['annonces'] = $this->Annonce_model->get_annonce_by_id($pIdAnnonce);
		$data['photos'] = $this->Annonce_model->get_photos_by_idAnnonce($pIdAnnonce);

		$this->load->view("annonce/annonce",$data);
	}

	public function create_annonce(){
		$this->load->model('annonce_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('titre', 'Titre', 'trim|required|max_length[30]|strip_tags|xss_clean');
		$this->form_validation->set_rules('texte', 'Texte', 'trim|required|max_length[1000]|strip_tags|xss_clean');
		$this->form_validation->set_rules('ville', 'Ville', 'trim|required|max_length[100]|strip_tags|xss_clean');
		$this->form_validation->set_rules('prix', 'prix', 'trim|required|max_length[5]|numeric|strip_tags|xss_clean');
		$this->form_validation->set_rules('surface', 'Surface', 'trim|max_length[4]|numeric|strip_tags|xss_clean');
		
		$this->form_validation->set_message('required', 'Merci de renseigner ce champ');
		$this->form_validation->set_message('max_length', ' %s: le nombre de caractère maximum est %s');
		$this->form_validation->set_message('numeric', ' Merci de renseigner un nombre valide');

		if($this->form_validation->run() == FALSE){		
			
			$result['errorTitre'] = form_error("titre");
			$result['errorTexte'] = form_error("texte");
			$result['errorPrix'] = form_error("prix");
			$result['errorVille'] = form_error("ville");
			$result['errorSurface'] = form_error("surface");	

			echo json_encode($result);	

		}else{
			$data = array();
			$data['texte'] = $this->input->post('texte');
			$data['prix'] = $this->input->post('prix');
			$data['titre'] = $this->input->post('titre');
			$data['surface'] = $this->input->post('surface');
			$localisation = $this->input->post('ville');	 	

			if(!empty($localisation)){
	            $data['cp'] = substr($localisation,0,5);
	            $data['ville'] = substr($localisation,6);
	            $geocodeFromAddr=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$data['cp'].str_replace(' ','',$data['ville']).'&key=AIzaSyAm8pg8T8xmj1A7HFvxpL5iwFzacuBDWLE');
	            $output = json_decode($geocodeFromAddr);
	            $coordonnees = $output->results[0]->geometry->location;	
	            $data['lat'] = $coordonnees->lat;       
	            $data['long'] = $coordonnees->lng;      
			}
			$this->annonce_model->create_annonce($data);
			$result["success"] = $this->db->insert_id();
			echo json_encode($result);
		}		
	}
	public function do_upload()
    {    	
	    $this->load->model('photos_model');
	    $config['upload_path']          = './assets/images/';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['max_size']             = 1000;
	    $config['encrypt_name'] = TRUE;

	    $this->load->library('upload', $config);

	    
	    
	    $this->upload->do_upload('imgInp');

	    $data = array();
	    $data['idAnnonce'] = $this->input->post('idAnnonce');
	    $data['lienPhoto'] = $this->upload->data('file_name');
	    
		$this->photos_model->create_photo($data);
		$this->session->set_flashdata('category_success', 'Votre annonce est enregistrée');
		redirect('accueil');
    }
}