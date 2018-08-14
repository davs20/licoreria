<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 08-14-18
 * Time: 01:47 AM
 */

namespace Controllers;

use Configuracion\Connection;
use Models\Unidad as ModelsUnidad;
class Unidad implements accionControllers
{

    public function showAll(){
      $unidades=ModelsUnidad::getUnidades();
      echo json_encode($unidades);


        // TODO: Implement showAll() method.
    }

    public function edit($data)
    {
        // TODO: Implement edit() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function disable($id)
    {
        // TODO: Implement disable() method.
    }

    public function create($data)
    {
        // TODO: Implement create() method.
    }
}