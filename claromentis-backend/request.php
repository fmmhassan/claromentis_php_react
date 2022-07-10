<?php
// require './config.php';
require './Controllers/ExpenseController.php';

// var_dump( file_get_contents("php://input"));
/** Header restrictions */
header("Access-Control-Allow-Origin: ".FRONTEND_URL);
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$expenseController = new ExpenseController;

if(isset($_POST['submit']) && $_POST['submit'] == 'import'){ //import csv
    // echo json_encode('das');
    // return;
    echo json_encode($expenseController->import());
    return;
}
if(isset($_GET['submit']) && $_GET['submit'] == 'export'){ //export csv
    echo json_encode($expenseController->export());
    return;
}
if(isset($_GET['submit']) && $_GET['submit'] == 'getExpensesSummary'){ //expenses summary
    echo json_encode($expenseController->getExpensesSummary());
    return;
}

?>