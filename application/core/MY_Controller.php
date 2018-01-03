<?php
	class MY_controller extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			
			//權限驗證
			$this->checklogin();
			$user=$this->getseinfo();
			//$user=$this->checkidentity();
			$this->userinfo=$user;
		}
		public function checklogin(){
			$this->load->library('session');
			if(isset($_SESSION['user'])){
				
			}
			else{	
				//echo 'not valid';
				/* $this->load->helper('url');
				redirect('login'); */
				header("Location:./login");
				die;
			}
		}
		public function getseinfo(){
			$this->load->library('session');
			//取CI session中的數據
			$user=$this->session->userdata('user');
			return $user;
		}
		public function setseinfo($data){
			$this->load->library('session');
			//$user=array('id'=>$res[0]['user_Id'],'name'=>$res[0]['user_Name']);
			$this->session->set_userdata($data['thingsname'],$data);
		}
		
		public function checkidentity(){
			//$this->load->library('session');
			if($_SESSION['user']['user_Identity']!=0){
				//echo '無權限觀看';
				die('無權限觀看');
			}
			
		}
		
		public function logout(){
			unset($_SESSION['user']);
		}
		
	}