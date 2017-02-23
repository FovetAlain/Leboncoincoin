<?php


class Annonces extends CI_Controller {

public function getAllAnnonces()
	{
		$this->load->model('Annonce_model');
		$data['annonces'] = $this->Annonce_model->get_all_annonces();
		return $data;
	}
public function create_annonce($pTitre, $pTexte,$pIdProprietaire,$pAdresseVille, $pAdresseCP, $pNomImage)
    {
        $this->TitreAnonce    = $pTitre;  
        $this->TexteAnnonce    = $pTexte; 
        $this->AdresseVille    = $pAdresseVille; 
        $this->AdresseCP    = $pAdresseCP; 
        $this->lienImage    = $pNomImage; 
		
        $this->db->insert('annonces', $this);
    }

public function update_entry($pIdAnnonce,$pTitre, $pTexte,$pIdProprietaire,$pAdresseVille, $pAdresseCP, $pNomImage)
    {
    	$this->IdAnnonce = $p$pIdAnnonce;
        $this->TitreAnonce    = $pTitre;  
        $this->TexteAnnonce    = $pTexte; 
        $this->AdresseVille    = $pAdresseVille; 
        $this->AdresseCP    = $pAdresseCP; 
        $this->lienImage    = $pNomImage; 

        $this->db->update('annonces', $this, array('IdAnnonce' => $pIdAnnonce));
    }
}
