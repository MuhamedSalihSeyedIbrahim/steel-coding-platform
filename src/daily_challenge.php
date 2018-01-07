<?php
include '../config/db_config.php';
session_start();
if(! isset($_SESSION['loginned'])||$_SESSION["loginned"]==false)
	echo "<script type='text/javascript'>window.location ='./index.php';</script>";
else{
			$status=0;$cnt=0;$row1=0;$qid=0;
			try {


						$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						//one day calculation
						$today = date("Y-m-d H:m:s");

						$nextday = date("Y-m-d H:m:s", strtotime("$today +1 day"));
						//echo $today." ".$nextday;

						$stmt = $conn->prepare("SELECT * FROM steelplatform_question WHERE contestid='dailychallenge' and question_lifetime BETWEEN '{$today}' AND '{$nextday}' ");
						$stmt->execute();
						$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			    	$row_question = $stmt->fetch();
						$cnt=$stmt->rowCount();
						$qid=$row_question['question_id'];
						//print_r($row_question);
						$_SESSION['contestid']=$row_question['contestid'];
						//print_r ($_SESSION['contestid']);
						$stmt1 = $conn->prepare("SELECT * FROM steelplatform_track where uid=:uid and contestid='dailychallenge' and question_lifetime BETWEEN '{$today}' AND '{$nextday}'");
						$stmt1->bindparam(':uid',$_SESSION["uid"]);
						$stmt1->execute();
						if($stmt1->rowCount()!=0)
						{
							$status=1;
							$result = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
			    		$row1 = $stmt1->fetch();

						}
					}
					catch(PDOException $e)
					  {
					  	echo "<p style='font-size: 40px;'>Error:</p> " . $e->getMessage();
					  }
						$conn=null;


	}
	?>



