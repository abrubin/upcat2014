<?php

	class Main_model extends CI_Model	{

		function __construct()	{
			parent::__construct();
		}

		function getStudents($page, $studentno = null, $name = null, $campus = null, $degreeprogram = null)	{
			$this->db->select();
			$this->db->from('students');
			if(!is_null($studentno))
				$this->db->like('studentno', strtoupper($studentno));
			if(!is_null($name))
				$this->db->like('name', strtoupper($name));
			if(!is_null($campus))
				$this->db->like('campus', strtoupper($campus));
			if(!is_null($degreeprogram))
				$this->db->like('degprog', strtoupper($degreeprogram));

			if($page != -1)	{
				$this->db->limit(100);
				$this->db->offset(($page-1) * 100);
			}

			$query = $this->db->get();

			if($query->num_rows() == 0)
				return false;

			$return = array();
			$count = 0;

			foreach($query->result() as $result)	{
				$return[$count]['studentno'] = $result->studentno;
				$return[$count]['name'] = $result->name;
				$return[$count]['campus'] = $result->campus;
				$return[$count]['degprog'] = $result->degprog;
				$count++;
			}

			return $return;
		}

		function getCount($studentno = null, $name = null, $campus = null, $degreeprogram = null)	{
			$this->db->select();
			$this->db->from('students');
			if(!is_null($studentno))
				$this->db->like('studentno', strtoupper($studentno));
			if(!is_null($name))
				$this->db->like('name', strtoupper($name));
			if(!is_null($campus))
				$this->db->like('campus', strtoupper($campus));
			if(!is_null($degreeprogram))
				$this->db->like('degprog', strtoupper($degreeprogram));

			$query = $this->db->get();

			return $query->num_rows();
		}

	}