<?php
/**
 * Created by PhpStorm.
 * User: Supimi
 * Date: 7/10/2017
 * Time: 12:03 PM
 */


function get_sections($connection)
{
    mysqli_set_charset($connection, 'utf8');
    $section_query = mysqli_query($connection, "SELECT username from login");

    if (!$section_query) {
        die("database query failed." . mysqli_error($connection));
    }


    $sections = [];
    while ($section = $section_query->fetch_array()) {
        $sections[] = $section["username"];
        //echo mysqli_fetch_assoc($sections);
    }
    return array_slice($sections, 2);


}

?>