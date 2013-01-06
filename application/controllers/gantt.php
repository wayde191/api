<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

global $WP_ROOTPATH;

class Gantt extends CI_Controller {

	public function index()
	{
		;
	}
    
  public function getTasks() {
    
    global $IH_SESSION_LOGGEDIN;
    session_start();
    $awardsArr = array();
    $rowsPerPage = $_POST['rowsPerPage'];
    $pageIndex = $_POST['pageIndex'];
    $recordStartIndex = $rowsPerPage * ($pageIndex - 1);
        
        if (1 || $_SESSION[$IH_SESSION_LOGGEDIN]) {
            $this->load->database();
            
            $query = 'SELECT count(id) as total from wp_scrum_task where project_id=1';
            $query = $this->db->query($query);
            $countString = $query->result();
            $countResult = (int)($countString[0]->total);
            $totalPage = ceil($countResult / $rowsPerPage);
            
            // 11 ~ 20
            $query = 'SELECT * FROM wp_scrum_task limit ' . $recordStartIndex . ',' . $rowsPerPage . ';';
            $query = $this->db->query($query);
            foreach ($query->result() as $row)
            {
              $award = array('class' => 'suggestted', 'text' => $row->id . ' : ' . $row->name, 'id' => $row->id, 'name' => $row->name, 'beginDate' => $row->begin_date, 'endDate' => $row->end_date, 'principal' => $row->principal, 'schedule' => $row->schedule);
              array_push($awardsArr, $award);
            }

            echo json_encode(array("status" => 1, "totalPage" => $totalPage, "data" => $awardsArr));
        } else {
            echo json_encode(array("status" => 0, "errorCode" => -1));
        }
    }
}

?>
