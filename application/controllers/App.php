<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function index() {

		$link = $this->input->get('token');
		
		$dataToken = $this->session->set_userdata('token', $link);
		$data['token'] = $this->session->userdata('token');

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('app/panel', $data);
		$this->load->view('template/footer');
	}

	public function salida() {
		$this->session->unset_userdata('token');
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('welcome/login');
		$this->load->view('template/footer');
	}
	//Generated AlphaNumerical
	public function random_num($size) {
        
        $alpha_key = '';
        $keys = range('A', 'Z');

        for ($i = 0; $i < 2; $i++) {
            $alpha_key .= $keys[array_rand($keys)];
        }

        $length = $size - 2;

        $key = '';
        $keys = range(0, 9);

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $alpha_key . $key;
    }

	public function addReg() {
		$name_uno = $this->input->post('name_uno');
		$name_dos = $this->input->post('name_dos');
		$name_tres = $this->input->post('name_tres');
		$name_cuatro = $this->input->post('name_cuatro');
		$equipo = $this->input->post('name_equipo');

		//Generar token de identificacion
		$token = $this->random_num(4);
		$this->session->set_userdata('token', $token);
		$this->app_model->addReg($name_uno,$name_dos,$name_tres,$name_cuatro,$equipo,$token);
		$this->output->set_output($token);
	}

	public function inicio() {
		$token = $this->input->post('token');
		$bandera = $this->app_model->login($token);
		
		if(count($bandera) == 0) {
			$this->output->set_output(json_encode(array("token" => "error", "code"=>0)));
		}
		else {
			$dataArray = array("token" => $token,"code" => 1);
			$this->output->set_output(json_encode($dataArray));
		}
	}


	//Juego

	public function one() {
		$bandera = $this->app_model->verifica(1);
		if ($bandera != null) {
			$data['bandera'] = 1;
		}
		else {
			$data['bandera'] = 2;
		}
			$data['token'] = $this->session->userdata('token');
			//Verificar si ya aprobo la prueba
			$this->load->view('template/header');
			$this->load->view('template/menu');
			$this->load->view('app/one', $data);
			$this->load->view('template/footer');
	}
	public function validateOne() {
		$clavepista = $this->input->post('clave');
		$claveVerdad = 'AiDLmP';

		if (strcmp($clavepista,$claveVerdad) == 0 ) {
			//Acertaste
			$this->output->set_output(1);
			//Se guarda en la base de datos y se genera un valor para saber que el nuvel ya fue completado
			$token = $this->session->userdata('token');
			$hora = date("Y-m-d H:i:s");
			$idjuego = 1;
			$estado = 1; //Ya paso el juego
			$this->app_model->saveOne($hora,$token,$idjuego,$estado);
		}
		else {
			$this->output->set_output(0);
		}
	}


	public function two() {
		$bandera = $this->app_model->verifica(2);
		if ($bandera != null) {
			$data['bandera'] = 1;
		}
		else {
			$data['bandera'] = 2;
		}
		$data['token'] = $this->session->userdata('token');

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('app/two', $data);
		$this->load->view('template/footer');
	}
	public function validateTwo() {
		$clavepista = $this->input->post('clave');
		$claveVerdad = 'LaClaveEstaEnTuCorazon';

		if (strcmp($clavepista,$claveVerdad) == 0 ) {
			//Acertaste
			$this->output->set_output(1);
			//Se guarda en la base de datos y se genera un valor para saber que el nuvel ya fue completado
			$token = $this->session->userdata('token');
			$hora = date("Y-m-d H:i:s");
			$idjuego = 2;
			$estado = 1; //Ya paso el juego
			$this->app_model->saveOne($hora,$token,$idjuego,$estado);
		}
		else {
			$this->output->set_output(0);
		}
	}

	public function three() {
		$bandera = $this->app_model->verifica(2);
		if ($bandera != null) {
			$data['bandera'] = 1;
		}
		else {
			$data['bandera'] = 2;
		}
		$data['token'] = $this->session->userdata('token');

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('app/three', $data);
		$this->load->view('template/footer');
	}
	//Validar preguntas
	public function respOne() {
		$respOne = $this->input->post('respOne');
		$respuestas = array('Jeopardy!','Jeopardy','jeopardy!','jeopardy');

		if (in_array($respOne,$respuestas)) {
			$this->output->set_output(1);
		}
		else {
			$this->output->set_output(0);
		}
	}
	public function respTwo() {
		$respTwo = $this->input->post('respTwo');
		$respuestas = array('Natural','natural','en natural','En natural');

		if (in_array($respTwo,$respuestas)) {
			$this->output->set_output(1);
		}
		else {
			$this->output->set_output(0);
		}
	}
	public function respThree() {
		$respThree = $this->input->post('respThree');
		$respuestas = array('IBM','ibm','Ibm','Ibm Mexicana');

		if (in_array($respThree,$respuestas)) {
			//Almacenar en DB
			$token = $this->session->userdata('token');
			$hora = date("Y-m-d H:i:s");
			$idjuego = 3;
			$estado = 1; //Ya paso el juego
			$this->app_model->saveOne($hora,$token,$idjuego,$estado);
			
			$this->output->set_output(1);
		}
		else {
			$this->output->set_output(0);
		}
	}
}
