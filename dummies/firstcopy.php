<?php
	session_start();
		if(! isset($_SESSION['loginned'])||$_SESSION["loginned"]==false)
			echo "<script type='text/javascript'>window.location ='./login/index.php';</script>";

		else{

			try {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "steel-platform";

			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("SELECT  *  FROM question where  question_id=  :rid");
	$stmt->bindparam(':rid',$_REQUEST["id"]);
	 $stmt->execute();
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row = $stmt->fetch();

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
					<script src="https://www.gstatic.com/firebasejs/4.1.3/firebase.js"></script>
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta charset="utf-8">
				  <link href="./general.css" rel="stylesheet">
				<!--css of codemirror-->
				<link rel="stylesheet" href="./doc/docs.css">
				<link rel="stylesheet" href="./lib/codemirror.css">
				<link rel="stylesheet" href="./addon/hint/show-hint.css">
				<link rel="stylesheet" href="./lib/codemirror.css">
				<link rel="stylesheet" href="./lib/codemirror.css">
				<link rel="stylesheet" href="./addon/fold/foldgutter.css">
				<link rel="stylesheet" href="./addon/display/fullscreen.css">
				<link rel="stylesheet" href="./lib/codemirror.css">
				<link rel="stylesheet" href="./theme/3024-day.css">
				<link rel="stylesheet" href="./theme/3024-night.css">
				<link rel="stylesheet" href="./theme/abcdef.css">
				<link rel="stylesheet" href="./theme/ambiance.css">
				<link rel="stylesheet" href="./theme/base16-dark.css">
				<link rel="stylesheet" href="./theme/bespin.css">
				<link rel="stylesheet" href="./theme/base16-light.css">
				<link rel="stylesheet" href="./theme/blackboard.css">
				<link rel="stylesheet" href="./theme/cobalt.css">
				<link rel="stylesheet" href="./theme/colorforth.css">
				<link rel="stylesheet" href="./theme/dracula.css">
				<link rel="stylesheet" href="./theme/duotone-dark.css">
				<link rel="stylesheet" href="./theme/duotone-light.css">
				<link rel="stylesheet" href="./theme/eclipse.css">
				<link rel="stylesheet" href="./theme/elegant.css">
				<link rel="stylesheet" href="./theme/erlang-dark.css">
				<link rel="stylesheet" href="./theme/hopscotch.css">
				<link rel="stylesheet" href="./theme/icecoder.css">
				<link rel="stylesheet" href="./theme/isotope.css">
				<link rel="stylesheet" href="./theme/lesser-dark.css">
				<link rel="stylesheet" href="./theme/liquibyte.css">
				<link rel="stylesheet" href="./theme/material.css">
				<link rel="stylesheet" href="./theme/mbo.css">
				<link rel="stylesheet" href="./theme/mdn-like.css">
				<link rel="stylesheet" href="./theme/midnight.css">
				<link rel="stylesheet" href="./theme/monokai.css">
				<link rel="stylesheet" href="./theme/neat.css">
				<link rel="stylesheet" href="./theme/neo.css">
				<link rel="stylesheet" href="./theme/night.css">
				<link rel="stylesheet" href="./theme/panda-syntax.css">
				<link rel="stylesheet" href="./theme/paraiso-dark.css">
				<link rel="stylesheet" href="./theme/paraiso-light.css">
				<link rel="stylesheet" href="./theme/pastel-on-dark.css">
				<link rel="stylesheet" href="./theme/railscasts.css">
				<link rel="stylesheet" href="./theme/rubyblue.css">
				<link rel="stylesheet" href="./theme/seti.css">
				<link rel="stylesheet" href="./theme/solarized.css">
				<link rel="stylesheet" href="./theme/the-matrix.css">
				<link rel="stylesheet" href="./theme/tomorrow-night-bright.css">
				<link rel="stylesheet" href="./theme/tomorrow-night-eighties.css">
				<link rel="stylesheet" href="./theme/ttcn.css">
				<link rel="stylesheet" href="./theme/twilight.css">
				<link rel="stylesheet" href="./theme/vibrant-ink.css">
				<link rel="stylesheet" href="./theme/xq-dark.css">
				<link rel="stylesheet" href="./theme/xq-light.css">
				<link rel="stylesheet" href="./theme/yeti.css">
				<link rel="stylesheet" href="./theme/zenburn.css">
				<link rel="stylesheet" href="./Dash_board/css/font-awesome.min.css"  >
			  <link href="./general.css" rel="stylesheet">
			<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

			<!--codemirror js lib-->
				<script src="./lib/codemirror.js"></script>
				<script src="./mode/clike/clike.js"></script>
				<script src="./addon/fold/foldcode.js"></script>
				 <script src="./addon/fold/foldgutter.js"></script>
				 <script src="./addon/fold/brace-fold.js"></script>
				 <script src="./addon/fold/xml-fold.js"></script>
				 <script src="./addon/fold/indent-fold.js"></script>
				 <script src="./addon/fold/comment-fold.js"></script>
				 <script src="./mode/javascript/javascript.js"></script>
				 <script src="./mode/xml/xml.js"></script>
				 <script src="./mode/css/css.js"></script>
				 <script src="./mode/htmlmixed/htmlmixed.js"></script>
				<script src="./mode/python/python.js"></script>
				<script src="./addon/selection/active-line.js"></script>
				<script src="addon/hint/show-hint.js"></script>
				<script src="addon/hint/javascript-hint.js"></script>
				<script src="addon/hint/anyword-hint.js"></script>
				<script src="./addon/edit/closebrackets.js"></script>
				<script src="./addon/display/fullscreen.js"></script>
				<script src="./addon/scroll/annotatescrollbar.js"></script>
				<script src="./addon/search/matchesonscrollbar.js"></script>
				<script src="./addon/search/searchcursor.js"></script>
				<script src="./addon/search/match-highlighter.js"></script>
					<script src="https://www.gstatic.com/firebasejs/4.1.3/firebase.js"></script>
	</head>
	<style type="text/css">
				body
				{
					font-family: 'Open Sans', sans-serif;
					background: #092756;
					background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
				}

			.CodeMirror
			{
				border-top: 1px solid black;
				border-bottom: 1px solid black;
				height: 349px;
				border-radius:15px;
			}
		.CodeMirror-focused .cm-matchhighlight
		{
				background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAYAAABytg0kAAAAFklEQVQI12NgYGBgkKzc8x9CMDAwAAAmhwSbidEoSQAAAABJRU5ErkJggg==);
				background-position: bottom;
				background-repeat: repeat-x;
		}
		 .cm-matchhighlight
		 {
			 background-color: lightgreen;
			 }
		 .CodeMirror-selection-highlight-scrollbar
			{
				background-color: green
			}
		.code-op-style
		{
			border:solid 1px black;
			border-radius:15px;
			height:349px;
			width:100%;
			position: relative;
		}
		.prb_st
{
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
    });


 $(document).keydown(function(event) {
        if ((event.ctrlKey==true && (event.which == '118' || event.which =='80'||event.which =='88'||event.which =='67'||event.which =='86'||event.which =='65'))||(event.which=='44')||(event.which=='123')) {
            event.preventDefault();
         }
 });

});

		</script>







		<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <text class="navbar-brand" href="#">Steel-Platform</text>
        </div>


        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="./Dash_board/dash_board.php"><i class="fa fa-home fa-fw"></i> Dash_Board</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                 <!--   <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
            <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>-->

		  <li class="dropdown">
                <a id="we" style=" color: gray;" class="dropdown-toggle" data-toggle="dropdown" href="#" >
                 <img id="photo" src=  " <?php	echo $_SESSION['photo'];?>"><?php echo $_SESSION["name"]; ?> <b class="caret"></b>
                </a>

		    <ul class="dropdown-menu dropdown-user">
                    <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li id="settings"><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>-->
                    <li id="logout"   onclick='googleSignout();'><a><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

		</nav>


