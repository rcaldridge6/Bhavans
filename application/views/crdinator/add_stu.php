<?php $this->load->view('crdinator/coordinator_header.php');?>
<?php $this->load->view('crdinator/coordinator_sidebar.php');?>




	<div class="main_content">
	<form name="add_student" id="add_student" method="post" action="<?php echo base_url()?>coordinator/register_student">
		
		<fieldset> 
		<ul>
		
			<li>
				<label for="name">Name</label>
				<input type="text" id="name" name="name"/>
			</li>
		
			<li>
				<label for="rollno">Roll No</label>
				<input type="text" id="rollno" name="rollno"/>
			</li>
			<li>
			
				<label for="grade"> Grade</label>
				<input type="text" id="grade" name="grade"/>
			</li>
			<li>
				<label for="dob"> Date of Birth</label>
				
			</li>

<link rel="stylesheet" type="text/css" href="http://localhost/codeigniter/datepickercontrol.css" />



	
Date:<input type="text" name="edit1" id="edit1" datepicker="tr" datepicker_format="YYYY-MM-DD">

<!-- 


        
  <select id="l1" name="l1">
	<?php	
	for($j=1;$j<=31;$j++)
	{
      echo "<option>$j</option>";
      
     }
	
     ?>
    </select>
      <select id="l2" name="l2">
	  <?php	
	   for($k=1;$k<=12;$k++)
	    {
           echo "<option>$k</option>";
      
         }
		 
       ?>
            </select>
      <select id="l3" name="l3">
	  <?php
			for($i=2013;$i>=1900;$i--)
			{
				echo "<option>$i</option>";
			}
			
	  ?>        
      </select>
  </li>


-->










			
			<li>
				<label> Gender</label>				
				<input type="radio" id="gender_male" value="1" name="gender"/>
				<label for="gender_male">Male</label>
				<input type="radio" id="gender_female" value="0" name="gender"  />
				<label for="gender_female">Female</label>
				
			</li>
			<br>
			<li>
				<label for="fname">Father's Name</label>
				<input type="text" id="fname" name="fname"/>
			</li>
			<li>
				<label for="mname">Mother's Name</label>
				<input type="text" id="mname" name="mname"/>
			</li>
			<li>
				<label for="addtext">Address</label>
				<textarea id="addtext" name="addtext"> </textarea>
			</li>
			<li>
				<label for="landphone">Lanline No</label>
				<input type="text" id="landphone" name="landphone"/>
			</li>
			<li>
				<label for="officephone">Office No</label>
				<input type="text" id="officephone" name="officephone"/>

			</li>
			<li>
			
				<label for="mobile">Mobile No</label>
				<input type="text" id="mobile" name="mobile"/>
			</li>
			<li>
			
			<button type="submit" value="Submit">Submit</button>
  			<button type="reset" value="Reset">Reset</button>
			</li>
			
			
		</fieldset>		
	</form>
</tr>
<input type="hidden" id="DPC_TODAY_TEXT" value="today">
<input type="hidden" id="DPC_BUTTON_TITLE" value="Open calendar...">
<input type="hidden" id="DPC_MONTH_NAMES" value="['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']">
<input type="hidden" id="DPC_DAY_NAMES" value="['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']">
</td>
<br><br>
	</div>
</div>
