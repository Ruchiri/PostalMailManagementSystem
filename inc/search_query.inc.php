<?php
/**
 * Created by PhpStorm.
 * User: Supimi
 * Date: 7/4/2017
 * Time: 11:28 AM
 */

function search($fields, $terms)
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "yasara96";
    $dbname = "pmms";

    //connection established
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (mysqli_connect_errno()) {
        die("Database connection failed:" . mysqli_connect_error() . "(" . mysqli_connect_error() . ")");

    }

    $size = sizeof($terms);
    $l = $size - 1;

    //sanitized each search term
    $sanitized = [];
    for($i=0;$i<$size;$i++){
        $sanitized[$i]= mysqli_real_escape_string($connection,$terms[$i]);
    }
    //echo var_dump($sanitized);


    //creating sql command according to the searching criterias & values
    $query = "SELECT ";
    $query .= "*FROM letter WHERE ";

    if ($size == 1) {
        $query .= "{$fields[0]} ='$sanitized[0]'";

    } else {
        for ($j = 0; $j < $size - 1; $j++) {
            $query .= "{$fields[$j]} = '$sanitized[$j]' OR ";

        }
        $query .= "{$fields[$l]} ='$sanitized[$l]'";
    }

    mysqli_set_charset($connection, 'utf8');
    //get query according to given criterias
    $results = mysqli_query($connection, $query);

    //echo mysqli_character_set_name($connection);

    if ($results) {
        // echo "sucess!!!";
    } else {
        die("database query failed." .
            mysqli_error($connection));
    }

    //when there is no letters that follow the given criterias,return false
    if (!$results->num_rows) {

          return false;
      }

    //take search results as array of rows
    $rows = [];
    while ($row = $results->fetch_array()) {
        $rows[] = $row;

    }
    $search_results = array('count' => $results->num_rows, 'results' => $rows);
    return $search_results;
}


?>

