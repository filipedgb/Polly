<?php

    include_once('database/connection.php');
    include('database/polls_fetch.php');
    include('templates/header.php'); 
    include('user.php');
    include_once('showPolls.php');

    if (isset($_GET['questionnaire']))
        $questionnaire = $_GET['questionnaire'];
    else header('location:polls_index.php');



    $group = getGroupByHash($questionnaire);
    echo $_SESSION['username'];
    if (!checkIfUserOwnsGroup($group, $_SESSION['username'])){
        header('location:polls_index.php');
    }
?>

<div id="newPollmodal" class="centered">
    <form id="loginform"  action= "new_poll_action2.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="username" value="<?=$_SESSION['username']?>">
        <input type="hidden" name="group" value="<?=$questionnaire?>">
        <label for="username">Question Title:</label>
        <input type="text" name="title" id="text" class="txtfield" tabindex="1">
        <label for="username">Select Image:</label>
        <input type="file" name="image" id="text"  tabindex="3">

        <div>
            <input type="button" id="addOption"  value="Add Poll Option" class="flatbtn-blu" />
            <input type="submit" name="newQuestion" id="addQuestion"  value="Next Question" class="flatbtn-blu" />
            <div style=" float: right">
                <input type="submit" name="submit" id="loginbtn" class="flatbtn hidemodal" value="FINISH" tabindex="5">
            </div>
        </div>
        <!-- adiciona duas opçoes ao form (minimo de opçoes na poll) -->
        <script type="text/javascript">
            addOptionRequest();
            addOptionRequest();
        </script>
    </form>
</div>


<?  include('templates/footer.php'); ?>  
