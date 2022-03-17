<?php

namespace App\Entity;

use \app\db\database;
use \PDO;

class Vaga {
    /**
     * Identificado unico da vaga
     * @var integer
     */
   public $id;

   /**
    * Titulo da vaga
    *@var string 
    */
    public $titulo;

    /**
     * Descrição da vaga (pode conter html)
     * @var string 
     */
     public $descricao;

    /**
     * Define a vaga está ativa (s ou n)
     * @var timestamp 
     */
    public $data;

    /**
     * Função para cadastrar a vaga no banco
     * @return boolean 
     */
    public function cadastrar () {
        //definir a data
        $this->data = date( 'Y-m-d H:i:s');
        echo "<pre>"; print_r($this); echo "</pre>"; exit;

        //Inserir a vaga no banco e retornar o ID
        $objDataBase = new Database ('vagas');
        $this->id = $objDataBase-> insert([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'status' => $this->status,
            'data' => $this->data,


        ]);
        
            return true; 

    }

}

    
?> 

