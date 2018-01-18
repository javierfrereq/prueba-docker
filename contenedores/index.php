<?php
function json_response($message = null, $code = 200)
{
       header_remove();
       http_response_code($code);
        header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
        header('Content-Type: application/json');
    $status = array(
        200 => '200 OK',
        400 => '400 Bad Request',
        422 => 'Unprocessable Entity',
        500 => '500 Internal Server Error'
        );
    header('Status: '.$status[$code]);
       return json_encode(array(
        'status' => $code < 300, 
        'message' => $message
        ));
}
if (empty($_POST)) {
    $_POST = json_decode(file_get_contents("php://input"), true) ? : [];
}
echo json_response(200, 'working');
echo json_response(200, array(
  'data' => array(1,2,3)
  ));
echo json_response(500, 'Server Error! Please Try Again!'); 
