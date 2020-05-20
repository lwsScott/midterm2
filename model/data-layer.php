<?php

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

function getSurveyQuestions()
{
    // create an array called questions
    // set the hive variables
    $questions = array('This midterm is hard','I do not like midterms','Today is Thursday');
    return $questions;
}



