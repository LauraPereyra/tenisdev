<div id="content" class="has-actions style-default-bright">
    <div class=" col-md-12" style="padding:15px">
        <div class="card card-bordered" style="background-color: #ff9800; border-color: #ff9800; color: #ffffff;">
            <div class="card-head">
                <header><i class=""></i>partidos</header>
            </div><!--end .card-head -->
            <div class="card-body" style="background-color:#ffffff;border-color: #e5e6e6; color: #313335;}">
                <table class="table table-hover" id="example">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fase</th>
                        <th>Arbitro</th>
                        <th>Modalidad</th>
                        <th>Resultado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach ($partidos as $partido): ?>
                        <tr>
                            <td><?php echo $partido->id ?></td>
                            <td><?php echo $partido->fase ?></td>
                            <td><?php echo $partido->arbitro_n.' '. $partido->arbitro_a ?></td>
                            <td><?php echo $partido->modalidad?></td>
                            <td><?php echo $partido->resultado?></td>
                            <td>
                                <?php if(count_team($partido->id)):?>
                                <a href="<?php echo site_url('partidos/add_team/' . $partido->id.'/'. $partido->modalidad)?>" class="btn btn-icon-toggle" role="button" data-toggle="tooltip" data-placement="top" data-original-title="Equipos">
                                    <i class="fa fa-plus text-success"></i>
                                </a>
                            <?php endif ?>
                                <a href="<?php echo site_url('partidos/win/' . $partido->id)?>" class="btn btn-icon-toggle" role="button" data-toggle="tooltip" data-placement="top" data-original-title="Premios">
                                    <i class="fa fa-trophy text-warning"></i>
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
