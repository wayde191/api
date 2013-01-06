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
    $pageNum = 10;
        
        if (1) {
            $this->load->database();
            
            $query = 'SELECT count(id) as total from wp_scrum_task where project_id=1';
            $query = $this->db->query($query);
            $countString = $query->result();
            $countResult = (int)($countString[0]->total);
            $totalPage = $countResult / $pageNum + ($countResult % $pageNum > 1 ? 1 : 0);
            
            // 11 ~ 20
            $query = 'SELECT * FROM wp_scrum_task limit ' . $pageNum . ',10';
            $query = $this->db->query($query);
            foreach ($query->result() as $row)
            {
              $award = array('taskdisplayname' => $row->id . ' : ' . $row->name, 'id' => $row->id, 'name' => $row->name, 'beginDate' => $row->begin_date, 'endDate' => $row->end_date, 'principal' => $row->principal, 'schedule' => $row->schedule);
              array_push($awardsArr, $award);
            }

            echo json_encode(array("status" => 1, "totalPage" => $totalPage, "data" => $awardsArr));
        }
    }
}

?>
