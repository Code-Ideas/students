<div class="aside-container desktop">
    @if (auth()
        ->guard('admin')
        ->check())
        <div class="side-header">
            <figure class="image is-48x48 avatar">
                <img src="{{ auth()->guard('admin')->user()->image
                    ?: asset('/admin/img/admin.png') }}">
            </figure>
            <span class="avatar-name">{{ auth()->guard('admin')->user()->name }}</span>
        </div>
    @endif
    @if(auth()->guard('admin')->user()->role == 'super_admin')
        @include('admin.includes.main_menu')
    @elseif(auth()->guard('admin')->user()->role == 'staff')
        @include('admin.includes.staff_menu')
    @endif
</div>
