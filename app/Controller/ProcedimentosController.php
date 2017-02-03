<?php

class ProcedimentosController extends AppController{

  public $helpers = array('Html','Form');//auxilia na view com o html
  public $components = array('Flash');
  public function index_p(){

    $this->set('procedimentos', $this->Procedimento->find('all', array('order'=>array('Procedimento.nome'=>'asc') )));//order asc ordena em prdem alfabetica ascendente
    //setar a variavel a ser usada
  }

  public function view($id=null){
    if(!$id){
      throw new NotFoundException("Procedimento inválido!");
    }
    $procedimento = $this->Procedimento->findById($id);
    $this->set('procedimentos', $procedimento);
  }

  public function add($id=null){
      if(empty($this->request->data)){
        $usuarios = $this->Procedimento->Usuario->find('list', array('fields'=>array('id','nome')));//Carregar combo de usuarios
        $this->set('usuarios', $usuarios);
      }else{//persistir os dados
        if($this->Procedimento->save($this->request->data)){
        $this->Flash->set('Procedimento inserido com sucesso!');
        $this->redirect(array('action'=>'index_p'));
        }
      }
  }

  public function edit($id=null){
    if(!$id){
      throw new NotFoundException("Procedimento inválido!");
    }
    if(empty($this->request->data)){

      $usuarios = $this->Procedimento->Usuario->find('list', array('fields'=>array('id','nome')));//Carregar combo de usuarios
      $this->set('usuarios', $usuarios);
      $this->request->data=$this->Procedimento->findById($id);
    }else{//persistir os dados
      if($this->Procedimento->save($this->request->data)){
      $this->Flash->set('Procedimento atualizado com sucesso!');
      $this->redirect(array('action'=>'index_p'));
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
      $this->redirect(array('action' => 'index_p'));

    }


}
