<div id="content" class="has-actions style-default-bright">
    <div class=" col-md-12" style="padding:15px">
        <div class="card card-bordered" style="background-color: #ff9800; border-color: #ff9800; color: #ffffff;">
            <div class="card-head">
                <header><i class=""></i>Equipos</header>
            </div><!--end .card-head -->
            <div class="card-body" style="background-color:#ffffff;border-color: #e5e6e6; color: #313335;}">
                <table class="table table-hover" id="example">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Entrenador</th>
                        <th>Modalidad</th>
                        <th>Torneo</th>
                        <th>Nacionalidad</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach ($equipos as $equipo): ?>
                        <tr>
                            <td><?php echo $equipo->nombre ?></td>
                            <td><?php echo $equipo->name.' '.$equipo->apellido ?></td>
                            <td><?php echo $equipo->modalidad ?></td>
                            <td><?php echo $equipo->torneo.'-'.$equipo->pais.'-'.$equipo->gestion ?></td>
                            <td><?php echo $equipo->nacionalidad ?></td>
                            <td>
                                <a href="<?php echo site_url('equipos/registration/' . $equipo->id)?>" class="btn btn-icon-toggle" role="button" data-toggle="tooltip" data-placement="top" data-original-title="Inscribir">
                                    <i class="fa fa-plus text-success"></i>
                                </a>
                            </td>
                            <!--td>
                                <a href="<?php echo site_url('equipo/update/' . $equipo->id)?>" class="btn btn-icon-toggle" role="button" data-toggle="tooltip" data-placement="top" data-original-title="Modificar">
                                    <i class="fa fa-pencil text-info"></i>
                                </a>
                                <a href="<?php echo site_url('equipo/delete/' . $equipo->id)?>" class="btn btn-icon-toggle" role="button" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">
                                    <i class="fa fa-close text-danger"></i>
                                </a>
                            </td-->
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div><!--end .card-body -->
        </div><!--end .card -->
        <!-- END SECTION ACTION -->
    </div>
</div>
