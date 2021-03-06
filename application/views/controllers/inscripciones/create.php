<div id="content">
    <div class="row">
        <div class="col-lg-offset-2 col-md-8" style="padding-top: 20px">
            <?php echo validation_errors(); ?>
            <?php echo form_open('inscripciones/create'); ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form" role="form">
                            <div class="form-group floating-label">
                                <select id="jugador" name="jugador" class="form-control">
                                    <option value="">&nbsp;</option>
                                    <?php foreach ($jugadores as $jugador):?>
                                    <option value="<?php echo $jugador->id?>"><?php echo $jugador->nombre.' '.$jugador->apellido?></option>
                                    <?php  endforeach ?>
                                </select>
                                <label for="jugador">Jugador</label>
                            </div>
                        </div>
                        <div class="col-md-6 form" role="form">
                            <div class="form-group floating-label">
                                <select id="equipo" name="equipo" class="form-control">
                                    <option value="">&nbsp;</option>
                                    <?php foreach ($equipos as $equipo):?>
                                    <option value="<?php echo $equipo->id?>"><?php echo $equipo->nombre?></option>
                                    <?php  endforeach ?>
                                </select>
                                <label for="equipo">Equipo</label>
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
