<?php 

function curl_post($url,$data)
{
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //https
	$data = curl_exec($ch);
	curl_close($ch);
	// execute!
	return $data;

	
}

	$response = curl_post('https://service789.com/api/football/Tded/cache/ballstep.php',$post);
	$response = json_decode($response,1);
	//print_r($response);
  
 
?>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,400&display=swap">
<link href="<?php echo $web_url; ?>css/ball/jquery-ui.min.css?v=20200524" rel="stylesheet">
<link href="https://tdedball.net/assets/css/main.css?v=20200524" rel="stylesheet">
<link href="<?php echo $web_url; ?>css/ball/mobile.css?v=20200524" rel="stylesheet">
</head>
<style>
.tded .box-tded .tded-row .select:hover {
    background-color: gold !important;
}
.tded .box-tded {
    background: #76bdf1 !important;
}
.tded .box-tded:hover {
    box-shadow: 10px 10px 5px -3px #2196F3;
}
/* Small screen / phone */
@media (max-width: 576px) {
	.tded .box-tded {
	    display: block !important;
	    width: auto !important;
	}
}
/* Extra small screen / phone*/
body {
    margin: 0;
    font-family: "sukhumvit";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #000;
    text-align: left;
    background: url(./assets/images/ball.jpg) center top no-repeat;
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
    -o-background-size: 100% 100%, auto;
    -moz-background-size: 100% 100%, auto;
    -webkit-background-size: 100% 100%, auto;
    background-size: 100% 100%, auto;
}
.test {
	border-style: solid;
    border-color: coral;
    background-color: red;
}
</style>

<div class="container">
   <br>
   <div align="center">
   <div class="test">
   		<h3 style="color: khaki"><i class="fa fa-futbol-o" aria-hidden="true"></i>&nbsp;ทีเด็ดบอลสเต็ป3</h3>
   </div>

 <!--  -->
<?php
$main_head = array(
				array(
					"img"=>"$web_url/css/ball/step3-20200617232123-rTKqjhbdxUNYXniv.jpg",
					"name"=>"สูตรที่1"
				),
				array(
					"img"=>"$web_url/css/ball/step3-20200617232123-rTKqjhbdxUNYXniv.jpg",
					"name"=>"สูตรที่2"
				),
				array(
					"img"=>"$web_url/css/ball/step3-20200617232123-rTKqjhbdxUNYXniv.jpg",
					"name"=>"สูตรที่3"
				),
			); 
  echo '<div class="tded page">';
 foreach($response as $vid => $vdata){
 	if(empty($vdata["head"]))
 	{
 		$vdata["head"] = $main_head[$vid];	
 	}
 		echo <<<ANYTHING
	<div class="box-tded">
				<div class="tded-head">
					<div class="zean-img"><img src="{$vdata["head"]["img"]}" alt="{$vdata["head"]["name"]}"></div>
					<div class="zean-name">{$vdata["head"]["name"]}</div>
				</div>
ANYTHING;


	 	foreach($vdata["body"] as $vid2 => $vbody){
			echo '<div class="tded-row">
				<div class="date">'. $vbody["date"] .'</div>
				<div class="select">
				';
				
				foreach($vbody["list"] as $vbody_data){ //<span class="{$vbody_data["win_lost"][0]}" >{$vbody_data["win_lost"][1]}</span>
					
					echo <<<ANYTHING
						
						<div class="select-row">
							<div class="selected">
								<span class="{$vbody_data["win_lost"][0]}" ></span>
								{$vbody_data["name"]}
							</div>
						</div>
						<div class="clear"></div>
ANYTHING;
	
				}
			echo '</div>'; //end select-row
			echo '</div>'; //end row
		}
		
	echo '</div>';

 }
echo '</div>';
?>
 <!--  -->
   <br>
  </div>
</div>