<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller	{

	function __construct()	{
		parent::__construct();
	}

	public function index($page = 1)	{
		$this->load->model('main_model');

		if(!empty($_POST))	{
			$studentno = $this->input->post('studentno');
			$name = $this->input->post('name');
			$campus = $this->input->post('campus');
			$degprog = $this->input->post('degprog');

			if(empty($studentno) && empty($name) && empty($campus) && empty($degprog))
				redirect();

			$students = $this->main_model->getStudents(-1, $studentno, $name, $campus, $degprog);
		}
		else 	{
			$this->load->library('pagination');

			$config['base_url'] = base_url().'main/index/';
			$config['per_page'] = 100;
			$config['use_page_numbers'] = TRUE;
			$config['num_links'] = 1;
			$config['total_rows'] = $this->main_model->getCount();
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="current"><a href="">';
			$config['cur_tag_close'] = '</a></li>';
			$config['first_link'] = '&laquo; First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last &raquo;';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = 'Next &gt;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = '&lt; Prev';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$this->pagination->initialize($config);

			$students = $this->main_model->getStudents($page);
		}

		$this->load->view('main-view', compact('students'));
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */