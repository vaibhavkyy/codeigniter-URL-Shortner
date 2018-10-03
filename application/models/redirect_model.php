<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redirect_model extends CI_Model{

  public function get_url($id)
  {
    $data = $this->db->where('id',$id)
		                 ->get('urls');
		return $data->row()->url;
  }

}

 ?>
