@extends('admin.layouts.app')

@section('page.title', 'قائمة الرسائل')

@section('content')

    <div class="card main-card">
        <div class="card-header">
            <div>
                <span class="icon is-small">
                  <i class="fa fa-envelope"></i>
                </span>
                <span>رسائل العيادة</span>
            </div>
        </div>
        <div class="card-content">
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>اسم المرسل</th>
                        <th> البريد الإلكتروني</th>
                        <th> قسم العيادة </th>
                        <th>الحالة</th>
                        <th>الاجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($medical_reservations as $medical_reservation)
                        <tr>
                            <td>{{ $medical_reservation->user->name }}</td>
                            <td><a href="mailto:{{ $medical_reservation->user->email }}">{{ $medical_reservation->user->email }}</a></td>
                            <td>{{ $medical_reservation->medicalDepartment->name }}</td>
                            <td>
                                @if (is_null($medical_reservation->reservation_date))
                                في انتظار موعد
                                @else
                                تم الحجز
                            @endif
                            </td>
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-info" href="{{ route('admin.medical_reservations.show', $medical_reservation->id) }}"> عرض </a>
                                    {{-- <a class="button is-info" href="{{ route('admin.medical_reservations.reserved', $medical_reservation->id) }}"> تحديد موعد </a> --}}
                                    <span class="modal-open button is-danger" traget-modal=".delete-modal" data_id="{{ $medical_reservation->id }}"  data-url="{{ route('admin.medical_reservations.destroy', $medical_reservation->id)}}">حذف</span>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="card-footer with-pagination">
            {{ $medical_reservations->links('vendor.pagination.bulma') }}
        </footer>
    </div>
    @include('admin.partials.deleteModal')
@endsection


