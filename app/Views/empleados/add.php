<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

    <div class="row ">
        <div class="col-lg-12">
            <div id="asd"></div>
            <div>
                <div class="row page-titles">
                    <div class="col-lg-8 col-md-9 col-sm-7 col-xs-2 align-self-center">
                        <h4 class="text-themecolor">Adicionar Empleado</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" id="form_empleado" name="form_empleado" action="<?= base_url('/submit-form') ?>">
                                    <div class="row">
                                        <div class="form-group col-xs-12 col-sm-5 col-lg-3">
                                        <label for="name">Nombre y Apellidos: <strong style="color:#F00">*</strong></label>
                                            <input class="form-control" name="name" id="name" type="text" maxlength="50"/>
                                            <small class="form-control-feedback help-block initial"></small>
                                        </div> 

                                        <div class="form-group col-xs-12 col-sm-5 col-lg-3 mail1">
                                            <label for="email">Email: <strong style="color:#F00">*</strong> </label>
                                            <input type="email" class="form-control mail2" id="email" 
                                                   name="email"/>
                                            <small class="form-control-feedback help-block initial mail"></small>
                                        </div>

                                        <div class="form-group col-xs-12 col-sm-5 col-lg-3">
                                        <label for="birth_date">Fecha de nacimiento: <strong style="color:#F00">*</strong></label>
                                            <input placeholder="dd-mm-yyyy" type="text" class="form-control" name="birth_date" id="birth_date" />
                                            <small class="form-control-feedback help-block"></small>
                                        </div>

                                        <div class="form-group col-xs-12 col-md-5 col-lg-3">
                                        <label for="area_id" class="col-md-7">Área: <strong
                                        style="color:#F00">*</strong></label>
                                            <select name="area_id" id="area_id" class="form-control">
                                                <option value="0" selected="selected">-- Seleccione un área --
                                                </option>
                                                <?php
                                                    foreach ($areas as $area)
                                                   echo '<option value="',$area['id'],'">',$area['name'],'</option>';
                                                ?>
                                            </select>
                                            <small class="form-control-feedback help-block"></small>
                                        </div>
                                        
                                    </div>
                                    <div class="form-actions text-right">
                                         <a type="button" href="<?php echo base_url('empleados-list') ?>" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" onclick="valid_empleado()" class="btn btn-success"> <i class="fa fa-check"></i> Adicionar</button>
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
    <script type="text/javascript" src="<?php echo base_url('js/empleados.js'); ?>"></script>
<?= $this->endSection() ?>