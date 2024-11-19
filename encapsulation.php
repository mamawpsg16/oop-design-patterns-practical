<?php
class Employee {
    private $name;
    private $salary;

    public function __construct($name, $salary) {
        $this->name = $name;
        $this->salary = $salary;
    }

    // Getter for name
    public function getName() {
        return $this->name;
    }

    // Getter for salary
    public function getSalary() {
        return $this->salary;
    }
}

$employee = new Employee("John Doe", 50000);
echo "Employee Name: " . $employee->getName(); // Displays name
echo "<br>Employee Salary: $" . $employee->getSalary(); // Displays salary