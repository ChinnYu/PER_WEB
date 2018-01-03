<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//ar_dump($this);
		//echo $_GET['id'];
		//echo $id.$name;
	//	$this->load->view('welcome_message');
		//echo $this->uri->segment(3);
		//alert($this->input);
		//echo $this->input->server('DOCUMENT_ROOT');
		
		//get
		/* $res=$this->db->get('user');
		foreach($res->result() as $item){
			echo $item->name;
			echo '<br>';
		} */
		
		//insert
		/* 
		$data=array(
			'name'=>'LBJ',
			'PASSWORD'=>md5('LBJ')
		);
		$bool=$this->db->insert('user',$data);
		var_dump($bool); */
		
		//update
		/* $data=array(
			'email'=>'mary@gmail.com',
			'PASSWORD'=>md5('12345'),
		);
		$bool=$this->db->update('user',$data,array('id'=>4));
		var_dump($bool); */
		
		//delete
		/* $bool=$this->db->delete('user',array('id'=>4));
		var_dump($bool); */
		
		/* //selsect id,name from tableName where id>=3 limit 2,3 order by id desc
		$res=$this->db->select('id,name')
			->from('user')
			->where('id >=',3)
			->limit(3,2)//跳過2條,取出3條
			->order_by('id desc ')
			->get();
		//var_dump($res->result());
		echo $this->db->last_query(); */
		
		//$res=$this->db->where('name','jack')->get('user');
		//$res=$this->db->where('name !=','jack')->get('user');
		//$res=$this->db->where(array('name'=>'jack'))->get('user');
		//$res=$this->db->where(array('name'=>'jack','id >'=>2))->get('user');
		//echo $this->db->last_query();
	//	$this->load->view('user/index.html');
		$this->load->view('home/index.html');
		
	}
	public function test()
	{
		echo 'hello bro';
	}
	
}
