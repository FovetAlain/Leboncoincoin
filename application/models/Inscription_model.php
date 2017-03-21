<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription_model extends CI_Model
{

    public function __construct()
    {
            parent::__construct();
    }

	public function get_all_locataires()
    {
            $query = $this->db->get('locataires'); 
            return $query->result();
    }

    public function create_personne($data)
    {
        $this->nom = $data['nom'];
        $this->prenom = $data['prenom'];
        $this->mail = $data['email']; 
        $this->motDePasse = $data['password'];        
        $this->db->insert('personnes', $this);
    }

	public function create_locataire()
    {
        $this->nomLocataire    = $this->input->post('NomLocataire');  
        $this->prenomLocataire    = $this->input->post('PrenomLocataire'); 
        $this->pseudoLocataire    = $this->input->post('PseudoLocataire'); 
        $this->idFoyer      = $this->input->post('IdFoyer'); //il faudra vérifier l'existence du foyer avant la création
        $this->mailLocataire    = $this->input->post('MailLocataire'); 
		
        $this->db->insert('locataires', $this);
    }

	public function update_annonce($pIdLocataire)
    {
    	$this->nomLocataire    = $this->input->post('NomLocataire');  
        $this->prenomLocataire    = $this->input->post('PrenomLocataire'); 
        $this->pseudoLocataire    = $this->input->post('PseudoLocataire'); 
        $this->idFoyer      = $this->input->post('IdFoyer'); //il faudra vérifier l'existence du foyer avant la création
        $this->mailLocataire    = $this->input->post('MailLocataire'); 
        

        $this->db->update('locataires', $this, array('idLocataires' => $pIdLocataire));
    }

}