<!DOCTYPE html>
<html lang="en">
<head>


				<!--bootstrap and resposive screen response lib-->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				<link href="../public/css/metisMenu.min.css" rel="stylesheet">
				<link href="../public/css/timeline.css" rel="stylesheet">
				<link href="../public/css/startmin.css" rel="stylesheet">
				<link href="../public/css/morris.css" rel="stylesheet">
				<script src="../public/js/metisMenu.min.js"></script>
				<script src="../public/js/startmin.js"></script>
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta charset="utf-8">
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			  <link href="../public/css/general.css" rel="stylesheet">
				<!--css of codemirror-->
				<link rel="stylesheet" href="../libs/codemirror/doc/docs.css">
				<link rel="stylesheet" href="../libs/codemirror/lib/codemirror.css">
				<link rel="stylesheet" href="../libs/codemirror/addon/hint/show-hint.css">
				<link rel="stylesheet" href="../libs/codemirror/lib/codemirror.css">
				<link rel="stylesheet" href="../libs/codemirror/lib/codemirror.css">
				<link rel="stylesheet" href="../libs/codemirror/addon/fold/foldgutter.css">
				<link rel="stylesheet" href="../libs/codemirror/addon/display/fullscreen.css">
				<link rel="stylesheet" href="../libs/codemirror/lib/codemirror.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/3024-day.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/3024-night.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/abcdef.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/ambiance.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/base16-dark.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/bespin.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/base16-light.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/blackboard.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/cobalt.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/colorforth.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/dracula.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/duotone-dark.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/duotone-light.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/eclipse.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/elegant.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/erlang-dark.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/hopscotch.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/icecoder.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/isotope.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/lesser-dark.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/liquibyte.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/material.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/mbo.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/mdn-like.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/midnight.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/monokai.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/neat.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/neo.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/night.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/panda-syntax.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/paraiso-dark.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/paraiso-light.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/pastel-on-dark.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/railscasts.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/rubyblue.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/seti.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/solarized.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/the-matrix.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/tomorrow-night-bright.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/tomorrow-night-eighties.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/ttcn.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/twilight.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/vibrant-ink.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/xq-dark.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/xq-light.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/yeti.css">
				<link rel="stylesheet" href="../libs/codemirror/theme/zenburn.css">
				<link rel="stylesheet" href="../public/css/font-awesome.min.css"  >
			  <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
				<!--codemirror js lib-->
				<script src="../libs/codemirror/lib/codemirror.js"></script>
				<script src="../libs/codemirror/mode/clike/clike.js"></script>
				<script src="../libs/codemirror/addon/fold/foldcode.js"></script>
				<script src="../libs/codemirror/addon/fold/foldgutter.js"></script>
				<script src="../libs/codemirror/addon/fold/brace-fold.js"></script>
				<script src="../libs/codemirror/addon/fold/xml-fold.js"></script>
				<script src="../libs/codemirror/addon/fold/indent-fold.js"></script>
				<script src="../libs/codemirror/addon/fold/comment-fold.js"></script>
				<script src="../libs/codemirror/mode/javascript/javascript.js"></script>
				<script src="../libs/codemirror/mode/xml/xml.js"></script>
				<script src="../libs/codemirror/mode/css/css.js"></script>
			 	<script src="../libs/codemirror/mode/htmlmixed/htmlmixed.js"></script>
				<script src="../libs/codemirror/mode/python/python.js"></script>
				<script src="../libs/codemirror/addon/selection/active-line.js"></script>
				<script src="../libs/codemirror/addon/hint/show-hint.js"></script>
				<script src="../libs/codemirror/addon/hint/javascript-hint.js"></script>
				<script src="../libs/codemirror/addon/hint/anyword-hint.js"></script>
				<script src="../libs/codemirror/addon/edit/closebrackets.js"></script>
				<script src="../libs/codemirror/addon/display/fullscreen.js"></script>
				<script src="../libs/codemirror/addon/scroll/annotatescrollbar.js"></script>
				<script src="../libs/codemirror/addon/search/matchesonscrollbar.js"></script>
				<script src="../libs/codemirror/addon/search/searchcursor.js"></script>
				<script src="../libs/codemirror/addon/search/match-highlighter.js"></script>
				<script src="../config/config_page.js"></script>
				<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
				<link href="../libs/pagination/pagination.css" rel="stylesheet" type="text/css" />
				<link href="../libs/pagination/A_green.css" rel="stylesheet" type="text/css" />

</head>
<style type="text/css">
					body{
								font-family: 'Open Sans', sans-serif;
								background: #092756;
								background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
							}

			.prb_st{
							border:solid 2px grey;
							 border-radius:20px;
							 height:35px;
							 font-size:20px;
							 text-align: left;
						 	}

</style>

<script>
		$(document).ready(function () {
																		$('body').bind('cut copy paste', function (e) {
																																										e.preventDefault();
    																																							});
  	$("body").on("contextmenu",function(e){
        																		return false;
    																			}
								);
		$(document).keydown(function(event) {
        		if (((event.ctrlKey==true|| event.metaKey) && (event.which == '118' || event.which =='80'||event.which =='88'||event.which =='67'||event.which =='86'||event.which =='65'))||(event.which=='44')||(event.which=='123')) {
            event.preventDefault();
         }
 		 																		});
																			});

		</script>
	<body>


<?php include './header.php';?>

