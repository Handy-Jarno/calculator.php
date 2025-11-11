<?php
function getNumber($message) {
    echo $message;
    $handle = fopen("php://stdin", "r");
    $line = fgets($handle);
    return (float)trim($line);
}

function getOperation() {
    echo "Enter operation (+, -, *, /): ";
    $handle = fopen("php://stdin", "r");
    $line = fgets($handle);
    return trim($line);
}

function calculate($num1, $num2, $operation) {
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            if ($num2 == 0) {
                return "Error: Division by zero!";
            }
            return $num1 / $num2;
        default:
            return "Invalid operation!";
    }
}

function startCalculator() {
    echo "=== Simple Calculator ===\n";
    
    do {
        $num1 = getNumber("Enter first number: ");
        $operation = getOperation();
        $num2 = getNumber("Enter second number: ");
        
        $result = calculate($num1, $num2, $operation);
        echo "Result: $result\n";

        echo "Do you want to calculate again? (y/n): ";
        $handle = fopen("php://stdin", "r");
        $again = trim(fgets($handle));

        if (strtolower($again) !== 'y') {
            echo "Do you want to restart the calculator? (y/n): ";
            $restart = trim(fgets($handle));
            if (strtolower($restart) === 'y') {
                startCalculator();
            } else {
                echo "Goodbye!\n";
                break;
            }
        }

    } while (strtolower($again) === 'y');
}

startCalculator();
?>
