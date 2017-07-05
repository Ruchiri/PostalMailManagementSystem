<?php
/**
 * Created by PhpStorm.
 * User: Supimi
 * Date: 7/4/2017
 * Time: 11:28 AM
 */

function connect()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "123";
    $dbname = "pmms";

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (mysqli_connect_errno()) {
        die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_error() . ")");

    }

}

function search($fields, $terms, $connection)
{
    $size = sizeof($terms);
    $l = $size - 1;

    //sanitized each search term
    $sanitized = $terms;
    /*
    for($i=0;$i<$size;$i++){
        echo $terms[$i];
        $sanitized[$i]= mysqli_real_escape_string($connection,$terms[$i]);
    }*/

    //creating sql command according to the searching criterias & values
    $query = "SELECT ";
    $query .= "*FROM letter_details WHERE ";

    if ($size == 1) {
        $query .= "{$fields[0]} LIKE %{$sanitized[0]}%";

    } else {
        for ($j = 0; $j < $size - 1; $j++) {
            $query .= "{$fields[$j]} LIKE %{$sanitized[$j]}% OR";

        }
        $query .= "{$fields[$l]} LIKE %{$sanitized[$l]}%";
    }
    echo $query;


    $results = mysqli_query($connection, $query);

    echo $results;

    //check results
    /*  if(!$results->num_rows){
          return false;
      }

      while($row=$results->fetch_object()){
          $rows[]=$row;
      }

      $search_results=array('count'=>$query->num_rows, 'results'=>$rows);
      return $search_results;*/
}


?>

