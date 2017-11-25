<div id="content">
    <div class="row">
        <div class="col-lg-offset-2 col-md-8" style="padding-top: 20px">
            <?php echo validation_errors(); ?>
            <?php echo form_open('partidos/win/'.$partido->id); ?>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <div class="col-sm-9">
                            <label>Ganador</label>
                            <?php foreach ($equipos as $equipo):?>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="equipo" value="<?php echo $equipo->equipo_id?>" checked="false">
                                    <span><?php echo $equipo->nombre?></span>
                                </label>
                            </div>
                            <?php  endforeach ?>
                        </div><!--end .col -->
                        <div class="col-md-6 form" role="form">
                            <div class="form-group floating-label">
                                <input id="resultado" name="resultado" type="text" class="form-control" value="">
                                <label for="resultado">Resultado)</label>
                            </div>
                        </div>
                    </div><!--end .form-group -->
                    <button type="submit" class="btn btn-flat btn-primary ink-reaction pull-right">Crear</button>
                    <div class="clearfix"></div>
                </div>
            </div>
            </form>
        </div><!--end .col -->
    </div>
</div><!--end .row -->
