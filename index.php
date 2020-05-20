<?php
//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once 'vendor/autoload.php';
require_once 'model/data-layer.php';
require_once 'model/validation-functions.php';
// start session
session_start();

//Create an instance of the Base class
// instantiates the base class of the fat
// free framework
// :: invokes static method
$f3 = Base::instance();

// Define a default route
// display a link to the survey
$f3->route('GET /', function () {
    echo '<h1>Midterm Survey</h1>';
    echo '<a href="survey">Take my Midterm Survey</a>';

});


// Define the survey route
$f3->route('GET|POST /survey', function($f3) {

    // now get the interests
    $questions = getSurveyQuestions();
    $f3->set('questions', $questions);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // validate the data

        // validate name
        if (!validName($_POST['name'])) {
            //var_dump($_POST);
            $valid = false;
            $f3->set('errors["name"]', "Please provide your name");
            //echo "Here";
        } else {
            $f3->set('selectedName', $_POST['name']);
            //echo $f3->get('selectedName');
        }

        // validate the question/answers
        if (!isset($_POST['questions']))
        {
            $valid = false;
            $f3->set('errors["questions"]', "Please select at least one");
            //echo "Here";
        }
        elseif (!validAnswers($_POST['questions'])) {
            $valid = false;
            $f3->set('errors["questions"]', "Invalid selection");
        } else {
            $f3->set('selectedQuestions', $_POST['questions']);
            //echo $f3->get('selectedQuestions');
        }

    }

    $view = new Template();
    echo $view->render
    ('views/survey.html');

});



//Run fat free
// -> runs class method instance method
$f3->run();