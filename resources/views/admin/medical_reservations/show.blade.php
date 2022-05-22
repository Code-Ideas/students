@extends('admin.layouts.app')

@section('page.title', 'مشاهدة الرسالة')

@section('content')
    <div class="card main-card">
        <div class="card-header">
            <a href="{{ route('admin.medical_reservations.index') }}" class="button is-success">
                <span class="icon is-small"><i class="fa fa-stethoscope"></i></span>
                <span>قائمة طلبات الحجز</span>
            </a>
        </div>
        <div class="card-content">
            <div class="columns is-vcentered">
                <div @if($medical_reservation->reservation_date) class="column is-12" @else  class="column is-8" @endif>
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
                        @if ($medical_reservation->message)
                        <div class="info">
                            <label class="label">ملاحظات المرسل </label>
                            <span class="value">{{ $medical_reservation->message }}</span>
                        </div>
                        @endif
                        @if ($medical_reservation->reservation_date)
                            <div class="info">
                                <label class="label">تاريخ الحجز </label>
                                <span class="value">{{ $medical_reservation->reservation_date }}</span>
                            </div>
                        @endif
                        @if ($medical_reservation->notes)
                            <div class="info">
                                <label class="label">ملاحظات الحجز </label>
                                <span class="value">{{ $medical_reservation->notes }}</span>
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
                @if (!$medical_reservation->reservation_date)
                <div class="column is-4">
                    <div class="info-content">
                        <form class="delete-form" method="POST" action="{{ route('admin.medical_reservations.update', $medical_reservation->id) }}" accept-charset="UTF-8">
                            <input name="_method" type="hidden" value="PATCH">
                            @csrf
                            <section class="modal-card-body">
                                <div class="form-group">
                                    <label  class="col-form-label">ملاحظات</label>
                                    <p class="delete-text"><strong></strong></p>
                                    <textarea placeholder="ملاحظات" name="notes" rows="3" class="textarea"></textarea>
                                    <span class="user-phone"></span>
                                </div>
                                <div class="form-group">
                                    <label  class="col-form-label">تحديد موعد</label>
                                    {!! Form::date('reservation_date', null ,  ['class' => 'input', 'id'=>'datetimepicker']) !!}
                                </div>
                            </section>
                            <div class="card-footer">
                                <button type="submit" class="button is-success">إرسال</button>
                                <button class="button close-modal" aria-label="close">الغاء</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
