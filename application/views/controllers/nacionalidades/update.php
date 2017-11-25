<div id="content">
    <div class="row">
        <div class="col-md-offset-3 col-md-6" style="padding-top: 20px">
            <form action="nacionalidades/update/<?php echo $nacionalidad->id;?>" method="post" id="nac-form">
                <div class="card">
                    <div class="card-body">
                        <h3>Actualizar nacionalidad</h3>
                        <div class="row">
                            <div class="col-md-8 form" role="form">
                                <div class="form-group floating-label">
                                    <input name="id" type="hidden" value="<?php echo $nacionalidad->id;?>"/>
                                    <input id="nombre" name="nombre" type="text" class="form-control" value="<?php echo $nacionalidad->nombre;?>">
                                    <label for="nombre">Nombre(*)</label>
                                </div>
                            </div>
                            <div class="col-md-4 form" role="form">
                                <button type="submit" class="btn btn-success">Crear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div><!--end .col -->
    </div>
</div><!--end .row -->
<script type="text/javascript">
    $(function(){
        app.sendForm('#nac-form', function ( response ) {
            if ( response.status ) {
                toastr.success(response.message);
                setTimeout(function () {
                    location.href = response.href;
                }, 1500);
            } else {
                var html = '';
                $.each(response.message, function (key, value) {
                    html += value + '<br/>';
                });
                toastr.error(html);
            }
        });
    });
</script>
