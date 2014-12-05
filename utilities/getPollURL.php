<?
	function curPageURL() {
	 $pageURL = 'http';
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
	}
	
	function getPollUrl($poll_hash){
		$url = parse_url(curPageURL());
		$path = dirname($url['path']);
		$host = $url['host'];
		$link = $path."/single_poll.php?poll=".$poll_hash;
		return $link;
	}

	function getGroupUrl($group_hash){
		$url = parse_url(curPageURL());
		$path = dirname($url['path']);
		$link = $path."/single_group.php?group=".$group_hash;
		return $link;
	}

	function getGroupUrlFull($group_hash){
		$url = parse_url(curPageURL());
		$scheme = $url['scheme'];
		$path = dirname($url['path']);
		$host = $url['host'];
		$link = $scheme.'://'.$host.$path."/single_group.php?group=".$group_hash;
		return $link;
	}

	function getUrlWithoutPage(){
		$url = parse_url(curPageURL());
		$host = $url['host'];
		$path = dirname($url['path']);
		$link = $host.$path;
		return $link;
	}

	function getPageFileName(){
		$url = parse_url(curPageURL());
		$page = basename($url['path']);
		return $page;
	}

?>