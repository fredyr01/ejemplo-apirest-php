<?php

    class Categoria extends Conectar{
        public function get_categoria(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM category WHERE cat_estado=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_categoria_byId($cat_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM category WHERE cat_estado=1 AND cat_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_categoria($cat_nom, $cat_obs){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO category (cat_id, cat_nom, cat_obs, cat_estado) VALUES (NULL, ?, ?, '1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_obs);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>