<div class="modal contact-modal" style="display:block">
    <div class="modal-background"></div>
    <div class="modal-card" style="overflow-y: initial">
      <header class="modal-card-head">
        <p class="modal-card-title"><span class="status-name"></span></p>
        <button class="delete close-modal" aria-label="close"></button>
      </header>
      <form class="delete-form" method="PATCH"  accept-charset="UTF-8">
          <input name="_method" type="hidden" value="PATCH">
          <input name="_token" type="hidden" value="{{ csrf_token() }}">
          <section class="modal-card-body" style=" max-height: calc(100vh - 200px); overflow-y: auto;">
            <div class="form-group">
                <label  class="col-form-label">إرسال إلى</label>
                <br>
                <input type="text" class="form-control" placeholder="{{$medical_reservation->email}}" readonly>
            </div>
            <div class="form-group">
            <label  class="col-form-label">ملاحظات</label>
            <p class="delete-text"><strong></strong></p>
            <textarea placeholder="ملاحظات" name="notes" rows="3" class="textarea"> </textarea>
            <span class="user-phone"></span>
            </div>            
             <div class="form-group">
                <label  class="col-form-label">تحديد موعد</label>
                <date-time-picker input-name="reservation_date" :only-date="true"></date-time-picker>
             </div>
            </section>
        <footer class="modal-card-foot">
          <button type="submit" class="button is-success">إرسال</button>
          <button class="button close-modal" aria-label="close">الغاء</button>
        </footer>
      </form>
    </div>
  </div>
