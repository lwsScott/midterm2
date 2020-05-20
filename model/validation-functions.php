<?php


//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);


function validName($name)
{
    return !empty($name);
}


function validAnswers($answers)
{
    //var_dump($interests);
    //echo "<br>";
    $validAnswers = getSurveyQuestions();
    //var_dump($validInterests);
    //echo "<br>";
    //echo "here";
    //return in_array($interests, $validInterests);
    return (count(array_intersect($answers, $validAnswers)) != 0);
}
