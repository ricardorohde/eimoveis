<?php      
    include_once '../../../config.php';
    try {
        $status = 'ERRO';
        if (isset ($_SESSION['idPessoaProprietario'])) {
            $banco = new Banco(Conf::pegCnxPadrao());
            $banco->setIdBanco($_POST['idBanco']);
            $banco->_delete();
            $status = 'OK';
        }
        $retorno = array('status'=>$status);
    } catch (PDOException $e) {        
        $retorno =  array('status'=>'ERRO');
    }
    echo json_encode($retorno);
?>