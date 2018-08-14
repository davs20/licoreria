<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 08-13-18
 * Time: 12:40 PM
 */

namespace Controllers;

use Models\Reporte as ModelsReporte;

class Reporte{

    public function pedidoReport($data){
        $report=ModelsReporte::pedidoReport($data);
        echo  json_encode($report);

    }
    public function pedidoReportinfo($data){
        $report=ModelsReporte::pedidoReportinfo($data);
        echo  json_encode($report);

    }

    public function existenciaReport($data){
         $report=ModelsReporte::existenciaReport($data);
        echo json_encode($report);

    }


}