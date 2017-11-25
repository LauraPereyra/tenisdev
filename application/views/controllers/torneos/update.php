<div id="content">
    <div class="row">
        <div class="col-lg-offset-2 col-md-8" style="padding-top: 20px">
            <?php echo validation_errors(); ?>
            <form action="<?php echo site_url('torneos/update/' . $torneo->pais.'/'.$torneo->gestion)?>" method="post" id="torneo-form">
                <div class="card">
                    <div class="card-body">
                        <h3>Crear torneo</h3>
                        <div class="row">
                            <div class="col-md-6 form" role="form">
                                <div class="form-group floating-label">
                                    <input id="nombre" name="nombre" type="text" class="form-control" value="<?php echo set_value('nombre',$torneo->nombre) ?>">
                                    <label for="nombre">Nombre</label>
                                </div>
                            </div>
                            <div class="col-md-6 form" role="form">
                                <div class="form-group floating-label">
                                    <select id="pais" name="pais" class="form-control">
                                        <option <?php echo set_select('pais', 'Seleccionar', TRUE); ?>>Seleccionar</option>
                                        <option <?php echo set_select('pais', 'Gran Bretaña', ($torneo->pais === 'Gran Bretaña')); ?>>Gran Bretaña</option>
                                        <option <?php echo set_select('pais', 'Estados Unidos', ($torneo->pais === 'Estados Unidos')); ?>>Estados Unidos</option>
                                        <option <?php echo set_select('pais', 'Francia', ($torneo->pais === 'Francia')); ?>>Francia</option>
                                        <option <?php echo set_select('pais', 'Australia', ($torneo->pais === 'Australia')); ?>>Australia</option>
                                    </select>
                                    <label for="pais">País</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form" role="form">
                                <div class="form-group floating-label">
                                    <input id="premio" name="premio" type="text" class="form-control" value="<?php echo set_value('premio', isset($torneo->premio) ? $torneo->premio : '') ?>">
                                    <label for="premio">Premio</label>
                                </div>
                            </div>
                            <div class="col-md-6 form" role="form">
                                <div class="form-group floating-label">
                                    <input id="gestion" name="gestion" type="text" class="form-control" value="<?php echo set_value('gestion',$torneo->gestion) ?>">
                                    <label for="gestion">Gestion</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-flat btn-primary ink-reaction pull-right">Crear</button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div><!--end .col -->
    </div>
</div><!--end .row -->
