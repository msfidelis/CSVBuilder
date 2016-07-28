<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace msfidelis\core\classes;
use msfidelis\core\classes\CSVBuilder;

/**
 * Esqueleto do relatório
 * @author Matheus Scarpato Fidelis
 * @email matheus.fidelis@industriafox.com
 * @version $Revision: 1.0 
 * @date 28/07/2016 
 */
class skelRelatorio extends CSVModel {
  
  /**
   * Construtor da classe
   * @param array $csvData itens do CSV
   */
  public function __construct(array $csvData = null) {
    $this->csvData = $csvData;
  }

}

