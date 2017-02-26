<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AutoComplete_model extends CI_Model
{

    public function __construct()
    {
            parent::__construct();
    }

	public function getData($value)
    {
    	$this->db->select('ville');
    	$this->db->select('codePostal');
    	$this->db->like('ville', $value, 'after'); 
    	$this->db->or_like('codePostal', $value, 'after');
        $query = $this->db->get('cp_autocomplete'); 
        if($query->num_rows() > 0){
      		foreach ($query->result_array() as $row){
        		$row_set[] = $row['codePostal'] . ' ' . $row['ville']; //build an array
      		}
      		echo json_encode($row_set); //format the array into json data
    	}
    }
}
