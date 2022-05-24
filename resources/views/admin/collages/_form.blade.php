<!-- Start Card Content -->
<div class="card-content">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">اختيار الفرق الدراسية</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <select-all :inputs="{{ $years }}" forname="years[]"
                                @if(isset($collage) && $collage->years) :oldvalues="{{ $collage->years() }}" @endif>
                    </select-all>
                </div>
            </div>
        </div>
    </div>
    <hr />
      <div class="field is-horizontal">
          <div class="field-label is-normal">
              <label class="label required">اسم الكلية </label>
          </div>
          <div class="field-body">
              <div class="field">
                  <div class="control">
                      {!! Form::text('name', null, ['class' => 'input' , 'required'] )!!}
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
                    {!! Form::number('priority', isset($collage) ? $collage->priority : \App\Models\Collage::count()+1 , ['class' => 'input', 'min' => 1] )!!}
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
                        <input type="radio" name="active" value="1" @if(isset($collage) && $collage->active) checked @else checked @endif>
                        مفعلة
                    </label>
                    <label class="radio">
                        <input type="radio" name="active" value="0" @if(isset($collage) && !$collage->active) checked  @endif>
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
    <a class="button is-info" href="{{ route('admin.collages.index') }}"> الغاء </a>
    <button type="submit" class="button is-success">حفظ</button>
  </div>
</div><!-- End Card Footer -->
