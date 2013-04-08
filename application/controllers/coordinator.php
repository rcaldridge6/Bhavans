<?php
class Coordinator extends CI_Controller{
	function __construct(){
		
		parent::__construct();
		
		
		//$this->load->views('login_view.php');
	}
	function index(){
	
		if($this->session->userdata('logged_in')){
			
			$this->load->view('crdinator/Home.php');
		}
	}
	
	function sign_out(){
		$this->session->sess_destroy();
		redirect('login');
	}
	function register_student(){
	
		if($this->session->userdata('logged_in')){	
		
			$this->form_validation->set_rules('','','');		
			$stu_info['stu_rollno']=$this->input->post("rollno");
			$stu_info['stu_name']=$this->input->post("name");
			$stu_info['stu_grade']=$this->input->post("grade");
		
			//$insertdate =$this->input->post("dob");
			$dat=$_POST['l1'];
			$mnth=$_POST['l2'];
			$yr=$_POST['l3'];
			$dt=$yr."/".$mnth."/".$dat;			


			//$ins = date($insertdate);
			$stu_info['stu_dob']=$dt;//$this->input->post("dob");
			$stu_info['stu_gender']=$this->input->post("gender");
			$stu_info['stu_father_name']=$this->input->post("fname");
			$stu_info['stu_mother_name']=$this->input->post("mname");
			$stu_info['stu_address']=$this->input->post("addtext");
			$stu_info['stu_ph_res']=$this->input->post("landphone");
			$stu_info['stu_ph_off']=$this->input->post("officephone");
			$stu_info['stu_ph_mob']=$this->input->post("mobile");
			$this->load->model('model_coordinator');
			$this->model_coordinator->register_student($stu_info);
			//$this->load->view('crdinator/reg_sucessfull',$stu_info);
			redirect('coordinator/add_student');
		}	
	}
	
		
	function register_teacher(){
		if($this->session->userdata('logged_in')){
	
		$teacher_info['teacher_first_name']=$this->input->post("fname");
		$teacher_info['teacher_last_name']=$this->input->post("lname");
		$teacher_info['teacher_gender']=$this->input->post("gender");
		$teacher_info['teacher_school']=$this->input->post("school");
		$insertdate =$this->input->post("dob");
		$teacher_info['teacher_dob']=date($insertdate);
		$teacher_info['teacher_address']=$this->input->post("address");
		$teacher_info['teacher_nationality']=$this->input->post("nationality");
		$teacher_info['teacher_photo']=$this->input->post("photo");
		$teacher_info['teacher_phone']=$this->input->post("phone");
		$teacher_info['teacher_email']=$this->input->post("email");
		
		$this->load->model('model_coordinator');
		$this->model_coordinator->register_teacher($teacher_info);

		echo "<script>alert('Updated...')";
		redirect('coordinator/add_teacher');

	}
	}
	
	function register_school(){
		if($this->session->userdata('logged_in')){	
		$school_info['scl_id']=$this->input->post("school_id");
		$school_info['scl_name']=$this->input->post("school_name");
		$school_info['scl_ph']=$this->input->post("phone");
		$school_info['scl_add']=$this->input->post("add");
		
		$this->load->model('model_coordinator');
		$this->model_coordinator->register_school($school_info);
		redirect('coordinator/add_school');
		
	}
	}
	
	
	
	function list_school(){
	if($this->session->userdata('logged_in')){
			$this->load->model('model_coordinator');
			$data['query']= $this->model_coordinator->list_school();
			$this->load->view('crdinator/list_school',$data);
		}
		}
	function list_ref_students(){
		if($this->session->userdata('logged_in')){
			$this->load->model('model_coordinator');
			$data['query']= $this->model_coordinator->list_ref_students();
			$this->load->view('crdinator/list_ref_students',$data);
		}
}
	function list_student(){
	if($this->session->userdata('logged_in')){
			$this->load->model('model_coordinator');
			$data['query']= $this->model_coordinator->list_student();
			$this->load->view('crdinator/list_student',$data);
		}
		}
	function list_teacher(){
	if($this->session->userdata('logged_in')){
			$this->load->model('model_coordinator');
			$data['query']= $this->model_coordinator->list_teacher();
			$this->load->view('crdinator/list_teacher',$data);
		}

	
	}
	
	
	function list_caserecord(){
	if($this->session->userdata('logged_in')){
			$this->load->model('model_coordinator');
			$data['query']= $this->model_coordinator->list_caserecord();
			$this->load->view('crdinator/list_caserecord',$data);
		}
	}
	
