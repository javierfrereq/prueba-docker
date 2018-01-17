<? php
función  json_response ( $ mensaje  =  nulo , $ código  =  200 )
{
    // borrar los viejos encabezados
    header_remove ();
    // establece el código real
    http_response_code ( $ code );
    // establece el encabezado para asegurarse de que el caché sea forzado
    encabezado ( " Cache-Control: no-transform, public, max-age = 300, s-maxage = 900 " );
    // trata esto como json
    encabezado ( ' Content-Type: application / json ' );
    $ status  =  array (
        200  =>  ' 200 OK ' ,
        400  =>  ' 400 Solicitud incorrecta ' ,
        422  =>  ' Entidad no procesable ' ,
        500  =>  ' 500 Error interno del servidor '
        );
    // ok, error de validación o error
    encabezado ( ' Estado: ' . $ status [ $ code ]);
    // devuelve el json codificado
    return  json_encode ( array (
        ' status '  =>  $ code  <  300 , // ¿ éxito o no?
        ' mensaje '  =>  $ mensaje
        ));
}
// si estás haciendo ajax con los encabezados application-json
if ( empty ( $ _POST )) {
    $ _POST  =  json_decode ( file_get_contents ( " php: // input " ), true )? : [];
}
// uso
echo json_response ( 200 , ' trabajo ' ); // {"estado": verdadero, "mensaje": "trabajo"}
// uso de la matriz
echo json_response ( 200 , array (
  ' data '  =>  array ( 1 , 2 , 3 )
  ));
// {"estado": verdadero, "mensaje": {"datos": [1,2,3]}}
// uso con error
echo json_response ( 500 , ' ¡Error del servidor! ¡Inténtalo de nuevo! ' ); // {"estado": falso, "mensaje": "¡Error del servidor! ¡Inténtalo de nuevo!"}

