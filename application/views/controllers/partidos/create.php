<div id="content">
    <div class="row">
        <div class="col-lg-offset-2 col-md-8" style="padding-top: 20px">
            <?php echo validation_errors(); ?>
            <?php echo form_open('partidos/create'); ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 form" role="form">
                            <div class="form-group floating-label">
                                <select id="fase" name="fase" class="form-control">
                                    <option value="">&nbsp;</option>
                                    <?php foreach ($fases as $fase):?>
                                        <option value="<?php echo $fase->id?>"><?php echo $fase->nombre?></option>
                                    <?php  endforeach ?>
                                </select>
                                <label for="fase">Fase</label>
                            </div>
                        </div>
                        <div class="col-md-4 form" role="form">
                            <div class="form-group floating-label">
                                <select id="arbitro" name="arbitro" class="form-control">
                                    <option value="">&nbsp;</option>
                                    <?php foreach ($arbitros as $arbitro):?>
                                        <option value="<?php echo $arbitro->id?>"><?php echo $arbitro->nombre.' '.$arbitro->apellido?></option>
                                    <?php  endforeach ?>
                                </select>
                                <label for="arbitro">arbitro</label>
                            </div>
                        </div>
                        <div class="col-md-4 form" role="form">
                            <div class="form-group floating-label">
                                <select id="modalidad" name="modalidad" class="form-control">
                                    <option <?php echo set_select('modalidad', 'Seleccionar', TRUE); ?>></option>
                                    <option <?php echo set_select('modalidad', 'Individual masculino'); ?>>Individual masculino</option>
                                    <option <?php echo set_select('modalidad', 'Individual femenino'); ?>>Individual femenino</option>
                                    <option <?php echo set_select('modalidad', 'Dobles masculino'); ?>>Dobles masculino</option>
                                    <option <?php echo set_select('modalidad', 'Dobles femenino'); ?>>Dobles femenino</option>
                                    <option <?php echo set_select('modalidad', 'Dobles mixto'); ?>>Dobles mixto</option>
                                </select>
                                <label for="modalidad">Modalidad</label>
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
