<?php
session_start();
		if(! isset($_SESSION['loginned'])||$_SESSION["loginned"]==false)
			echo "<script type='text/javascript'>window.location ='./index.php';</script>";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <link href="../public/css/general.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.prb_st
{
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
#we:hover {
  color:white;
}
#we {
  color:gray;
}


@import url(https://fonts.googleapis.com/css?family=Merriweather);
*,
*:before,
*:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

html {
  background: #f1f1f1;
  font-family: 'Merriweather', sans-serif;
  padding: 1em;
}

h1 {
  text-align: center;
  color: #a8a8a8;
  text-shadow: 1px 1px 0 white;
}

form {
  max-width: 600px;
  text-align: center;
  margin: 20px auto;
}
form input, form textarea {
  border: 0;
  outline: 0;
  padding: 1em;
  -moz-border-radius: 8px;
  -webkit-border-radius: 8px;
  border-radius: 8px;
  display: block;
  width: 100%;
  margin-top: 1em;
  font-family: 'Merriweather', sans-serif;
  -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  resize: none;
}
form input:focus, form textarea:focus {
  -moz-box-shadow: 0 0px 2px #e74c3c !important;
  -webkit-box-shadow: 0 0px 2px #e74c3c !important;
  box-shadow: 0 0px 2px #e74c3c !important;
}
form #input-submit {
  color: white;
  background: #e74c3c;
  cursor: pointer;
}
form #input-submit:hover {
  -moz-box-shadow: 0 1px 1px 1px rgba(170, 170, 170, 0.6);
  -webkit-box-shadow: 0 1px 1px 1px rgba(170, 170, 170, 0.6);
  box-shadow: 0 1px 1px 1px rgba(170, 170, 170, 0.6);
}
form textarea {
  height: 126px;
}

.half {
  float: left;
  width: 48%;
  margin-bottom: 1em;
}

.right {
  width: 50%;
}

.left {
  margin-right: 2%;
}

@media (max-width: 480px) {
  .half {
    width: 100%;
    float: none;
    margin-bottom: 0;
  }
}
/* Clearfix */
.cf:before,
.cf:after {
  content: " ";
  /* 1 */
  display: table;
  /* 2 */
}

.cf:after {
  clear: both;
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <title>Steel-Platform_Dash-Board</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../libs/pagination/pagination.css" rel="stylesheet" type="text/css" />
<link href="../libs/pagination/A_green.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Core CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
  <link href="../public/css/general.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../public/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../public/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../public/css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../public/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../public/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>

<?php include './header.php';?>

				<center><div class="container-fluid">

		<div class="codeadminboard" style="margin-top: 10%;">

		  <h1>Code Upload Panel</h1>
<form class="cf">
  <div class="half left cf">
    <input type="text"  id="prb_name" placeholder="Problem Name">
    <input type="text" id="testcase_ip" placeholder="testcase format- > ['test 1', 'test 2']">
	<input type="text" id="course" placeholder="choose language  type in Upper-case">
	<input type="text" id="testcase_op" placeholder="output">

  </div>
  <div class="half right cf">
    <textarea  type="text" id="prb_statement" placeholder="Program statement"></textarea>
  </div>
  <input type="button" value="Submit" id="code_upload" placeholder="Upload">
  <p id="msg"  style="text-align:left; color:red;"></p>
</form>
		</div>
		</div>
		</center>

<!-- jQuery -->
<script src="../public/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../public/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../public/js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../public/js/startmin.js"></script>

<!--firebase configuration-->
<script src="https://www.gstatic.com/firebasejs/4.1.3/firebase.js"></script>
<script src ="../config/firebase_configs.js"></script>

<script>

$("#code_upload").click(function (){

  var p_name= $("#prb_name").val();
  var p_stemt= $("#prb_statement").val();
  var test_c= $("#testcase_ip").val();
  var op= $("#testcase_op").val();
  var lang= $("#course").val();

  var arg={
	  name:p_name,
		course:lang,
		stmt:p_stemt,
		test:test_c,
		output:op,
		uid:"<?php echo$_SESSION['uid'];?>"
  };
  var codesubmit=JSON.stringify(arg);
 // alert(codesubmit);
    $.post("./codeadminpanel.php",
							codesubmit,
							 function (echo_mgs)
							 {
								 $("#msg").html(echo_mgs);
							setTimeout(clear, 5000);
								 }
						);
						function clear(){$("#msg").html(" "); };

	});


   </script>
		</body>
		</html>
