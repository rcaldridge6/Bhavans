<?php $this->load->view('teacher/teacher_header.php');?>
<?php $this->load->view('teacher/teacher_sidebar.php');?>
	<div class="main_content">
	<div class="s_main_content">
	<form name="add_daily_report" id="add_daily_report" method="post" action="<?php echo base_url()?>teacher/register_daily_report">
		<fieldset>
		<ul>
			
			
			<li>
				<label for="sl_no">Student Name</label>
				<?php 
					echo '<select name="stu_id">';
					//echo '<option value="0">-- -- -- -</option>';
					foreach ($query as $q){
					echo '<option value="'.$q->stu_id.'">'.$q->stu_name.'</option>';
		
					}
					echo '</select>'
				?>
			</li>
			
				<li>
				<label for="report">Comments:</label>
				<textarea rows="4" cols="50" name="report" wrap="physical"></textarea><br />

			</li>
<br>
			
			
			
			<button type="submit" value="Submit">Submit</button>
  			<button type="reset" value="Reset">Reset</button>
			</li>
			
			
		</fieldset>		
	</form>
	</div>
	</div>
</div>