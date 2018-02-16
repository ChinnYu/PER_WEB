<?php
	class Allnameoftag_model extends CI_Model{
		
		/* public function addCollection($data){
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
		} */
		
		public function getCollectionname($data){
			$res=$this->db->where(array('user_Id'=>$data['user_Id'],'collection_Tag'=>$data['collection_Tag']))->get('allnameoftag');
			if($res->num_rows() >0){
				return $res->result_array();
			}
			//return $res->result_array();
			else{
				return FALSE;
			}
		}
		public function addCollectionname($data,$data_pass){
			$res=$this->db->where(array('user_Id'=>$data['user_Id']))->get('allnameoftag');
			if ($res->num_rows() >0){
				$bool=$this->db->update('allnameoftag',$data_pass,array('user_Id'=>$data['user_Id'],'collection_Tag'=>$data['collection_Tag']));
				$bool=TRUE;
				return $bool;
			}
			else {
				$bool=$this->db->insert('allnameoftag',$data);
				return 'OK';
			}
		}
		
		public function addNew($data){
			$bool=$this->db->insert('allnameoftag',$data);
			return $bool;
		}
		
		
	}
	