<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 08-04-18
 * Time: 10:27 AM
 */

namespace Models;


use Configuracion\Connection;
class Pedido
{
    public function getPedidos(){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("select * from transaccion inner join usuario");
        $result->execute();
        while ($data = $result->fetch(\PDO::FETCH_ASSOC)){
            $array["data"][]=$data;
        }
        return $array;
    }


    public function crearPedido($data){

        $consulta=Connection::getConnection();
        $result=$consulta->prepare("Insert into transaccion (tipo_transaccion, id_usuario,total_transaccion,persona_id) VALUES(:tipo,:usuario,:total,:persona)");
        $result->bindParam(":tipo",$data["tipo_pedido"]);
        $result->bindParam(":total",$data["total"]);
        $result->bindParam(":usuario",$data["usuario_id_transaccion"]);
        $result->bindParam(":persona",$data["persona_id"]);
        $result->execute();


        $res=$consulta->prepare("select  id_transaccion from transaccion order by  id_transaccion DESC LIMIT 1");
        $res->execute();
        $id_trans=$res->fetchObject();


        for ($a=0;$a<sizeof($data["id_producto"]);$a++){
            $result=$consulta->prepare("Insert into detalle_transaccion (id_producto, cantidad_producto, transaccion_id, subtotal) VALUES(:id_product,:cant,:id_trans,:sub) ");
            $result->bindParam(":id_product",$data["id_producto"][$a]);
            $result->bindParam(":cant",$data["cantidad_producto"][$a]);
            $result->bindParam(":sub",$data["subtotal_producto"][$a]);
            $result->bindParam(":id_trans",$id_trans->id_transaccion);
            $result->execute();
            if ($data["tipo_pedido"]==1){
                $produc=$consulta->prepare("Update producto set existencia_producto=existencia_producto+:cant where id_producto=:id");
                $produc->bindParam(":cant",$data["cantidad_producto"][$a]);
                $produc->bindParam(":id",$data["id_producto"][$a]);
                $produc->execute();
            }else if($data["tipo_pedido"]==2){
                $produc=$consulta->prepare("Update producto set existencia_producto=existencia_producto-:cant where id_producto=:id");
                $produc->bindParam(":cant",$data["cantidad_producto"][$a]);
                $produc->bindParam(":id",$data["id_producto"][$a]);
                $produc->execute();

            }


        }





    }


}