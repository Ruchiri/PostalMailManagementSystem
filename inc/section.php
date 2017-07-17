<?php
/**
 * Created by PhpStorm.
 * User: Supimi
 * Date: 7/10/2017
 * Time: 12:03 PM
 */
class section
{
    private $name;

    /**
     * section constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getTodayLetterCount($connection)
    {
        $section = $this->getName();
        $today = date('Y-m-d');
        $cmd = "SELECT *FROM letter WHERE section='$section' AND date ='$today'";
        mysqli_set_charset($connection, 'utf8');
        $result = mysqli_query($connection, $cmd);
        $num_rows = mysqli_num_rows($result);
        return $num_rows;

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}


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

