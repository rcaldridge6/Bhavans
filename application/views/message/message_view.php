


<?php

if($this->session->userdata('user_cat')==1){
	$this->load->view('crdinator/coordinator_header.php');
	$this->load->view('crdinator/coordinator_sidebar.php');
}
else{
	
	$this->load->view('teacher/teacher_header.php');
	$this->load->view('teacher/teacher_sidebar.php');
	
}
?>	


<div class="main_content">
<?php
if($query==0){echo '<h3> No Messages To  Display </h3>';}
 else{
 echo '<tittle>Messages</tittle>';
 echo '<table border=0 cellspacing=25>';
 echo '<tr>
 	<th><h3>From</h3></th>
 	<th><h3>Subject</h3></th>
 	<th><h3>View</h3></th>
 	</tr>';
 foreach ($query as $q)
 	{
		//echo '<h1>' .$q->scl_id. '</h1>';
		
		echo '<tr>';
		echo '<td><h4>';
		//echo '<h1>';
		echo anchor('/coordinator/list_teacher_info/'.$q->teacher_first_name,$q->teacher_first_name);
		echo '</h4></td>';
		echo '<td><h4>';
		echo anchor('/coordinator/edit_teacher/'.$q->teacher_id,'Update Information');
		echo '</h4></td>';
		echo '<td><h4>';	
		echo anchor('/coordinator/remove_teacher/'.$q->teacher_first_name,'Delete');		
		//echo '</h1>';
		echo '</h4></td>';
		
		echo '</tr>';
		
		

		
		
	}
 echo '</table>';
 	}
?>
</div>
