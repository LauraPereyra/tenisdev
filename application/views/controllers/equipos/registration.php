<div id="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-head">
                    <header><i class=""></i>Inscribir jugadores al equipo <b><?php echo $equipo->nombre?></b> (<small><?php echo $equipo->modalidad?></small>)</header>
                </div><!--end .card-head -->
                <div class="card-body">
                    <?php if( empty($inscritos) ):?>
                    <?php echo validation_errors(); ?>
                    <form name="registration-form" action="<?php echo site_url('equipos/registration/' . $equipo->id)?>" method="POST">
                        <div class="row">
                            <?php foreach ($jugadores as $jugador): ?>
                            <div class="col-md-6">
                                <input name="jugador[]" id="<?php echo $jugador->id?>" type="<?php echo $type; ?>" value="<?php echo $jugador->id?>" />
                                <label for="<?php echo $jugador->id?>"><?php echo $jugador->nombre . ' ' . $jugador->apellido; ?> <small>(<?php echo $jugador->genero?>)</small></label>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-9" style="text-align: right;">
                                <button class="btn btn-success" type="submit">Asiganar</button>
                            </div>
                        </div>
                    </form>
                    <?php else:?>
                        <div class="row">
                            <?php foreach ($inscritos as $inscrito): ?>
                                <div class="col-md-6">
                                    <label><?php echo $inscrito->nombre . ' ' . $inscrito->apellido; ?> <small>(<?php echo $inscrito->genero?>)</small></label>
                                </div>
                            <?php endforeach;?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>