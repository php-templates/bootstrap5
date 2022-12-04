<?php

header('Content-Type: application/json; charset=utf-8');

echo json_encode([
    //'redirect'=>'foo',
    'errors' => [
        'foo' => 'bar'
    ]
]);
// header( 'Location: http://localhost:8005/tests/cases.php' ) ;