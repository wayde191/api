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
            
            $query = 'SELECT count(id) as total from wp_scrum_task where project_id=1';
            $query = $this->db->query($query);
            $countResult = $query->result();
            var_dump($countResult[0]);
            var_dump($countResult);
            
            $query = 'SELECT * FROM wp_scrum_task limit 10,10'; 
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
