<?php

class ExamesController extends AppController{

  public $helpers = array('Html','Form');//auxilia na view com o html
  public $components = array('Flash');

  public function index_e(){

    $paciente = $this->Session->read('Paciente');
    $this->loadModel("Exame");
    $exames = $this->Exame->findAllByPacienteId(array($paciente[0]['Paciente']['id']));
    $this->set('exames', $exames);

   //$this->set('exames', $this->Exame->find('all', array('order'=>array('Exame.data'=>'desc'))));


  }



    public function add_e($id=null){
        $this->loadModel("Paciente");
        if(empty($this->request->data)){

          $paciente = $this->Session->read('Paciente');
          $this->set('paciente', $paciente[0]['Paciente']['id']);
          $procedimentos = $this->Exame->Procedimento->find('list', array('fields'=>array('id','nome')));//Carregar combo de procedimentos
          $this->set('procedimentos', $procedimentos);
        }else{//persistir os dados
          if($this->Exame->save($this->request->data)){
          $this->Flash->set('Exame marcado com sucesso!');
          $this->redirect(array('action'=>'index_e'));
          }
        }
    }





    public function edit($id=null){
      if(!$id){
        throw new NotFoundException("Exame inválido!");
      }
      if(empty($this->request->data)){
        //$exames = $this->Exame->Paciente->find('list', array('fields'=>array('id','nome')));//Carregar combo de pacientes
        $procedimentos = $this->Exame->Procedimento->find('list', array('fields'=>array('nome','preco')));//Carregar combo de procedimentos
       $this->set('procedimentos', $procedimentos);
        $this->request->data=$this->Exame->findById($id);
      }else{//persistir os dados
        if($this->Exame->save($this->request->data)){
        $this->Flash->set('Exame atualizado com sucesso!');
        $this->redirect(array('action'=>'index_e'));
        }
      }
    }

    public function delete($id=null){
        if(!$id){
          throw new NotFoundException("Procedimento inválido!");
        }
        //excluir direto, sem tratamento - delete($id, true) : em cascata
        $this->Exame->delete($id);
        $this->Flash->set('Exame excluído com sucesso!');
        $this->redirect(array('action' => 'index_e'));
      }

      public function relatorioGeral(){
        $this->set('exames', $this->Exame->find('all'));
      }
}
