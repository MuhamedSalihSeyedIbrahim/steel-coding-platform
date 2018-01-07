<?php
session_start();
$qu = json_decode(file_get_contents('php://input'), true);

$name=$qu['name'];
$st=$qu['stmt'];
$ip=$qu['test'];
$op=$qu['output'];
$uid=$qu['uid'];
$course=$qu['course'];



try {

include '../config/db_config.php';
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("INSERT INTO steelplatform_question (uid, question_name, course,testcase_input,testcase_output,question)   VALUES (:uid, :question_name, :course,:testcase_input,:testcase_output,:question)");
	$stmt->bindparam(':uid',$uid);
	$stmt->bindparam(':question_name',$name);
	$stmt->bindparam(':course',$course);
	$stmt->bindparam(':testcase_input',$ip);
	$stmt->bindparam(':testcase_output',$op);
	$stmt->bindparam(':question',$st);
	 $stmt->execute();

echo "**Upload Sucess";
   }
	catch(PDOException $e)
    {
    echo "<p style='font-size: 40px;'>Upload Failed -> Error:</p> " . $e->getMessage();
    }




$conn = null;
?>
