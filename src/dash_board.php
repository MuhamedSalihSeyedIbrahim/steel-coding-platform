<?php
include '../config/db_config.php';
session_start();
if(! isset($_SESSION['loginned'])||$_SESSION["loginned"]==false)
		echo "<script type='text/javascript'>window.location ='./index.php';</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
		.prb_st{
						 border:solid 2px grey;
						 border-radius:20px;
						 height:35px;
						 font-size:20px;
						 text-align: center;
				   }

		.prb_st:hover {
									  background-color: black;
										color:white;
										cursor: pointer; cursor: hand;
									}
</style>
<title>Steel-Platform_Dash-Board</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link href="../libs/pagination/pagination.css" rel="stylesheet" type="text/css" />
		<link href="../libs/pagination/A_green.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Core CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
	  <link href="../public/css/general.css" rel="stylesheet">
	  <link href="../public/css/metisMenu.min.css" rel="stylesheet">
    <link href="../public/css/timeline.css" rel="stylesheet">
    <link href="../public/css/startmin.css" rel="stylesheet">
    <link href="../public/css/morris.css" rel="stylesheet">
    <link href="../public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
</head>
<body>

<?php include './header.php';?>
		<!-- Page Content -->
    <div id="page-wrapper" style="margin-top: -2%;padding-top: 0px; margin-left: 0px;">
        <div class="container-fluid">
        <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" id="problem_name">Courses To Crack</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
											<?php
											include '../config/db_config.php';

													try {

																$link = mysqli_connect($servername,$username, $password,$dbname);
																if (!$link) {
																    					die('Could not connect: ' . mysqli_error());
																						}
																include '../libs/pagination/function.php';
																$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
																$limit = 10; //if you want to dispaly 10 records per page then you have to change here
																$startpoint = ($page * $limit) - $limit;
																$statement = "steelplatform_question where not contestid = 'dailychallenge'  "; //you have to pass your query over here
																$res=mysqli_query($link,"select DISTINCT(contestid) from {$statement} LIMIT {$startpoint} , {$limit}");
																while($row=mysqli_fetch_array($res))
																	{
																		echo "<p  class='prb_st'   onClick='forward_to_contest(this.id);' id='".$row['contestid']."'> ".$row["contestid"]."</p>";
																	}
																		echo "<div id='pagingg' >";
																		echo pagination($statement,$limit,$page,'?',$link);
																		echo "</div>";
																		}
													 		catch (Exception $e)
													 			{
													    		echo '<p>', $e->getMessage(), '</p>';
																}
																mysqli_close ( $link );
													?>
				          </div>
            </div>
				</div>
    </div>
</div>

<script src="../public/js/jquery.min.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/metisMenu.min.js"></script>
<script src="../public/js/startmin.js"></script>

<script src="https://www.gstatic.com/firebasejs/4.1.3/firebase.js"></script>
<script src ="../config/firebase_configs.js"></script>
<script>

 function   forward_to_contest(qid)
 	{
		var id_var=qid.trim();
	 	window.location ="./challenge_board.php?id="+id_var;
 	}
 </script>

	</body>
</html>
