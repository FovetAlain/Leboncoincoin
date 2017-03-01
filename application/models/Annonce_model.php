<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Annonce_model extends CI_Model
{

    public function __construct()
    {
            parent::__construct();
    }

	public function get_all_annonces()
    {
            $query = $this->db->get('annonces'); 
            return $query->result();
    }

	public function create_annonce()
    {
        $this->TitreAnonce    = $this->input->post('pTitre');  
        $this->TexteAnnonce    = $this->input->post('pTexte'); 
        $this->AdresseVille    = $this->input->post('pAdresseVille'); 
        $this->AdresseCP    = $this->input->post('pAdresseCP'); 
        $this->lienImage    = $this->input->post('pNomImage'); 
		
        $this->db->insert('annonces', $this);
    }

	public function update_annonce($pIdAnnonce)
    {
    	$this->IdAnnonce = $this->input->post('pIdAnnonce');
        $this->TitreAnonce    = $this->input->post('pTitre');  
        $this->TexteAnnonce    = $this->input->post('pTexte'); 
        $this->AdresseVille    = $this->input->post('pAdresseVille'); 
        $this->AdresseCP    = $this->input->post('pAdresseCP'); 
        $this->lienImage    = $this->input->post('pNomImage'); 

        $this->db->update('annonces', $this, array('IdAnnonce' => $pIdAnnonce));
    }

}
