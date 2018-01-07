<?php
include '../config/db_config.php';
session_start();

$qu = json_decode(file_get_contents('php://input'), true);
$quest=$qu['us'];

$uid=$quest['uid'];
$name=$quest['displayName'];
$photo=$quest['photoURL'];
$email=$quest['email'];
$token=$qu['ot'];
if( strpos( $quest['email'], '@rmkec.ac.in' ) === false )
	{
		echo "<script>
		 					alert('please register with rmk domain id!');
							window.location ='./index.php';		
					</script>";
		exit;
		}
$_SESSION["loginned"]=false;


try {

      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM steelplatform_user where uid= :uid");
      $stmt->bindparam(':uid',$uid);
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $rowCount = $stmt->rowcount();
      $ro= $stmt->fetch();
      if ($rowCount ==1)
      {
          $_SESSION["uid"]=$uid;
          $_SESSION["name"]=$name;
          $_SESSION["photo"]=$photo;
          $_SESSION["token"]=$token;
          $_SESSION["loginned"]=true;
          $_SESSION["role"]=$ro["role"];
          echo "<script type='text/javascript'>
                  window.location= './dash_board.php';
                </script>";
      }
	   else{
          $stmt = $conn->prepare("INSERT INTO steelplatform_user (name,uid,email) VALUES (:name, :uid,:email)");
          $stmt->bindParam(':name', $name);
          $stmt->bindParam(':uid', $uid);
          $stmt->bindParam(':email', $email);
          $stmt->execute();
          $_SESSION["uid"]=$uid;
          $_SESSION["name"]=$name;
          $_SESSION["photo"]=$photo;
          $_SESSION["token"]=$token;
          $_SESSION["loginned"]=true;
          $_SESSION["role"]=null;
          echo "<script type='text/javascript'>
                  window.location= './dash_board.php';
                </script>";
          }
        }
catch(PDOException $e)    {
                              echo "<p style='font-size: 40px;'>Error:</p> " . $e->getMessage();
                          }
$conn = null;
?>
