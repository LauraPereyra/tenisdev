<div id="content">
    <div class="row">
        <div class="col-lg-offset-2 col-md-8" style="padding-top: 20px">
            <?php echo validation_errors(); ?>
            <?php echo form_open('equipos/create'); ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 form" role="form">
                            <div class="form-group floating-label">
                                <input id="nombre" name="nombre" type="text" class="form-control" value="">
                                <label for="nombre">Nombre(*)</label>
                            </div>
                        </div>
                        <div class="col-md-4 form" role="form">
                            <div class="form-group floating-label">
                                <select id="entrenador" name="entrenador" class="form-control">
                                    <option value="">&nbsp;</option>
                                    <?php foreach ($entrenadores as $entrenador):?>
                                    <option value="<?php echo $entrenador->id?>"><?php echo $entrenador->nombre .' '. $entrenador->apellido?></option>
                                    <?php  endforeach ?>
                                </select>
                                <label for="entrenador">Entrenador</label>
                            </div>
                        </div>
                        <div class="col-md-4 form" role="form">
                            <div class="form-group floating-label">
                                <select id="modalidad" name="modalidad" class="form-control">
                                    <option <?php echo set_select('modalidad', 'Seleccionar', TRUE); ?>></option>
                                    <option <?php echo set_select('modalidad', 'Individual masculino'); ?>>Individual masculino</option>
                                    <option <?php echo set_select('modalidad', 'Individual femenino'); ?>>Individual femenino</option>
                                    <option <?php echo set_select('modalidad', 'Iobles masculino'); ?>>Dobles masculino</option>
                                    <option <?php echo set_select('modalidad', 'Dobles femenino'); ?>>Dobles femenino</option>
                                    <option <?php echo set_select('modalidad', 'Dobles mixto'); ?>>Dobles mixto</option>
                                </select>
                                <label for="modalidad">Modalidad</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form" role="form">
                            <div class="form-group floating-label">
                                <select id="nacionalidad" name="nacionalidad" class="form-control">
                                    <option value="">&nbsp;</option>
                                    <?php foreach ($nacionalidades as $nacionalidad):?>
                                    <option value="<?php echo $nacionalidad->id?>"><?php echo $nacionalidad->nombre?></option>
                                    <?php  endforeach; ?>
                                </select>
                                <label for="nacionalidad">nacionalidad</label>
                            </div>
                        </div>
                        <div class="col-md-6 form" role="form">
                            <div class="form-group floating-label">
                                <select id="torneo" name="torneo" class="form-control">
                                    <option value="">&nbsp;</option>
                                    <?php foreach ($torneos as $torneo):?>
                                    <option value="<?php echo $torneo->pais.'-'.$torneo->gestion?>"><?php echo $torneo->nombre .'-'. $torneo->pais.'-'.$torneo->gestion?></option>
                                    <?php  endforeach ?>
                                </select>
                                <label for="torneo">torneo</label>
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
