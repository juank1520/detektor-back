<?php


include_once 'motive.php';

class Api{

    function getAll($sort = null){
        $motive = new Motive();        
        $response = $motive->getAllMotives($sort);
        if($response->rowCount()){
            header('Content-Type: application/json');
            return json_encode( $response->fetchAll() );
        }
        return false;
    }

    function getFiltered( $filter = '' ){
        if(is_null($filter) || ($filter == '') ){
            return $this->getAll();
        }else{
            $motive = new Motive();        
            $response = $motive->getMotives($filter);
            if($response->rowCount()){
                header('Content-Type: application/json');
                return json_encode( $response->fetchAll() );
            }
        }
    }

    function post( $motive_name, $state, $type){
        if(!is_null($motive_name) && !is_null($state) && !is_null($type)){
            $motive = new Motive();        
            $response = $motive->post($motive_name, $state, $type);
            return $response;
        }
        return false;
    }

    function update($id, $motive_name, $state, $type){
        if(!is_null($id) && !is_null($motive_name) && !is_null($state) && !is_null($type)){
            $motive = new Motive();        
            $response = $motive->update($id, $motive_name, $state, $type);
            return $response;
        }
        return false;
    }

    function delete($id){
        if(!is_null($id)){
            $motive = new Motive();
            $response = $motive->delete($id);
            return $response;
        }
    }

    
}

