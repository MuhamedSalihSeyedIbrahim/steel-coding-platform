<?php
include '../config/db_config.php';
session_start();
try
{


    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $today = date("Y-m-d H:m:s");
    $nextday = date("Y-m-d H:m:s", strtotime("$today +1 day"));
    $stmt = $conn->prepare("SELECT  *  FROM steelplatform_question where  contestid='dailychallenge' and question_lifetime BETWEEN '{$today}' AND '{$nextday}' ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row = $stmt->fetch();

    $input=explode(",", $row['testcase_input']);
    $output = str_replace("\r\n","\n", explode(",",$row['testcase_output']));
    //print_r($output);
    if($row['testcase_input'])
      {
        //print_r($input);
        for($i=0;$i<(count($input));$i++)
        {
          $input[$i]=(string)$input[$i];

        }
      }
    else
      $input=Array('test');
    //print_r (json_encode($input));
    $code=$_POST['src'];
    $url = 'http://api.hackerrank.com/checker/submission.json' ;
    $key = '';/* name : Steel-Platform, description: Coding Ground*/
    $query = array();
    $query['source'] = urlencode($code);
    $query['testcases'] = urlencode(json_encode($input));
    $query['lang'] =  $_POST['lan'];
    $query['api_key'] = urlencode($key);
    $query[''] = urlencode($key);
    $q = array();
    foreach ($query as $k => $v) {
        $q[] = "$k=$v";
    }
    $q = implode("&", $q);
    //print_r($q);
    $ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($query));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $q);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

		//execute post
		$result = curl_exec($ch);

		//close connection
		curl_close($ch);

    $resu= json_decode($result,true);
    //print_r ($resu);

  for($i=0;$i<count($output);$i++)
  {
    if($resu["result"]["stdout"][$i] == $output[$i])
    {
      $t[$i]='p';
      //echo(json_encode(array_merge($resu,array("tc"=>"p")),true));
    }
    else
    {   $t[$i]='f';
        //echo (json_encode(array_merge($resu,array("tc"=>"f")),true));
        //print_r($resu["result"]["stdout"][$i]);
        //print_r($output[$i]);
    }
  }
  //print_r($t);
  echo (json_encode(array_merge($resu,array('tc'=>$t)),true));

    $stmt = $conn->prepare("SELECT  *  FROM steelplatform_track where  question_id = :rid and contestid = :contestid and uid = :uid ");
    $stmt->bindparam(':rid',$_POST["code"]);
    $stmt->bindparam(':uid',$_SESSION["uid"]);
    $stmt->bindparam(':contestid',$_SESSION['contestid']);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row = $stmt->fetch();

$i=0;
for(;$i<count($t);$i++)
{
  if($t[$i]=='f')
    break;
}
  if($i==count($t))
          {
             if($stmt->rowcount()==0)
             {
               $value = '1';
               $stmt = $conn->prepare("INSERT INTO steelplatform_track (question_id,uid,answer,score,contestid,compilation_time,memory_used,lang)
                                                  VALUES (:question_id,:uid,:answer,:score,:contestid,:compilation_time,:memory_used,:lang)");
               $stmt->bindparam(':question_id',$_POST["code"]);
               $stmt->bindparam(':uid',$_SESSION['uid']);
               $stmt->bindparam(':answer',$query['source']);
               $stmt->bindparam(':score',$value);
               $stmt->bindparam(':contestid',$_SESSION['contestid']);
               $stmt->bindparam(':compilation_time',$resu["result"]["time"][0]);
               $stmt->bindparam(':memory_used',$resu["result"]["memory"][0]);
               $stmt->bindparam(':lang',$query['lang']);
               $stmt->execute();
             }
             else
             {
               $value = '1';
               $stmt = $conn->prepare("UPDATE steelplatform_track SET answer= :answer,score= :score
                                      ,compilation_time= :compilation_time,
                                      memory_used= :memory_used,lang= :lang
                                      WHERE   uid= :uid and contestid= :contestid and question_id=:question_id;");
               $stmt->bindparam(':question_id',$_POST["code"]);
               $stmt->bindparam(':uid',$_SESSION['uid']);
               $stmt->bindparam(':answer',$query['source']);
               $stmt->bindparam(':score',$value);
               $stmt->bindparam(':contestid',$_SESSION['contestid']);
               $stmt->bindparam(':compilation_time',$resu["result"]["time"][0]);
               $stmt->bindparam(':memory_used',$resu["result"]["memory"][0]);
               $stmt->bindparam(':lang',$query['lang']);
               $stmt->execute();

             }
           }
           else {
             if($stmt->rowcount()==0&&$row['score']!=1)
             {
               $value = '0';
               $stmt = $conn->prepare("INSERT INTO steelplatform_track (question_id,uid,answer,score,contestid,lang)
                                                  VALUES (:question_id,:uid,:answer,:score,:contestid,:lang)");
               $stmt->bindparam(':question_id',$_POST["code"]);
               $stmt->bindparam(':uid',$_SESSION['uid']);
               $stmt->bindparam(':answer',$query['source']);
               $stmt->bindparam(':score',$value);
               $stmt->bindparam(':contestid',$_SESSION['contestid']);
               $stmt->bindparam(':lang',$query['lang']);
               $stmt->execute();
             }
             else if ($row['score']!=1)
             {
               $value = '0';
               $stmt = $conn->prepare("UPDATE steelplatform_track SET answer= :answer,score= :score
                                      ,compilation_time= :compilation_time,
                                      memory_used= :memory_used,lang= :lang
                                      WHERE   uid= :uid and contestid= :contestid and question_id=:question_id;");
               $stmt->bindparam(':question_id',$_POST["code"]);
               $stmt->bindparam(':uid',$_SESSION['uid']);
               $stmt->bindparam(':answer',$query['source']);
               $stmt->bindparam(':score',$value);
               $stmt->bindparam(':contestid',$_SESSION['contestid']);
               $stmt->bindparam(':compilation_time',$resu["result"]["time"][0]);
               $stmt->bindparam(':memory_used',$resu["result"]["memory"][0]);
               $stmt->bindparam(':lang',$query['lang']);
               $stmt->execute();
           }
         }

  }
    catch(PDOException $e)
    {
      echo "<p style='font-size: 40px;'>Error:</p> " . $e->getMessage();
    }
    $conn=null;
?>
