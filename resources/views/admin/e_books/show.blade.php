@extends('admin.layouts.app')

@section('page.title', 'مراجعة الكتاب')

@section('content')
    <div class="card main-card">
        <div class="card-header">
            <a href="{{ route('admin.e_books.index') }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-book"></i>
          </span>
                <span>قائمة الكتب</span>
            </a>
        </div>
        <div class="card-content">
            <div class="is-fullwidth">
                <div class="column is-12">
                    <div class="info-content">
                        <div class="info">
                            <label class="label">اسم الكتاب</label>
                            <span class="value">{{ $eBook->title }}</span>
                        </div>
                        <div class="info">
                            <label class="label">القسم</label>
                            <span class="value">{{ $eBook->department ? $eBook->department->name : '- - ' }}</span>
                        </div>
                        <div class="info">
                            <label class="label">الفرقة الدراسية</label>
                            <span class="value">{{ $eBook->year ? $eBook->year->name : '- - ' }}</span>
                        </div>
                    </div>
                </div>

                <div class="column is-12">
                    <div class="info-content">
                    <iframe src="{{ $eBook->book_path }}" width="1400px" height="600px"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="buttons has-addons">
                <a class="button is-info" href="{{ route('admin.e_books.edit', $eBook->id) }}"> تعديل </a>
                <span class="modal-open button is-danger" status-name="تأكيد مراجعة الكتاب"  traget-modal=".status-modal" data_id="{{ $eBook->id }}" data_name="{{ $eBook->title }}" data-url="{{ route('admin.e_books.approved', $eBook->id) }}">تاكيد المراجعة</span>
            </div>
        </div>
    </div>

    @include('admin.partials.statusModal')
@endsection



