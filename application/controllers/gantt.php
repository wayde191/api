<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

global $WP_ROOTPATH;

class Gantt extends CI_Controller {

	public function index()
	{
		;
	}
    
  public function getAll() {
    session_start();
    $awardsArr = array();
        
        if (1) {
            $this->load->database();
            
            $query = 'SELECT * FROM wp_scrum_task limit 11,20'; 
            $query = $this->db->query($query);
            foreach ($query->result() as $row)
            {
              $award = array('id' => $row->id, 'text' => $row->name . ' : ' .$row->begin_date);
              array_push($awardsArr, $award);
            }

            echo json_encode(array("status" => 1, "data" => $awardsArr));
        }
    }
}

?>
