<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 class Usuario{
     var $nombreUsuario;
     var $clave;
     var $nombre;
     var $idUsuario;
     
     public function __construct($usu="",$pass="") {
         $this->$nombreUsuario=$usu;
         $this->clave=$pass;
     }
     
     public function verificaAcceso() {
         $oConn=new Conexio();
         if($oConn->Conectar())
             $db=$oConn->objconn;
         else
             return false;
         
        $clavemd5=md5($this->clave);
        
        $sql="SELECT * FROM acceso"
                . "WHERE nomusuario='$this->nombreUsuario' AND pdwusuario='$clavemd5'";
        
         $resultado=$db->query($sql);
         
         if($resultado->num_rows>=1){
            $this->idusuario=0;
            $this->nombre="";
            return true;
        }
        else{
            return false;
        }
     }
 }
