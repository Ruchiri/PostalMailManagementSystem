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

    public function getTodayLetterCount($connection)
    {
        $cmd = "SELECT *from letter WHERE section='$this->getName()'  DATE(`timestamp`) = CURDATE()";

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

