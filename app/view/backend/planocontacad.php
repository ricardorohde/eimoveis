<?php include_once 'app/view/backend/menupadrao.php'; ?>

<div class="main-content">
    
<?php    
    $pc = new PlanoDeConta(Conf::pegCnxPadrao());
    $titulo = 'Cadastrar plano de contas';
    if (isset ($_GET['idplanoconta'])) {
        $titulo = 'Editar plano de contas';
        $pc->setIdPlanoConta($_GET['idplanoconta']);
        $pc->getDados();
    }
?>

<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="sistema.php">Início</a>
        </li>
        <li class="active"><?=$titulo?></li>
    </ul>					
</div>

<div class="page-content">

    <div class="page-header">
        <!--<h1 style="text-align: center; font-weight: bold">-->
        <h1>
            <?=$titulo?>
            <!--<small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                overview &amp; stats
            </small>-->
        </h1>
    </div><!-- /.page-header -->
    
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12"><br />                    
                    <form id="fmCadPlanoConta" class="form-horizontal" role="form" name="fmCadPlanoConta" method="post" action="app/control/backend/planoContaGravar.php">
                        <input type="hidden" id="idPlanoConta" name="idPlanoConta" value="<?= $pc->getIdPlanoConta() ?>" />                                                               
                        <div id="lblCodigo" class="form-group">
                            <label for="codigo" class="col-sm-2 control-label no-padding-right" style="font-weight: bold;">Código:</label>
                            <div class="col-sm-9">
                                <input type="text" id="codigo" class="col-xs-10 col-sm-5" name="codigo" value="<?= $pc->getCodigo()?>" maxlength="50" title="Código"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tipo" class="col-sm-2 control-label no-padding-right"><strong>Tipo:</strong></label>
                            <div class="col-sm-9">
                                <select id="tipo" name="tipo" class="col-xs-10 col-sm-5">
                                  <option value=""></option>
                                  <option value="A" <?= ($pc->getTipo() == 'A')?'selected':'' ?>>Analítico</option>
                                  <option value="T" <?= ($pc->getTipo() == 'T')?'selected':'' ?>>Título</option>
                                </select>
                            </div>
                        </div>
                        <div id="lblDescricao" class="form-group">
                            <label for="descricao" class="col-sm-2 control-label no-padding-right" style="font-weight: bold;">Descrição do plano:</label>
                            <div class="col-sm-9">
                                <input type="text" id="descricao" class="col-xs-10 col-sm-5 obrigatorio" name="descricao" value="<?= $pc->getDescricao()?>" maxlength="500" title="Descrição do plano"/>
                            </div>
                        </div>                        
                        <hr />
                        <div id="divButoes"><br />                        
                        <button class="btn btn-info" type="button" id="btnLista" name="btnLista">
                            <i class="ace-icon fa fa-arrow-left icon-on-right bigger-125"></i>
                            <strong>Planos de contas cadastrados</strong>
                        </button>&nbsp;&nbsp;
                        
                        <button class="btn btn-light" type="button" id="btnNovo" name="btnNovo">
                            <i class="ace-icon fa fa-pencil-square-o bigger-125"></i>
                            <strong>Novo</strong>
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <button class="btn btn-success" type="button" id="btnSalvar" name="btnSalvar">
                            <i class="ace-icon fa fa-floppy-o bigger-125"></i>
                            <strong>Salvar</strong>
                        </button>

                    </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>    
</div><!-- /.page-content -->
<script type="text/javascript" src="js/backend/planodecontas.js"></script>

</div>