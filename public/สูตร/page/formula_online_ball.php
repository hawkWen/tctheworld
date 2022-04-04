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

	$response = curl_post('https://service789.com/api/football/ResultRealTime/server/all.php',$post); //
	$response = json_decode($response,1);
	//print_r($response);
  
 
?>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,400&display=swap">
<link href="https://tdedball.net/assets/css/jquery-ui.min.css?v=20200524" rel="stylesheet">
<link href="https://tdedball.net/assets/css/main.css?v=20200524" rel="stylesheet">
<link href="https://tdedball.net/assets/css/mobile.css?v=20200524" rel="stylesheet">
</head>
<style>
tbody {
    display: table-row-group !important;
    vertical-align: middle !important;
 }
 .table thead th {
    vertical-align: bottom !important;
    border-bottom: 2px solid #dee2e6 !important;
}

.table td, .table th {
    padding: .75rem !important;
    vertical-align: top !important;
    border-top: 1px solid #dee2e6 !important;
}
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
<style>
th:nth-child(1),th:nth-child(2) {
    background: #1583e9; !important;
    color: white !important;
}
td:nth-child(1) {
    background: #8d7a7a; !important;
    color: white !important;
}
tr:hover {
    background-color: pink;
    cursor: pointer;
} 
.card-body {
    background-color: #fff;
    }	
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}

.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
.ts-1 {
    font-size: 20px !important;
    color: white;
}
.head-table-color-1 {
    background-color: #1583e9;
}
/**, ::after, ::before {
    box-sizing: content-box !important;
}*/
.row {
    margin-right: 0px !important;
    margin-left: 0px !important;
}
.img-team-analysis {
    height: 100px !important;
}	
</style>
<div class="container">
   <br>
 <div align="center">
   <div class="test">
   		<h3 style="color: khaki"><i class="fa fa-futbol-o" aria-hidden="true"></i>&nbsp;ผลบอลออนไลน์</h3>
   </div>

 <!--  -->
     
			<div class="row">
                <!-- Contact Form -->
                <div class="col-12 col-lg-12">
					<?php
						//if($_POST){
							//sleep(3);
						$data_result = '
						<div class="card border-info">
							<div class="card-body">
								<div class="table-responsive">
								<table class="table table-mobile500">';
									foreach($response as $key => $data){
										$data_result .=<<<ANYTHING
									<thead class="thead-cs">
										<tr>
											<th colspan="3" class="text-left">
												<h6>
													<img class="flag" width="17" src="{$data["image"]}" alt="{$key}">
													<strong class="font-kanit">{$key}</strong>
												</h6>
											</th>
											<th colspan="2" class="text-right">
												{$data["date"]}
											</th>
										</tr>
									</thead>
ANYTHING;
										foreach($data["data"] as $data2){
										//print_r($data);
										$data_result .=<<<ANYTHING
									<tbody>
										<tr class="match" data-l-id="72">
											<td width="25" valign="middle">
												<p>{$data2["bg-dark1"]}</p>
											</td>
											<td>
												<p>{$data2["defense"]}</p>
												<p>{$data2["attack"]}</p>
											</td>
											<td class="text-center" width="45">
												<p>{$data2["score_defense"]}</p>
												<p>{$data2["score_attack"]}</p>
											</td>
											<td class="text-center" width="45">
												<p class="text-danger mt-live">{$data2["text-info"]}</p>
											</td>
										</tr>
									</tbody>
ANYTHING;
										}
									}
								echo $data_result;
							?>
								</table>
							</div>
						</div>
		
 <!--  -->
   <br>
  </div>
</div>