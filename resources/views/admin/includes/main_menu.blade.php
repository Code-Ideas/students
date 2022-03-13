<collapse class="outer " accordion is-fullwidth>
    <a href="{{ route('landing') }}" target="_blank" class="card link-item-no-collapse "><i
            class="fa fa-home"></i><span>رئيسية الموقع</span></a>
    <a href="{{ route('admin.dashboard') }}" class="card link-item-no-collapse "><i
            class="fas fa-tachometer-alt"></i><span>لوحه التحكم</span></a>
    <collapse-item title="الكليات" icon="fa fa-building">
        <a class="link-item" href="{{ route('admin.collages.create') }}">اضافة كلية</a>
        <a class="link-item" href="{{ route('admin.collages.index') }}">قائمة الكليات</a>
    </collapse-item>
    <collapse-item title="أقسام الكليات" icon="fa fa-sitemap">
        <a class="link-item" href="{{ route('admin.departments.create') }}">اضافة قسم</a>
        <a class="link-item" href="{{ route('admin.departments.index') }}">قائمة الأقسام</a>
    </collapse-item>
    <collapse-item title="المشرفين" icon="fa fa-user-tie">
        <a class="link-item" href="{{ route('admin.admin_departments.index') }}">أقسام المشرفين</a>
        <a class="link-item" href="{{ route('admin.admins.create') }}">اضافة مشرف</a>
        <a class="link-item" href="{{ route('admin.admins.index') }}">قائمة المشرفين</a>
    </collapse-item>
    <collapse-item title="الخدمات" icon="fa fa-handshake">
        <a class="link-item" href="{{ route('admin.services.create') }}">اضافة خدمة</a>
        <a class="link-item" href="{{ route('admin.services.index') }}">قائمة الخدمات</a>
    </collapse-item>
    <collapse-item title="الاخبار" icon="fa fa-newspaper">
        <a class="link-item" href="{{ route('admin.posts.create') }}">اضافة خبر</a>
        <a class="link-item" href="{{ route('admin.posts.index') }}">قائمة الاخبار</a>
    </collapse-item>
    <collapse-item title="العيادة الطبية" icon="fa fa-stethoscope">
        <a class="link-item" href="{{ route('admin.medical_departments.index') }}">قائمة الأقسام</a>
        <a class="link-item" href="{{ route('admin.medical_reservations.index') }}">الرسائل</a>
    </collapse-item>
    <a href="{{ route('admin.contacts.index') }}" class="card link-item-no-collapse"><i class="fa fa-envelope"></i><span>رسائل التواصل</span></a>
    <a href="{{ route('admin.settings.edit') }}" class="card link-item-no-collapse"><i class="fa fa-cogs"></i><span>الاعدادات</span></a>
    <a href="{{ route('admin_logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="card link-item-no-collapse">
                <i class="fas fa-sign-out-alt"></i><span>تسجيل الخروج</span></a>
    <form id="logout-form" action="{{ route('admin_logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</collapse>
