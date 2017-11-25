<div id="content">
    <div class="row">
        <div class="col-lg-offset-2 col-md-8" style="padding-top: 20px">
            <?php echo validation_errors(); ?>
            <?php echo form_open('fases/update/' . $fase->id); ?>
            <div class="card">
                <div class="card-body">
                    <h3>Actualizar fase</h3>
                    <div class="row">
                        <div class="col-md-6 form" role="form">
                            <div class="form-group floating-label">
                                <input id="nombre" name="nombre" type="text" class="form-control" value="<?php echo (set_value('nombre') != '') ? set_value('nombre') : $fase->nombre ?>">
                                <label for="nombre">Nombre(*)</label>
                            </div>
                        </div>
                        <div class="col-md-6 form" role="form">
                            <div class="form-group floating-label">
                                <input id="premioconsuelo" name="premioconsuelo" type="text" class="form-control" value="<?php echo (set_value('premioconsuelo') != '') ? set_value('premioconsuelo') : $fase->premioconsuelo ?>">
                                <label for="premioconsuelo">premio consuelo(*)</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-flat btn-primary ink-reaction pull-right">Actualizar</button>
                    <div class="clearfix"></div>
                </div>
            </div>
            </form>
        </div><!--end .col -->
    </div>
</div><!--end .row -->
