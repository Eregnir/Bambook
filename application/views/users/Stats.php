<div> 
            <!--Game Gallery Intro-->
            <div class="container container2_2">
                <center>
                    <h1>User Stats</h1>
                    <h3>Always wanted to know more about your fellow gamers? we gotcha!</h3>
                    <img src ="<?php echo base_url('assets/Images/stats.png');?>" style="width: 20%;">
                </center>
                
            </div>
            <br>
           <div style="background-color: white" class="container container2">
               <?php $user=$this->session->all_userdata(); ?>             

                <?php if ($prefs!=NULL):?>
                <?php 
                $xbox = 0;  //has only xbox
                $pc = 0;    //has only pc
                $ps = 0;    //has only ps
                $xnpc = 0;  //has xbox and pc
                $xnps = 0;  //has xbox and ps
                $psnpc = 0; //has ps and pc
                $all = 0;   //has all consoles
                $action = 0;
                $racing = 0;
                $sports = 0;
                ?>
                    <?php 

                    //Calculate console ownership segmentation and favorite genres
                        foreach ($prefs as $pref){
                        if ($pref->genre=='Action'){
                            $action++;
                        }
                        elseif ($pref->genre=="Sports"){
                            $sports++;
                        }
                        else{
                            $racing++;
                        }
                        //if user DOESN'T have ps
                        if ($pref->ps!='1'){
                            if ($pref->pc!='1'){
                                if ($pref->xbox=='1'){
                                    $xbox++;
                                }
                            }
                            else{
                                if ($pref->xbox=='1'){
                                    $xnpc++;
                                }
                                else{
                                    $pc++;
                                }
                            }
                        }
                        //if user HAS ps:
                        else{
                            if ($pref->xbox=='1'){
                                if ($pref->pc=='1'){
                                    $all++;
                                }
                                else{  
                                    $xnps++;
                                }
                            }
                            else{
                                if ($pref->pc=='1'){
                                    $psnpc++;
                                }
                                else{
                                    $ps++;
                                }
                            }

                        }
                    }

                endif;
                    ?>
                    <center>
                        <div><br>
                        <h3>The consoles you own:</h3>
                        <?php
                            foreach ($consoles as $res){
                                if ($res->ps!="1" && $res->pc!="1" && $res->xbox!="1"){
                                    echo ("You don't own any consoles? thats just sad!");
                                }
                                if ($res->ps=="1"){
                                    echo '<img src="https://assafye.mtacloud.co.il/Serverside_Programming/APEGaming/assets/Images/PSG.png" alt="PS" style="display: inline;">';
                                }
                                if ($res->pc=="1"){
                                    echo '<img src="https://assafye.mtacloud.co.il/Serverside_Programming/APEGaming/assets/Images/PCG.png" alt="PC" style="display: inline;">';
                                }
                                if ($res->xbox=="1"){
                                    echo '<img src="https://assafye.mtacloud.co.il/Serverside_Programming/APEGaming/assets/Images/XBOXG.png" alt="XBOX" style="display: inline;">';
                                }
                                
                            }       
                        ?>
                        <br><br>
                        <h3>Other gamers own:</h3>
                            </div>
                            <div id="piechart"></div>
                            <hr style="border-top: 3px solid #bbb; width:70%;" class="solid"><br>
                            <h3>Your Favorite game Genre:</h3>
                            <?php foreach ($consoles as $res){
                                echo '<div class="center input-group-text" style="margin-top:10px; margin-bot: 10px; height: 45px; font-family: cursive; width:30%; background-color: rgb(190, 109, 109); font-size: 20pt;"><b>'.$res->genre.'</b></div>';
                            }
                            ?>
                            <br>
                        <h3>Other gamers like:</h3>
                        <div id="piechart2"></div>

                    </center>
            </div>
            

            <br>
            <button onclick="scrollToTop()" style="margin-bottom:1px;" class="center btn btn-outline-light" type="button">Back to top</button>

        </div>
        <script>
            $("#addtocart").click(function(){
                alt();
            })
        </script>


<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
google.charts.setOnLoadCallback(drawChart2);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Consoles', 'Ownership'],
  ['Playstation', <?php echo $ps?>],
  ['PC', <?php echo $pc?>],
  ['XBOX', <?php echo $xbox?>],
  ['XBOX + PC', <?php echo $xnpc?>],
  ['Playstation + PC', <?php echo $psnpc?>],
  ['Playstation + XBOX', <?php echo $xnps?>],
  ['All', <?php echo $all?>]
]);

  var options = {'title':'Console Ownership Segmentation', 'width':550, 'height':400};
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}

  function drawChart2() {
  var data2 = google.visualization.arrayToDataTable([
  ['Generes', 'Popularity'],
  ['Action', <?php echo $action?>],
  ['Sports', <?php echo $sports?>],
  ['Racing', <?php echo $racing?>]
]);
    var options2 = {'title':'Game Genre Popularity', 'width':550, 'height':400};
    var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));
    chart2.draw(data2, options2);
}
</script>

</body>



</html>

