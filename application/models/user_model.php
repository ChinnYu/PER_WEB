<?php
	class User_model extends CI_Model{
		public function getselectHim($data){
			$res=$this->db->where_in('user_Id',$data)->get('user');
			return $res->result_array();
		}
		//返回用戶訊息
		public function getAll(){
			$res=$this->db->where(array('user_Identity'=>1))->get('user');
			return $res->result_array();
		}
		
		public function checkHim($data){
			$res=$this->db->where(array('user_Account'=>$data['user_Account']))->get('user');
			if($res->num_rows() >0){
				return $res->result_array();
			}
			//return $res->result_array();
			else{
				return FALSE;
			}
		}
		
		public function findHim($data){
			$res=$this->db->where($data)->get('user');
			return $res->result_array();
			/* else {
				
				//$res=$this->db->
				$data=array(
					//'User_ID'='T0005'
					'User_Name'=>'LBJ',
					'User_Identity'=>0
				);
				$bool=$this->db->insert('user',$data);
			} */
		}
		
		public function addUser($data){
			$res=$this->db->where(array('user_Info'=>$data['user_Info']))->get('user');
			if ($res->num_rows() > 0){
				//$bool=$this->db->update('user',$data,array('question_Id'=>$data['question_Id']));
				$bool='OK';
				return $bool;
			}
			 else {
				$bool=$this->db->insert('user',$data);
				return $bool;
			}
		}
		
	}
	