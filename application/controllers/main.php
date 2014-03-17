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
				redirect('main');

			$students = $this->main_model->getStudents(-1, $studentno, $name, $campus, $degprog);
		}
		else 	{
			$this->load->library('pagination');

			$config['base_url'] = base_url().'main/index/';
			$config['per_page'] = 100;
			$config['use_page_numbers'] = TRUE;
			$config['num_links'] = 2;
			$config['total_rows'] = $this->main_model->getCount();
			$this->pagination->initialize($config);

			$students = $this->main_model->getStudents($page);
		}

		$this->load->view('main-view', compact('students'));
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */