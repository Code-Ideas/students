@extends('admin.layouts.app')

@section('page.title', 'مشاهدة الرسالة')

@section('content')
 <div class="card main-card">
    <div class="card-header">
        <a href="{{ route('admin.medical_reservations.index') }}" class="button is-success">
        <span class="icon is-small"><i class="fa fa-envelope"></i></span>
            <span>قائمة الرسائل</span>
        </a>
    </div>
    <div class="card-content">
        <collapse class="outer" accordion is-fullwidth>
            <collapse-item title="محتوي الرسالة" icon="fa fa-envelope-open"  selected>
                <div class="columns is-vcentered">
                    <div class="column is-12">
                        <div class="info-content">
                            <div class="info">
                                <label class="label">اسم المرسل</label>
                                <span class="value">{{ $medical_reservation->user->name }}</span>
                            </div>
                            <div class="info">
                                <label class="label">رقم الهاتف </label>
                                <span class="value"><a href="tel:{{ $medical_reservation->phone }}">{{ $medical_reservation->phone }}</a></span>
                            </div>
                            <div class="info">
                                <label class="label">البريد الإلكتروني </label>
                                <span class="value"><a href="mailto:{{ $medical_reservation->user->email }}">{{ $medical_reservation->user->email }}</a></span>
                            </div>
                            <div class="info">
                                <label class="label">قسم العيادة</label>
                                <span class="value">{{ $medical_reservation->medicalDepartment->name }}</span>
                            </div>
                            <div class="info">
                                <label class="label">محتوي الرسالة </label>
                                <span class="value">{{ $medical_reservation->message }}</span>
                            </div>
                            @if (!is_null($medical_reservation->reservation_date))
                            <div class="info">
                                <label class="label">تاريخ الحجز </label>
                                <span class="value">{{ $medical_reservation->reservation_date }}</span>
                            </div>
                            @endif
                            <div class="info left-buttons">
                                <ul>
                                    <li class=" tooltip is-tooltip-right" data-tooltip="تاريخ الرسالة">
                                        <div class="available">
                                            {{ $medical_reservation->created_at->toDayDateTimeString() }}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </collapse-item>
        </collapse>
    </div>
    <div class="card-footer">
         <div class="buttons has-addons">
            @if (is_null($medical_reservation->reservation_date))
            {{-- <a class="button is-info" href="{{ route('admin.medical_reservations.reserve',$medical_reservation->id) }}">حجز موعد</a> --}}
            <span class="modal-open button is-danger" traget-modal=".contact-modal" status-name="تأكيد الحجز" data_id="{{ $medical_reservation->id }}" data-url="{{ route('admin.medical_reservations.reserve',$medical_reservation->id) }}">حجز موعد</span>

            @endif
        </div>
    </div>
</div>
@include('admin.partials.contactModal')

@endsection



