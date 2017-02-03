<?php

class PacientesController extends AppController{

  public $helpers = array('Html','Form');//auxilia na view com o html
  public $components = array('Flash');


  public function afterFilter(){
    $acessogeral = array('index_login', 'index_p' );
    $acessopaciente = array('index_e','add_e');

    if(!in_array($this->action, $acessogeral)){//se o usuário tentar acessar uma área que não é publica precisa efetuar login
      $this->autenticar();
    }
    $paciente = $this->Session->read('Paciente');

 }

 public function autenticar(){
   if(!$this->Session->check('Paciente')){
     $this->redirect(array('controller'=>'pacientes', 'action'=>'index_login'));
     exit();
   }
   else{
     $paciente = $this->Session->read('Paciente');
     $this->Flash->set('Seja bem-vindo(a) '.$paciente['0']['Paciente']['nome']);
   }
 }


  public function index(){
    $this->set('pacientes', $this->Paciente->find('all', array('order'=>array('Paciente.nome'=>'asc') )));//order asc ordena em prdem alfabetica ascendente
    //setar a variavel a ser usada
  }

  public function add($id=null){
      //  $this->set('pacientes', $pacientes);

        if($this->Paciente->save($this->request->data)){
        $this->Flash->set('Paciente cadastrado com sucesso!');
        $this->redirect(array('action'=>'index'));
        }
      //}
  }

  public function edit($id=null){
    if(!$id){
      throw new NotFoundException("Paciente inválido!");
    }
    if(empty($this->request->data)){
      $this->set('pacientes', $pacientes);

      $this->request->data=$this->Paciente->findById($id);
    }else{//persistir os dados
      if($this->Paciente->save($this->request->data)){
      $this->Flash->set('Paciente atualizado com sucesso!');
      $this->redirect(array('action'=>'index'));
      }
    }
  }

  public function delete($id=null){
      if(!$id){
        throw new NotFoundException("Procedimento inválido!");
      }

      //excluir direto, sem tratamento - delete($id, true) : em cascata
      $this->Paciente->delete($id, true);
      $this->Flash->set('Paciente excluído com sucesso!');
      $this->redirect(array('action' => 'index'));
    }




    public function index_login(){

  	}

  	public function validar(){

  		$paciente = $this->Paciente->findAllByLoginAndSenha
  			($this->data['Paciente']['login'],$this->data['Paciente']['senha']);

  		if(!empty($paciente))
  			return $paciente;
  		else
  			return false;

  	}

  	public function login(){
  		if(!empty($this->data['Paciente']['login'])){
  			//validar
  			$paciente = $this->validar();

  			if($paciente != false){
  				$this->Flash->set('Acesso realizado com sucesso.');
  				$this->Session->write('Paciente', $paciente);

          $this->Session->write('idpaciente', $paciente['id']);
  				$this->redirect(array('controller'=> 'pages','action'=>'home_pacientes'));
  				exit();
  			}
  			else{
  				$this->Flash->set('Login e/ou senha inválidos!');
  				$this->redirect(array('controller'=> 'pacientes','action'=>'index_login'));
  				exit();
  			}
  		}
  		else{
  			$this->redirect(array('action'=>'index_login'));
  			exit();
  		}
  	}

    public function logout(){
      //criar um link na pag principal p fazer logout
      $this->Session->destroy();
      $this->redirect(array('action'=>'index_login'));
      exit();
    }
  }