	function home(){
	if($this->session->userdata('logged_in')){
	}
	
	}
	
	function list_subject(){
	if($this->session->userdata('logged_in')){
		$this->load->model('model_coordinator');
			$data['query']= $this->model_coordinator->list_subject();
			$this->load->view('crdinator/list_subject',$data);
	}
	
	
	}
	
	
	
	function view_marks_chart($id){
	if($this->session->userdata('logged_in')){
		$this->load->model('model_coordinator');
		$result = $this->model_coordinator->view_marks_chart($id);
		$dat['x_labels'] = 'fa';
		
		$dat['series']=array('eng','hin','mal_san','math','science','social_science','gk');
		$dat['data']=$result;
		if($dat['data']==0){$this->load->view('crdinator/no_data_message');}
		else{
		$this->load->library('highcharts');
		$this->highcharts->set_title('STUDENT SUBJECT MARKS FOR EACH EXAM');
		$this->highcharts->set_axis_titles('Exams', 'Marks');
		$credits->href = '';
		$credits->text = "";
		$this->highcharts->set_credits($credits);
		$this->highcharts->from_result($dat)->add();
		$data['charts'] = $this->highcharts->render();
		$this->load->view('crdinator/view_mark_chart', $data);
		}
	}
	}

	
	function edit_student($id){
	if($this->session->userdata('logged_in')){
		$this->load->model('model_coordinator');
		$data['query']=$this->model_coordinator->edit_student($id);
		$this->load->view('crdinator/update_student',$data);
	}
	}
	function edit_school($id){
		if($this->session->userdata('logged_in')){	
		$this->load->model('model_coordinator');
		$data['query']=$this->model_coordinator->edit_school($id);
		$this->load->view('crdinator/update_school',$data);
	}
	}	
	function edit_teacher($id){
		if($this->session->userdata('logged_in')){
		$this->load->model('model_coordinator');
		$data['query']=$this->model_coordinator->edit_teacher($id);
		$data['query2']= $this->model_coordinator->add_teacher_get();
		$this->load->view('crdinator/update_teacher',$data);
	}
	}
	function update_student($id){
		if($this->session->userdata('logged_in')){
		$stu_info['stu_rollno']=$this->input->post("rollno");
		$stu_info['stu_name']=$this->input->post("name");
		$stu_info['stu_grade']=$this->input->post("grade");
		
		$insertdate =$this->input->post("dob");
		$ins = date($insertdate);
		$stu_info['stu_dob']=$ins;//$this->input->post("dob");
		$stu_info['stu_gender']=$this->input->post("gender");
		$stu_info['stu_father_name']=$this->input->post("fname");
		$stu_info['stu_mother_name']=$this->input->post("mname");
		$stu_info['stu_address']=$this->input->post("addtext");
		$stu_info['stu_ph_res']=$this->input->post("landphone");
		$stu_info['stu_ph_off']=$this->input->post("officephone");
		$stu_info['stu_ph_mob']=$this->input->post("mobile");
		$stu_info['stu_id']=$id;
	
		$this->load->model('model_coordinator');
		$this->model_coordinator->update_student($stu_info);
		redirect('coordinator/list_student');
	
	}}
	
