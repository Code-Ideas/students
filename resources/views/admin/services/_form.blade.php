<!-- Start Card Content -->
<div class="card-content">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">الكلية التابع لها</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <single-select :inputs="{{ $collages }}" forname="collage_id"
                                   @if(isset($service) && $service->collage) :oldvalues="{{ $service->collage()->get(['id', 'name']) }}" @endif>
                    </single-select>
                </div>
            </div>
        </div>
    </div>
    <hr />
      <div class="field is-horizontal">
          <div class="field-label is-normal">
              <label class="label required">اسم الخدمة </label>
          </div>
          <div class="field-body">
              <div class="field">
                  <div class="control">
                      {!! Form::text('name', null, ['class' => 'input' , 'required'] )!!}
                  </div>
              </div>
          </div>
      </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">اختيار الخدمة الرئيسية </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <div class="select is-fullwidth">
                        {!! Form::select('parent_id', $services, null) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">محتوي الخدمة</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <div class="select is-fullwidth">
                        {!! Form::select('type', ['page' => 'محتوي', 'link' => 'رابط خارجي'],
                                    null, ['class' => 'input', 'required'] )!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">الرابط الخارجي للخدمة</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('link', null, ['class' => 'input'] )!!}
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">الترتيب</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::number('priority', isset($service) ? $service->priority : \App\Models\Service::count()+1, ['class' => 'input', 'min' => 1] )!!}
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
                        <input type="radio" name="active" value="1" @if(isset($service) && $service->active) checked @else checked @endif>
                        مفعلة
                    </label>
                    <label class="radio">
                        <input type="radio" name="active" value="0" @if(isset($service) && !$service->active) checked  @endif>
                        غير مفعلة
                    </label>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Card Content -->
<!-- Start Card Footer -->
<div class="card-footer">
  <div class="buttons has-addons">
    <a class="button is-info" href="{{ route('admin.services.index') }}"> الغاء </a>
    <button type="submit" class="button is-success">حفظ</button>
  </div>
</div><!-- End Card Footer -->
