<?php

// Interface that defines the contract for all employee types
interface Employee {
    public function doWork(): string;
}

// Abstract base company class that works with the Employee interface
abstract class Company {
    protected $employees = [];
    
    // Constructor moved to abstract class
    public function __construct() {
        $this->createSoftwareTeam();
    }
    
    // Made abstract to force implementation
    abstract protected function createSoftwareTeam(): void;
    
    // Get all employees
    public function getEmployees(): array {
        return $this->employees;
    }
    
    // Process work for all employees
    public function processWork(): array {
        $work = [];
        foreach ($this->employees as $employee) {
            $work[] = $employee->doWork();
        }
        return $work;
    }
}

// Concrete employee implementations
class Designer implements Employee {
    public function doWork(): string {
        return "Creating UI/UX designs and wireframes";
    }
}

class Programmer implements Employee {
    public function doWork(): string {
        return "Writing and debugging code";
    }
}

class Artist implements Employee {
    public function doWork(): string {
        return "Creating game assets and animations";
    }
}

class Tester implements Employee {
    public function doWork(): string {
        return "Performing QA and testing";
    }
}

// Concrete company implementations - removed constructors
class GameDevCompany extends Company {
    protected function createSoftwareTeam(): void {
        $this->employees = [
            new Designer(),
            new Programmer(),
            new Artist()
        ];
    }
}

class OutsourcingCompany extends Company {
    protected function createSoftwareTeam(): void {
        $this->employees = [
            new Programmer(),
            new Tester()
        ];
    }
}

// Example usage remains the same
$gameCompany = new GameDevCompany();
$outsourcingCompany = new OutsourcingCompany();

// Demonstrate how both companies can work with employees through the interface
echo "Game Development Company Work:\n";
foreach ($gameCompany->processWork() as $work) {
    echo "- $work\n";
}

echo "\nOutsourcing Company Work:\n";
foreach ($outsourcingCompany->processWork() as $work) {
    echo "- $work\n";
}

