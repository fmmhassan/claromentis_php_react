<?php
namespace App\Controllers;
use App\Models\ExpenseModel;
use Configs\CSV\CsvImport;
use Configs\CSV\CsvExport;

class ExpenseController{
    private $ExpenseModel;
    public function __construct() {
        $this->ExpenseModel = new ExpenseModel;
    }

    public function import(){
        $CsvImport = new CsvImport($_FILES['file']);
        
        if ($CsvImport->validateFile()){
            
            $readValues = $CsvImport->readFile();
            $result = $this->ExpenseModel->insert($readValues);
            
            return response($result);
        }
        else{
            return response('Please select valid file',422);
        }
    }

    public function export(){
        $expenseSummaryData = $this->ExpenseModel->getGroupByCategory();//retrieve data for export
        $columnHeaders = ['Expense Category', 'Amount']; // column headers
        $filename = "expenses_" . date('Y-m-d-His') . ".csv"; //file name
        $CsvExport = new CSVExport($expenseSummaryData);

        $CsvExport->setColumnHeaders($columnHeaders)
        ->setFileName($filename)
        ->exportDataToCSV();
    }

    public function getExpensesSummary(){
        $expenseSummaryData = $this->ExpenseModel->getGroupByCategory();//retrieve summary data
        return response($expenseSummaryData);
    }

}
?>