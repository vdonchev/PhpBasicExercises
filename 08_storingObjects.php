<?php

class Student
{
    private $name;
    private $age;
    private $grade;

    public function __construct(string $name, int $age, float $grade)
    {
        $this->name = $name;
        $this->age = $age;
        $this->grade = $grade;
    }

    public function __toString() : string
    {
        return '<ul><li>Name: ' . $this->name . '</li><li>Age: ' . $this->age . '</li><li>Grade: ' . $this->grade . '</li></ul>';
    }
}

if (isset($_GET['input']) &&
    isset($_GET['delimiter'])
) {
    $input = $_GET['input'];
    $delimiter = $_GET['delimiter'];

    $objTokens = explode(PHP_EOL, $input);

    $students = [];
    foreach ($objTokens as $token) {
        $tokens = explode($delimiter, $token);
        $students[] = new Student($tokens[0], intval($tokens[1]), floatval($tokens[2]));
    }

    foreach ($students as $student) {
        echo $student;
    }
}