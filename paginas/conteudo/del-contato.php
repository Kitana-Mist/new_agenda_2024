<?php
include('../../config/conexao.php');

if(isset($_GET['idDel'])){
    $id = $_GET['idDel'];

    $select = "SELECT foto_contatos FROM tb_contatos WHERE id_contatos=:id";
    try {
        $result = $conect->prepare($select);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        $result->execute();

        $contar = $result->rowCount();
        if ($foto != 'avatar-padrao.png') { 
            $filePath = "../../img/cont/" . $foto;

            //verifica o arquivo existente e o deleta
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        //Deletar o registro do banco de dados
        $delete = "DELETE FROM tb_contatos WHERE id_contatos = :id";
        try {
            $result = $conect->prepare($delete);
            $result->bindValue(':id', $id, PDO::PARAM_INT);
            $result->execute();

            if ($result->rowCount() > 0) {
                header("Location: ../home.php");
            } else {
                header("location: ../home.php");
            }
            
        } catch (PDOException $e) {
            echo "<strong>ERRO DE DELETE: </strong>" . $e->getMessage();
        } 
    } catch (PDOException $e) {
        echo "<strong>ERRO DE DELETE: </strong>" . $e->getMessage();
       
    }
} else {
    //redireciona se o registro não for encontrado
    header("Location: ../home.php");}

?>