<?php $this->load->view('crdinator/coordinator_header.php');?>
<?php $this->load->view('crdinator/coordinator_sidebar.php');?>
<div class="main_content">
<?php
if($query==0){echo '<h3> No Students to Display </h3>';}
 else{
 echo '<table border=0>';
 foreach ($query as $q)
 	{
		//echo '<h1>' .$q->scl_id. '</h1>';
		
		echo '<tr>';
		echo '<td>';
		//echo '<h1>';
		echo anchor('/coordinator/list_student_info/'.$q->stu_name,$q->stu_name);
		echo '</td>';
		echo '<td>';	
		echo anchor('/coordinator/remove_student/'.$q->stu_name,'Delete');
		//echo '</h1>';
		echo '</td>';
		echo '<td>';
		echo anchor('/coordinator/edit_student/'.$q->stu_name,'Edit');
		echo '</td>';
		echo '</tr>';
		
		

		
		
	}
 echo '</table>';
	}
?>
</div>