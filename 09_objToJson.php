<?php

class Person
{
    private $name;
    private $surname;
    private $age;
    private $grade;
    private $date;
    private $town;

    public function __construct(
        string $name,
        string $surname,
        int $age,
        float $grade,
        string $date,
        string $town)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->grade = $grade;
        $this->date = $date;
        $this->town = $town;
    }

    public function toJson() : string
    {
        return json_encode(get_object_vars($this), JSON_UNESCAPED_SLASHES);
    }
}

if (isset($_GET['input']) &&
    isset($_GET['delimiter'])
) {
    $input = $_GET['input'];
    $delimiter = $_GET['delimiter'];

    $objTokens = explode(PHP_EOL, $input);

    $tokens = [];
    foreach ($objTokens as $token) {
        $tokens[] = explode($delimiter, $token)[1];
    }

    $person = new Person(
        $tokens[0],
        $tokens[1],
        intval($tokens[2]),
        floatval($tokens[3]),
        $tokens[4],
        $tokens[5]);

    echo $person->toJson();
}