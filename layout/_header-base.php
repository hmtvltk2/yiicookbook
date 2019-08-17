<?php
?>
<!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item ">
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">

        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
            <h4 class="kt-menu__nav"><span class="kt-menu__item"><?= $headerTitle ?></span></h3>

        </div>
    </div>

    <!-- begin:: Header Topbar -->
    <div class="kt-header__topbar">
        <?= $this->render('_topbar-search') ?>
        <?= $this->render('_topbar-notifications') ?>
        <?= $this->render('_topbar-user') ?>

    </div>
    <!-- end:: Header Topbar -->
</div>
<!-- end:: Header -->