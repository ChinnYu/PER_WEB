<?php
	class Login extends CI_Controller{
		
		public function index(){
			//$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->helper('captcha');
			$vals=array(
				'img_path' =>'./captcha/',
				'img_url' => base_url().'captcha/',
				'img_width'=>'150',
				'img_height'=>30,
				'expirayion'=>60*10
			);
			$cap = create_captcha($vals);
			$cap_pass=array(
				'word'=>$cap['word'],
			);
			$this->session->set_userdata('cap',$cap_pass);
			$this->load->view('home/login.html',array('cap'=>$cap['image']));
		}
		public function setinfo(){
			$user_pass=array(
				'user_Account'=>$this->input->post('account'),//$_POST['account'],
				'user_pwd'=>$this->input->post('pwd')//$_POST['pwd']
			);
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('account','帳號','required');
			$this->form_validation->set_rules('pwd','密碼','required');
			$this->form_validation->set_rules('cap','驗證碼','required');
			$bool=$this->form_validation->run();
			if($bool){
				//var_dump('yes');
				$this->load->model('User_model','user');
				$res=$this->user->checkHim($user_pass);
				//if($res==){}
				if($res!=FALSE){
					$p=md5($res[0]['user_Pwd']);
					$p=$p.$res[0]['user_Info'];
					$this->load->library('session');
					$cap=strtolower($_SESSION['cap']['word']);
					$p=md5($p);
					//var_dump('1.: '.$p);
					$p=$p.$cap;
					$p=md5($p);
					//var_dump('2.: '.$p);
					$p=md5($p);
					//var_dump('3.: '.$p);
					if($p==$user_pass['user_pwd']){
						if(!isset($_SESSION['user'])){ 
							$user=array('user_Id'=>$res[0]['user_Id'],'user_Name'=>$res[0]['user_Name'],'user_Identity'=>$res[0]['user_Identity']);
							$this->session->set_userdata('user',$user);
						}
						$this->load->view('home/homepage.html');
					}
					else{
						var_dump('密碼錯誤');
					}
				}
				else{
					var_dump('無此帳號');
				}
			}else{
				//顯示錯誤訊息
				var_dump('需全部填');
				//$this->load->view('user/add');
			}
			//var_dump($user_pass);
			/* $this->load->model('User_model','user');
			$res=$this->user->checkHim($user_pass);
			$p=md5($res[0]['user_Pwd']);
			$p=$p.$res[0]['user_Info'];
			$cap=strtolower($_SESSION['cap']['word']);
			$p=md5($p);
			//var_dump('1.: '.$p);
			$p=$p.$cap;
			$p=md5($p);
			//var_dump('2.: '.$p);
			$p=md5($p);
			//var_dump('3.: '.$p);
			if($p==$user_pass['user_pwd']){
				if(!isset($_SESSION['user']))
				$this->load->view('home/homepage.html');
			} */
			/* if($temp!="fault"){
				$userinfo=array(
					'user_Info'=>$temp
				);
				
				$this->load->model('User_model','user');
				$res=$this->user->checkHim($userinfo);
				//var_dump($res);
				foreach ($res  as $row)
					{
					   echo '<br>';
					   echo 'User_Id:'.$row['user_Id'];
					   echo '<br>';
					   echo 'User_Identity:'.$row['user_Identity'];
					   echo '<br>';
					   echo 'User_Name:'.$row['user_Name'];
					}
				if($res!= NULL){
					$this->load->library('session');
					$this->load->helper('url');
					//$user=array('user_Id'=>$res[0]['user_Id'],'user_Name'=>$res[0]['user_Name']);
					//$this->session->set_userdata('user_Id', $res[0]['user_Id']);
					//$this->session->set_userdata('user',$user);
					
					if(!isset($_SESSION['user'])){ 
						$user=array('user_Id'=>$res[0]['user_Id'],'user_Name'=>$res[0]['user_Name'],'user_Identity'=>$res[0]['user_Identity']);
						$this->session->set_userdata('user',$user);
					}
					
					if($res[0]['user_Identity']==1){
						//redirect('/studenthome/');
						//$this->load->view('FOUNDCLASS/StudentHomePage.html');
						header("Location: ./studenthome");
						//header("Location: ../index.php/teacherhome");
					}
					else if($res[0]['user_Identity']==0){
						//$this->load->view('FOUNDCLASS/TeacherHome.html');
						header("Location: ./teacherhome");
					}
				}
				else{
					echo '有登入了,或無權限,';
				}
			}
			else{
				$this->load->view('FOUNDCLASS/login_error.html');
			}
			else if($res[0]['user_Identity']==3){
				
			} */
			//$this->load->view('user/showusers');
			//var_dump($user_pass);
		}
		public function logout(){
			$this->load->library('session');
			unset($_SESSION['user']);
			header("Location: ./");
		}
		/* public function getseinfo(){
			$this->load->library('session');
			//取CI session中的數據
			$user=$this->session->userdata('user');
			var_dump($user);
		}
		public function setseinfo(){
			$this->load->library('session');
			$user=array('id'=>$res[0]['user_Id'],'name'=>$res[0]['user_Name']);
			$this->session->set_userdata('user',$user);
		}
		
		public function logout(){
			unset($_SESSION['user']);
		}
		public function encrypt_user($data){
			/* $this->load->library('encryption');
			$this->encryption->initialize(
				array(
					'cipher' => 'aes-128',
					'mode' => 'cbc',
					'key' => 'ecourse@irs#!',
					//'iv' =>'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0'
				)
			);
			$ciphertext = $this->encryption->encrypt($data);
			//$cipher = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0");
			//var_dump($cipher);
			//$test='7e6364cb20e28e66f99f944418437228f6a9838e8dba92c7b2a41e5ebb554c30628507abd091aa00fbfdf4ed39992bb4965f14526d956de07a85653f1e13d006zKUnaXStgwct9Tt7vSiPjadLJ25ek9FmAPzUEkabdoiGJnyXfs9xjSja60fecUTi';
			//echo $this->encryption->decrypt($ciphertext);
			//return $this->encryption->decrypt($test);
			//return base64_encode($ciphertext); */
		/* 	$key = 'ecourse@irs#!';
			// Remove the base64 encoding from our key
			$encryption_key = base64_decode($key);
			// Generate an initialization vector
			$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
			// Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
			$encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
			// The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
			return base64_encode($encrypted . '::' . $iv);

			
		}
		public function curl($enc_arg){
			$curl = curl_init();
			curl_setopt($curl,CURLOPT_URL,"https://ecourse.ccu.edu.tw/php/api/irs.php?action=verifyUser&arg=".$enc_arg);
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
			curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
			$response=curl_exec($curl);
			//$response=curl_multi_getcontent($curl);//回傳狀態
			//print_r(curl_exec($response));
			//var_dump($response);
			curl_close($curl);
			$temp = trim($response, "\xEF\xBB\xBF");
			return $temp;
		} */
		
		
		
		
		
	}