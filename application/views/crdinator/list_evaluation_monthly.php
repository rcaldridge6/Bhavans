<html>
<head>
<title>Monthly Evaluation List </title>
<?php $this->load->view('crdinator/coordinator_header.php');?>
<?php $this->load->view('crdinator/coordinator_sidebar.php');?>
<div class="main_content">
<?php
if($query==0){echo '<h3> No Students to Display </h3>';}
 else{
echo '<tittle>Monthly Evaluation Report</tittle>';
 echo '<table border=0 cellspacing=25>';
 echo '<tr>
 	<th><h3>Date</h3></th>
 	<th><h3></h3></th>
 	<th><h3></h3></th>
 	<th><h3></h3></th>
 	<th><h3></h3></th>
 	</tr>'; 
 foreach ($query as $q)
 	{
		//echo '<h1>' .$q->scl_id. '</h1>';
		
		echo '</tr>';
		
		echo '<td><h4>';
		echo anchor('/coordinator/list_evaluation_info/'.$q->stu_id. '/' .$q->date,$q->date);
		echo '</h4></td>';
		echo '<td><h4>';
		echo anchor('/coordinator/list_daily_report/'.$q->stu_id,'Daily Report');
		echo '</h4></td>';
		
		
		
		echo '</tr>';
		

		
		
	}
 echo '</table>';
	}
?>
</div>