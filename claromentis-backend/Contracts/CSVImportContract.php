<?php
interface CSVImportContract{
    public function validateFile();
    public function readFile();
}
?>