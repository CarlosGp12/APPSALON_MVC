<?php

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;

class APIController{
    public static function index(){
        $servicios = Servicio::all();
        echo json_encode($servicios);
        //el servicios lo hacemos json para que poder leerlo en javascript
    }

    public static function guardar(){

        //Almacena la Cita y devuelve el ID
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();

        $id = $resultado['id'];

        //Almacena la Cita y el Servicio

        $idServicios = explode(",", $_POST['servicios']);


        foreach($idServicios as $idServicio){
            $args = [
                'citaId' => $id,
                'servicioId' => $idServicio
            ];
            $citaServicio = new CitaServicio($args);
            $citaServicio->guardar();

        }

        echo json_encode(['resultado' => $resultado]);
        //la respuesta lo hacemos json para que poder leerlo en javascript    
    }

    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD']=== 'POST') {
            $id = $_POST['id'];

            $cita = Cita::find($id);
            $cita->eliminar();

            header('Location:'.$_SERVER['HTTP_REFERER']);//nos redirecciona a la pagina que veniamos
        }
    }

}