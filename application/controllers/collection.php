<?php
	class Collection extends MY_Controller{
		
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
				'user_Id'=>$_SESSION['user']['user_Id'],
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
				'user_Id'=>$_SESSION['user']['user_Id'],
				'collection_Alltag'=>'',
			);
			$res=$this->collectiontag->getCollectiontag($data);
			if($res!=null){
				$tag_flag=0;
				if($res[0]['collection_Alltag']!=Null){//此為判斷有沒重複tag
					$tag_array=explode("@",$res[0]['collection_Alltag']);
					foreach($tag_array as $a){
						if($a==$newtag){
							$tag_flag=1;
						}	
					}
				}
				if($tag_flag!=1){
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
			}else{
				$data['collection_Alltag']=$newtag;
				$res=$this->collectiontag->addNewUsertag($data);
			}
		}
		
			
		public function storecollection(){
			$ddata=array(
				'user_Id'=>$_SESSION['user']['user_Id'],
				'collection_Tag'=>$_POST['topicname'],
				//'collection_Tag'=>$_POST['collection_tag_new'],
				//'collection_Name'=>$this->input->post('collection_name'),
				//'collection_Content'=>$this->input->post('collection_content'),
				
			);
			$topicflag=$_POST['topicflag'];
			if($topicflag=='0'){
				$data=array(
					'user_Id'=>$_SESSION['user']['user_Id'],
					'collection_Tag'=>$_POST['collection_tag_new'],
					'collection_Name'=>$_POST['collection_name'],
					'collection_Content'=>$_POST['collection_content'],
				);
				$newtag=$data['collection_Tag'];
				$this->setnewtag($newtag);
				$this->setallcollectionname($newtag,$data['collection_Name']);
				$this->load->model('Collection_model','collection');
				$bool=$this->collection->addCollection($data);
				$data_json=json_encode($bool);
				echo $data_json;

			}
			else{
				$data=array(
					'user_Id'=>$_SESSION['user']['user_Id'],
					'collection_Tag'=>$_POST['topicname'],
					//'collection_Tag'=>$this->input->post('collection_tag_new'),
					'collection_Name'=>$_POST['collection_name'],
					'collection_Content'=>$_POST['collection_content'],
				);
				$this->setallcollectionname($data['collection_Tag'],$data['collection_Name']);
				$this->load->model('Collection_model','collection');
				$bool=$this->collection->addCollection($data);
				$data_json=json_encode($bool);
				echo $data_json;
				
			}
			//var_dump($flag);
			//var_dump('OK');
		}
		public function setallcollectionname($tag,$newname){//設置tag下的NAME
			$this->load->model('Allnameoftag_model','allnameoftag');
			$data=array(
				'user_Id'=>$_SESSION['user']['user_Id'],
				'collection_Tag'=>$tag,
				'collection_Allname'=>''
			);
			$res=$this->allnameoftag->getCollectionname($data);
			//var_dump($res);
			if($res!=FALSE){
				$new_name=$res[0]['collection_Allname'].'@'.$newname;//結合新的name
				$data['collection_Allname']=$new_name;
				$data_pass=array(
					'collection_Allname'=>$new_name,
				);
				$res=$this->allnameoftag->addCollectionname($data,$data_pass);
			}else{
				$this->allnameoftag->addNew($data);
				$new_name=$newname;//結合新的name
				$data['collection_Allname']=$new_name;
				$data_pass=array(
					'collection_Allname'=>$new_name,
				);
				$res=$this->allnameoftag->addCollectionname($data,$data_pass);
			}
			
		}
		
		public function getnameofcollection(){//get tag下的NAME
			$this->load->model('Allnameoftag_model','allnameoftag');
			$data=array(
				'user_Id'=>$_SESSION['user']['user_Id'],
				'collection_Tag'=>$_POST['tag'],
			);
			$res=$this->allnameoftag->getCollectionname($data);
			$tag_return=array();
			if($res!=FALSE){
				$nameoftag=$res[0]['collection_Allname'];
				$tag_array=explode("@",$res[0]['collection_Allname']);
				foreach($tag_array as $a){
					if($a!="")
						//array_push($tag_return,$a);
						$tag_return[]=$a;
				}
				//var_dump($tag_return);
				echo base64_encode(json_encode($tag_return));
			}
			else{
				echo base64_encode('FALSE');
			}
		}
		
		public function getcollection(){//get collection
			$this->load->model('Collection_model','collection');
			$data=array(
				'user_Id'=>$_SESSION['user']['user_Id'],
				'collection_Tag'=>$_POST['tag'],
				'collection_Name'=>$_POST['coname'],
			);
			$res=$this->collection->getCollectionname($data);
			//$tag_return=array();
			if($res!=FALSE){
				echo json_encode($res[0]['collection_Content']);
			}
			else{
				echo json_encode(FALSE);
			}
		}
		
	}