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
        $this->titreAnonce    = $this->input->post('pTitre');  
        $this->texteAnnonce    = $this->input->post('pTexte'); 
        $this->Ville    = $this->input->post('pAdresseVille'); 
        $this->CP    = $this->input->post('pAdresseCP'); 
        $this->lienImage    = $this->input->post('pNomImage'); 
		
        $this->db->insert('annonces', $this);
    }

	public function update_annonce($pIdAnnonce)
    {
    	$this->idAnnonce = $this->input->post('pIdAnnonce');
        $this->titreAnonce    = $this->input->post('pTitre');  
        $this->texteAnnonce    = $this->input->post('pTexte'); 
        $this->adresseVille    = $this->input->post('pAdresseVille'); 
        $this->adresseCP    = $this->input->post('pAdresseCP'); 
        $this->lienImage    = $this->input->post('pNomImage'); 

        $this->db->update('annonces', $this, array('idAnnonce' => $pIdAnnonce));
    }

}
