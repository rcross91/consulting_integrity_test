<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

    <div class="row ">
        <div class="col-lg-12">
            <div id="asd"></div>
            <div>
                <div class="row page-titles">
                    <div class="col-lg-8 col-md-9 col-sm-7 col-xs-2 align-self-center">
                        <h4 class="text-themecolor">Adicionar Área</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" id="form_area" name="form_area" action="<?= base_url('/submit-area') ?>">
                                    <div class="row">
                                        <div class="form-group col-xs-12 col-sm-6 col-lg-4 offset-lg-4">
                                        <label for="name">Nombre: <strong style="color:#F00">*</strong></label>
                                            <input class="form-control" name="name" id="name" type="text" maxlength="50"/>
                                            <small class="form-control-feedback help-block initial"></small>
                                        </div> 
                                    </div>
                                    <div class="form-actions text-right">
                                         <a type="button" href="<?php echo base_url('add-list') ?>" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" onclick="valid_area()" class="btn btn-success"> <i class="fa fa-check"></i> Adicionar</button>
                                    </div>
                                </form>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <script type="text/javascript" src="<?php echo base_url('js/areas.js'); ?>"></script>
<?= $this->endSection() ?>