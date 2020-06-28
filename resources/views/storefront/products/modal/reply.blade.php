
<div id="reply-dialog{{$ask->id}}" class="reply-dialog zoom-anim-dialog mfp-hide" style="max-height: 400px;">
    <div class="modal_header">
        <h3>Balas Comment</h3>
    </div>
    <form method="POST" action="{{ route('productAskReply') }}">
        @csrf
        <div class="sign-in-wrapper">
            <div class="form-group">
                <input type="hidden" name="ask_id" value="{{$ask->id}}">
                <label>Balas Comment</label>
                <div class="form-group">
                    <textarea class="form-control" name="reply_comment" rows="6" placeholder="Balas Pertanyaan Anda disini.."></textarea>
                </div>
            </div>
            <div class="text-center">
                <input type="submit" value="Update Status" class="btn_1 full-width">
            </div>
        </div>
    </form>
    <!--form -->
</div>