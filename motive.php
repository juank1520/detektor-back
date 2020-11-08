<?php

include_once 'database.php';

class Motive extends Database{

    function getAllMotives($sort = null){
        if($sort == 'ASC' || $sort == 'DESC' ){
            $query = $this->getConnection()->query("SELECT * FROM motivos_es_gt ORDER BY des_motivo $sort");
        }else{
            $query = $this->getConnection()->query('SELECT * FROM motivos_es_gt');
        }
        return $query;
    }

    function delete($id){
        try{
            $sql = "DELETE FROM motivos_es_gt WHERE motivo = :id";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindValue(':id', $id);
            return $stmt->execute();    
        }catch(Exception $e){
            return false;
        }
        
    }

    function getMotives( $fitler ){
        $query = $this->getConnection()->query("SELECT * FROM motivos_es_gt WHERE des_motivo LIKE '$fitler' ");
        return $query;
    }

    function update($id, $motive, $state, $type){
        
        try{
            $sql = "UPDATE motivos_es_gt SET des_motivo=:des_motivo, estado=:estado, tipo=:tipo WHERE motivo = :id";
            $stmt = $this->getConnection()->prepare($sql);

            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':des_motivo', $motive);
            $stmt->bindValue(':estado', $state);
            $stmt->bindValue(':tipo', $type);
            return $stmt->execute();
        }catch(Exception $e){
            return false;
        }
        
    }

    function post($motive, $state, $type){

        $data = array(
            $motive,
            $state,
            $type
        );

       
        try{
            $query = $this->getConnection()->query("SELECT motivo FROM motivos_es_gt ORDER BY motivo DESC");
            
            $last_id = $query->fetch();
            $last_id = $last_id['motivo'];
            $last_id++;
            $sql = "INSERT INTO motivos_es_gt (motivo, des_motivo, estado, tipo) VALUES (:lastId , :des_motivo, :estado, :tipo)";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindValue(':lastId', $last_id);
            $stmt->bindValue(':des_motivo', $motive);
            $stmt->bindValue(':estado', $state);
            $stmt->bindValue(':tipo', $type);
            $stmt->execute();
            return true;
        }catch( Exception $e){
            return false;
        }
    }
}