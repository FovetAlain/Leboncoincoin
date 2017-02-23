class Model_name extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

		public function get_all_annonces()
        {
                query = $this->db->get('annonces'); 
                return $query->result();
        }

}
