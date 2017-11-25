<div id="content" class="has-actions style-default-bright">
    <div class="col-md-6 col-md-offset-3" style="padding:15px">
        <div class="card card-bordered" style="background-color: #ff9800; border-color: #ff9800; color: #ffffff;">
            <div class="card-head">
                <header><i class=""></i>Países</header>
            </div><!--end .card-head -->
            <div class="card-body" style="background-color:#ffffff;border-color: #e5e6e6; color: #313335;}">
                <table class="table table-hover" id="example">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach ($nacionalidades as $nacionalidad): ?>
                        <tr>
                            <td><?php echo $nacionalidad->id ?></td>
                            <td><?php echo $nacionalidad->nombre ?></td>
                            <td>
                                <a href="<?php echo site_url('nacionalidades/update/' . $nacionalidad->id)?>" class="btn btn-icon-toggle" role="button" data-toggle="tooltip" data-placement="top" data-original-title="Modificar">
                                    <i class="fa fa-pencil text-info"></i>
                                </a>
                                <a href="<?php echo site_url('nacionalidades/delete/' . $nacionalidad->id)?>" class="btn btn-icon-toggle" role="button" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">
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
