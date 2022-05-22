@extends('admin.layouts.app')

@section('page.title', 'قائمة مقدمي محو الأمية')

@section('content')

    <div class="card main-card">
        <div class="card-header">
            <div>
                <span class="icon is-small">
                  <i class="fa fa-envelope"></i>
                </span>
                <span>مقدمي محو الأمية</span>
            </div>
        </div>
        <div class="card-content">
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>اسم الطالب</th>
                        <th>الكلية</th>
                        <th>عدد المتدربين</th>
                        <th>الاجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->collage ? $user->collage->name : '- -' }}</td>
                            <td>{{ count($user->literacies) }}</td>
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-info" target="_blank" href="{{ route('admin.literacies.show', $user->id) }}"> عرض </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="card-footer with-pagination">
            {{ $users->links('vendor.pagination.bulma') }}
        </footer>
    </div>
@endsection


