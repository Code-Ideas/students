@extends('admin.layouts.app')

@section('page.title', 'سجل الكتاب')

@section('content')
<div class="card main-card">
    <header class="card-header">
        <a href="{{ route('admin.books.index') }}" class="button is-success">
          <span class="icon is-small">
            <i class="fas fa-book"></i>
          </span>
            <span>قائمة الكتب</span>
        </a>
    </header>
    <div class="card-content">
        <label class="label">معلومات الكتاب</label>
        <div class="columns is-vcentered">
        <div class="column is-12">
            <div class="info-content">
                <div class="info">
                    <label class="label">اسم الكتاب</label>
                    <span class="value">{{ $eBook->title }}</span>
                </div>
                <div class="info">
                    <label class="label">الكلية </label>
                    <span class="value">{{ $eBook->collage ? $eBook->collage->name : '- - ' }}</span>
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
        </div>
        <hr />
        <label class="label"> السجل</label>
        @foreach($eBook->logs as $log)
            <div class="columns is-vcentered">
                <div class="column is-12">
                    <div class="info-content">
                        <div class="info">
                            <label class="label">الحدث</label>
                            <span class="value">{{ $log->title }}</span>
                        </div>
                        <div class="info">
                            <label class="label">المسئول</label>
                            <span class="value">{{ $log->createdBy ? $log->createdBy->name : '- - ' }}</span>
                        </div>
                        <div class="info">
                            <label class="label">وقت الحدث</label>
                            <span class="value">{{ $log->created_at->toDayDateTimeString() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection



