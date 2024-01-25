<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label><span class="fas fa-paperclip" style=" margin-top: 14px; padding-right: 15px; margin-left: 10px;"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept="image/*, .txt, .rar, .zip"/></label>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="{{__('Type a message..')}}"></textarea>
        <button disabled='disabled'><span class="fas fa-paper-plane" style="margin-top: 2px; margin-right: 17px;"> </span></button>
    </form>
</div>
