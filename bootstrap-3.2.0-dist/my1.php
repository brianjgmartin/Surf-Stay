 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 101 Template</title>

   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../bootstrap-3.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-3.2.0-dist/css/weather-icons.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-3.2.0-dist/css/myStyle.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 
  <?php include 'm.php';?>
 
    <script type="text/javascript">
        $(document).ready(function(){ 
        $("#myTab li:eq(1) a").tab('show');
        });
    </script>

</head>
<body background="surfimage.jpg">

    <div class="bs-example">
        <form name="m.php"  method="POST">
            <ul class="nav nav-tabs" id="myTab">
                <li>     
                    <form name="m.php"  method="POST">
     
                        <select type="hidden"onchange="submit()" name="location" class="selectpicker show-tick form-control" >
                            <li class="dropdown" >

                                 <option >Choose Location</option>
                                 <option value="685">Achill</option>
                                 <option value="3701">Ballybunion</option>
                                 <option value="1283">Banna Beach</option>
                                 <option value="50">Bundoran</option>
                                 <option value="986">Carrownisky</option>
                                 <option value="1231">Clogherhead</option>
                                 <option value="1500">Easky Left</option>
                                 <option value="1501">Easky Right</option>
                                 <option value="829">Enniscrone</option>
                                 <option value="1227">Garretstown</option>
                                 <option value="3717">Inchodoney</option>
                                 <option value="52">Lahinch</option>
                                 <option value="1505">Mullaghmore</option>
                                 <option value="51">Strandhill</option>
                                 <option value="55">Tramore</option>
                        </select>
                    </form>
                </li>
            <li>
                <a data-toggle="tab" name="location" value="10"href="#dropdown2"><?= $locationdata?></a></li>
          
        </ul>
      
            <div id="dropdown2" class="tab-pane fade" >
                <!-- <h3><?= $weekday?></h3> -->
                    <div  class="col-md-6">

        <table class="table table-bordered">
      
        <thead>
            <tr style="background-color:#afd9ee">
                <th>Time</th>
                <th>Rating<i class="<?= $f?>"></i></th>
                <th>Surf</th>
                <th>Swell</th>
                <th>Wind Speed</th>
                <th>Weather</th>
            </tr>
        </thead>
        <tr class="active">
            <td><strong><?= $actualtime0?></strong></td>
            <td><?php $sRating = []; ?> <?php $fRating = [];
                    for ( $i = 0; $i < $data[0]['solidRating']; $i++) {
                        (array_push($sRating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />'));
                         echo $sRating[$i];
                    }
                    for ( $i = 0; $i < $data[0]['fadedRating']; $i++) {
                        array_push($fRating, '<img src="http://cdnimages.magicseaweed.com/star_empty.png" />');
                        echo $fRating[$i];
                }?>
        </td>

            <td><strong><?= number_format((int)($data[0]['swell']['absMinBreakingHeight']));?> - <?= number_format((int)($data[0]['swell']['absMaxBreakingHeight']));?></strong> <small><?= $data[1]['swell']['unit']?></small></td>            
            <td><strong><?= $data[0]['swell']['components']['combined']['period'];?><small> s </small></stong><i class="msw-swa-<?= ($data[0]['swell']['components']['combined']['direction']);?>"></i></td>
            <td><strong><?= $data[0]['wind']['speed']?> </strong><small><?= $data[0]['wind']['unit']?></smalll>  <i class="msw-ssa-<?= 5 * round($data[0]['wind']['direction']/5);?>"></i></td>
            <td><?= $data[0]['condition']['temperature']?><small>c</small> <img src="<?= $w1?>"></td>
    </tr>
        <tr>
            <td><strong><?= $actualtime1?></strong></td>
            <td>
                <?php 
                    for ( $i = 0; $i < $data[1]['solidRating']; $i++) {
                        (array_push($sRating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />'));
                         echo $sRating[$i];
                    }
                    for ( $i = 0; $i < $data[1]['fadedRating']; $i++) {
                        array_push($fRating, '<img src="http://cdnimages.magicseaweed.com/star_empty.png" />');
                        echo $fRating[$i];
                }?>
            </td>
<td><strong><?= number_format((int)($data[1]['swell']['absMinBreakingHeight']));?> - <?= number_format((int)($data[1]['swell']['absMaxBreakingHeight']));?></strong> <small><?= $data[2]['swell']['unit']?></small></td>            
<td><?= $data[1]['swell']['components']['combined']['period'];?><small> s </small> <i class="msw-swa-<?= 5 * round($data[1]['swell']['components']['combined']['direction']/5);?>"></i></td>
    <td><strong><?= $data[1]['wind']['speed']?> </strong><small><?= $data[0]['wind']['unit']?></smalll>  <i class="msw-ssa-<?= 5 * round($data[1]['wind']['direction']/5);?>"></i></td>        
    <td><?= $data[1]['condition']['temperature']?><small>c</small> <img src="<?= $w2?>"></td>
     
    </tr>
        <tr class="active">
        <!-- <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][0]['name']?></td>  -->
            <td><strong><?= $actualtime2?></strong></td>
              <td><?php
                    for ( $i = 0; $i < $data[2]['solidRating']; $i++) {
                        (array_push($sRating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />'));
                         echo $sRating[$i];
                    }
                    for ( $i = 0; $i < $data[2]['fadedRating']; $i++) {
                        array_push($fRating, '<img src="http://cdnimages.magicseaweed.com/star_empty.png" />');
                        echo $fRating[$i];
                }?></td>
<td><strong><?= number_format((int)($data[2]['swell']['absMinBreakingHeight']));?> - <?= number_format((int)($data[2]['swell']['absMaxBreakingHeight']));?></strong> <small><?= $data[3]['swell']['unit']?></small></td>            
<td><?= $data[2]['swell']['components']['combined']['period'];?> <small> s </small> <i class="msw-swa-<?= 5 * round($data[2]['swell']['components']['combined']['direction']/5);?>"></i></td>
    <td><strong><?= $data[2]['wind']['speed']?>s</strong><small><?= $data[0]['wind']['unit']?></smalll>  <i class="msw-ssa-<?= 5 * round($data[2]['wind']['direction']/5);?>"></i></td>  
    <td><?= $data[2]['condition']['temperature']?><small>c</small> <img src="<?= $w3?>"></td>
     
    </tr>
      
        <tr>
        <!-- <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][0]['name']?></td>  -->
            <td><strong><?= $actualtime3?></strong></td>
               <td><?php
                    for ( $i = 0; $i < $data[3]['solidRating']; $i++) {
                        (array_push($sRating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />'));
                         echo $sRating[$i];
                    }
                    for ( $i = 0; $i < $data[3]['fadedRating']; $i++) {
                        array_push($fRating, '<img src="http://cdnimages.magicseaweed.com/star_empty.png" />');
                        echo $fRating[$i];
                }?></td>
<td><strong><?= number_format((int)($data[3]['swell']['absMinBreakingHeight']));?> - <?= number_format((int)($data[3]['swell']['absMaxBreakingHeight']));?></strong> <small><?= $data[4]['swell']['unit']?></small></td>            
<td><?= $data[3]['swell']['components']['combined']['period'];?> <small> s </small> <i class="msw-swa-<?= 5 * round($data[3]['swell']['components']['combined']['direction']/5);?>"></i></td>
    <td><strong><?= $data[3]['wind']['speed']?> </strong><small><?= $data[0]['wind']['unit']?></smalll>  <i class="msw-ssa-<?= 5 * round($data[3]['wind']['direction']/5);?>"></i></td> 
    <td><?= $data[3]['condition']['temperature']?><small>c</small> <img src="<?= $w4?>"></td>
     
    </tr>

        <tr class="active">
            <td><strong><?= $actualtime4?></strong></td>
             <td><?php
                    for ( $i = 0; $i < $data[4]['solidRating']; $i++) {
                        (array_push($sRating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />'));
                         echo $sRating[$i];
                    }
                    for ( $i = 0; $i < $data[4]['fadedRating']; $i++) {
                        array_push($fRating, '<img src="http://cdnimages.magicseaweed.com/star_empty.png" />');
                        echo $fRating[$i];
                }?></td>
            <td><strong><?= number_format((int)($data[4]['swell']['absMinBreakingHeight']));?> - <?= number_format((int)($data[4]['swell']['absMaxBreakingHeight']));?></strong> <small><?= $data[4]['swell']['unit']?></small></td>
            <td><?= $data[4]['swell']['components']['combined']['period'];?><small> s </small> <i class="msw-swa-<?= 5 * round($data[4]['swell']['components']['combined']['direction']/5);?>"></i></td>
    <td><strong><?= $data[4]['wind']['speed']?> </strong><small><?= $data[4]['wind']['unit']?></smalll>  <i class="msw-ssa-<?= 5 * round($data[4]['wind']['direction']/5);?>"></i></td>      
    <td><?= $data[4]['condition']['temperature']?><small>c</small> <img src="<?= $w5?>"></td>
     
    </tr>

        <tr>
        <!-- <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][0]['name']?></td>  -->
            <td><strong><?= $actualtime5?></strong></td>
             <td><?php
                    for ( $i = 0; $i < $data[5]['solidRating']; $i++) {
                        (array_push($sRating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />'));
                         echo $sRating[$i];
                    }
                    for ( $i = 0; $i < $data[5]['fadedRating']; $i++) {
                        array_push($fRating, '<img src="http://cdnimages.magicseaweed.com/star_empty.png" />');
                        echo $fRating[$i];
                }?></td>
<td><strong><?= number_format((int)($data[5]['swell']['absMinBreakingHeight']));?> - <?= number_format((int)($data[5]['swell']['absMaxBreakingHeight']));?></strong> <small><?= $data[4]['swell']['unit']?></small></td>            
<td><?= $data[5]['swell']['components']['combined']['period'];?><small> s </small> <i class="msw-swa-<?= 5 * round($data[5]['swell']['components']['combined']['direction']/5);?>"></i></td>
    <td><strong><?= $data[5]['wind']['speed']?> </strong><small><?= $data[5]['wind']['unit']?></smalll>  <i class="msw-ssa-<?= 5 * round($data[5]['wind']['direction']/5);?>"></i></td>        
    <td><?= $data[5]['condition']['temperature']?><small>c</small> <img src="<?= $w6?>" align="center"></td>
     
    </tr>

        <tr class="active">
        <!-- <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][0]['name']?></td>  -->
            <td><strong><?= $actualtime6?></strong></td>
             <td><?php
                    for ( $i = 0; $i < $data[6]['solidRating']; $i++) {
                        (array_push($sRating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />'));
                         echo $sRating[$i];
                    }
                    for ( $i = 0; $i < $data[6]['fadedRating']; $i++) {
                        array_push($fRating, '<img src="http://cdnimages.magicseaweed.com/star_empty.png" />');
                        echo $fRating[$i];
                }?></td>
<td><strong><?= number_format((int)($data[6]['swell']['absMinBreakingHeight']));?> - <?= number_format((int)($data[6]['swell']['absMaxBreakingHeight']));?></strong> <small><?= $data[4]['swell']['unit']?></small></td>            
<td><?= $data[6]['swell']['components']['combined']['period'];?><small> s </small> <i class="msw-swa-<?= 5 * round($data[6]['swell']['components']['combined']['direction']/5);?>"></i></td>
    <td><strong><?= $data[6]['wind']['speed']?> </strong><small><?= $data[6]['wind']['unit']?></smalll>  <i class="msw-ssa-<?= 5 * round($data[6]['wind']['direction']/5);?>"></i></td>        
    <td><?= $data[6]['condition']['temperature']?><small>c</small> <img src="<?= $w7?>"></td>
     
    </tr>
      <tr >
        
            <td><strong><?= $actualtime7?></strong></td>
            <td><?php
                    for ( $i = 0; $i < $data[7]['solidRating']; $i++) {
                        (array_push($sRating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />'));
                         echo $sRating[$i];
                    }
                    for ( $i = 0; $i < $data[7]['fadedRating']; $i++) {
                        array_push($fRating, '<img src="http://cdnimages.magicseaweed.com/star_empty.png" />');
                        echo $fRating[$i];
                }?>
            </td>
<td><strong><?= number_format((int)($data[7]['swell']['absMinBreakingHeight']));?> - <?= number_format((int)($data[7]['swell']['absMaxBreakingHeight']));?></strong> <small><?= $data[7]['swell']['unit']?></small></td>            
<td><?= $data[7]['swell']['components']['combined']['period'];?><small> s </small> <i class="msw-swa-<?= 5 * round($data[7]['swell']['components']['combined']['direction']/5);?>"></i></td>
            <td><strong><?= $data[7]['wind']['speed']?> </strong><small><?= $data[0]['wind']['unit']?></smalll>  <i class="msw-ssa-<?= 5 * round($data[7]['wind']['direction']/5);?>"></i></td>        
            <td><?= $data[7]['condition']['temperature']?><small>c</small> <img src="<?= $w8?>"></td>
     
    </tr>
      </table>
      

        </div>
     <div  class="col-md-6">

    <table class="table table-bordered">
      <!--   <colgroup>
        <col span="1" style="background-color:#afd9ee">
        <col style="background-color:#fff">
        <col style="background-color:#afd9ee">
        <col style="background-color:#fff">
    <col style="background-color:#afd9ee">
      </colgroup> -->
        <thead>
            <tr style="background-color:#afd9ee">
                <th>Hotel</th>
                <th>Adrress</th>
                <th>Distance </th>
                <th> Price </th>
                <th>Rating</th>
            </tr>
        </thead>
            <tr>
                <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][0]['name']?></td>
                <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][0]['address1']?>,<?= $data1['HotelListResponse']['HotelList']['HotelSummary'][0]['city']?></td>
<td><?= number_format((float)($data1['HotelListResponse']['HotelList']['HotelSummary'][0]['proximityDistance']), 1, '.', '');?></td>                <td><a href="<?= $v0?>">View</a></td>
                 <td><?php $tripAdvisor_rating = [];

     for ( $i = 0; $i < $data1['HotelListResponse']['HotelList']['HotelSummary'][0]['tripAdvisorRating']; $i++) {
        array_push($tripAdvisor_rating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />');
        $r= $tripAdvisor_rating[$i];
        echo $r;
     }?></td>
                
            </tr>
            <tr class="active">
                 <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][1]['name']?></td>
                <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][1]['address1']?>,<?= $data1['HotelListResponse']['HotelList']['HotelSummary'][1]['city']?></td>
                <td><?= number_format((float)($data1['HotelListResponse']['HotelList']['HotelSummary'][1]['proximityDistance']), 1, '.', '');?></td>
                <td><a href="<?= $v1?>">View</a></td>
                 <td><?php $tripAdvisor_rating = [];

     for ( $i = 0; $i < $data1['HotelListResponse']['HotelList']['HotelSummary'][1]['tripAdvisorRating']; $i++) {
        array_push($tripAdvisor_rating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />');
        $r= $tripAdvisor_rating[$i];
        echo $r;
     }?></td>
                
            </tr>
               <tr >
                 <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][2]['name']?></td>
                <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][2]['address1']?>,<?= $data1['HotelListResponse']['HotelList']['HotelSummary'][2]['city']?></td>
<td><?= number_format((float)($data1['HotelListResponse']['HotelList']['HotelSummary'][2]['proximityDistance']), 1, '.', '');?></td>                <td><a href="<?= $v2?>">View</a></td>
                 <td><?php $tripAdvisor_rating = [];

     for ( $i = 0; $i < $data1['HotelListResponse']['HotelList']['HotelSummary'][2]['tripAdvisorRating']; $i++) {
        array_push($tripAdvisor_rating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />');
        $r= $tripAdvisor_rating[$i];
        echo $r;
     }?></td>
                
            </tr>
             
               <tr class="active">
                 <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][3]['name']?></td>
                <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][3]['address1']?>,<?= $data1['HotelListResponse']['HotelList']['HotelSummary'][3]['city']?></td>
<td><?= number_format((float)($data1['HotelListResponse']['HotelList']['HotelSummary'][3]['proximityDistance']), 1, '.', '');?></td>                <td><a href="<?= $v3?>">View</a></td>
                 <td><?php $tripAdvisor_rating = [];

     for ( $i = 0; $i < $data1['HotelListResponse']['HotelList']['HotelSummary'][3]['tripAdvisorRating']; $i++) {
        array_push($tripAdvisor_rating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />');
        $r= $tripAdvisor_rating[$i];
        echo $r;
     }?></td>
                
            </tr>
                   <tr >
                 <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][4]['name']?></td>
                <td><?= $data1['HotelListResponse']['HotelList']['HotelSummary'][4]['address1']?>,<?= $data1['HotelListResponse']['HotelList']['HotelSummary'][4]['city']?></td>
<td><?= number_format((float)($data1['HotelListResponse']['HotelList']['HotelSummary'][4]['proximityDistance']), 1, '.', '');?></td>                <td><a href="<?= $v3?>">View</a></td>
                 <td><?php $tripAdvisor_rating = [];

     for ( $i = 0; $i < $data1['HotelListResponse']['HotelList']['HotelSummary'][4]['tripAdvisorRating']; $i++) {
        array_push($tripAdvisor_rating, '<img src="http://cdnimages.magicseaweed.com/star_filled.png" />');
        $r= $tripAdvisor_rating[$i];
        echo $r;
     }?></td>
                
            </tr>

      
      </table>
  </div>
</div>

     

         
     <!-- // <script src="http://code.highcharts.com/highcharts.js"></script> -->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
  </body>
</html>