<div class="container-fluid"  >
<div class="row" style="    padding-top: 5%;">



<div class="col-sm-6" id="quest-pane"style="background-color:WhiteSmoke  ; border:2px solid ; border-radius:20px; ">
  <div class="container">
<?php
echo "
<p  style=' text-align:left;  font-size:22px;' >".$row['question_name']."</p>
 <p style=' font-align:left; font-size:20px;    margin-top: 18px;' ><span> ProblemStatement </span></p>
<p  style='text-align:left;display: block; height: 25px; line-height:18px; font-size:17px' >".$row['question']." </p>";

?>
</div>
</div>

<div class="col-sm-6" style="background-color:WhiteSmoke  ; border:2px solid black; border-radius:20px; ">
			<div class="container-fluid">
		<form  style=" right:50%; padding-top:0.5%; height:100%;">


						<div class="form-group">

                                <div class="row">
								<div class="col-sm-3">
                                <!-- language select     value used      "langguage-select"-->
                             	<div class=" form-group" 	 id="lang_select"  >

										  <select class="form-control " name="langguage-select"  id="sel1" >
                                            <option value="0">Lang-select</option>
											<option value="1">C</option>
                                            <option value="2">C++</option>
                                            <option value="5">Python</option>
                                            <option value="3">Java</option>
                                          </select>
                                        		</div>
									</div>
	<div class="col-sm-3">
  							<select class="form-control " name="theme-select" onchange="selectTheme()" id="select" >
										<option selected="">theme_select</option>
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



