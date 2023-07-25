<?php
/**
 * Length converter API
 * 
 * @author  Arturo Mora-Rioja
 * @version 1.0, March 2022
 *          1.1, September 2022 Input checks introduced for POST parameters
 */

    define('BASE_PATH', '../src/');
    define('ERROR_MSG', 'Error: incorrect API call');

    if (!empty($_POST['conversion'])) {
        $conversion = $_POST['conversion'];

        switch ($conversion) {
            case 'length':
                if (!isset($_POST['measure']) || !isset($_POST['system'])) {
                    echo json_encode(ERROR_MSG);
                } else {
                    require_once BASE_PATH . 'length.php';
                    
                    try {
                        $length = new Length($_POST['measure'], $_POST['system']);                    
                        echo json_encode($length->convert());
                    } catch (Exception $e) {
                        echo json_encode($e->getMessage());
                    }
                }
                break;
        }
    }
?>