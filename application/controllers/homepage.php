<?php
	class Homepage extends CI_Controller{
		
		public function index(){
			$this->load->view('home/homepage.html');
		}
		public function infotohtml(){
			$this->load->library('session');
			//var_dump($_SESSION['user']['user_Name']);
			echo json_encode($_SESSION['user']['user_Name']);
		}
	}