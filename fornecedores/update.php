<?php

require_once '../conexao.php';
session_start();

$id = $_POST['id'];
$nome   = $_POST['nome'];
$email  = $_POST['email'];
$rz  = $_POST['razao_soc'];
$ddd = $_POST['ddd'];
$tel = $_POST['tel'];
$cnpj = $_POST['cnpj'];


$PDO = $conex;

$sql = "UPDATE tb_fornecedor SET nome = :nome WHERE pk_usuario = :id;
        UPDATE tb_fornecedor SET razao_soc = :razao_soc WHERE pk_usuario = :id;
        UPDATE tb_fornecedor SET cnpj = :cnpj WHERE pk_usuario = :id;
        UPDATE tb_fornecedor SET email = :email WHERE pk_usuario = :id;
        UPDATE tb_fornecedor SET telefone = :telefone WHERE pk_usuario = :id;
        UPDATE tb_fornecedor SET fk_ddd = :fk_ddd WHERE pk_usuario = :id";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':razao_soc', $rz);
$stmt->bindParam(':cnpj', $cnpj);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':fk_ddd', $ddd);
$stmt->bindParam(':telefone', $tel);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    $_SESSION['recado'] = 'editado';
    header('Location: forneedores.php');

} else {
    $_SESSION['recado'] = 'erroedicao';
    header('Location: fornecedores.php');

}