	function update_school($id){
		if($this->session->userdata('logged_in')){
		//$school_info['oscl_id']=$id;
		$school_info['scl_id']=$id;
		$school_info['scl_name']=$this->input->post("school_name");
		$school_info['scl_ph']=$this->input->post("phone");
		$school_info['scl_add']=$this->input->post("add");
		
		$this->load->model('model_coordinator');
		$this->model_coordinator->update_school($school_info);
		redirect('coordinator/list_school');
		
	}
	}
	function update_teacher($id){
		if($this->session->userdata('logged_in')){
		$teacher_info['teacher_first_name']=$this->input->post("fname");
		$teacher_info['teacher_last_name']=$this->input->post("lname");
		$teacher_info['teacher_gender']=$this->input->post("gender");
		$teacher_info['teacher_school']=$this->input->post("school");
		$insertdate =$this->input->post("dob");
		$teacher_info['teacher_dob']=date($insertdate);
		$teacher_info['teacher_address']=$this->input->post("address");
		$teacher_info['teacher_nationality']=$this->input->post("nationality");
		$teacher_info['teacher_photo']=$this->input->post("photo");
		$teacher_info['teacher_phone']=$this->input->post("phone");
		$teacher_info['teacher_email']=$this->input->post("email");
		$teacher_info['teacher_id']=$id;
		
		$this->load->model('model_coordinator');
		$this->model_coordinator->update_teacher($teacher_info);
		redirect('coordinator/list_teacher');	
	}
	}
	function add_teacher(){
		if($this->session->userdata('logged_in')){
		$this->load->model('model_coordinator');
		$data['query']= $this->model_coordinator->add_teacher_get();
		$this->load->view('crdinator/add_teacher.php',$data);
		
	}
	}
	function add_student(){
	if($this->session->userdata('logged_in')){
		if($this->session->userdata('logged_in')){
			$this->load->view('crdinator/add_stu.php');
		}
	}}
	
	function add_school(){
	if($this->session->userdata('logged_in')){
		$this->load->view('crdinator/add_school.php');
	}}
	function add_parent(){
	if($this->session->userdata('logged_in')){
	$this->db->where('id', $id);
		$this->db->update('mytable', $data); 
	}}
	function add_remedial(){
	}
	
	
	
	function remove_school($id){
	if($this->session->userdata('logged_in')){
		$this->load->model('model_coordinator');
		$this->model_coordinator->delete_school($id);
		redirect('coordinator/list_school');
	
	}}
	function remove_student($name){
	if($this->session->userdata('logged_in')){
		$this->load->model('model_coordinator');
		$this->model_coordinator->delete_student($name);
	}}
	function remove_teacher($name){
	if($this->session->userdata('logged_in')){
		$this->load->model('model_coordinator');
		$this->model_coordinator->delete_teacher($name);
	}
	}
	function remove_ref_student($id){
	if($this->session->userdata('logged_in')){
		$this->load->model('model_coordinator');
		$this->model_coordinator->delete_ref_student($id);
		redirect('coordinator/list_ref_students');
	}
	}
	function remove_parent(){
	}
	function remove_remedial(){
	
	}
	
	function ref_student_details($id){
	if($this->session->userdata('logged_in')){
		$this->load->model('model_coordinator');
		$data['query']=$this->model_coordinator->ref_student_info($id);
		$this->load->view('crdinator/ref_student_info',$data);
	}}

	
	function ref_student_report($id){
	if($this->session->userdata('logged_in')){
		$this->load->model('model_coordinator');
		$data['query']=$this->model_coordinator->ref_student_report($id);
		$this->load->view('crdinator/ref_student_report',$data);
	}
	}
	

	function list_student_info($name){
	if($this->session->userdata('logged_in')){
		$this->load->model('model_coordinator');
		$data['query']=$this->model_coordinator->list_student_info($name);
		$this->load->view('crdinator/list_student_info',$data);
	}
	}
	function list_teacher_info($fname){
	if($this->session->userdata('logged_in')){
		$this->load->model('model_coordinator');
		$data['query']=$this->model_coordinator->list_teacher_info($fname);
		$this->load->view('crdinator/list_teacher_info',$data);
	}

	}
	
	function list_caserecord_info($name){
	if($this->session->userdata('logged_in')){
		$this->load->model('model_coordinator');
		$data['query']=$this->model_coordinator->list_caserecord_info($name);
		$this->load->view('crdinator/list_caserecord_info',$data);
	}
	}
}

