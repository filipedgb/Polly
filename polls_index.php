<?php
 include_once('database/connection.php');
?>





<?php
  include('templates/header.php');
?>


<style type="text/css">

body{margin: 0px;  background-color: #4b8ead;}

#prlx_lyr_1{

        position: fixed;

        background: url(polls.png) no-repeat 50% 200px;

        width: 100%;

        height: 800px;
          z-index: 0;

}

#content_layer{position: absolute;}



</style>

<script >

function paralax(){

        var prlx_lyr_1= document.getElementById('prlx_lyr_1');

        prlx_lyr_1.style.top= -(window.pageYOffset /4)+'px';

}

window.addEventListener("scroll", paralax, false);

</script>






<div class="wrapper">

   <main>

        <section class="module parallax parallax-1">
      </section>
   
      <section class="module content">
        <div class="container">
          <h2>Search polls and answer them</h2>
          <p>Polly allows you to search for polls, and answer any of them once as long as they're public. </p>
         
        </div>
      </section>

      <section class="module parallax parallax-2">
        <div class="container">
        </div>
      </section>

      <section class="module content">
       <div class="container">
          <h2>Ask your own questions, public or privately</h2>
          <p> Want to prove a point? Or simply need to decide where you and your friends should meet? Create a poll quickly and share the link with anyone you want. </p>
         
        </div>
      </section>

      <section class="module parallax parallax-3">
        <div class="container">
          <h1>Share</h1>
        </div>
      </section>

      <section class="module content">
       <div class="container">
          <div class="fb-like" data-href="http://paginas.fe.up.pt/~ei12021/ltw_projecto/polls_index.php" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
  <br><br>

        </div>
      </section>

  </main><!-- /main -->

    
</div><!-- /#wrapper -->

<!-- ads -->
<script src="js/fusionad.js"></script>

<!-- analytics -->
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-34160351-1']);
_gaq.push(['_trackPageview']);
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>




<? 
	include('templates/footer.php'); 
?>