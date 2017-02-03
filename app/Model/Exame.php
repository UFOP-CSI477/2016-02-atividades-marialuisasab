<?php

class Exame extends AppModel{
  //public $hasMany = 'Paciente';
  public $belongsTo = 'Procedimento';

  //public $belongsTo = array ('Procedimento' => array ('foreignKey' => 'procedimento_id'),
    //      'Paciente' => array ('foreignKey' => 'paciente_id')
      //);
}
