<?php
class Employee {
// Employee's first name
private $emp_fname;
// Employee's last name
private $emp_lname;
// Declaration of constructor
public function __construct($emp_fname, $emp_lname) {
echo "Initialisation of object as follows...<br/>";
$this->emp_fname = $emp_fname;
$this->emp_lname = $emp_lname;
}
// Declaration of destructor
public function __destruct(){
// Here we can clean the resources
echo "Removing the Object...<br>". $this->emp_fname;
}
// This method is being used to display full name
public function showName() {
echo "Employee full name is: " . $this->emp_fname . " " . $this->emp_lname . "<br/>";
}
}
// Class object declaration
$harry = new Employee("Harry", "Potter");
$harry->showName();
echo "<br>hellow after show";

$harry = new Employee("Hussain", "Potter");
$harry->showName();
?>