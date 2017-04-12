<?php
   // connect to mongodb
   $m = new MongoClient();   
	
   // select a database
   $db = $m->SubmittedResult;  
   
   $data1=$_POST['data1'];
   $quesID=$_POST['data2'];
   
   $collection = $db->$data1;     
   
   
   $filter = array('campaign_ID'=>$data1);
   
   $cursor = $collection->find( array() , array("submissionContent" => 1));   
   
   echo json_encode(iterator_to_array($cursor));  
   
?>