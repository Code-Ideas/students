<!-- Start Card Content -->
<div class="card-content">
  <div class="field is-horizontal">
      <div class="field-label is-normal">
          <label class="label required">عنوان الخبر </label>
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
          <label class="label required"> محتوي الخبر </label>
      </div>
      <div class="field-body">
          <div class="field">
              <div class="control">
                  <ck-editor id="body" name="body" @if (isset($post))
                      old-data="{{ $post->body }}" @endif></ck-editor>
              </div>
          </div>
      </div>
  </div>
  <hr />
  <collage-select old-type="{{ isset($post) ? $post->type : 'general' }}"
                  @if((isset($post) && $post->collage)) :old-collage="{{ $post->collage()->get(['id', 'name']) }}" @endif>
  </collage-select>
  <hr />
  <div class="field is-horizontal">
      <div class="field-label is-normal">
          <label class="label required">صورة الخبر</label>
      </div>
      <div class="field-body">
          <div class="field">
              <div class="control">
                  <uploader label="صورة الخبر" name="image" @if (isset($post))
                      file="{{ $post->image }}" @endif></uploader>
              </div>
          </div>
      </div>
  </div>
</div><!-- End Card Content -->
<!-- Start Card Footer -->
<div class="card-footer">
  <div class="buttons has-addons">
      <a class="button is-info" href="{{ route('admin.posts.index') }}"> الغاء </a>
      <button type="submit" class="button is-success">حفظ</button>
  </div>
</div><!-- End Card Footer -->
