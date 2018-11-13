<?php
    include 'Calculator.php';

    header('Content-Type: application/json');
    try{
        $calc = new Calculator();
        $result = $calc->calculate();
        $a = array ( 'retVal' => $result );
        echo json_encode($a);
    }
    catch(Exception $e){
        $a = array ( 'retVal' => $e->getMessage() );
        echo json_encode($a);
    }
?>