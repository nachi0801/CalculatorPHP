<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
        <input type="text" name="operand1" placeholder="Enter first number">
        <br>
        <br>
        <select name="operator">
            <option value="addition">+</option>
            <option value="subtraction">-</option>
            <option value="multiplication">*</option>
            <option value="division">/</option>
        </select>
        <br>
        <br>
        <input type="text" name="operand2" placeholder="Enter second number">
        <br>
        <br>
        <button type="submit">Calculate</button>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $operand1 = $_POST['operand1'];
        $operand2 = $_POST['operand2'];
        $operator = $_POST['operator'];

        if (empty($operand1) || empty($operand2)) {
            echo "Please enter both numbers.";
        } elseif (!is_numeric($operand1) || !is_numeric($operand2)) {
            echo "Please enter numeric values only.";
        } elseif ($operator == 'division' && $operand2 == 0) {
            echo "Cannot divide by zero.";
        } else {

            switch ($operator) {
                case 'addition':
                    $result = $operand1 + $operand2;
                    break;
                case 'subtraction':
                    $result = $operand1 - $operand2;
                    break;
                case 'multiplication':
                    $result = $operand1 * $operand2;
                    break;
                case 'division':
                    $result = $operand1 / $operand2;
                    break;
                default:
                    $result = "Invalid operator";
            }
            echo "Result: $result";
        }
    }
    ?>
</body>
</html>