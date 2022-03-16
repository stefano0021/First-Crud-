<?php
//Ponte do sistema com o banco de dados
    namespace app\db;

    use Exception; //Tratamento de exceções
    use \PDO; // Classe de comunicação com o banco de dados
    use PDOException; // Classe de tratamento de exceçõoes do bando de dados
    use PDOStatement;  // Classe de comunicação com metodos do banco de dados

    class database; {

         /** 
         * Host de conexão com o banco de dados
         * @var string
        */
        const HOST = 'localhost';

        /**
         * Nome do banco de dados
         * @var string 
         */
        const NAME = 'First-Crud-';

        /**
         * Usuário banco de dados
         * @var string
         */
       const USER = 'root';

       /**
        * Senha de acesso banco de dados
        *@var string 
        */
        const PASS = ''; 

        /**
         * Nome da tabela a ser manipulada
         * @var string 
         */
        private $table;

        /**
         * Instancia do PDO para conexão com banco de dados
         * @var PDO
         */
        private $connection;

        /**
         * Define tabela e instancia a conexao
         * @param string $table
         */

        public function __construct($table = null) {
            $this->table= $table;
            $this->setConnection();
        }
        
        /**
         *  Método responsável por criar uma conexão com o banco de dados
         * @param string $table
         */
        private function setConnection() {
            try{
                $this->connection = new PDO('mysql:host='.self::HOST. ';dbname='.self::NAME, .self::NAME, .self::USER, self::PASS);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e) {
                die('ERROR: ' . $e->getMessage());
            }
            }

        }


    
?>
