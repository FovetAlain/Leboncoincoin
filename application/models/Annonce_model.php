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
            $this->db->select('*');
            $this->db->from('annonces');
            $this->db->join('photos', 'photos.fk_idAnnonce = annonces.idAnnonce');
            $this->db->where('principale', '1');
            $query = $this->db->get(); 
            return $query->result();
    }

    public function get_annonce($data)
    {
        $this->db->select('*');
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
            if("immediatement" === $data['dateDisponibilite']){
                $date = date('Y-m-d');
                $this->db->where('dateDisponibilite <=', $date);    
            }
            elseif("1mois" === $data['dateDisponibilite']){
                $dateBefore = date("Y-m-d", strtotime(" +1 months"));
                $dateAfter = date("Y-m-d", strtotime(" +2 months"));
                $this->db->where('dateDisponibilite >=', $dateBefore);
                $this->db->where('dateDisponibilite <', $dateAfter);
            }
            elseif("2mois" === $data['dateDisponibilite']){
                $dateBefore = date("Y-m-d", strtotime(" +2 months"));
                $dateAfter = date("Y-m-d", strtotime(" +3 months"));
                $this->db->where('dateDisponibilite >=', $dateBefore);
                $this->db->where('dateDisponibilite <', $dateAfter);
            }
            elseif("3mois" === $data['dateDisponibilite']){
                $date = date("Y-m-d", strtotime(" +3 months"));
                $this->db->where('dateDisponibilite >=', $date);

            }
              
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
        

        $this->db->from('annonces');
        $this->db->join('photos', 'photos.fk_idAnnonce = annonces.idAnnonce');
        $this->db->where('principale', '1');
        $query = $this->db->get(); 
        return $query->result();

    }

	public function create_annonce($data)
    {
        $this->titreAnonce = $data['titre'];  
        $this->texteAnnonce = $data['texte']; 
        $this->ville = $data['ville']; 
        $this->cp = $data['cp'];
        $this->surface = $data['surface'];
        $this->prix =$data['prix'];
        $this->latitude = $data['lat'];
        $this->longitude = $data['long'];

		
        $this->db->insert('annonces', $this);
    }

	public function update_annonce($pIdAnnonce)
    {
    	$this->idAnnonce = $this->input->post('pIdAnnonce');
        $this->titreAnonce    = $this->input->post('pTitre');  
        $this->texteAnnonce    = $this->input->post('pTexte'); 
        $this->adresseVille    = $this->input->post('pAdresseVille'); 
        $this->adresseCP    = $this->input->post('pAdresseCP');

        //TODO il faut maintenant lier les images aux annonces dans la base photos, a voir aussi au niveau de la création 
        $this->lienImage    = $this->input->post('pNomImage'); 

        $this->db->update('annonces', $this, array('idAnnonce' => $pIdAnnonce));
    }

    public function get_annonce_by_id($pIdAnnonce)
    {
        $this->db->where('idAnnonce', $pIdAnnonce);
        $query = $this->db->get("annonces");
        return $query->result();
    }

    public function get_photos_by_idAnnonce($pIdAnnonce)
    {
        $this->db->where('fk_idAnnonce', $pIdAnnonce);
        $query = $this->db->get("photos");
        return $query->result();
    }

}
