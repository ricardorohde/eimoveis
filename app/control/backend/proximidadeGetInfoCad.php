<?php
    $status = 'NO';
    $resultados = null;
    try {
        include_once '../../../config.php';        
        if (isset ($_SESSION['idPessoaProprietario'])) {
            $obj = new ImovelProximidadeTipo(Conf::pegCnxPadrao());            
            $obj->_preecheObjeto($_POST['id']);
            $resultados = array(array('id' => $obj->getIdProximidade(),'descricao' => $obj->getDescricao()));
            $status = (sizeof($resultados) > 0) ? 'OK' : 'NO';  
        }              
    } catch (PDOException $e) {
        $status = 'ERRO';
    }    
    echo json_encode(array('status' => $status, 'resultados' => $resultados));
?>