<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                       aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">داشبورد</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="/admin/home" class="sidebar-link">
                                <i class="mdi mdi-adjust"></i>
                                <span class="hide-menu"> صفحه اصلی </span>
                            </a>
                        </li>
                    </ul>
                </li>
                @can('admin_index')
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                           aria-expanded="false">
                            <i class="mdi mdi-account"></i>
                            <span class="hide-menu">مدیریت کارمندان</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            @can('admin_index')
                                <li class="">
                                    <a href="/admin/admins" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu"> مشاهده کارمندان</span>
                                    </a>
                                </li>
                            @endcan
                            @can('admin_create')
                                <li class="sidebar-item">
                                    <a href="/admin/admins/create" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu"> افزودن کارمند</span>
                                    </a>
                                </li>
                            @endcan
                            @can('role_index')
                                <li class="sidebar-item">
                                    <a href="/admin/role" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu">نقش ها</span>
                                    </a>
                                </li>
                            @endcan
                            @can('role_create')
                                <li class="sidebar-item">
                                    <a href="/admin/role/create" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu"> افزودن نقش</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_index')
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                           aria-expanded="false">
                            <i class="mdi mdi-account"></i>
                            <span class="hide-menu">مدیریت کاربران</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            @can('user_index')
                                <li class="">
                                    <a href="/admin/user" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu"> مشاهده کاربران</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('news_index')
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                           aria-expanded="false">
                            <i class="mdi mdi-account"></i>
                            <span class="hide-menu">مدیریت خبر ها </span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            @can('category_index')
                                <li class="">
                                    <a href="/admin/category" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu">مشاهده دسته بندی </span>
                                    </a>
                                </li>
                            @endcan
                            @can('category_create')
                                <li class="">
                                    <a href="/admin/category/create" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu">افزودن دسته بندی </span>
                                    </a>
                                </li>
                            @endcan
                            @can('news_index')
                                <li class="">
                                    <a href="/admin/news" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu">مشاهده خبر ها</span>
                                    </a>
                                </li>
                            @endcan
                            @can('news_create')
                                <li class="">
                                    <a href="/admin/news/create" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu">افزودن خبر</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('log_index')
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                           aria-expanded="false">
                            <i class="mdi mdi-account"></i>
                            <span class="hide-menu">لاگ کارمندان</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="">
                                <a href="/admin/log" class="sidebar-link">
                                    <i class="mdi mdi-account"></i>
                                    <span class="hide-menu"> مشاهده </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('call_center_index')
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                           aria-expanded="false">
                            <i class="mdi mdi-account"></i>
                            <span class="hide-menu">ارتباط با مشتری</span>
                            <?php
                            $contactCount = \App\Models\ContactUs::where('seen',false)->count();
                            $commentCount = \App\Models\Comment::where('status','pending')->count();
                            ?>
                            @if($contactCount + $commentCount)
                                <span class="badge badge-pill badge-info mr-3">{{ $contactCount + $commentCount }}</span>
                            @endif
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="">
                                <a href="/admin/contact-us" class="sidebar-link">
                                    <i class="mdi mdi-account"></i>
                                    <span class="hide-menu">مشاهده تماس با ما  </span>
                                    @if($contactCount )
                                        <span class="badge badge-pill badge-info mr-3">{{ $contactCount  }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="">
                                <a href="/admin/comment" class="sidebar-link">
                                    <i class="mdi mdi-account"></i>
                                    <span class="hide-menu">شاهده کامنت ها</span>
                                    @if( $commentCount)
                                        <span class="badge badge-pill badge-info mr-3">{{  $commentCount }}</span>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('page_index')
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                           aria-expanded="false">
                            <i class="mdi mdi-account"></i>
                            <span class="hide-menu">مدیریت صفحه ها</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            @can('page_index')
                                <li class="">
                                    <a href="/admin/page" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu">مشاهده صفحه ها</span>
                                    </a>
                                </li>
                            @endcan
                            @can('page_create')
                                <li class="">
                                    <a href="/admin/page/create" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu">افزودن صفحه</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('gallery_index')
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                           aria-expanded="false">
                            <i class="mdi mdi-account"></i>
                            <span class="hide-menu">مدیریت گالری ها</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            @can('gallery_index')
                                <li class="">
                                    <a href="/admin/gallery" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu">مشاهده گالری ها</span>
                                    </a>
                                </li>
                            @endcan
                            @can('gallery_create')
                                <li class="">
                                    <a href="/admin/gallery/create" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu">افزودن صفحه</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('config_index')
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                           aria-expanded="false">
                            <i class="mdi mdi-account"></i>
                            <span class="hide-menu">مدیریت تنظیمات</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            @can('config_index')
                                <li class="">
                                    <a href="/admin/config/1/edit" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu">مشاهده تنظیمات</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('slider_index')
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                           aria-expanded="false">
                            <i class="mdi mdi-account"></i>
                            <span class="hide-menu">مدیریت اسلایدر ها</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            @can('slider_index')
                                <li class="">
                                    <a href="/admin/slider" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu">مشاهده اسلایدر ها</span>
                                    </a>
                                </li>
                            @endcan
                            @can('slider_create')
                                <li class="">
                                    <a href="/admin/slider/create" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu">افزودن اسلایدر</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('menu_index')
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                           aria-expanded="false">
                            <i class="mdi mdi-account"></i>
                            <span class="hide-menu">مدیریت منوها </span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            @can('menu_index')
                                <li class="">
                                    <a href="/admin/menu" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu">مشاهده منوها</span>
                                    </a>
                                </li>
                            @endcan
                            @can('menu_create')
                                <li class="">
                                    <a href="/admin/menu/create" class="sidebar-link">
                                        <i class="mdi mdi-account"></i>
                                        <span class="hide-menu">افزودن منو</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan


            </ul>
        </nav>
    </div>
</aside>
