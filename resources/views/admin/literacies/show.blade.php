@extends('admin.layouts.app')

@section('page.title', 'عرض المتدربين')

@section('content')
<div class="card main-card">
    <div class="card-header">
        <a href="{{ route('admin.literacies.index') }}" class="button is-success">
        <span class="icon is-small"><i class="fa fa-school"></i></span>
            <span>قائمة محو الأمية</span>
        </a>
    </div>
    <div class="card-content">
        <label>{{ $user->name .' - '. $user->collage->name }}</label>
        <div class="table-container">
            <table class="table is-fullwidth">
                <thead>
                <tr>
                    <th>اسم المتدرب</th>
                    <th>الرقم القومي</th>
                    <th>العنوان</th>
                    <th>نوع - مكان الفصل</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->literacies as $literacy)
                    <tr>
                        <td>{{ $literacy->name }}</td>
                        <td>{{ $literacy->illiterate_id }}</td>
                        <td>{{ $literacy->address }}</td>
                        <td>{{ $literacy->class }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection



