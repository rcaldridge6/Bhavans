<?php $this->load->view('crdinator/coordinator_header.php');?>
<?php $this->load->view('crdinator/coordinator_sidebar.php');?>
<div class="main_content">
<?php
if($query==0){echo '<h3> No Teachers to Display </h3>';}
 else{
 echo '<tittle>Teachers</tittle>';
 echo '<table border=0 cellspacing=25>';
 echo '<tr>
 	<th><h3>Teacher Name</h3></th>
 	<th><h3>View</h3></th>
 	<th><h3>Option</h3></th>
 	</tr>';
 foreach ($query as $q)
 	{
		//echo '<h1>' .$q->scl_id. '</h1>';
		
		echo '<tr>';
		echo '<td><h4>';
		//echo '<h1>';
		echo anchor('/coordinator/list_teacher_info/'.$q->teacher_id);
		echo '</h4></td>';
		echo '<td><h4>';
		echo anchor('/coordinator/edit_teacher/'.$q->teacher_id,'Update Information');
		echo '</h4></td>';
		echo '<td><h4>';	
		echo anchor('/coordinator/remove_teacher/'.$q->teacher_id,'Delete');	
			
		//echo '</h1>';
		echo '</h4></td>';
		
		echo '</tr>';
		
		

		
		
	}
 echo '</table>';
 	}
?>
</div>
