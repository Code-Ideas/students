<!-- Start Card Content -->
<div class="card-content">
  <div class="field is-horizontal">
      <div class="field-label is-normal">
          <label class="label required">اسم الكتاب </label>
      </div>
      <div class="field-body">
          <div class="field">
              <div class="control">
                  {!! Form::text('title', null, ['class' => 'input', 'required']) !!}
              </div>
          </div>
      </div>
  </div>
  <hr /><div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">القسم الخاص بالكتاب</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <single-select :inputs="{{ $departments }}" forname="department_id"
                                   @if(isset($eBook) && $eBook->department) :oldvalues="{{ $eBook->department()->get(['id', 'name']) }}" @endif>
                    </single-select>
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">الفرقة الدراسية</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <single-select :inputs="{{ $years }}" forname="year_id"
                                   @if(isset($eBook) && $eBook->year) :oldvalues="{{ $eBook->year()->get(['id', 'name']) }}" @endif>
                    </single-select>
                </div>
            </div>
        </div>
    </div>
  <hr />
  <div class="field is-horizontal">
      <div class="field-label is-normal">
          <label class="label required"> الكتاب</label>
      </div>
      <div class="field-body">
          <div class="field">
              <div class="control">
                  <uploader accept="pdf" label="رفع الملف" name="book" @if (isset($eBook))
                      file="{{ $eBook->book_path }}" @endif></uploader>
              </div>
          </div>
      </div>
  </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label"> شروط النشر</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::textarea('description_ar', \App\Models\Setting::first()->publication_policy, ['class' => 'textarea', 'rows' => 4  , 'disabled'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">الموافقة علي شروط النشر</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::checkbox('accepted', true, null) !!}
                </div>
            </div>
        </div>
    </div>
</div><!-- End Card Content -->
<!-- Start Card Footer -->
<div class="card-footer">
  <div class="buttons has-addons">
      <a class="button is-info" href="{{ route('admin.e_books.index') }}"> الغاء </a>
      <button type="submit" class="button is-success">حفظ</button>
  </div>
</div><!-- End Card Footer -->
