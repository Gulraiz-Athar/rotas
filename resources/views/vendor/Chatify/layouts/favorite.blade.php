<div class="favorite-list-item">
    {{-- @if(!empty($user->avatar))
        <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
             style="background-image: url('{{ asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar) }}');">
        </div>
    @else
        <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
             style="background-image: url('{{ asset('/storage/'.config('chatify.user_avatar.folder').'/avatar.png') }}');">
        </div>
    @endif --}} @if (!empty($user->getUserInfo->profile_pic))
    <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
        style="background-image: url('{{ asset(Storage::url('')) . '/' . $user->getUserInfo->profile_pic }}');">
   </div>
   @else
       <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
           style="background-image: url('{{ asset(Storage::url('uploads/profile_pic')) . '/' . 'avatar.png' }}');">
       </div>
   @endif

    <p
>{{ strlen($user->first_name) > 5 ? substr($user->first_name,0,6).'..' : $user->first_name }}</p>
</div>