</div></div>



<!--"c":1,"cpp":2,"java":3,"python":5,"perl":6,"php":7,
"ruby":8,"csharp":9,"mysql":10,"oracle":11,"haskell":12,
"clojure":13,"bash":14,"scala":15,"erlang":16,"lua":18,
"javascript":20,"go":21,"d":22,"ocaml":23,"r":24,
"pascal":25,"sbcl":26,"python3":30,"groovy":31,"objectivec":32,
"fsharp":33,"cobol":36,"visualbasic":37,"lolcode":38,"smalltalk":39,
"tcl":40,"whitespace":41,"tsql":42,"java8":43,"db2":44,"octave":46,
"xquery":48,"racket":49,"rust":50,"swift":51,"fortran":54-->

							<div class="code-op-style" >
		<textarea id="code"   >#include <stdio.h>
int main()
{
   // printf() displays the string inside quotation
   printf("Hello, World!");
   return 0;
}
</textarea>
</div>

<br/>
								<!--the submit and reset button   and code-editor   -->
							<button type="button" class="btn btn-primary" id="submit">Run</button>
                            <button  type="reset" class="btn btn-primary" id="reset">Reset</button>
      <br/>
      <br/>
                        <!--the output and error status box    id  =    #output    and    #status-->
                     <div class="row">
						<div class="form-group col-sm-12"   >
								<label for="comment">OutPut:</label>
								<textarea class="form-control code-op-style" rows="5"  id="op-box"
							style="width:100%;" 	disabled></textarea>
						</div>


					   <!--the status of compilation
                        <div class="form-group col-sm-6">
								<label for="comment">Error & Other status :</label>
								<textarea class="form-control" rows="5" id="status-box" 	disabled></textarea>
                              </div>-->


					 </div>
				</div>
             </form>
	</div>
</div>
</div>
		</div>

<script>

	$("#reset").on("click",function reset()
	{
		editor.setValue("");
		editor.clearHistory();
		// cm.clearGutter("gutterId");
	});



var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
  styleActiveLine: true,
  lineNumbers: true,
  lineWrapping: true,
  rtlMoveVisually: true,
 matchBrackets: true,
        mode: "text/x-c++src",
  tabSize: 3,
  smartIndent:true,
  viewportMargin: 10,
  dragDrop:false,
    extraKeys:
								{		"Ctrl-Q": function(cm){cm.foldCode(cm.getCursor());},
										"Ctrl-Space": "autocomplete",
										 "F11": function(cm){cm.setOption("fullScreen", !cm.getOption("fullScreen"));},
										"Esc": function(cm){if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);}},
    foldGutter: true,
    gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
	autoCloseBrackets: true,
	 highlightSelectionMatches: {showToken: /\w/, annotateScrollbar: true}



  });



var ExcludedIntelliSenseTriggerKeys =
{
    "8": "backspace",
    "9": "tab",
    "13": "enter",
    "16": "shift",
    "17": "ctrl",
    "18": "alt",
    "19": "pause",
    "20": "capslock",
    "27": "escape",
    "33": "pageup",
    "34": "pagedown",
    "35": "end",
    "36": "home",
    "37": "left",
    "38": "up",
    "39": "right",
    "40": "down",
    "45": "insert",
    "46": "delete",
    "91": "left window key",
    "92": "right window key",
    "93": "select",
    "107": "add",
    "109": "subtract",
    "110": "decimal point",
    "111": "divide",
    "112": "f1",
    "113": "f2",
    "114": "f3",
    "115": "f4",
    "116": "f5",
    "117": "f6",
    "118": "f7",
    "119": "f8",
    "120": "f9",
    "121": "f10",
    "122": "f11",
    "123": "f12",
    "144": "numlock",
    "145": "scrolllock",
    "186": "semicolon",
    "187": "equalsign",
    "188": "comma",
    "189": "dash",
    "190": "period",
    "191": "slash",
    "192": "graveaccent",
    "220": "backslash",
    "222": "quote"
}


