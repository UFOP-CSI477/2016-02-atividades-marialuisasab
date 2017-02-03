<?php

class UsuariosController extends AppController{
	public $helpers = array('Form');
	public $components = array('Flash');


	public function afterFilter(){
		$acessogeral = array('index_login', 'index_p' );
		$acessopaciente = array('index_e','add_e');
		$acessoRestritoAdm1 = array('add_e','index_e');
		$acessoRestritoAdm2 = array('add_e','index_e',);
		if(!in_array($this->action, $acessogeral)){//se o usuário tentar acessar uma área que não é publica precisa efetuar login
			$this->autenticar();
		}
		$usuario = $this->Session->read('Usuario');
		$tipoUsuario = $usuario['0']['Usuario']['tipo'];
		if($tipoUsuario == 2){
			if(in_array($this->action, $acessoRestritoAdm2)){
				$this->Flash->set('Acesso negado!');
				$this->redirect('/');
			}
		}
		if($tipoUsuario == 1){
			if(in_array($this->action, $acessoRestritoAdm1)){
				$this->Flash->set('Acesso negado!');
				$this->redirect('/');
			}
		}
 }

 public function autenticar(){
	 if(!$this->Session->check('Usuario')){
		 $this->redirect(array('controller'=>'usuarios', 'action'=>'index_login'));
		 exit();
	 }
	 else{
		 $usuario = $this->Session->read('Usuario');
		 $this->Flash->set('Seja bem-vindo(a) '.$usuario['0']['Usuario']['nome']);
	 }
 }


	public function index_login(){

	}

	public function validar(){

		$usuario = $this->Usuario->findAllByLoginAndSenha
			($this->data['Usuario']['login'],$this->data['Usuario']['senha']);

		if(!empty($usuario))
			return $usuario;
		else
			return false;

	}

	public function login(){
		if(!empty($this->data['Usuario']['login'])){
			//validar
			$usuario = $this->validar();

			if($usuario != false){
				$this->Flash->set('Acesso realizado com sucesso.');
				$this->Session->write('Usuario', $usuario);
				$this->redirect(array('controller'=> 'pages','action'=>'home_usuarios'));

				exit();
			}
			else{
				$this->Flash->set('Usuario e/ou senha inválidos!');
				$this->redirect(array('controller'=> 'usuarios','action'=>'index_login'));
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

	public function index(){

    $this->set('usuarios', $this->Usuario->find('all', array('order'=>array('Usuario.nome'=>'asc') )));//order asc ordena em prdem alfabetica ascendente
    //setar a variavel a ser usada
  }

	public function add($id=null){
			if(empty($this->request->data)){
				$usuarios = $this->Usuario->find('list', array('fields'=>array('id','tipo')));//Carregar combo de usuarios
				$this->set('usuarios', $usuarios);
			}else{//persistir os dados
				if($this->Usuario->save($this->request->data)){
				$this->Flash->set('Usuário inserido com sucesso!');
				$this->redirect(array('action'=>'index'));
				}
			}
	}

	public function edit($id=null){
		if(!$id){
			throw new NotFoundException("Usuário inválido!");
		}
		if(empty($this->request->data)){
			$usuarios = $this->Usuario->find('list', array('fields'=>array('id','tipo')));//Carregar combo de usuarios
			$this->set('usuarios', $usuarios);
			$this->request->data=$this->Usuario->findById($id);
		}else{//persistir os dados
			if($this->Usuario->save($this->request->data)){
			$this->Flash->set('Usuário inserido com sucesso!');
			$this->redirect(array('action'=>'index'));
			}
		}
	}

	public function delete($id=null){
			if(!$id){
				throw new NotFoundException("Procedimento inválido!");
			}

			//excluir direto, sem tratamento - delete($id, true) : em cascata
			$this->Procedimento->delete($id);
			$this->Flash->set('Procedimento excluído com sucesso!');
			$this->redirect(array('action' => 'index'));


		}

}
