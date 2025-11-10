<?php
// Simple Calculator with Functions and Loop

function getNumber($message) {
    return (float)readline($message);
}

function getOperation() {
    $operation = readline("Enter operation (+, -, *, /): ");
    return $operation;
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

        $again = strtolower(readline("Do you want to calculate again? (y/n): "));
    } while ($again === 'y');

    echo "Goodbye!\n";
}

// Start the calculator
startCalculator();
?>
