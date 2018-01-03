<?php
	class User extends CI_Controller{
		
		/* public function testdb(){//用來update 資料庫的
			set_time_limit(0);
			$this->load->model('Course_model','course');
			$res=$this->course->getAll();
			//2417
			for($i=0;$i<2417;$i++){
				$w=$i+1;
				file_put_contents("C://Users/L/Downloads/test/correct/this_class_fix.txt","UPDATE `irs_this_class` SET `course_No`="."'".$res[$i]['course_No']."'".",`course_Year`=106,`course_Term`=1 WHERE `class_Id`=".$res[$i]['course_Num'].";"."\n", FILE_APPEND);
			}
			var_dump('OK');
		} */
		
		
		
		
		
		/* public function testdb(){
			set_time_limit(0);
			$this->load->model('Course_model','course');
			$res=$this->course->getAll();
			for($i=0;$i<2417;$i++){
				file_put_contents("C://Users/L/Downloads/test/correct/this_class.txt","(".$res[$i]['user_Id'].","."'".$res[$i]['course_Name']."'".")".","."\n", FILE_APPEND);
			}
			var_dump('OK');
		} */
		
		
		
		public function teststudent_course(){//切割字串student_course的!!!!
			set_time_limit(0);
			$this->load->model('User_model','user');
			$res=$this->user->getAll();
			//var_dump($res);
			$fileData = file_get_contents("C://Users/L/Downloads/test/take_course.txt");
			$stuednt_array=explode("\n",$fileData);
			//68452
			for($i=0;$i<68452;$i++){
					$temp;
					$temp=explode("	",$stuednt_array[$i]);
					$w=0;
					$uid=999999;
					while($res[$w]["user_Info"]!=$temp[0]){
						$w++;
					}
					$uid=$res[$w]['user_Id'];
					//echo "user_Id : ".$uid."user_Info : ".$temp[0]."<br>";
					//$temp=explode(",",$stuednt_array[$i]);
					file_put_contents("C://Users/L/Downloads/test/correct/student_course.txt","("."'".$temp[4]."'".",".$uid.","."'".$temp[5]."'".","."'".$temp[1]."'".","."106".","."1".")".","."\n", FILE_APPEND);
			}
			var_dump('OK');
		}
		
		public function testdb_teach_course(){//切割字串teach_course的!!!!
			set_time_limit(0);
			$this->load->model('User_model','user');
			$res=$this->user->getAll();
			$fileData = file_get_contents("C://Users/L/Downloads/test/teach_course.txt");
			$stuednt_array=explode("\n",$fileData);
			for($i=0;$i<2417;$i++){
					$temp;
					$temp=explode("	",$stuednt_array[$i]);
					$w=0;
					$uid=999999;
					while($res[$w]["user_Info"]!=$temp[0]){
						$w++;
					}
					$uid=$res[$w]['user_Id'];
					file_put_contents("C://Users/L/Downloads/test/correct/course.txt","("."'".$temp[4]."'".",".$uid.","."'".$temp[5]."'".","."106".","."1".")".","."\n", FILE_APPEND);
			}
			var_dump('OK');
			
		}
		
		public function teststustring(){//切割字串teacher的!!!!
			set_time_limit(0);
			//$this->load->model('User_model','user');
			//$res=$this->user->getAll();
			//var_dump($res);
			$fileData = file_get_contents("C://Users/L/Downloads/test/students_list.txt");
			$stuednt_array=explode("\n",$fileData);
			//$temp;
			//$temp=explode("	",$stuednt_array[0]);
			//echo $res[13]['user_Name'];
			//echo $stuednt_array[1];
			//18728
			for($i=0;$i<18728;$i++){
					$temp;
					$temp=explode(",",$stuednt_array[$i]);
					//$w=0;
					/* $uid=999999;
					while($res[$w]["user_Info"]!=$temp[0]){
						$w++;
					} */
					//$uid=$res[$w]['user_Id'];
					//echo "user_Id : ".$uid."user_Info : ".$temp[0]."<br>";
					//$temp=explode(",",$stuednt_array[$i]);
					file_put_contents("C://Users/L/Downloads/test/correct/students.txt","("."1".","."'".$temp[1]."'".","."'".$temp[0]."'".")".","."\n", FILE_APPEND);
			}
			var_dump('OK');
			//print_r($stuednt_array);
			//print_r($temp);
			//var_dump('OK');
			
		}
		
		public function testteastring(){//切割字串teacher的!!!!
			set_time_limit(0);
			//$this->load->model('User_model','user');
			//$res=$this->user->getAll();
			//var_dump($res);
			$fileData = file_get_contents("C://Users/L/Downloads/test/teachers_list.txt");
			$stuednt_array=explode("\n",$fileData);
			//$temp;
			//$temp=explode("	",$stuednt_array[0]);
			//echo $res[13]['user_Name'];
			//echo $stuednt_array[1];
			//1551
			for($i=0;$i<1550;$i++){
					$temp;
					$temp=explode(",",$stuednt_array[$i]);
					//$w=0;
					/* $uid=999999;
					while($res[$w]["user_Info"]!=$temp[0]){
						$w++;
					} */
					//$uid=$res[$w]['user_Id'];
					//echo "user_Id : ".$uid."user_Info : ".$temp[0]."<br>";
					//$temp=explode(",",$stuednt_array[$i]);
					file_put_contents("C://Users/L/Downloads/test/correct/teachers.txt","("."0".","."'".$temp[1]."'".","."'".$temp[0]."'".")".","."\n", FILE_APPEND);
			}
			var_dump('OK');
			//print_r($stuednt_array);
			//print_r($temp);
			//var_dump('OK');
			
		} 
		
		
		/* public function testdb(){//一次清光所有資料
			$this->load->model('User_model','user');
			$userinfo=array(
				'user_Info'=>'606410094'
			);
			$res=$this->user->checkHim($userinfo);
			var_dump($res);
		} */
		
		/* public function testdb(){//一次清光所有資料
			$this->load->model('Student_list_model','student_list');
			$res=$this->student_list->cleantable();
			var_dump($res);
		} */
		/* public function testdb(){//看php第幾版
			
			phpinfo();
		} */
		
		/* public function testdb(){//questionru將要找的id放這,可一次搜尋
			$this->load->model('Question_model','question');
			$data=array(//要找的id放這,可一次搜尋
				'1','2'
			);
			$res=$this->question->findselectQuestion($data);
			var_dump($res);
		} */
		
		/* public function testdb(){//這是user的,要找的id放這,可一次搜尋
			$this->load->model('User_model','user');
			$data=array(//要找的id放這,可一次搜尋
				'13','14','15'
			);
			$res=$this->user->getselectHim($data);
			//echo $res[0]["user_Name"];
			var_dump($res);
		} */ 
		
		/* public function testdb(){//切割字串student_course的!!!!
			set_time_limit(0);
			$this->load->model('User_model','user');
			$res=$this->user->getAll();
			//var_dump($res);
			$fileData = file_get_contents("C://Users/L/Downloads/take_course.txt");
			$stuednt_array=explode("\n",$fileData);
			//$temp;
			//$temp=explode("	",$stuednt_array[0]);
			//echo $res[13]['user_Name'];
			//echo $stuednt_array[1];
			//68452
			for($i=0;$i<68452;$i++){
					$temp;
					$temp=explode("	",$stuednt_array[$i]);
					$w=0;
					$uid=999999;
					while($res[$w]["user_Info"]!=$temp[0]){
						$w++;
					}
					$uid=$res[$w]['user_Id'];
					//echo "user_Id : ".$uid."user_Info : ".$temp[0]."<br>";
					//$temp=explode(",",$stuednt_array[$i]);
					file_put_contents("C://Users/L/Downloads/test/student_course.txt","("."'".$temp[4]."'".",".$uid.","."'".$temp[5]."'".","."'".$temp[1]."'".","."106".","."1".")".","."\n", FILE_APPEND);
			}
			var_dump('OK');
			//print_r($stuednt_array);
			//print_r($temp);
			//var_dump('OK');
			
		} */
		
		/* public function testdb(){//切割字串student_course的!!!!
			set_time_limit(0);
			$this->load->model('User_model','user');
			$res=$this->user->getAll();
			//var_dump($res);
			$fileData = file_get_contents("C://Users/L/Downloads/teach_course.txt");
			$stuednt_array=explode("\n",$fileData);
			//$temp;
			//$temp=explode("	",$stuednt_array[0]);
			//echo $res[13]['user_Name'];
			//echo $stuednt_array[1];
			//68452
			for($i=0;$i<2421;$i++){
					$temp;
					$temp=explode("	",$stuednt_array[$i]);
					$w=0;
					$uid=999999;
					while($res[$w]["user_Info"]!=$temp[0]){
						$w++;
					}
					$uid=$res[$w]['user_Id'];
					//echo "user_Id : ".$uid."user_Info : ".$temp[0]."<br>";
					//$temp=explode(",",$stuednt_array[$i]);
					file_put_contents("C://Users/L/Downloads/test/course.txt","("."'".$temp[4]."'".",".$uid.","."'".$temp[5]."'".","."106".","."1".")".","."\n", FILE_APPEND);
			}
			var_dump('OK');
			//print_r($stuednt_array);
			//print_r($temp);
			//var_dump('OK');
			
		} */
		
		/* public function testdb(){//切割字串_course的!!!!
			set_time_limit(0);
			$this->load->model('User_model','user');
			$res=$this->user->getAll();
			//var_dump($res);
			$fileData = file_get_contents("C://Users/L/Downloads/teach_course.txt");
			$stuednt_array=explode("	",$fileData);
			$temp;
			//echo $res[13]['user_Name'];
			//echo $stuednt_array[1];
			for($i=0;$i<2421;$i++){
				
					$w=0;
					$uid=13;
					while($res[$w]["user_Name"]!=$stuednt_array[$i*6+1]){
						$w++;
					}
					$uid=$res[$w]['user_Id'];
					//echo "user_Id : ".$uid."user_Name : ".$stuednt_array[$i*6+1]."<br>";
					//$temp=explode(",",$stuednt_array[$i]);
					file_put_contents("C://Users/L/Downloads/test/course.txt","("."'".$stuednt_array[$i*6+4]."'".",".$uid.","."'".$stuednt_array[$i*6+5]."'".","."106".","."1".")".","."\n", FILE_APPEND);
			}
			var_dump('OK');
			//print_r($stuednt_array);
			//var_dump('OK');
			
		} */
		/* public function testdb(){//
			$myfile = fopen("C://Users/L/Downloads/Output_students.txt", "r") or die("Unable to open file!");
			echo fread($myfile,filesize("Output_students.txt"));
			fclose($myfile);
		} */
		
		/* public function testdb(){//刪除學生休的課
			$this->load->model('Student_course_model','student_course');
			$data=array(
				'user_Id'=>9,
				'course_No'=>'4105210_01',
				'course_Year'=>'106',
				'course_Term'=>'1',
			);
			$res=$this->student_course->deleteStudentcourse($data);
			var_dump($res);
		} */
		
		/* public function testdb(){//修改學生休的課
			$this->load->model('Student_course_model','student_course');
			$data=array(
				'user_Id'=>9,
				'user_Name'=>'LBJ',
				'course_No'=>'4105210_01',
				'course_Name'=>'llll',
				'course_Year'=>'106',
				'course_Term'=>'1',
			);
			$res=$this->student_course->updateStudentcourse($data);
			var_dump($res);
		} */
		
		/* public function testdb(){//創學生休的課
			$this->load->model('Student_course_model','student_course');
			$data=array(
				'user_Id'=>9,
				'user_Name'=>'LBJ',
				'course_No'=>'4105210_01',
				'course_Name'=>'dsds',
				'course_Year'=>'106',
				'course_Term'=>'1',
			);
			$res=$this->student_course->createStudentcourse($data);
			var_dump($res);
		} */
		
		/* public function testdb(){//找學生休的課
			$this->load->model('Student_course_model','student_course');
			$data=array(
				'user_Id'=>9,
			);
			$res=$this->student_course->findStudentCourse($data);
			var_dump($res);
		} */
		
		/* public function testdb(){//找這堂課的學生名單
			$this->load->model('Student_course_model','student_course');
			$data=array(
				'course_No'=>'4105210_01',
				'course_Year'=>'106',
				'course_Term'=>'1',
			);
			$res=$this->student_course->findStudent($data);
			var_dump($res);
		} */
		/* public function testdb(){//刪除開課
			$this->load->model('Course_model','course');
			$data=array(
				'user_Id'=>27,
				'course_Year'=>'106',
				'course_Term'=>'1',
				'course_No'=>'88888',
			);
			$res=$this->course->deleteCourse($data);
			var_dump($res);
		} */
		
		/* public function testdb(){//修改開課
			$this->load->model('Course_model','course');
			$data=array(
				'user_Id'=>27,
				'course_Year'=>'106',
				'course_Term'=>'1',
				'course_Name'=>'kkkk ',
				'course_No'=>'88888',
			);
			$res=$this->course->updateCourse($data);
			var_dump($res);
		} */
		
		/* public function testdb(){//開課
			$this->load->model('Course_model','course');
			$data=array(
				'user_Id'=>27,
				'course_Year'=>'106',
				'course_Term'=>'1',
				'course_Name'=>'d d d ',
				'course_No'=>'88888',
			);
			$res=$this->course->createCourse($data);
			var_dump($res);
		} */
		
	
		
		/* public function testdb(){//找此人的開課
			$this->load->model('Course_model','course');
			$data=array(
				'user_Id'=>21,
				'course_Year'=>'106',
				'course_Term'=>'1',
			);
			$res=$this->course->findCourse($data);
			var_dump($res);
		} */
		
		/* public function testdb(){//刪除測驗
			$this->load->model('Quiz_model','quiz');
			$data=array(
				'user_Id'=>2,
				'quiz_Name'=>'2017/10/26',	
			);
			$res=$this->quiz->deleteQuiz($data);
		} */
		
		/* public function testdb(){//修改測驗
			$this->load->model('Quiz_model','quiz');
			$data=array(
				'user_Id'=>2,
				'quiz_Name'=>'2017/10/26',	
			);
			$res=$this->quiz->updateQuiz($data);
			//var_dump($res);
		} */
		
		/* public function testdb(){//刪除題庫題目
		$this->load->model('question_model','question');//findpin
		$questiondefault=array(
			'question_Id'=>24
		);
		$bool=$this->question->deleteQuestion($questiondefault);
		var_dump($bool);
		} */
		
		/* public function testdb(){//建學生考卷答案與紀錄答案
			$this->load->model('Student_quiz_model','student_quiz');
			$data=array(
				'class_Id'=>'10',
				'user_Id'=>'4',
				'answer_List'=>'BBDD',
				'random_List'=>'DDBB',
				'student_Opinion'=>3,
				'score_List'=>'10@10@5@6@',
				'student_Quiz_Total_Score'=>53
			);
			$res=$this->student_quiz->createStudent_quiz($data);
			var_dump($res);
		} */
		
		/* public function testdb(){//查詢shadow測驗(個人化)//需處理重複案問題
			$this->load->model('Shadow_quiz_model','shadow_quiz');
			$data=array(
				'quiz_Id'=>'6'
			);
			$res=$this->shadow_quiz->findShadow_quiz($data);
			var_dump($res);
		} */
		
		/* public function testdb(){//新增shadow測驗(個人化)
			$this->load->model('Shadow_quiz_model','shadow_quiz');
			$data=array(
				'quiz_Id'=>6,
				'quiz_Score_List'=>'LCY_50@LBJ_49@',
				'class_Id'=>10,
				'quiz_Time'=>6,
				'shadow_Quiz_opinion'=>3
			);
			$res=$this->shadow_quiz->createShadow_quiz($data);
			var_dump($res);
		} */
		
		
		/* public function testdb(){//抓此人所創測驗
			$this->load->model('Quiz_model','quiz');
			$data=array(
				'user_Id'=>2
			);
			$res=$this->quiz->findQuiz($data);
			var_dump($res);
		} */
		
		/* public function testdb(){//新增測驗
			$this->load->model('Quiz_model','quiz');
			$data=array(
				'user_Id'=>2,
				'quiz_Name'=>'2017/10/26',
				'irs_Quiz_QuestionI_Id'=>'23_'	
			);
			$res=$this->quiz->createQuiz($data);
			var_dump($res);
		} */
		
		/* public function testdb(){//新增至老師名單,但先需判斷此人是否已在USER中，應為連貫動作
			$this->load->model('Teacher_model','teacher');
			$data=array(
				'user_Id'=>5,
			);
			$res=$this->teacher->addTea_user($data);
			var_dump($res);
		} */ 
		
		/* public function testdb(){//修改學生名單學號等等
			$this->load->model('Student_model','student');
			$data=array(
				'user_Id'=>4,
				'student_Id'=>'6888888'
			);
			$res=$this->student->updateStu_user($data);
			var_dump($res);
		} */ 
		
		/* public function testdb(){//新增至學生名單,但先需判斷此人是否已在USER中，應為連貫動作
			$this->load->model('Student_model','student');
			$data=array(
				'user_Id'=>4,
				'user_Name'=>'LOO',
				'student_Id'=>'655555554'
			);
			$res=$this->student->addStu_user($data);
			var_dump($res);
		} */
		
		/* public function testdb(){//新增人員
			$this->load->model('User_model','user');
			$data=array(
				'user_Identity'=>1,
				'user_Name'=>'光晉',
				'user_Email'=>'光晉@CCU'
			);
			$res=$this->user->addUser($data);
			var_dump($res);
		} */
		
		/* public function testdb(){//修改題庫題目
		$this->load->model('question_model','question');//findpin
		$questiondefault=array(
			'question_Chapter'=>'1-3',
			'question_Lession'=>'線性代數',
			'question_Content'=>'請問5+1=?',
			'question_Options'=>'A_2@B_3@C_4@D_6',
			'question_Types'=>'2',
			'question_Tag'=>'bad',
			'question_Time'=>'3',
		);
		$bool=$this->question->updateQuestion($questiondefault);
		//var_dump($bool);
		} */

		
		/* public function testdb(){//修改題庫題目
		$this->load->model('question_model','question');//findpin
		$questiondefault=array(
			'question_Id'=>'2',
			'user_Id'=>'2',
			'question_Chapter'=>'1-888',
			'question_Lession'=>'線性代數',
			'question_Content'=>'請問5+1=?',
			'question_Options'=>'A_2@B_3@C_4@D_6',
			'question_Types'=>'2',
			'question_Tag'=>'bad',
			'question_Time'=>'3',
		);
		$bool=$this->question->updateQuestion($questiondefault);
		var_dump($bool);
		} */
			
			
		/* public function testdb(){//新增題庫題目
			$this->load->model('question_model','question');
			$this->load->model('answer_model','answer');
			$questiondefault=array(
				'question_Id'=>'2',
				'user_Id'=>'2',
				'question_Chapter'=>'1-2',
				'question_Lession'=>'線性代數',
				'question_Content'=>'請問5+1=?',
				'question_Options'=>'A_2@B_3@C_4@D_6',
				'question_Types'=>'2',
				'question_Tag'=>'bad',
				'question_Time'=>'3',
				'used_Times'=>'6'
			);
			$ans=array(
				'question_Id'=>'2',
				'answer'=>'6'
			);
			$bool=$this->question->createQuestion($questiondefault);//新增題庫題目
			$bool=$this->answer->setAns($ans);//設置答案
			var_dump($bool);
		}  */
		
		/* public function testdb(){//抓題庫題目
			$this->load->model('question_model','question');
			$chapterdefault=array(
				'user_Id'=>'2',
				//'question_Chapter'=>'1-1',
			);
			$res=$this->question->findQuestion($chapterdefault);
			var_dump($res);
		} */
		
		/* public function testdb(){//抓題庫題目_chapter分
			$this->load->model('question_model','question');
			$chapterdefault=array(
				'user_Id'=>'2',
				'question_Chapter'=>'1-1',
			);
			$res=$this->question->findQuestion($chapterdefault);
			var_dump($res);
		} */
		
		
		
		/* public function testdb(){//建教室
			$this->load->model('this_class_model','this_class');
			$userprofile=array(
				'user_Id'=>'T0002',
				'class_Name'=>'om5g',
				'PIN'=>8888559, //這要random
				'class_Id'=>'10'
			);
			$bool=$this->this_class->createClass($userprofile);
			var_dump($bool);
		} */
		
		/* public function testdb(){//pincheck&點名等等
			
			$this->load->model('this_class_model','this_class');//findpin
			$PIN=array(
				'PIN'=>'8888559'
			);
			$classId=$this->this_class->findPin($PIN); 
			
			$this->load->model('student_list_model','student_list');
			$data=array(
				'class_Id'=>$classId[0]['class_Id'],
				'user_Id'=>'4',
				'in_Class_Or_Not'=>1,
				'user_Name'=>'LOO'
			);
			$bool=$this->student_list->checkinClass($data);//紀錄有進入教室
			$res=$this->student_list->getParticipants();//點名有到的人
			$res=$this->student_list->getParticipantsnumber();//點名有到的人數
			echo $res;
			 
		} */	
		
		/* public function testdb(){//找歷史成績
			$this->load->model('student_quiz_model','student_quiz');
			$data=array(
				'user_Id'=>'T0003',
			);
			$res=$this->student_quiz->findGradehistory($data);
			var_dump($res);
			echo '<br>';
			echo $res[0]['student_Quiz_Total_Score'];
		} */
		/* public function testdb(){//User_model
			$this->load->model('User_model','user');
			$data=array(
				'user_Name'=>'LBJ',
				'user_Identity'=>1
			);
			$res=$this->user->findHim($data);
			var_dump($res);
		} */
		
		
		public function test9(){
			$this->load->model('User_model','user');
			$res=$this->user->findHim(LCY);
			var_dump($res);
			$data['his_profile']=$res;
			//$data['title'] = 'News archive';
			//$res=$res->result_array();
			//var_dump($res);
			//$userthing=$res->result();
			//echo '<pre>';
			//var_dump($res);
			//$data['user_list']=$res;
			//echo $res[0]['User_Id'];
			//echo $res[0]['User_Id'];
			/* foreach ($res  as $row)
				{
				   echo '<br>';
				   echo 'User_Id:'.$row['User_Id'];
				   echo '<br>';
				   echo 'User_Identity:'.$row['User_Identity'];
				   echo '<br>';
				   echo 'User_Name:'.$row['User_Name'];
				} */
			$this->load->view('user/index',$data);
			
		}
		
		public function test5(){
			//裝載類文件
			$this->load->library('pagination');
			
		}
		
		//添加用戶
		public function add(){
			$this->load->helper('url');
			$this->load->view('user/add');
			
		}
		
		public function insert(){
			var_dump($this->input->post('name'));
			
		}
		
		public function test7(){
			//加載模型,
			//$this->load->model('User_model');
			//調用模型獲取數據
			//$list=$this->User_model->getAll();
			
			//別名
			$this->load->model('User_model','user');
			$list=$this->user->getAll();
			//加載視圖
			$this->load->view('user/index',array(
				'list'=>$list
			));
		}
		
		public function showusers(){
			$this->load->database();
			$sql = 'select * from blog_user';
			$res=$this->db->query($sql);
			$users=$res->result();
			echo '<pre>';
			var_dump($users);
			//$data['user_list']=$users;
			//$this->load->view('user/showusers',$data);
		}
		/* public function add(){
			$this->load->database();
			$sql = "insert into blog_user (name,password) values ('mary',md5('mary'))";
			$bool=$this->db->query($sql);
			if($bool){
				echo '影響行數'.$this->db->affected_rows();
				echo 'Id'.$this->db->insert_id();
			}
			
		} */
		public function test8(){
			//$this->load->database();
			//讀取表單資料
			//$name=$this->input->post('name');
			$data[0]='lili';
			$data[1]='123';
			$sql = "insert into blog_user (name,password) values (?,md5(?))"; 
			$bool=$this->db->query($sql,$data);
			if($bool){
				echo '影響行數'.$this->db->affected_rows();
				echo 'Id'.$this->db->insert_id();
			}
			
		}
		public function index(){
			//echo 'hello bro2';
			//$this->load->vars('tittle','這是標題');
			$list=array(
				array('id'=>1,'name'=>'jack','email'=>'jack@gmail.com'),
				array('id'=>2,'name'=>'vv','email'=>'vv@gmail.com')
			);
			$data['tittle']='這是標題';
			$data['list']=$list;
			$this->load->vars($data);
			$this->load->view('user/index');
		}
		
		protected function test(){
			echo 'hello bro3';
		}
		
		public function _test1(){
			echo 'test1w';
		}
		
		public function test2(){
			$this->_test1();
		}
	}