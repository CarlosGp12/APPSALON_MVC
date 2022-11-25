<?php

namespace Controllers;

use Model\AdminCIta;
use MVC\Router;

class AdminController
{
    public static function index(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        };
        isAdmin();

        $fecha = $_GET['fecha'] ?? date('Y-m-d'); //la fecha sera enviada por metodo get gracias al archivo js llamado buscador, pero por defaut vendra la fecha del dia actual
        $fechas = explode('-', $fecha); //separamos la fecha en un array para poderla validar
        if(!checkdate($fechas[1], $fechas[2], $fechas[0])){//con este metodo podemos validar que la fecha exista
            header('Location: /404');
        }

        //consultar la base de datos
        $consulta = "SELECT citas.id, citas.hora, CONCAT( usuarios.nombre, ' ', usuarios.apellido) as cliente, ";
        $consulta .= " usuarios.email, usuarios.telefono, servicios.nombre as servicio, servicios.precio  ";
        $consulta .= " FROM citas  ";
        $consulta .= " LEFT OUTER JOIN usuarios ";
        $consulta .= " ON citas.usuarioId=usuarios.id  ";
        $consulta .= " LEFT OUTER JOIN citasServicios ";
        $consulta .= " ON citasservicios.citaId=citas.id ";
        $consulta .= " LEFT OUTER JOIN servicios ";
        $consulta .= " ON servicios.id=citasservicios.servicioId ";
        $consulta .= " WHERE fecha =  '${fecha}' ";
        $citas = AdminCIta::SQL($consulta);

        $router->render('admin/index', [
            'nombre' => $_SESSION['nombre'],
            'citas' => $citas,
            'fecha' => $fecha
        ]);
    }
}
