<div id="menubar" class="menubar-inverse animate">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="expanded">
            <a href="../../html/dashboards/dashboard.html">
                <span class="text-lg text-bold text-primary ">GRANDSLAM</span>
            </a>
        </div>
    </div>
    <div class="menubar-scroll-panel">

        <!-- BEGIN MAIN MENU -->
        <ul id="main-menu" class="gui-controls">
            <?php foreach ($items as $item):?>
                <li id="sidebar-item-<?php echo $item['id']?>" <?php echo ($item['id'] === $active) ? 'class="active"':'' ?> >
                    <a href="<?php echo $item['link']?>" title="<?php echo $item['label']?>">
                        <div class="gui-icon"><i class="<?php echo $item['icon']?> sidebar-icon"></i></div>
                        <span class="title"><?php echo $item['label']?></span>
                    </a>
                    <?php if(!empty($item['submenu'])):?>
                        <?php foreach ($item['submenu'] as $value):?>
                            <ul>
                                <li><a href="<?php echo $value['link']?>" ><span class="title"><?php echo $value['label']?></span></a></li>
                            </ul><!--end /submenu -->
                        <?php endforeach ?>
                    <?php endif ?>
                </li>
            <?php endforeach;?>
        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->
    </div><!--end .menubar-scroll-panel-->
</div>
