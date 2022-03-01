<!-- Start Card Content -->
<div class="card-content">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">اختيار الكلية</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <single-select :inputs="{{ $collages }}" forname="collages[]"
                                   @if(isset($serviceLayer) && $serviceLayer->collages) :oldvalues="{{ $serviceLayer->collages() }}" @endif>
                    </single-select>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">القسم التابع لها</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <single-select :inputs="{{ $departments }}" forname="department_id"
                                   @if(isset($serviceLayer) && $serviceLayer->department) :oldvalues="{{ $serviceLayer->department()->get(['id', 'name']) }}" @endif>
                    </single-select>
                </div>
            </div>
        </div>
    </div>-->
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">العنوان</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('title', null, ['class' => 'input', 'required']) !!}
                </div>
            </div>
        </div>
    </div>
    <hr />
    @if($type == 'content' || $type == 'content_files')
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label required"> المحتوي</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <ck-editor id="content" name="content" @if (isset($serviceLayer))
                        old-data="{{ $serviceLayer->content }}" @endif></ck-editor>
                    </div>
                </div>
            </div>
        </div>
        <hr />
    @endif
    @if($type == 'files' || $type == 'content_files')
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label required">المرفقات</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <uploader accept="pdf" label="اختر ملف او اكثر" name="attachments[]" :is-multiple="true"></uploader>
                    </div>
                </div>
            </div>
        </div>
        <hr />
    @endif
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">الترتيب</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::number('priority', isset($serviceLayer) ? $serviceLayer->priority : 1 , ['class' => 'input', 'min' => 1] )!!}
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">الحالة</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="active" value="1" @if(isset($serviceLayer) && $serviceLayer->active) checked @else checked @endif>
                        مفعل
                    </label>
                    <label class="radio">
                        <input type="radio" name="active" value="0" @if(isset($serviceLayer) && !$serviceLayer->active) checked  @endif>
                        غير مفعل
                    </label>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Card Content -->
<!-- Start Card Footer -->
<div class="card-footer">
    <div class="buttons has-addons">
        <a class="button is-info" href="{{ route('admin.services.service_layers.index', $service->id) }}"> الغاء </a>
        <button type="submit" class="button is-success">حفظ</button>
    </div>
</div><!-- End Card Footer -->
