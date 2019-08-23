<?php

use yii\helpers\Url;

$user = Yii::$app->user->identity;
?>
<!--begin: User Bar -->
<div class="kt-header__topbar-item kt-header__topbar-item--user">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
        <div class="kt-header__topbar-user">
            <span class="kt-header__topbar-welcome kt-hidden-mobile">Xin chào,</span> <span class="kt-header__topbar-username kt-hidden-mobile"><?= $user->full_name ?></span>
            <img alt="Pic" src="/metronic/media/users/300_21.jpg" />
            <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
            <!-- <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span> -->
        </div>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
        <!--begin: Head -->
        <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(/metronic/media/misc/bg-1.jpg)">
            <div class="kt-user-card__avatar">
                <img alt="Pic" src="/metronic/media/users/300_21.jpg" />
                <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                <!-- <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</!-->
            </div>
            <div class="kt-user-card__name"> <?= $user->full_name ?></div>
        </div>
        <!--end: Head -->
        <!--begin: Navigation -->
        <div class="kt-notification">
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon"> <i class="flaticon2-calendar-3 kt-font-success"></i> </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title kt-font-bold"> Thông tin tài khoản </div>
                    <div class="kt-notification__item-time">Thông tin cá nhân và lịch sử làm việc</div>
                </div>
            </a>

            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon"> <i class="flaticon2-rocket-1 kt-font-danger"></i> </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title kt-font-bold">Đổi mật khẩu </div>
                    <div class="kt-notification__item-time"> Thay đổi mật khẩu của bạn </div>
                </div>
            </a>


            <div class="kt-notification__custom kt-space-between">
                <a href="<?= Url::to(['/admin/user/logout']) ?>" data-method="post" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Đăng xuất</a>
            </div>
        </div>
        <!--end: Navigation -->
    </div>
</div>
<!--end: User Bar -->