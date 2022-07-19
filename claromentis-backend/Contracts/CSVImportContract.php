<?php
namespace Contracts;
interface CSVImportContract{
    public function validateFile();
    public function readFile();
}
?>