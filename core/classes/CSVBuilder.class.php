<?php

namespace msfidelis\csvBuilder\classes;

/**
 * Modelo de ações do CSV
 * @author Matheus Scarpato Fidelis
 * @email msfidelis01@gmail.com
 * @version $Revision: 1.0 
 * @date 28/07/2016 
 */
abstract class CSVBuilder {

  public static $separator = ";";
  private $filename = "Relatorio";
  private $csvData = array(); //Array recebido para ser tratado
  private $fileData = array(); //Array tratado

  /**
   * Automatiza o BUILD do CSV
   * @param array $array dados do CSV
   */
  public function build(array $array = null) {
    $header = $this->headerCSV($array);
    $data = $this->buildCSV($header, $array);
    $this->export($data);
  }

  /**
   * Constroi o Header do CSV
   * @param array $headArray
   * @return string
   */
  public function headerCSV(array $headArray = null) {
    $header = null;
    if (empty($headArray)) {
      $headerData = $this->csvData[0];
    } else {
      $headerData = $headArray[0];
    }

    foreach ($headerData as $key => $field) {
      $header = $header . $key . self::$separator;
    }
    $header = $header . " ";
    return $header;
  }

  /**
   * Constroi as linhas do CSV
   * @param type $header
   * @param array $data
   * @return type
   */
  public function buildCSV($header = null, array $data = null) {
    $this->fileData[] = $header;
    foreach ($data as $values) {
      $line = "";
      foreach ($values as $key => $value) {
        $line = $line . $value . ";";
      }
      $line = $line . " ";
      $this->fileData[] = $line;
    }

    return $this->fileData;
  }

  /**
   * Crie o arquivo CSV com o array gerado
   * @param array $lines
   */
  public function export(array $lines) {
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"{$this->filename}" . date("YmdHis") . ".csv\"");
    echo implode("\n", $lines);
  }

}


