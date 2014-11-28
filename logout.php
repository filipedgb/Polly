<?php
session_start();
if(session_destroy())
{
header("Location: polls_index.php");
}
?>