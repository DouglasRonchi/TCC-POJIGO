<?php
class Conexao {
    private $host="localhost";
    private $user="root";
    private $password="";
    private $database="controlerotas";

    public $query;
    private $conn;
    public $result;

    function __construct(){
        $this->connect();
    }


    public function connect(){
        $this->conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        if(!$this->conn){
            echo "Falha na conexão com o Banco de Dados!<br>";
            echo "Erro: " . mysqli_connect_error($this->conn);
            die();
        }
    }


    public function executeQuery($query)
    {
        $this->connect();
        $this->query = $query;
        if ($this->result = mysqli_query($this->conn,$this->query)){
            $this->disconnect();
            return $this->result;
        } else {
            echo "Ocorreu um erro na execução da SQL";
            echo "Erro :" . mysqli_error($this->conn);
            echo "SQL: " . $query;
            disconnect();
            die();
        }
    }


    public function disconnect()
    {
        return mysqli_close($this->conn);
    }



    
}

// // Exemplo de busca no banco:
// // Cria a conexão:
// $conn = new Conexao;

// // Executa a Query no banco:
// $selectUsers = $conn->executeQuery("SELECT * FROM usuario");

// // Retorna o número de linhas em um resultado anterior (@$selectUsers):
// $selectUsersRows = mysqli_num_rows($selectUsers);

// // Exibe todos os registros na tela:
// while ($selectUsersRows = mysqli_fetch_assoc($selectUsers)){
//     echo $selectUsersRows["nome"]."<br>";
// }