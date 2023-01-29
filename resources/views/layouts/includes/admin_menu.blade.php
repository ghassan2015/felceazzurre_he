<ul class="menu-nav">
{{--@can('home')--}}
    <li class="menu-item" aria-haspopup="true">
        <a href="{{route('admin.index')}}" class="menu-link">
            <i class="menu-icon flaticon-home"></i>
            <span class="menu-text">الرئيسية</span>
        </a>
    </li>

    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:;" class="menu-link menu-toggle">
            <i class="menu-icon flaticon-tabs"></i>
            <span class="menu-text">مدير النظام</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link">
                                                    <span class="menu-text">مدير النظام</span>
                                                </span>
                </li>
                @if(auth('admin')->user()->can('admins'))
                <li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{route('admin.admins.index')}}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">مدير النظام</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>

                @endif
                @if(auth('admin')->user()->can('roles'))
                <li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{route('admin.roles.index')}}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                            <span></span>
                        </i>
                        <span class="menu-text">الصلاحيات</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>

                @endif
            </ul>
        </div>
    </li>


   <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <i class="menu-icon flaticon-tabs"></i>
                                        <span class="menu-text">المنتجات</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">

                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link">
                                                    <span class="menu-text">المنتجات</span>
                                                </span>
                                            </li>

                                            @if(auth('admin')->user()->can('categories'))
                                            <li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="{{route('admin.categories.index')}}" class="menu-link">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">التصنيفات</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                            </li>
                                                @endif
                                            @if(auth('admin')->user()->can('products'))

                                            <li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="{{route('admin.products.index')}}" class="menu-link">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">المنتجات</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
    @if(auth('admin')->user()->can('posts'))

        <li class="menu-item" aria-haspopup="true">
            <a href="{{route('admin.posts.index')}}" class="menu-link">
                <i class="menu-icon flaticon-home"></i>
                <span class="menu-text">المنشورات</span>
            </a>
        </li>
    @endif

    <li class="menu-item" aria-haspopup="true">
        <a href="{{route('admin.story.index')}}" class="menu-link">
            <i class="menu-icon flaticon-home"></i>
            <span class="menu-text">القصص</span>
        </a>
    </li>
    @if(auth('admin')->user()->can('agent'))

    <li class="menu-item" aria-haspopup="true">
        <a href="{{route('admin.agent.index')}}" class="menu-link">
            <i class="menu-icon flaticon-home"></i>
            <span class="menu-text">الوكلاء</span>
        </a>
    </li>
@endif
    @if(auth('admin')->user()->can('sliders'))

    <li class="menu-item" aria-haspopup="true">
        <a href="{{route('admin.slider.index')}}" class="menu-link">
            <i class="menu-icon flaticon-home"></i>
            <span class="menu-text">السلايدر</span>
        </a>
    </li>
    @endif
    @if(auth('admin')->user()->can('Video'))

    <li class="menu-item" aria-haspopup="true">
        <a href="{{route('admin.video.edit')}}" class="menu-link">
            <i class="menu-icon flaticon-home"></i>
            <span class="menu-text">الفيديوهات</span>
        </a>
    </li>
    @endif
    @if(auth('admin')->user()->can('content'))

    <li class="menu-item" aria-haspopup="true">
        <a href="{{route('admin.content.edit')}}" class="menu-link">
            <i class="menu-icon flaticon-home"></i>
            <span class="menu-text">المحتويات</span>
        </a>
    </li>
    @endif
    @if(auth('admin')->user()->can('saponello'))


    <li class="menu-item" aria-haspopup="true">
        <a href="{{route('admin.saponello.edit')}}" class="menu-link">
            <i class="menu-icon flaticon-home"></i>
            <span class="menu-text">سابينيلو</span>
        </a>
    </li>
@endif
    @if(auth('admin')->user()->can('Labrosan'))

    <li class="menu-item" aria-haspopup="true">
        <a href="{{route('admin.Labrosan.edit')}}" class="menu-link">
            <i class="menu-icon flaticon-home"></i>
            <span class="menu-text">لابروسان</span>
        </a>
    </li>
@endif
    @if(auth('admin')->user()->can('settings'))

    <li class="menu-item" aria-haspopup="true">
        <a href="{{route('admin.settings.index')}}" class="menu-link">
            <i class="menu-icon flaticon-home"></i>
            <span class="menu-text">الاعدادات</span>
        </a>
    </li>
@endif
</ul>
