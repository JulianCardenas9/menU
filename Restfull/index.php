<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
function getDB()
{
    $dbhost = "localhost";
    $dbuser = "id1529732_root";
    $dbpass = "rootroot";
    $dbname = "id1529732_menu";
 
    $mysql_conn_string = "mysql:host=$dbhost;dbname=$dbname";
    $dbConnection = new PDO($mysql_conn_string, $dbuser, $dbpass); 
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConnection;
}


$app = new \Slim\App;

$app->get('/getScore/{id}', function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
	
    try 
    {
        $db = getDB();
        $sth = $db->query("SELECT * FROM students");
 
        //$sth->bindParam(':id', $id, PDO::PARAM_INT);
        //$sth->execute();
 
        $sth->setFetchMode(PDO::FETCH_OBJ);
 
       while($row = $sth->fetch()) {
            //$app->response->setStatus(200);
            //$app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($row);
            
        }
       $db = null;		
		/*else {
            throw new PDOException('No records found.');
        }*/
 
    } catch(PDOException $e) {
       // $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
	
	
    
});
$app->get('/all', function (Request $request, Response $response) {
    
	
    try 
    {
        $db = getDB();
        $sth = $db->query("SELECT * FROM students");
 
        //$sth->bindParam(':id', $id, PDO::PARAM_INT);
        //$sth->execute();
 
        $sth->setFetchMode(PDO::FETCH_OBJ);
 
       $matriz = array();
       while($row = $sth->fetch()) {
		   
          		
			array_push($matriz, $row);
            
        }
       $db = null;		
	   //echo json_encode($matriz);
	        $rows_affected = $sth->rowCount();
			if($rows_affected==0){
				throw new PDOException('No records found.');
			}else {	      
			return $response->withHeader('Content-type', 'application/json')
			      ->withHeader('Access-Control-Allow-Origin', '*')
				   ->withHeader('Access-Control-Allow-Methods','GET,PUT,POST,DELETE')
				   ->withHeader('Access-Control-Allow-Headers', 'Content-Type')
			       ->getBody()
                   ->write(json_encode($matriz)
            );
			
			
			}
			
          // $response->headers->set('Content-Type', 'application/json');
	       //echo json_encode($matriz);
	   
		/*else {
            throw new PDOException('No records found.');
        }*/
 
    } catch(PDOException $e) {
       // $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
	
	
    
});
$app->run();