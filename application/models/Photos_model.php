<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photos_model extends CI_Model
{
	public function create_photo($data)
	{
		$this->lienPhoto = $data['lienPhoto'];  
        $this->fk_idAnnonce = $data['idAnnonce']; 
        $this->principale	 = 1; 
		
        $this->db->insert('photos', $this);
	}
}
