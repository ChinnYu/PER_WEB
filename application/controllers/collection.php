<?php
	class Collection extends CI_Controller{
		
		public function index(){
			$this->load->view('home/collection.html');
		}
		public function showcollection(){
			$this->load->view('home/showcollection.html');
		}
		
		public function getcollectiontag(){
			$this->load->model('Collectiontag_model','collectiontag');
			$data=array(
				//'user_Id'=>$_SESSION['user']['user_Id'],
				'user_Id'=>1,
			);
			$res=$this->collectiontag->getCollectiontag($data);
			/* if($res!=Null){
				
			} */
			//var_dump($res[0]['collection_Alltag']);
			$tag_return=array();
			if($res[0]['collection_Alltag']!=Null){
				$tag_array=explode("@",$res[0]['collection_Alltag']);
				foreach($tag_array as $a){
					if($a!="")
						//array_push($tag_return,$a);
						$tag_return[]=$a;
				}
				echo base64_encode( json_encode($tag_return));
				//var_dump($tag_return);
			}else{
				
			}
			
			//$tag_array=explode(",",$res[0]['collection_Alltag']);
			//var_dump($tag_array);
			//json_encode($PHP,)
		}
		public function setnewtag($newtag){
			$this->load->model('Collectiontag_model','collectiontag');
			$data=array(
				'user_Id'=>1,
				'collection_Alltag'=>'',
			);
			$res=$this->collectiontag->getCollectiontag($data);
			$new_tag=$res[0]['collection_Alltag'].'@'.$newtag;//結合新的tag
			/* $data=array(
				//'user_Id'=>$_SESSION['user']['user_Id']
				'collection_Alltag'=>$new_tag,
				'user_Id'=>1,
			); */
			$data['collection_Alltag']=$new_tag;
			$data_pass=array(
				'collection_Alltag'=>$new_tag,
			);
			$res=$this->collectiontag->addCollectiontag($data,$data_pass);
		}
		public function storecollection(){
			$ddata=array(
				'user_Id'=>1,
				'collection_Tag'=>$_POST['topicname'],
				//'collection_Tag'=>$_POST['collection_tag_new'],
				//'collection_Name'=>$this->input->post('collection_name'),
				//'collection_Content'=>$this->input->post('collection_content'),
				
			);
			$topicflag=$_POST['topicflag'];
			if($topicflag=='0'){
				$data=array(
					'user_Id'=>1,
					'collection_Tag'=>$_POST['collection_tag_new'],
					'collection_Name'=>$_POST['collection_name'],
					'collection_Content'=>$_POST['collection_content'],
				);
				$newtag=$data['collection_Tag'];
				$this->setnewtag($newtag);
				$this->load->model('Collection_model','collection');
				$bool=$this->collection->addCollection($data);
				$data_json=json_encode($bool);
				echo $data_json;

			}
			else{
				$data=array(
					'user_Id'=>1,
					'collection_Tag'=>$_POST['topicname'],
					//'collection_Tag'=>$this->input->post('collection_tag_new'),
					'collection_Name'=>$_POST['collection_name'],
					'collection_Content'=>$_POST['collection_content'],
				);
				$this->load->model('Collection_model','collection');
				$bool=$this->collection->addCollection($data);
				$data_json=json_encode($bool);
				echo $data_json;
				
			}
			//var_dump($flag);
			//var_dump('OK');
		}
		
	}