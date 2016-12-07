<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class App_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function addReg($name_uno,$name_dos,$name_tres,$name_cuatro,$name_equipo,$token) {
    	$query = " INSERT INTO
                        teams (name_uno,name_dos,name_tres,name_cuatro,name_equipo,token)
                    VALUES
                        ('$name_uno','$name_dos','$name_tres','$name_cuatro','$name_equipo','$token');";
        $this->db->query($query);
    }

    function login($token) {
    	$query = "  SELECT
						id_teams as id,
					    token as token
					FROM
						teams
					WHERE
						token = '$token'";
        $resultado = $this->db->query($query);
        $out = $resultado->row();
        return $out;
    }

    //verificar si ya paso la prueba
    function verifica($idjuego) {
				    	$query = "  SELECT
					estado as estado
				FROM
					avance
				WHERE
					juego_id_juego = $idjuego";
        $resultado = $this->db->query($query);
        $out = $resultado->row();
        return $out;
    }

    //Salvar paso uno
    function saveOne($hora,$token,$idjuego,$estado) {
    	$query = " INSERT INTO 
						avance (hora, idgrupo, juego_id_juego, estado) 
					VALUES 
						('$hora','$token','$idjuego','$estado');";
        $this->db->query($query);
    }
}