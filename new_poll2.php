<?php

    include_once('database/connection.php');
    include('database/polls_fetch.php');
    include('templates/header.php'); 
    include('user.php');
    include_once('templates/showPolls.php');

    if (isset($_GET['questionnaire']))
        $questionnaire = $_GET['questionnaire'];
    else header('location:polls_index.php');



    $group = getGroupByHash($questionnaire);
    //echo $_SESSION['username'];
    if (!checkIfUserOwnsGroup($group, $_SESSION['username'])){
        header('location:polls_index.php');
    }
?>

<div id="newPollmodal" class="centered">
    <form class="newPoll" id="loginform"  action= "" method="post" enctype="multipart/form-data">
        <input type="hidden" name="username" value="<?=$_SESSION['username']?>">
        <input type="hidden" name="group" value="<?=$group['groupId']?>">
        <label for="username">Question Title:</label>
        <input type="text" name="title" id="text" class="txtfield" tabindex="1">
        <label for="username">Select Image:</label>
        <input type="file" name="image" id="text"  tabindex="3">

        <div>
            <input type="button" id="addOption"  value="Add Poll Option" class="flatbtn-blu" />
            <input type="submit" name="newQuestion" id="addQuestion"  value="Add Question" class="flatbtn-blu" />
            <a style=" float: right" href="manage_polls.php">
                <input name="submit" id="loginbtn" class="flatbtn hidemodal" value="FINISH" tabindex="5">
            </a>
        </div>
        <!-- adiciona duas opçoes ao form (minimo de opçoes na poll) -->
        <script type="text/javascript">
            addOptionRequest();
            addOptionRequest();
        </script>
    </form>
</div>
<div id="result"> </div>


<script>
    /* Attach a submit handler to the form */
    $(".newPoll#loginform").submit(function(event) {

        /* Stop form from submitting normally */
        event.preventDefault();

        /* Clear result div*/
        $("#result").html('');

        /* Get some values from elements on the page: */
        //var values = $(this).serialize();
        var values = new FormData($(this)[0]);
        //console.log(values);
        /* Send the data using post and put the results in a div */
        $.ajax({
            url: "new_poll_action2.php",
            type: "post",
            data: values,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                /*alert("success");*/
              
                //<?$group = getGroupByHash($questionnaire);?>
                  //  console.log('gg'+'<?=$group['title']?>');
                $("#result").html('<center><p>PREVIEW:</p></center>'+data);
                //$("#result").html('<?$group = getGroupByHash($questionnaire);?>'+'<center><p>PREVIEW:</p></center>'+'<?=showPollGroupAnswerPreview($group)?>');
                $("[id=text]").val('');

            },
            error:function(){
                /*alert("failure");*/
                $("#result").html('There is error while submit');
            }
        });
    });

</script>

<?  include('templates/footer.php'); ?>  
