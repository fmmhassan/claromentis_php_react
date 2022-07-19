<?php
require 'vendor/autoload.php';
use App\Controllers\ExpenseController;


/** Header restrictions */
header("Access-Control-Allow-Origin: ".FRONTEND_URL);
$expenseController = new ExpenseController;
if(isset($_POST['submit']) && $_POST['submit'] == 'import'){ //import csv
    return $expenseController->import();
}
if(isset($_GET['submit']) && $_GET['submit'] == 'export'){ //export csv
    return $expenseController->export();

}
if(isset($_GET['submit']) && $_GET['submit'] == 'getExpensesSummary'){ //expenses summary
    return $expenseController->getExpensesSummary();
}

?>