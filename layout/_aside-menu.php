<!-- begin:: Aside Menu -->
<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
        <?php if (isset($this->blocks['aside-menu'])) : ?>
        <?= $this->blocks['aside-menu'] ?>
        <?php else : ?>
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item kt-menu__item--active" aria-haspopup="true">
                <a href="?page=index" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span class="kt-menu__link-text">Dashboard</span></a>
            </li>
            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">
                    Custom
                </h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-telegram-logo"></i><span class="kt-menu__link-text">Applications</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu ">
                    <span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item kt-menu__item--parent" aria-haspopup="true">
                            <span class="kt-menu__link"><span class="kt-menu__link-text">Applications</span></span>
                        </li>

                        <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i>
                                <span class="kt-menu__link-text">Contacts</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="kt-menu__submenu ">
                                <span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item " aria-haspopup="true">
                                        <a href="?page=custom/apps/contacts/list-columns" class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                            <span class="kt-menu__link-text">List - Columns</span>
                                        </a>
                                    </li>
                                    <li class="kt-menu__item " aria-haspopup="true">
                                        <a href="?page=custom/apps/contacts/list-datatable" class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                            <span class="kt-menu__link-text">List - Datatable</span>
                                        </a>
                                    </li>
                                    <li class="kt-menu__item " aria-haspopup="true">
                                        <a href="?page=custom/apps/contacts/view-contact" class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                            <span class="kt-menu__link-text">View Contact</span>
                                        </a>
                                    </li>
                                    <li class="kt-menu__item " aria-haspopup="true">
                                        <a href="?page=custom/apps/contacts/add-contact" class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                            <span class="kt-menu__link-text">Add Contact</span>
                                        </a>
                                    </li>
                                    <li class="kt-menu__item " aria-haspopup="true">
                                        <a href="?page=custom/apps/contacts/edit-contact" class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                            <span class="kt-menu__link-text">Edit Contact</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">
                    Layout
                </h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-browser-2"></i><span class="kt-menu__link-text">Subheaders</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu ">
                    <span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item kt-menu__item--parent" aria-haspopup="true">
                            <span class="kt-menu__link"><span class="kt-menu__link-text">Subheaders</span></span>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="?page=layout/subheader/toolbar" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">Toolbar Nav</span>
                            </a>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="?page=layout/subheader/actions" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">Actions Buttons</span>
                            </a>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="?page=layout/subheader/tabbed" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">Tabbed Nav</span>
                            </a>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="?page=layout/subheader/classic" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">Classic</span>
                            </a>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true">
                            <a href="?page=layout/subheader/none" class="kt-menu__link ">
                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                <span class="kt-menu__link-text">None</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="kt-menu__item " aria-haspopup="true">
                <a target="_blank" href="https://keenthemes.com/metronic/preview/demo1/builder.html" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-expand"></i><span class="kt-menu__link-text">Builder</span></a>
            </li>

        </ul>
        <?php endif ?>

    </div>
</div>
<!-- end:: Aside Menu -->