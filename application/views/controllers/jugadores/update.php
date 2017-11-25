<div id="content">
    <div class="row">
        <div class="col-lg-offset-2 col-md-8" style="padding-top: 20px">
            <?php echo validation_errors(); ?>
            <?php echo form_open('jugadores/update/' . $jugador->id); ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form" role="form">
                            <div class="form-group floating-label">
                                <input id="nombre" name="nombre" type="text" class="form-control" value="<?php echo (set_value('nombre') != '') ? set_value('nombre') : $jugador->nombre ?>">
                                <label for="nombre">Nombre(*)</label>
                            </div>
                        </div>
                        <div class="col-md-6 form" role="form">
                            <div class="form-group floating-label">
                                <input id="apellido" name="apellido" type="text" class="form-control" value="<?php echo (set_value('apellido') != '') ? set_value('apellido') : $jugador->apellido ?>">
                                <label for="apellido">Apellido(*)</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form" role="form">
                            <div class="form-group floating-label">
                                <select id="genero" name="genero" class="form-control">
                                    <option value="0"<?php echo  set_select('genero',0); ?>>&nbsp;</option>
                                    <option value="masculino" <?php echo ($jugador->genero == "masculino" ) ? set_select('genero','masculino', TRUE) : set_select('genero','masculino'); ?>>Masculino</option>
                                    <option value="femenino" <?php echo ($jugador->genero == "femenino" ) ? set_select('genero','femenino', TRUE) : set_select('genero','femenino'); ?>>Femenino</option>
                                </select>
                                <label for="select2">Select</label>
                            </div>
                        </div>
                        <div class="col-md-6 form" role="form">
                            <div class="form-group floating-label">
                                <div class="input-group date" id="demo-date-format">
                                    <div class="input-group-content">
                                        <input id="fecha_nac" name="fecha_nac" type="text" class="form-control" value="<?php echo (set_value('genero') != '') ? set_value('genero') : $jugador->fecha_nac ?>">
                                        <label>Fecha Nacimiento</label>
                                    </div>
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div><!--end .form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form" role="form">
                            <div class="form-group floating-label">
                                <input id="nacionalidad" name="nacionalidad" type="text" class="form-control" value="<?php echo (set_value('nacionalidad') != '') ? set_value('nacionalidad') : $jugador->nacionalidad ?>">
                                <label for="nacionalidad">Nacionalidad(*)</label>
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
