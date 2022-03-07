<collapse class="outer " accordion is-fullwidth>
    <a href="{{ route('admin.dashboard') }}" class="card link-item-no-collapse "><i
            class="fas fa-tachometer-alt"></i><span>لوحه التحكم</span></a>
    <collapse-item title="الكتب الالكترونية" icon="fa fa-books">
        <a class="link-item" href="{{ route('admin.e_books.create') }}">اضافة كتاب</a>
        <a class="link-item" href="{{ route('admin.e_books.index') }}">قائمة الكتب</a>
    </collapse-item>
    <a href="{{ route('admin_logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="card link-item-no-collapse">
        <i class="fas fa-sign-out-alt"></i><span>تسجيل الخروج</span></a>
    <form id="logout-form" action="{{ route('admin_logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</collapse>
