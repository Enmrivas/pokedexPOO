<?php

class TiposService implements ServiceBase{

    private $utilities;
    private $context;

    public function __construct(){

        $this->utilities = new Utilities();
        $this->context = new PokemonContext($directory);

    }

    public function GetList(){

        $listTipos = array();

        $stmnt = $this->context->db->prepare("Select * from tipos");
        $stmnt->execute();

        $result = $stmnt->get_result();

        if($result->num_rows === 0){
            return $listTipos;
        }else{

            while($row = $result->fetch_object()){

                $tipos = new Tipos();

                $tipos->id = $row->id;
                $tipos->nombre = $row->nombre;

                array_push($listTipos, $tipos);

            }

        }
        $stmnt->close();
        return $listTipos;

    }

    public function GetById($id){

        $tipos = new tipos();

        $stmnt = $this->context->db->prepare("Select * from tipos where id = ?");
        $stmnt->bind_param("i", $id);
        $stmnt->execute();

        $result = $stmnt->get_result();

        if($result->num_rows === 0){
            return null;
        }else{

            while($row = $result->fetch_object()){

                $tipos->id = $row->id;
                $tipos->nombre = $row->nombre;

            }

        }
        $stmnt->close();
        return $tipos;

    }

    public function Add($entidad){


        $stmnt = $this->context->db->prepare("Insert into tipos (nombre) values (?)");
        $stmnt->bind_param("s", $entidad->nombre);
        $stmnt->execute();
        $stmnt->close();

        $tiposID = $this->context->db->insert_id;

    }

    public function Update($id, $entidad){

        $element = $this->GetById($id);

        $stmnt = $this->context->db->prepare("update tipos set nombre = ? where id = ?");
        $stmnt->bind_param("si", $entidad->nombre, $id);
        $stmnt->execute();
        $stmnt->close();
        
    }

    public function Delete($id){

        $stmnt = $this->context->db->prepare("delete from tipos where id = ?");
        $stmnt->bind_param("i", $id);
        $stmnt->execute();
        $stmnt->close();

}

?>