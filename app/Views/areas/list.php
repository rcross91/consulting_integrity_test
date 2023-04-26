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
                    <h4 class="text-themecolor">Áreas</h4>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-5 col-xs-2 text-right">
                    <a class="btn btn-info m-l-15" href="<?php echo base_url('areas-add') ?>"><i class="fas fas fa-plus"></i>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                 <table class="display nowrap table table-hover table-striped table-bordered" width="100%" id="areas-list">
                                   <thead>
                                      <tr>
                                         <th>Nombre</th>
                                         <th>Número de empleados</th>
                                         <th>Acción</th>
                                      </tr>
                                   </thead>
                                   <tbody>
                                      <?php if($areas): ?>
                                      <?php foreach($areas as $area): ?>
                                      <tr>
                                        <td><?php echo $area['name']; ?></td>
                                        <td><?php echo $area['nro_empleados']; ?></td>
                                        
                                        <td>
                                            <form id="<?php echo 'delete_area_'.$area['id'];?>" role="form" action="<?php echo base_url('/delete_area') ?>" method="post">
                                                <input type="hidden" name="area_id" id="area_id" value="<?php echo $area['id']; ?>">
                                                <a href="<?php echo base_url('areas-edit/'.$area['id']);?>" class="btn btn-primary btn-sm">Editar</a>
                                            
                                                <button type="button" name="<?php echo 'delete_area_'.$area['id'];?>" type="button" onclick="deleteConfirmation(name)"  class="btn btn-danger btn-sm">Eliminar</button>
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
    <script type="text/javascript" src="<?php echo base_url('js/areas.js'); ?>"></script>

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

       <?php if(session()->has("warning")) { ?>
           Swal.fire({
               position: 'top-end',
               type: 'warning',
               title: "<?= session("warning") ?>",
               showConfirmButton: false,
               timer: 4000,
               customClass: "sweetAlert"
           })
       <?php } ?>
      });
   </script>

   <script>
        $('#areas-list').DataTable({
            "scrollX": true,
            columnDefs: [
              { width: '60%', targets: 0 }, 
              //{ width: '30%', targets: 1 }, 
              { width: '20%', targets: 2 }  
            ],
              "language": {
                "url": "../Spanish.json"
              },
             
              "pageLength": 25
            });
    </script>

<?= $this->endSection() ?>