editor.on("keyup", function(editor, event)
{
    var __Cursor = editor.getDoc().getCursor();
    var __Token = editor.getTokenAt(__Cursor);

    if (!editor.state.completionActive &&
        !ExcludedIntelliSenseTriggerKeys[(event.keyCode || event.which).toString()] &&
        (event.type == "keyup"))
    {
        CodeMirror.commands.autocomplete(editor, null, { completeSingle: false });
    }
});










   var input = document.getElementById("select");
  function selectTheme() {
    var theme = input.options[input.selectedIndex].textContent;
    editor.setOption("theme", theme);
    location.hash = "#" + theme;
  }
  var choice = (location.hash && location.hash.slice(1)) ||
               (document.location.search &&
                decodeURIComponent(document.location.search.slice(1)));
  if (choice) {
    input.value = choice;
    editor.setOption("theme", choice);
  }
  CodeMirror.on(window, "hashchange", function() {
    var theme = location.hash.slice(1);
    if (theme) { input.value = theme; selectTheme(); }
  });





$("#submit").on("click",function collect(){
			var sourcecode=editor.getValue();
			var lang_select = $("#sel1").val();
			var per={'src':sourcecode,'lan':lang_select ,'tc':'[\'test\']'};


			if(lang_select=="0")
			{$("#op-box").val("!Please choose the language and proceed....");}
		else
		{
			$.ajax({
								type: 'POST',
								url:'new.php' ,
								data:per ,
								dataType:'json',
								success: function(response)
								{
									var rest=response;
									if(rest.result.stdout==null){rest.result.stdout="";}
									else if(rest.result.compilemessage==null){rest.result.compilemessage="";}
									$("#op-box").val(rest.result.stdout+"\n"+rest.result.compilemessage);  }
								});
		}
							});



  var config = {
    apiKey: "AIzaSyCeZ9RP5Xj3TS5hnELSjJkcRC6UEicc27M",
    authDomain: "steelplatform-a318b.firebaseapp.com",
    databaseURL: "https://steelplatform-a318b.firebaseio.com",
    projectId: "steelplatform-a318b",
    storageBucket: "",
    messagingSenderId: "695567009404"
  };
  firebase.initializeApp(config);
function googleSignout() {
	firebase.auth().signOut().then(function() {   window.location ="./login/logout.php";}, function(error) {
 document.write("Signout Failed")  ;

   });}
</script>


		</body>
</html>



<!--
{"source":"#include<stdio.h>int main(){printf("hai");}","lang":"","testcases":["test"],"api_key":"hackerrank|960820-1592|3103fd3a12acaed4dfc10549c4e3db05352932fd",
"wait":"false","callback_url":"","format":"json"}
-->





<!--
the output format json

URI
http://api.hackerrank.com/checker/submission.json
Request Method
POST
Response Code
200
Response Headers
date: Sat, 15 Jul 2017 17:16:23 GMT
server: Apache/2.4.6 (Ubuntu)
x_powered_by: PHP/5.5.3-1ubuntu2.6
status: 200
content_length: 644
content_type: application/json
Response Body
{"result":{"callback_url":"","censored_compile_message":"","codechecker_hash":"run-u2OasSpySMxSI6rJzKj6","compile_command":"gcc -g -Wno-unused-result -Wreturn-type -Wmain -Werror=return-type -Werror=main -pipe -O2 -std=c11  -I solution.c -o solution  -lm -ljansson -lpthread 1> compile.err 2>&1","compilemessage":"","error_code":0,"hash":"1500138983-1590136737","loopback":null,"memory":[6701056],"message":["Success"],"response_s3_path":"2017_07_15_17\/rTyqWupJIkoQ1YHNsMVleGRdb3f4hiFv2U857jLmBcz9xaXPOD596a4de75d92b2.07402357","result":0,"run_command":"","server":"ip-10-10-135-231","signal":[0],"stderr":[false],"stdout":["hai"],"time":[0]}}


-->
