<?= $this->extend('layouts/app') ?>

<?= $this->section('css') ?>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css'); ?>">
    
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row ">
    <div class="col-lg-12">
        <div id="asd"></div>
        <div>
            <div class="row page-titles">
                <div class="col-lg-8 col-md-9 col-sm-7 col-xs-2 align-self-center">
                    <h4 class="text-themecolor">Empleados</h4>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-5 col-xs-2 text-right">
                    <a class="btn btn-info m-l-15" href="<?php echo base_url('empleados-add') ?>"><i class="fas fas fa-plus"></i>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                 <table class="display nowrap table table-hover table-striped table-bordered" width="100%" id="empleados-list">
                                   <thead>
                                      <tr>
                                         <th>Nombre</th>
                                         <th>Email</th>
                                         <th>Fecha de nacimiento</th>
                                         <th>Área</th>
                                         <th>Acción</th>
                                      </tr>
                                   </thead>
                                   <tbody>
                                      <?php if($empleados): ?>
                                      <?php foreach($empleados->getResult() as $empleado): ?>
                                      <tr>
                                        <td><?php echo $empleado->name; ?></td>
                                        <td><?php echo $empleado->email; ?></td>
                                        <td><?php echo $empleado->birth_date; ?></td>
                                        <td><?php echo $empleado->area_name; ?></td>
                                        <td>
                                            <form id="<?php echo 'delete_user_'.$empleado->id;?>" role="form" action="<?php echo base_url('/delete') ?>" method="post">
                                                <input type="hidden" name="empleado_id" id="empleado_id" value="<?php echo $empleado->id; ?>">
                                                <a href="<?php echo base_url('empleados-edit/'.$empleado->id);?>" class="btn btn-primary btn-sm">Editar</a>
                                            
                                                <button type="button" name="<?php echo 'delete_user_'.$empleado->id;?>" type="button" onclick="deleteConfirmation(name)"  class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                          </td>
                                      </tr>
                                     <?php endforeach; ?>
                                     <?php endif; ?>
                                   </tbody>
                                 </table>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
            
    </div>
</div>
</div>
 
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/empleados.js'); ?>"></script>

    <script>
       $(function(){
       <?php if(session()->has("success")) { ?>
           Swal.fire({
               position: 'top-end',
               type: 'success',
               title: "<?= session("success") ?>",
               showConfirmButton: false,
               timer: 4000,
               customClass: "sweetAlert"
           })
       <?php } ?>
      });
   </script>

   <script>
        $('#empleados-list').DataTable({
            "scrollX": true,
              "language": {
                "url": "../Spanish.json"
              },
              "pageLength": 25
            });
    </script>

<?= $this->endSection() ?>
