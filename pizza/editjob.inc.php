<?php session_start();?>
<div class='main'>
<?php
if (isset($_SESSION['userid']))
{
require('includes/verify.php');
require_once("includes/connection.inc.php");
require_once("includes/functions.inc.php");

$jobid = $_GET['id'];
//echo "jobid = $jobid";

$query = "SELECT jobid,contractor_id,startdate,location,report_to,duration,men,comments,job_map,job_added_by,job_date_added,job_date_modified,job_modified_by,status,filled_positions,visible from jobs WHERE jobid = $jobid"; $result = mysql_query($query) or die('Sorry, could not get jobs at this time..... ');

$result = mysql_query($query) or die('Sorry, could not find job requested'); 
$row = mysql_fetch_array($result, MYSQL_ASSOC) or die('No records retrieved'); 
$contractor_id = $row['contractor_id']; 
$startdate = $row['startdate'];
$startdate = reformat_date("$startdate", "D, F j, Y");
$location = $row['location'];
$report_to = $row['report_to'];
$duration = $row['duration']; 
$men = $row['men']; 
$comments = $row['comments'];
$job_map = $row['job_map'];
$job_added_by = $row['job_added_by'];
$job_date_added = $row['job_date_added'];
$job_date_added = reformat_date("$job_date_added", "D, F j, Y g:i:s A");
$job_date_modified = $row['job_date_modified'];
$job_date_modified = reformat_date("$job_date_modified", "D, F j, Y g:i:s A");
$job_modified_by = $row['job_modified_by'];
$status = $row['status'];
$filled_positions = $row['filled_positions'];
$visible = $row['visible'];
$status1 = "";
$status2 = "";
$status3 = "";

switch ($status) {
	case "1":
	$status1 = "checked";
	break;
	case "2":
	$status2 = "checked";
	break;
	case "3":
	$status3 = "checked";
	break;
}
switch ($visible) {
	case "0":
	$vis0 = "checked";
	break;
	case "1":
	$vis1 = "checked";
	break;
}



require_once("includes/contractorquery.inc.php");

// Retrieve Map List from DB to create dropdown list =================================================================
//====================================================================================================================
$query = "SELECT * from job_maps WHERE visible = '1' ORDER by map_name";   //  {} used to insert variable into statement 
$map_set = mysql_query($query) or die('Sorry, could not get maps at this time ');

if (mysql_num_rows($map_set) == 0) { 
	echo "<h3>Sorry, there are no maps available at this time, please try back later.</h3>"; 
	} else {   
			$selName2 = "map_id";
			$html2 = "<select id=\"map_url\" name=\"".$selName2."\" onchange=\"getMapUrl(this.form.map_id);\">";
			$html2 .= "<option value='0'>Default</option>";
			while( $row=mysql_fetch_array($map_set, MYSQL_ASSOC)){
			$map_id = $row['id'];
			$map_url = $row['map_url'];
			$map_name = $row['map_name'];
			if ($map_url == $job_map) {
				$html2 .= '<option value='.$map_id.' selected=\"selected\">'.$map_name.'</option>';
			} else {
			$html2 .= '<option value='.$map_id.'>'.$map_name.'</option>';
			}
										 }
			$html2 .= '</select>'; 
			}

?>





<form action="index.php" method="post" >
<div class='formHead'>
<h3>Edit this job</h3>

<h3>Contractor:<?php echo"$name"; ?></h3>
<h5>Added by: <span class='highlight'><?php echo"$job_added_by"; ?></span>    On : <?php echo"$job_date_added"; ?> <br/>
Last Modification By :<span class='highlight'><?php echo"$job_modified_by"; ?></span>   On : <?php echo"$job_date_modified"; ?> </h5><br/>
<hr/></div>
<div class='formBody'>

Start Date:<br/><input type="hidden" value="" size="15" name="startdate">
<?php


//get class into the page
require_once('classes/tc_calendar.php');

//instantiate class and set properties
$myCalendar = new tc_calendar("startdate", true, false);
	  $myCalendar->setIcon("images/iconCalendar.gif");
	  $myCalendar->setDate(date('d', strtotime($startdate))
            , date('m', strtotime($startdate))
            , date('Y', strtotime($startdate)));
	  $myCalendar->setYearInterval(2000, 2015);
	  $myCalendar->dateAllow('2010-01-01', '2015-03-01');
	  $myCalendar->setDateFormat('F j Y');

//output the calendar
$myCalendar->writeScript();	 

?>
<br/>

Location :<span class='inputTip'>(Example: American Axle - Three Rivers)</span><br/><input type="text" value="<?php echo"$location"; ?>" size="70" name="location" /><br/>

Report To :<span class='inputTip'>(Example: Shop, Job Trailer, Foremans Name)</span><br/><input type="text" value="<?php echo"$report_to"; ?>" size="70" name="report_to" /><br/>

Duration :<br/><input type="text" value="<?php echo"$duration"; ?>" size="70" name="duration" /><br/>

Men :<span class='inputTip'>(Example: 3 Men Requested - 3 Jobs Filled)</span><br/><input type="text" value="<?php echo"$men"; ?>" size="70" name="men" /><br/>
Jobs Filled By :<br/>  <input type="text" value="<?php echo"$filled_positions"; ?>" size="70" name="filled_positions" /><br/><br/>

Status :  <label><img src='images/green_button.png' title='New Job - Open' /><input type="radio" name="status" value="1" <?php echo"$status1"; ?>/></label>
		  <label><img src='images/yellow_button.png' title='Left Over Job - Open' /><input type="radio" name="status" value="2" <?php echo"$status2"; ?>/></label>
          <label><img src='images/red_button.png' title='Job Filled / Closed'/><input type="radio" name="status" value="3" <?php echo"$status3"; ?>/></label><br/><br/>

Visible To Public : <label><img src='images/visible.png' title='Visible To Public' /><input type="radio" name="visible" value="0" <?php echo "$vis0"; ?> /></label>
					<label><img src='images/invisible.png' title='Invisible To Public'/><input type="radio" name="visible" value="1" <?php echo"$vis1"; ?>/></label><br/><br/>

Map URL :<a href="http://maps.google.com/?ie=UTF8&ll=42.123692,-85.392609&spn=0.782259,2.636719&z=10" target="_blank"> &nbsp; &nbsp; Launch Google Maps &nbsp;</a><?php echo $html2; ?><br/><textarea rows="5" id= "job_map_url" cols="50" name="job_map"><?php echo $job_map; ?></textarea><br/>
<h3>Comments :<span class='inputTip'> (The comments are 'searchable' from the Search box)</span></h3>

<textarea rows="10" cols="50" name="comments"><?php echo"$comments"; ?></textarea><br>

<input type="submit" value="Submit">

<input type="hidden" name="content" value="updatejob">
<input type="hidden" name="id" value="<?php echo"$jobid"; ?>">

</div>
</form>
<?php } ?>
</div>