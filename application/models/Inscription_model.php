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

	public function create_locataire()
    {
        $this->NomLocataire    = $this->input->post('NomLocataire');  
        $this->PrenomLocataire    = $this->input->post('PrenomLocataire'); 
        $this->PseudoLocataire    = $this->input->post('PseudoLocataire'); 
        $this->IdFoyer      = $this->input->post('IdFoyer'); //il faudra vérifier l'existence du foyer avant la création
        $this->MailLocataire    = $this->input->post('MailLocataire'); 
		
        $this->db->insert('locataires', $this);
    }

	public function update_annonce($pIdLocataire)
    {
    	$ $this->NomLocataire    = $this->input->post('NomLocataire');  
        $this->PrenomLocataire    = $this->input->post('PrenomLocataire'); 
        $this->PseudoLocataire    = $this->input->post('PseudoLocataire'); 
        $this->IdFoyer      = $this->input->post('IdFoyer'); //il faudra vérifier l'existence du foyer avant la création
        $this->MailLocataire    = $this->input->post('MailLocataire'); 
        

        $this->db->update('locataires', $this, array('IdLocataires' => $pIdLocataire));
    }

}
