<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

global $WP_ROOTPATH;

class Suggestions extends CI_Controller {

	public function index()
	{
		;
	}
    
  public function getAll() {
      
        session_start();
      $awardsArr = array();
        
        if (1) {
            $this->load->database();
            
            $query = 'SELECT * FROM wp_scrum_task'; 
            $query = $this->db->query($query);
            foreach ($query->result() as $row)
            {
              $award = array('id' => $row->ID, 'text' => $row->name . ' : ' .$row->begin_date);
              array_push($awardsArr, $award);
            }

            echo json_encode(array("status" => 1, "data" => $awardsArr));
              
            } else {
              echo json_encode(array("status" => 0));
            }

        } else {
            echo json_encode(array("status" => 0, "errorCode" => -1));
        }
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
