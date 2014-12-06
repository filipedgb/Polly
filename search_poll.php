<?php
  include_once('database/polls_fetch.php');
  //$all_polls = getAllPolls();
?>



<div id="searchDiv">
 <form method="post">
		<input id="searchBox"type="text" name="theSearch">
		<input id="searchButton" type="submit" value="Search" class="flatbtn">
</form>
</div>



<?php 

if($_SERVER["REQUEST_METHOD"] == "POST")
{

	$search = array();
		
	foreach($all_groups as $group) {
		if ((strpos($group['title'],$_POST['theSearch']) !== false) || (strpos($group['description'],$_POST['theSearch']) !== false)) {
			array_push($search, $group);
		}
	}


	$all_groups = $search;
}

?>

