<div id="content" class="has-actions style-default-bright">
    <div class=" col-md-12" style="padding:15px">
        <div class="card card-bordered" style="background-color: #ff5722; border-color: #ff5722; color: #ffffff;">
            <div class="card-head">
                <header><i class=""></i>inscripciones</header>
            </div><!--end .card-head -->
            <div class="card-body" style="background-color:#ffffff;border-color: #e5e6e6; color: #313335;}">
                <table class="table table-hover" id="example">
                    <thead>
                    <tr>
                        <th>jugador</th>
                        <th>equipo</th>
                        <th>ganancia</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach ($inscripciones as $inscripcion): ?>
                        <tr>
                            <td><?php echo $inscripcion->nombre . ' ' . $inscripcion->apellido ?></td>
                            <td><?php echo $inscripcion->equipo ?></td>
                            <td><?php echo $inscripcion->ganancia_torneo ?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div><!--end .card-body -->
        </div><!--end .card -->
        <!-- END SECTION ACTION -->
    </div>
</div>
