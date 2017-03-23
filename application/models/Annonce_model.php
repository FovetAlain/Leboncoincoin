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

    public function get_annonce($data)
    {
        if(isset($data['cp'])){
            $this->db->where('cp', $data['cp']);
        }
        if(isset($data['ville'])){
            $this->db->where('ville', $data['ville']);    
        }
        if(isset($data['prix'])){
            $this->db->where('prix <=', $data['prix']);    
        }
        if(isset($data['dateDisponibilite'])){
            $this->db->where('dateDisponibilite >=', $data['dateDisponibilite']);    
        }
        if(isset($data['maison']) && !isset($data['appartement'])){
            $this->db->where('type', 'maison');
        }
        if(isset($data['appartement']) && !isset($data['maison'])){
            $this->db->where('type', 'appartement');
        }
        if(isset($data['pieceMin'])){
            $this->db->where('nombrePieces >=', $data['pieceMin']);
        }
        if(isset($data['pieceMax'])){
            $this->db->where('nombrePieces <=', $data['pieceMax']);
        }
        if(isset($data['surfaceMin'])){
            $this->db->where('surface >=', $data['surfaceMin']);
        }
        if(isset($data['surfaceMax'])){
            $this->db->where('surface <=', $data['surfaceMax']);
        }
        if(isset($data['jardin'])){
          $this->db->where('jardin !=', NULL);
        }
        if(isset($data['garage'])){
            $this->db->where('garage !=', NULL);
        }
        if(isset($data['cave'])){
            $this->db->where('cave !=', NULL);
        }
        

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
