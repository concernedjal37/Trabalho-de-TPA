<?php

class Manager extends Conexao{

    public function insert_client($data)
    {

        $pdo = parent::get_instance();

        $sql = "INSERT INTO usuario VALUES(NULL, :name, :email, :senha, :cpf, :birth, :address, :phone )";

        $statement = $pdo->prepare($sql);
        foreach($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        $statement->execute();

    }

    public function list_client()
    {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM usuario order by idusuario desc";
        $statement = $pdo->query($sql);
        $statement->execute();

        return $statement->fetchAll();

    }

    public function list_client_by_id($id)
    {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM usuario WHERE idusuario = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();

        return $statement->fetchAll();

    }

    public function delete_client($id)
    {
        $pdo = parent::get_instance();
        $sql = "DELETE FROM usuario WHERE idusuario = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
    }

    public function update_client($data)
    {
        $pdo = parent::get_instance();
        $sql = "UPDATE usuario
                    SET name = :name,
                        email = :email,
                          senha = senha,
                            cpf = :cpf,
                                birth = :birth,
                                    phone = :phone,
                                        address = :address
                                            WHERE idusuario = :id";
        var_dump($sql);
        $statement = $pdo->prepare($sql);
        foreach ($data as $key => $value){
                $statement->bindValue(":$key", $value);
        }
        $statement->execute();
    }
}

?>