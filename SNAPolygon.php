<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Polygon</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 50%;
      }
      #lat {
          position:absolute;
          top:400px;
      }
    </style>
</head>
<?php
require "conn.php";
echo "<br>";
//$sql="SELECT * from reckoner1 ";
//$result= mysqli_query($conn, $sql);
$place=array();

/*while($row=mysqli_fetch_array($result))
{ */  echo "*********************************************************************************************************************";
    echo "<br>";
              $address="On South Maulana Shaukatali Road Byculla, On North Jehangir Boman Behram Marg Byculla (Belasis Road), On East Maulana Azad Road Byculla ";
              echo "Original-->".$address;
              echo "<br>";
               $words=explode(",",$address);
               $s=sizeof($words);
               echo $s.'<br>';
               $k=0;
 			         $i=0;
           if(strpos($words[$i], 'Towards ') !== false )
             {//1
               		
               		while($i<$s)
               		{//2
               			if(strpos($words[$i], '(') != false)
               			{
               		  $pos=strpos($words[$i], '(');
               		 	$pos1=strpos($words[$i], ')');
               		 	$str=$words[$i];
               		 	$str1 = substr($str,0,$pos);
						        $words[$i]=$str1;
			            }
						        echo $words[$i].'<br>';
               	   if(strpos($words[$i], 'and') != false )
               		 {
               		 	$words2=explode("and ",$words[$i]);
               		 	$words3=explode("Towards ",$words2[0]);
               		 	$words4=explode("Towards ",$words2[1]);
               		 	array_shift($words3);
               		 	array_shift($words4);
               		 	 $words1=$words3;
                     $words2=$words4;
               		 	for($j=0;$j<sizeof($words1);$j++)
               		 	{
               		 		echo $words1[$j].'<br>';
               		    }
               		     if(strpos($words1[0], 'West ') !== false )
               		 		West($words1,$place,$k);
               		 	elseif(strpos($words1[0], 'North') !==false )
               		 		North($words1,$place,$k);
               		 	elseif(strpos($words1[0], 'East') !==false )
               		 		East($words1,$place,$k);
               		 	elseif(strpos($words1[0], 'South') !==false )
               		 		South($words1,$place,$k);
                      if(strpos($words2[0], 'West ') !== false )
                      West($words2,$place,$k);
                    elseif(strpos($words2[0], 'North') !==false )
                      North($words2,$place,$k);
                    elseif(strpos($words2[0], 'East') !==false )
                      East($words2,$place,$k);
                    elseif(strpos($words2[0], 'South') !==false )
                      South($words2,$place,$k);
                      echo "<br>******************************************************************************************************************<br>";
               		  }
               		  else
               		  { 
               		 	$words1=explode("Towards ",$words[$i]);
               		 	array_shift($words1);
               		    for($j=0;$j<sizeof($words1);$j++)
               		    {
               		    	echo $words1[$j].'<br>';
               		    }
               		 	 if(strpos($words1[0], 'West ') !== false )
               		 		West($words1,$place,$k);
               		 	elseif(strpos($words1[0], 'North') !== false )
               		 		North($words1,$place,$k);
               		 	elseif(strpos($words1[0], 'East') !== false )
               		 		East($words1,$place,$k);
               		 	elseif(strpos($words1[0], 'South') !== false )
               		 		South($words1,$place,$k);
               		 		echo "<br>***************************************************************************************************************<br>";
               		 		 
               		 
               		}//else
               		$i++;
              } //while		 
         }//if
         		$i=0;
  			   if(strpos($words[$i], 'On ') !== false )
               {
               	  while($i<$s)
               		 {
               			 echo 'Reached2<br>';
               		  if(strpos($words[$i], '(') != false)
               		   {
               		    $pos=strpos($words[$i], '(');
               		 	$pos1=strpos($words[$i], ')');
               		 	$str=$words[$i];
               		 	$str1 = substr($str,0,$pos);
						        $words[$i]=$str1;
						
					          }
					         echo $words[$i];
					     if(strpos($words[$i], 'and') != false )
					       {
               		    $words2=explode("and ",$words[$i]);
               		 	$words3=explode("On ",$words2[0]);
               		 	$words4=explode("On ",$words2[1]);
               		 	array_shift($words3);
               		 	array_shift($words4);
               		 	$words1=$words3;
                    $words2=$words4;
               		 	for($j=0;$j<sizeof($words3);$j++)
               		 	{
               		 		echo $words3[$j].'<br>';
               		    }
                    for($j=0;$j<sizeof($words4);$j++)
                    {
                      echo $words4[$j].'<br>';
                      }
               		 	if(strpos($words1[0], 'West') !== false )
               		 		West($words1,$place,$k);
               		 	elseif(strpos($words1[0], 'North') !== false )
               		 		North($words1,$place,$k);
               		 	elseif(strpos($words1[0], 'East') !== false )
               		 		East($words1,$place,$k);
               		 	elseif(strpos($words1[0], 'South') !== false )
               		 		South($words1,$place,$k);
                    if(strpos($words2[0], 'West ') !== false )
                           West($words2,$place,$k);
                    elseif(strpos($words2[0], 'North') !==false )
                           North($words2,$place,$k);
                    elseif(strpos($words2[0], 'East') !==false )
                           East($words2,$place,$k);
                    elseif(strpos($words2[0], 'South') !==false )
                           South($words2,$place,$k);
               		 	echo "<br>***********************************************************************************************************************<br>";
               		  }
               		  else
               		  {	
               		 	$words1=explode("On ",$words[$i]);
               		 	array_shift($words1);
               		 	echo $words1[0].'<br>';
               		    for($j=0;$j<sizeof($words1);$j++)
               		    {
               		    	echo $words1[$j].'<br>';
               		    }
               		 	if(strpos($words1[0], 'West') !== false )
               		 		West($words1,$place,$k);
               		 	elseif(strpos($words1[0], 'North') !== false )
               		 		North($words1,$place,$k);
               		 	elseif(strpos($words1[0], 'East') !== false )
               		 		East($words1,$place,$k);
               		 	elseif(strpos($words1[0], 'South') !== false )
               		 		South($words1,$place,$k);
               		 	echo "<br>******************************************************************************************************************<br>";
               		  }
               		  $i++;
               		}
               	}
             if(strpos($address, 'to ') != false)
            {
             while($i<$s)
               {
                     if(strpos($words[$i], 'to ') != false )
                     {
                     $words1=explode("Between ",$words[$i]);
                     array_shift($words1);
                     for($j=0;$j<sizeof($words1);$j++)
               		    {
               		    	echo $words1[$j].'<br>';
               		    }
                     $words2=explode("to ",$words1[0]);
                      for($j=0;$j<sizeof($words2);$j++)
               		    {
               		    	echo $words2[$j].'<br>';
               		    }
                     $place[0]=$words2[0];
                     $place[2]=$words2[1];
                     }
                     else 
                     {
                     	$place[1]=$words[$i];
                     	echo $place[1].'<br>';
                     }
                     $i++;
                      echo "<br>******************************************************************************************************************<br>";
                
                }
           }
             $j=0;
           if($s==1)
           {   
                  if(strpos($words[$i], '(') != false)
                    {
                     $pos=strpos($words[$i], '(');
                     $pos1=strpos($words[$i], ')');
                     $str=$words[$i];
                     $str1 = substr($str,0,$pos);
                     $str2 = substr($str,$pos+1,$pos1);
                     $address=$str1;      
                   }
                   else
                     $address=$words[$i];
                      echo "<br>";
               // We get the JSON results from this request
               $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&key=AIzaSyB8iXBJgIGg6rPEP5bDrFItaXMZ-laWlN8');
               // We convert the JSON to an array
                   $geo = json_decode($geo, true);
                // If everything is cool
               if ($geo['status'] = 'OK') 
               {
                 if(isset($geo['results'][0]['geometry']['location']['lat']))
                    $latitude[$j] =  $geo['results'][0]['geometry']['location']['lat'];
                 if(isset($geo['results'][0]['geometry']['location']['lng']))
                    $longitude[$j] = $geo['results'][0]['geometry']['location']['lng'];
                    echo $latitude[$j]."<br>".$longitude[$j].'<br>';
               }
          }
        //   echo $place[0],'<br>Place at index 0';
			for($j=0;$j<sizeof($place);$j++)
			{
				if($j==(sizeof($place)-1))
				{
					$address1= $place[$j];
					$address2= $place[0];
			   }
				else
				{
					$address1= $place[$j];
					$address2= $place[$j+1];
				}     
	            echo "<br>";
	            // We get the JSON results from this request
	            $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address1),urlencode($address2).'&key=AIzaSyB8iXBJgIGg6rPEP5bDrFItaXMZ-laWlN8');
	            // We convert the JSON to an array
	                $geo = json_decode($geo, true);
                // If everything is cool
	            if ($geo['status'] = 'OK') 
	            {
	              if(isset($geo['results'][0]['geometry']['location']['lat']))
	                 $latitude[$j] =  $geo['results'][0]['geometry']['location']['lat'];
	              if(isset($geo['results'][0]['geometry']['location']['lng']))
	                 $longitude[$j] = $geo['results'][0]['geometry']['location']['lng'];
	                 echo $latitude[$j]."<br>".$longitude[$j].'<br>';
	            }
               
        }
	
	echo "<br>Zoom in on the Mumbai region to see the polygon<br>";
              echo json_encode($latitude);
              echo json_encode($longitude);


				  function East(array &$words1,&$place,&$k)
               	  {		
               	  		echo "<br>Reached Function<br>";
               	  		$wordsi=explode("East ",$words1[0]);
               	  		array_shift($wordsi);
               	  		$place[$k]=$wordsi[0];
               	  		echo 'In East function<br>';
               	  		echo $place[$k];
                      ++$k;
               	  }
               	  function West(array &$words1,&$place,&$k)
               	  {
               	  		$wordsi=explode("West ",$words1[0]);
               	  		array_shift($wordsi);
               	  		$place[$k]=$wordsi[0];
               	  		echo 'In West function<br>';
               	  	  echo $place[$k];		
                      ++$k;
               	  }
               	  function North(array &$words1,&$place,&$k)
               	  {
               	  		$wordsi=explode("North ",$words1[0]);
               	  		array_shift($wordsi);
               	  		$place[$k++]=$wordsi[0];
               	  		//echo 'In North function<br>';
               	  	 // echo $place[$k];
               	  }
               	  function South(array &$words1,&$place,&$k)
               	  {
               	  		$wordsi=explode("South ",$words1[0]);
               	  		array_shift($wordsi);
               	  		$place[$k++]=$wordsi[0];
               	  	//	echo 'In South function<br>';
               	  	  //echo $place[$k];
               	  		//++$k;
               	  }

?>
 <body>
    <div id="map"></div>
    <p id="lat"></p>
    <script>

      var latt = <?php echo json_encode($latitude) ?>;
      var lang = <?php echo json_encode($longitude) ?>;
      Latlng=[];
     var l=latt.length;
      for (i = 0; i <l; i += 1) {
        temp = {};
        var a=latt[i];
        var b=lang[i];
        temp["lat"] =a ;
        temp["lng"] =b ;
        Latlng.push(temp);
    }  
      function initMap() {
        var myobject={
                       zoom: 5,
                       mapTypeId: google.maps.MapTypeId.TERRAIN,
                       center: {lat:18.94984,lng:72.82298}
         };
        //  myobject.center.lat=x;
         // myobject.center.lng=y;
        var map = new google.maps.Map(document.getElementById('map'), myobject);
        var bermudaTriangle = new google.maps.Polygon({
          paths: Latlng,//this has to be a json object
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.35
        });
        bermudaTriangle.setMap(map);
      }
    //  google.maps.event.addDomListener(window, 'load', initMap);

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8vDLTHoRwX34nrBHDHLS_cNgu7R_VIl0&callback=initMap">
    </script>
  </body>
</html>

