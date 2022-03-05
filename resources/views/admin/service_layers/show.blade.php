@extends('admin.layouts.app')

@section('page.title', 'اضافه مرفقات '.' : '.$serviceLayer->title)

@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header">
            <a href="{{ route('admin.services.service_layers.index', $service->id) }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-list"></i>
          </span>
                <span>قائمة المحتوي</span>
            </a>
        </div><!-- End Card Header -->
        <!-- Start Form -->
        {!! Form::open(['method' => 'POST','files' => true, 'route' => ['admin.layer_attachments.store', [$serviceLayer->id]]]) !!}
        <div class="card-content">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label required">اختيار المرفقات</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <div class="is-fullwidth">
                                <uploader accept="pdf" label="اختر ملف او اكثر" name="attachments[]" :is-multiple="true"></uploader>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="buttons has-addons">
                    <button type="submit" class="button is-success">حفظ</button>
                </div>
            </div><!-- End Card Footer -->
            {!! Form::close() !!}
            <div class="columns is-multiline m-t-30">
                @foreach($serviceLayer->attachments as $attachment)
                    <div class="column is-3">
                        @if($attachment->file_name)
                            <p class="card-footer-item has-text-weight-bold">{{ $attachment->file_name }}</p>
                        @endif
                        <div class="card">
                            <figure class="is-4by3">
                                <img src="/admin/img/staticImages/pdf.svg" alt="{{ $serviceLayer->title }}">
                            </figure>
                            <footer class="card-footer">
                                <span class="modal-open card-footer-item has-text-danger has-text-weight-bold" traget-modal=".delete-modal" data_id="{{ $attachment->id }}"
                                      data_name="{{ $attachment->file_name }}" data-url="{{ route('admin.layer_attachments.destroy', $attachment->id) }}">حذف</span>
                            </footer>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('admin.partials.deleteModal')
@endsection
