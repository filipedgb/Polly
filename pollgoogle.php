<? 


  function abc($divName, $item, $link) { ?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
   
      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});
     
      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);


      // Callback that creates and populates a data table, 
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

      // Create the data table.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Choices');
      data.addColumn('number', 'Votes');

      //Adds all the votes
      <?        
        $poll_options = getPollOptions($item['title']);
         foreach($poll_options as $poll_option){
            ?>
            data.addRow(['<?=$poll_option['optionText']?>',<?=$poll_option['counter']?>]);
            <?
         }
      ?>

      // Set chart options
      var options = {/*'title': "<?=$divName?>",*/
      sliceVisibilityThreshold: 0,
                     'width':'300',
                     'height':'300', 'backgroundColor': { fill:'transparent' },'legend.alignment':"center"};

      // Instantiate and draw our chart, passing in some options.


      var chart = new google.visualization.PieChart(document.getElementById("<?=$item['title']?>"));
      chart.draw(data, options);

   
    }

       // And then:
    $(window).resize(function () {
        chart.draw(data, otions);
    });

    </script>

    <script type="text/javascript">
        //create trigger to resizeEnd event     
        $(window).resize(function() {
            if(this.resizeTO) clearTimeout(this.resizeTO);
            this.resizeTO = setTimeout(function() {
                $(this).trigger('resizeEnd');
            }, 500);
        });

        //redraw graph when window resize is completed  
        $(window).on('resizeEnd', function() {
            drawChart(data);
        });


    </script>
    

        <h2><?=$divName?></h2>
        <h3><?=$item['description']?></h3>
       <!-- <div   id="<?=$divName?>" style="background-color:# width:400; height:300"></div>-->

       <div class="pollGoogle" style=" float: left"> 
        <div   id="<?=$divName?>" style="background-color:# ;width:"auto"; height:"auto"; "></div>
        </div>


        <div class="square" style="margin-left: 70%"> 
          
        <div class="fb-share-button" data-href="<?=$link?>" data-layout="button_count"  style="float:right"></div>
            <?$idPoll=$item['id'];
          $src=getSource($idPoll);?>
          <img src="<?=$src?>" alt="" width:"auto"; height:"auto;"> 

        </div>
      

        
    

<? } ?>




