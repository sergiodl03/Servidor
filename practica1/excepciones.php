<?php
class emailException extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = 'Error en la línea '.$this->getLine().' del fichero '.$this->getFile()
    .': <b>'.$this->getMessage().'</b> no es una dirección válida de correo';
    return $errorMsg;
  }
}
class passwordException extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = 'Error en la línea '.$this->getLine().' del fichero '.$this->getFile()
    .': <b>'.$this->getMessage().'</b> no es una contraseña correcta';
    return $errorMsg;
  }
}