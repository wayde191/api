<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

global $WP_ROOTPATH;

class Gantt extends CI_Controller {

	public function index()
	{
		;
	}
    
  public function getTasks() {
    session_start();
    $awardsArr = array();
        
        if (1) {
            $this->load->database();
            
            $query = 'SELECT count(id) as total from wp_scrum_task where project_id=1';
            $query = $this->db->query($query);
            $countString = $query->result();
            $countResult = (int)($countString[0]->total);
            $pageNum = 10;
            
            // 11 ~ 20
            $query = 'SELECT * FROM wp_scrum_task limit ' . $pageNum . ',10';
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
