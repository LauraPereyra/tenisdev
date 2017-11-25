<div id="content" class="has-actions style-default-bright">
    <div class=" col-md-12" style="padding:15px">
        <div class="card card-bordered" style="background-color: #ff9800; border-color: #ff9800; color: #ffffff;">
            <div class="card-head">
                <header><i class=""></i>Entrenadores</header>
            </div><!--end .card-head -->
            <div class="card-body" style="background-color:#ffffff;border-color: #e5e6e6; color: #313335;}">
                <table class="table table-hover" id="example">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach ($entrenadores as $entrenador): ?>
                        <tr>
                            <td><?php echo $entrenador->id ?></td>
                            <td><?php echo $entrenador->nombre ?></td>
                            <td><?php echo $entrenador->apellido ?></td>
                            <td>
                                <a href="<?php echo site_url('entrenador/update/' . $entrenador->id)?>" class="btn btn-icon-toggle" role="button" data-toggle="tooltip" data-placement="top" data-original-title="Modificar">
                                    <i class="fa fa-pencil text-info"></i>
                                </a>
                                <a href="<?php echo site_url('entrenador/delete/' . $entrenador->id)?>" class="btn btn-icon-toggle" role="button" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">
                                    <i class="fa fa-close text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div><!--end .card-body -->
        </div><!--end .card -->
        <!-- END SECTION ACTION -->
    </div>
</div>
