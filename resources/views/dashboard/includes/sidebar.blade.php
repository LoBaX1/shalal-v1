<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item">
                <a href="{{route('admin.dashboard')}}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">القائمة الرئيسية</span>
                </a>

            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="la la-support"></i>
                    <span class="menu-title" data-i18n="nav.support_raise_support.main">العملاء</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('client.All')}}" data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('client.new')}}" data-i18n="nav.dash.crypto">
                            إضافة عميل جديد
                        </a>
                    </li>

                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="la la-support"></i>
                    <span class="menu-title" data-i18n="nav.support_raise_support.main">الطلبات</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('order.All')}}" data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('order.new')}}" data-i18n="nav.dash.crypto">
                            إضافة طلب جديد
                        </a>
                    </li>

                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="la la-support"></i>
                    <span class="menu-title" data-i18n="nav.support_raise_support.main">تسليم الطلبات</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('deliver.All')}}" data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('deliver.show')}}" data-i18n="nav.dash.crypto">
                           عرض الطلبات الجاري العمل بها
                        </a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="la la-support"></i>
                    <span class="menu-title" data-i18n="nav.support_raise_support.main">الفواتير</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('payment.index')}}" data-i18n="nav.dash.ecommerce">
                            عرض الفواتير

                        </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('payment.all')}}" data-i18n="nav.dash.crypto">
                           عرض الطلبات المنتهية
                        </a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="la la-support"></i>
                    <span class="menu-title" data-i18n="nav.support_raise_support.main">المندوبين</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('agent.All')}}" data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('agent.new')}}" data-i18n="nav.dash.crypto">
                            إضافة مندوب جديد
                        </a>
                    </li>

                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="la la-support"></i>
                    <span class="menu-title" data-i18n="nav.support_raise_support.main">العناوين</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('address.All')}}" data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('address.newState')}}" data-i18n="nav.dash.crypto">
                            إضافة محافظة جديدة
                        </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('address.newCity')}}" data-i18n="nav.dash.crypto">
                            إضافة مدينة جديدة
                        </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('address.newDistrict')}}" data-i18n="nav.dash.crypto">
                            إضافة شارع / قرية جديدة
                        </a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="la la-support"></i>
                    <span class="menu-title" data-i18n="nav.support_raise_support.main">المستخدمون</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{route('admin.showAdmins')}}" data-i18n="nav.dash.ecommerce">عرض الكل</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.createNewAdmin')}}" data-i18n="nav.dash.crypto">
                            إضافة مستخدم جديد
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
