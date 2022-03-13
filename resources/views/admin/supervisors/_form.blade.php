<div class="card-content">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">اسم المشرف</label>
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
            <label class="label required">البريد الالكتروني</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('email', null, ['class' => 'input' , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">كلمة المرور</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control has-icon has-icon-right ">
                    @if(isset($supervisor))
                        <input class="input" value="{{ isset($supervisor) ? $supervisor->password : null }}" type="password" name="password">
                    @else
                        {!! Form::text('password', null, ['class' => 'input' , 'required'] )!!}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">اختيار القسم </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <div class="is-fullwidth">
                        <single-select :inputs="{{ $departments }}" forname="admin_department_id"
                                       @if(isset($supervisor) && $supervisor->department) :oldvalues="{{ $supervisor->department()->get(['id', 'name']) }}" @endif>
                        </single-select>
                    </div>
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
                        <input type="radio" name="active" value="1" @if(isset($supervisor) && $supervisor->active) checked @else checked @endif>
                        مفعل
                    </label>
                    <label class="radio">
                        <input type="radio" name="active" value="0" @if(isset($supervisor) && !$supervisor->active) checked  @endif>
                        غير مفعل
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="card-footer">
    <div class="buttons has-addons">
        <a class="button is-info" href="{{ route('admin.supervisors.index') }}"> الغاء </a>
        <button type="submit" class="button is-success">حفظ</button>
    </div>
</footer>