<div class="container-fluid">
  <ul class="nav nav-pills" style="top: 15px;padding-bottom: 0px;margin-top: -20px;padding-top: 15px;">
    <li class="active"><a data-toggle="tab" href="#home" style="color: grey;">challenge</a></li>
    <li><a data-toggle="tab" href="#menu1" style="color: grey;">LeaderBoard - 24x</a></li>
    <li><a data-toggle="tab" href="#menu2" style="color: grey;">LeaderBoard - 24x7</a></li>

  </ul>

  <div class="tab-content" style="padding-top: 20px;">

	<div id="menu2" class="tab-pane fade">
			<div id="page-wrapper" style="margin-top: -2%;padding-top: 0px; margin-left: 0px;">
	        <div class="container-fluid">
	        <div class="row">
	                <div class="col-lg-12" id="ranker">
													<?php
													include '../config/db_config.php';
													try {   $today = date("Y-m-d H:m:s");
																	$prevday = date('Y-m-d H:m:s', strtotime('-1 week'));
																	//echo $today."".$prevday;
																	$link = mysqli_connect($servername,$username, $password,$dbname);
																		if (!$link) {
																									die('Could not connect: ' . mysqli_error());
																								}
																		include '../libs/pagination/function.php';
																		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
																		$limit = 10; //if you want to dispaly 10 records per page then you have to change here
																		$startpoint = ($page * $limit) - $limit;
																		$statement = "steelplatform_question"; //you have to pass your query over here
																		$res=mysqli_query($link,"SELECT COUNT(steelplatform_track.uid) AS score, steelplatform_track.uid,
    steelplatform_USER.name, steelplatform_track.compilation_time, steelplatform_track.contestid
FROM steelplatform_track JOIN steelplatform_USER ON steelplatform_track.uid = steelplatform_USER.uid WHERE
steelplatform_track.contestid = 'dailychallenge' AND steelplatform_track.question_lifetime BETWEEN '{$prevday}' AND '{$today}' AND score = '1'
GROUP BY steelplatform_track.uid ORDER BY score DESC,steelplatform_track.compilation_time ASC LIMIT {$startpoint} , {$limit}");

																		while($row=mysqli_fetch_array($res))
																			{
																					echo "<p  class='prb_st' id='".$row['contestid']."'> ".$row["name"]."</p>";}
																					echo "<div id='pagingg' >";
																					echo pagination($statement,$limit,$page,'?',$link);
																					echo "</div>";
																				}
																	catch (Exception $e)
																		{
																			    echo "<p style='font-size: 40px;'>Error:</p> " . $e->getMessage();
																		}
																		mysqli_close ( $link );
															?>
	                </div>
	            </div>
					</div>
	    </div>


			  </div>
    <div id="menu1" class="tab-pane fade">
    	<div id="page-wrapper" style="margin-top: -2%;padding-top: 0px; margin-left: 0px;">
	        <div class="container-fluid">
	        <div class="row">
	                <div class="col-lg-12" id="ranker">
													<?php
													include '../config/db_config.php';
													try {   $today = date("Y-m-d H:m:s");
																	$nextday = date("Y-m-d H:m:s", strtotime("$today +1 day"));
																	$link = mysqli_connect($servername,$username, $password,$dbname);
																		if (!$link) {
																									die('Could not connect: ' . mysqli_error());
																								}
																		
																		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
																		$limit = 10; //if you want to dispaly 10 records per page then you have to change here
																		$startpoint = ($page * $limit) - $limit;
																		$statement = "steelplatform_question"; //you have to pass your query over here
																		$res=mysqli_query($link,"SELECT
    COUNT(steelplatform_track.uid) AS score, steelplatform_track.uid,
    steelplatform_USER.name, steelplatform_track.compilation_time, steelplatform_track.contestid
FROM steelplatform_track JOIN steelplatform_USER ON steelplatform_track.uid = steelplatform_USER.uid WHERE
steelplatform_track.contestid = 'dailychallenge' AND steelplatform_track.question_lifetime BETWEEN '{$today}' AND '{$nextday}' AND score = '1'
GROUP BY steelplatform_track.uid ORDER BY score DESC,steelplatform_track.compilation_time ASC LIMIT {$startpoint} , {$limit}");

																		while($row=mysqli_fetch_array($res))
																			{
																					echo "<p  class='prb_st' id='".$row['contestid']."'> ".$row["name"]."</p>";}
																					echo "<div id='pagingg' >";
																					echo pagination($statement,$limit,$page,'?',$link);
																					echo "</div>";
																				}
																	catch (Exception $e)
																		{
																			    echo "<p style='font-size: 40px;'>Error:</p> " . $e->getMessage();
																		}
																		mysqli_close ( $link );
															?>
	                </div>
	            </div>
					</div>
	    </div>


		  </div>


		<div id="home" class="tab-pane fade in active">
			<?php if($row1['score']==1  ){
			echo "
			<div class='container'>
			<div class='jumbotron'>
			<h1>Daily Challenge!</h1>
			<p>You have completed today's Challenge!! Good Luck!!</p>
			</div></div></body>";
			exit;
			}
			if($cnt==0){
			echo "
			<div class='container'>
			<div class='jumbotron'>
			<h1>Daily Challenge!</h1>
			<p>No challenge are uploaded yet!!</p>
			</div></div></body>";
			exit;
			}

			?>
							<div class="container-fluid"  >
								<div class="row" style="margin-top: -1.3%;">
										<div class="col-sm-6" id="quest-pane"style="background-color:WhiteSmoke  ; border:2px solid ; border-radius:20px; ">
												<div class="container">
													<?php

													echo "
													<p  style=' text-align:left;  font-size:22px;' >".$row_question['question_name']."</p>
													<p style=' font-align:left; font-size:20px;    margin-top: 18px;' ><span> ProblemStatement </span></p>
													<p  style='text-align:left;display: block; height: 25px; line-height:18px; font-size:17px' >".$row_question['question']." </p>";

													?>
												</div>
											</div>
											<div class="col-sm-6" style="background-color:WhiteSmoke  ; border:2px solid black; border-radius:20px; ">
												<div class="container-fluid">
														<form  style=" right:50%;  height:100%;">
															<div class="form-group">
																<div class="row">
																	<div class="col-sm-3">
																		<br>
																		 <!-- language select     value used      "langguage-select"-->
																		<div class=" form-group" 	 id="lang_select"  >
																			<select class="form-control " name="langguage-select"  id="sel1" >
																				<option value="0" selected>Lang-select</option>
																				<option value="1">C</option>
																				<option value="2">C++</option>
																				<option value="5">Python</option>
																				<option value="3">Java</option>
																			</select>
																		</div>
																</div>
																<div class="col-sm-3">
																	<br/>
																							<select class="form-control " name="theme-select" onchange="selectTheme()" id="select" >
																									<option selected>theme_select</option>
																									<option>3024-day</option>
																									<option>3024-night</option>
																									<option>abcdef</option>
																									<option>ambiance</option>
																									<option>base16-dark</option>
																									<option>base16-light</option>
																									<option>bespin</option>
																									<option>blackboard</option>
																									<option>cobalt</option>
																									<option>colorforth</option>
																									<option>dracula</option>
																									<option>duotone-dark</option>
																									<option>duotone-light</option>
																									<option>eclipse</option>
																									<option>elegant</option>
																									<option>erlang-dark</option>
																									<option>hopscotch</option>
																									<option>icecoder</option>
																									<option>isotope</option>
																									<option>lesser-dark</option>
																									<option>liquibyte</option>
																									<option>material</option>
																									<option>mbo</option>
																									<option>mdn-like</option>
																									<option>midnight</option>
																									<option>monokai</option>
																									<option>neat</option>
																									<option>neo</option>
																									<option>night</option>
																									<option>panda-syntax</option>
																									<option>paraiso-dark</option>
																									<option>paraiso-light</option>
																									<option>pastel-on-dark</option>
																									<option>railscasts</option>
																									<option>rubyblue</option>
																									<option>seti</option>
																									<option>solarized dark</option>
																									<option>solarized light</option>
																									<option>the-matrix</option>
																									<option>tomorrow-night-bright</option>
																									<option>tomorrow-night-eighties</option>
																									<option>ttcn</option>
																									<option>twilight</option>
																									<option>vibrant-ink</option>
																									<option>xq-dark</option>
																									<option>xq-light</option>
																									<option>yeti</option>
																									<option>zenburn</option>
																								</select>
																</div>
															</div>


															<div class="code-op-style"  >
																<textarea id="code"  >
<?php if($status==1)
{
echo (urldecode($row1['answer']));
}
else {
echo "/*code here*/";
} ?>

																</textarea>
															</div>
															<br/>
														<!--the submit and reset button   and code-editor   -->
														<button type="button" class="btn btn-primary" id="submit">Run</button>
														<button  type="reset" class="btn btn-primary" id="reset">Reset</button>
														<br/>
														<br/>
															<!--the output and error status box    id  =    #output    and    #status-->
												<div class= "row" id ="progress">

												</div>
												 <div class="row">
													<div class="form-group col-sm-12"   >
															<label for="comment">OutPut:</label>
															<textarea class="form-control code-op-style" rows="5"  id="op-box"
														style="width:100%;" 	disabled></textarea>
													</div>
												</div>
											</div>
									 </form>
								</div>
							</div>
						</div>
				</div>

			</div>

  </div>
</div>




	<script src="https://www.gstatic.com/firebasejs/4.1.3/firebase.js"></script>
	<script src ="../config/firebase_configs.js"></script>
<script src ="../config/codemirror_config.js"></script>
<script>
$("#submit").on("click",function collect(){
    $("#progress").html("");
    var sourcecode=editor.getValue();
    var lang_select = $("#sel1").val();
    var per={'src':sourcecode,
              'lan':lang_select ,
              'code':'<?php echo $qid; ?>'
            };
  if(lang_select=="0")
    {$("#op-box").val("!Please choose the language and proceed....");}
  else
  {
    $("#op-box").val("Running....");
    $.ajax({
              type: 'POST',
              url:'../src/daily_hackerrank_api.php' ,
              data:per ,
              dataType:'json',
              success: function(response)
              {
                var rest=(response);
								//$("#op-box").val(rest.tc+' : '+rest.result.stdout+"\n"+rest.result.compilemessage);
                var i=0;
                for(;i<(rest.tc).length;i++){
                  if(rest.tc[i]=='f')
                     break;
                  }
                  if( i <(rest.tc).length)
									{
										if(rest.result.stdout==null){rest.result.stdout=" ";}
										if(rest.result.compilemessage==null||rest.result.compilemessage=='Success'){rest.result.compilemessage=" ";}
										if(rest.result.stderr==null||rest.result.stderr=='false'){rest.result.stderr=" ";}
										if(rest.result.message==null||rest.result.message=='Success'){rest.result.message=" ";}
										$("#op-box").val(rest.result.stdout+"\n"+rest.result.compilemessage+rest.result.stderr[i]+rest.result.message[i]);
								}
                  else
                    $("#op-box").val("Sucessfully completed");


                  var passed=0;
                  for(var p=0;p<(rest.tc).length;p++){
                      if(rest.tc[p]=='p')
                        passed++;
                    }
                  var pass_percentage=(passed/ (rest.tc).length)*100;
                  var fail_percentage=((((rest.tc).length)-passed)/ (rest.tc).length)*100;
                  var failed=passed-(rest.tc).length;


                $("#progress").html("<div class='form-group col-sm-12' style='margin-bottom: 0px;' >\
                                    <label for='progress'>Progress:</label><div class='progress'><div class='progress-bar \
                                    progress-bar-success progress-bar-striped' role='progressbar' aria-valuenow='40'aria-valuemin='0'\
                                     aria-valuemax='100' style='color:black;width:"+pass_percentage+"%'>Passed:("+passed+") \
                                     </div><div class='progress-bar progress-bar-danger progress-bar-striped' role='progressbar' \
                                     style='width:"+fail_percentage+"%'>Failed: ("+Math.abs(failed)+") </div></div>");
                                   }
              });
            }
          });

</script>
		</body>
</html>
