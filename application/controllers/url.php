<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Url extends CI_Controller {

	public function index()
	{
		$this->load->view('redirect_form');
	}

	public function short_url()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('url','URL','required|valid_url');
		if($this->form_validation->run())
		{
			$url = $this->input->post('url');
			$this->db->insert('urls',['url'=>$url]);
			$id = $this->db->insert_id();
			$short_url = site_url("url/connect/$id");
			$this->db->where('id',$id)
			         ->update('urls',['short_url'=>$short_url]);
			$this->session->set_flashdata('short',$short_url);
			redirect('url');
		}
		else {
			$this->load->view('redirect_form');
		}

	}

	public function connect($id='')
	{
		$this->load->model('redirect_model');
		$orignal_url = $this->redirect_model->get_url($id);
		redirect($orignal_url);
	}
}
