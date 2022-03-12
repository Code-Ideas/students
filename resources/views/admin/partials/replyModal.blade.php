<div class="modal send-reply-modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title"><span class="status-name"></span></p>
            <button class="delete close-modal" aria-label="close"></button>
        </header>
        <form class="delete-form" method="POST" action="" accept-charset="UTF-8">
            <input name="_method" type="hidden" value="POST">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <section class="modal-card-body">
                <p class="delete-text"><strong></strong></p>
                <textarea placeholder="ملاحظات الارجاع" name="return_reason" rows="5" class="textarea" required oninput="validity.valid||(value='');"> </textarea>
                <span class="user-phone"></span>
            </section>
            <footer class="modal-card-foot">
                <button type="submit" class="button is-success">ارجاع</button>
                <button class="button close-modal" aria-label="close">الغاء</button>
            </footer>
        </form>
    </div>
</div>
