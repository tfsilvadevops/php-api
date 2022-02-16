<?php
    namespace app\Models;

    class User
    {
        private static $table = 'user';

        public static function select(int $id){
           $connPdo = new \PDO(DBDRIVER.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS); 
           $sql = 'select * FROM '.self::$table.' WHERE id = :id';
           $stmt = $connPdo-> prepare($sql);
           $stmt -> bindValue(':id', $id);
           $stmt -> execute();

           if($stmt->rowCount()>0){
              return $stmt->fetch(\PDO::FETCH_ASSOC);
           } else{
               throw new \Exception("Nenhum usuário encontrado");
           }

        }
        public static function selectAll(){
            $connPdo = new \PDO(DBDRIVER.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS); 
            $sql = 'select * FROM '.self::$table;
            $stmt = $connPdo-> prepare($sql);
            $stmt -> execute();
 
            if($stmt->rowCount()>0){
               return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } else{
                throw new \Exception("Nenhum usuário encontrado");
            }
 
         }
         public static function insert($data){
            $connPdo = new \PDO(DBDRIVER.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS); 
            $sql = 'INSERT INTO '.self::$table.'(email, password, name) VALUES (:em, :pa, :na)';
            $stmt = $connPdo-> prepare($sql);
            $stmt->bindValue(':em', $data['email']);
            $stmt->bindValue(':pa', $data['password']);
            $stmt->bindValue(':na', $data['name']);
            $stmt -> execute();
 
            if($stmt->rowCount()>0){
               return 'Ususario inserido com sucesso';
            } else{
                throw new \Exception("Falha ao inserir usuário");
            }
 
         }
    }

