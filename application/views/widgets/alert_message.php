<?php if(!is_null($this->session->flashdata('alert_status'))):?>
<div class="alert alert-<?php echo $this->session->flashdata('alert_status') ?>">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo $this->session->flashdata('alert_message') ?>
</div>
<?php endif;?>