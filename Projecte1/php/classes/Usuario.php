<?php
class Usuario {
    public $correo="";
    public $contra="";
    public $fichero="";
    
    public function __construct($correo, $contra, $fichero)
    {
        $this->fichero = $fichero;
        $this->correo = $correo;
        $this->contra = $contra;
    }
    public function writeusers(){
        $fa=fopen(__DIR__."/../".$this->fichero,"a+");
        
        fwrite($fa,$this->correo.",".$this->contra."\n");
        fclose($fa);
    }
    public function verifyexists(){
      
        $fa=fopen(__DIR__."/../".$this->fichero,"r+");
  
    
        while ($linea = fgets($fa)){
            $users[] = $linea;
            $users_e=[];     
        }
         
         for($i=0; $i <= count($users) -1; $i++){
             $campos = explode(',',$users[$i]);
             array_push($users_e, $campos);
     
         }
      
        fclose($fa);

         $encontrado=0;
        $encontrado_1=0;
        for($i=0; $i <= count($users_e) -1; $i++){
            
            if (trim($this->correo)==trim($users_e[$i][0])){
                
                session_start();
                $_SESSION= array();
                    $_SESSION['eemail'] = $this->correo;
                   
                if (trim($this->contra)==trim($users_e[$i][1])){
                    return 2;
                }else{
                    return 1;
                }
            break;
            } 
        }

        return 0;
    }
}