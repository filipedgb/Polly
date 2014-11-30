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
		
	foreach($all_polls as $poll) {
		if ((strpos($poll['title'],$_POST['theSearch']) !== false) || (strpos($poll['description'],$_POST['theSearch']) !== false))  {
			array_push($search, $poll);
		}
	}


	$all_polls = $search;
}

?>

