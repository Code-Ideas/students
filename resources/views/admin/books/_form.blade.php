<!-- Start Card Content -->
<div class="card-content">
    <student-select
        old-collage="{{ isset($book) ? $book->category_id : '' }}" old-year="{{ isset($book) ? $book->sub_category_id : ''}}"
        old-department="{{ isset($book) ? $book->type_id : '' }}" old-student="{{ isset($book) ? $book->sub_type_id : ''}}">
    </student-select>
    <hr />
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
      <a class="button is-info" href="{{ route('admin.books.students') }}"> الغاء </a>
      <button type="submit" class="button is-success">حفظ</button>
  </div>
</div><!-- End Card Footer -->
