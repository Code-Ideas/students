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
                                   @if(isset($department) && $department->collage) :oldvalues="{{ $department->collage()->get(['id', 'name']) }}" @endif>
                    </single-select>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">اسم القسم </label>
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
            <label class="label">كود القسم </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('code', null, ['class' => 'input'] )!!}
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
                        <input type="radio" name="active" value="1" @if(isset($department) && $department->active) checked @else checked @endif>
                        مفعل
                    </label>
                    <label class="radio">
                        <input type="radio" name="active" value="0" @if(isset($department) && !$department->active) checked  @endif>
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
    <a class="button is-info" href="{{ route('admin.departments.index') }}"> الغاء </a>
    <button type="submit" class="button is-success">حفظ</button>
  </div>
</div><!-- End Card Footer -->
