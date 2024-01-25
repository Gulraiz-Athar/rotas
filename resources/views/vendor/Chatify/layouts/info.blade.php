{{-- user info and avatar --}}
{{-- @if(!empty(\Auth::user()->avatar))
    <div class="avatar av-l" style="background-image: url('{{ asset('/storage/'.config('chatify.user_avatar.folder').'/'.Auth::user()->avatar) }}');">
    </div>
@else
    <div class="avatar av-l"
         style="background-image: url('{{ asset('/storage/'.config('chatify.user_avatar.folder').'/avatar.png') }}');">
    </div>
@endif --}}

@php
$users = App\Models\ChMessage::join('users',  function ($join) {
            $join->on('ch_messages.from_id', '=', 'users.id')
                ->orOn('ch_messages.to_id', '=', 'users.id');
        })
        ->where(function ($q) {
            $q->where('ch_messages.from_id', Auth::user()->id)
              ->orWhere('ch_messages.to_id', Auth::user()->id);
        })
        ->orderBy('ch_messages.created_at', 'desc')
        ->get()
        ->unique('id');
$user = \Auth::user();
@endphp

@if (!empty($user->getUserInfo->profile_pic))
    <img class="wid-100 hei-250 avatar rounded-circle avatar-sm info-avatar" title=""
        alt="Image placeholder"
        @if (!empty($user->getUserInfo->profile_pic)) src="{{ asset(Storage::url('')) . '/' . $user->getUserInfo->profile_pic }}"
        @else  src="{{ asset(Storage::url('uploads/profile_pic')) . '/' . 'avatar.png' }}" @endif>
@else
    <img class="wid-36 hei-35 avatar rounded-circle avatar-sm info-avatar"
    title="" alt="Image placeholder"
    @if (!empty($user->getUserInfo->profile_pic))
    src="{{ asset(Storage::url('')) . '/' . $user->getUserInfo->profile_pic }}"
    @else
    src="{{ asset(Storage::url('uploads/profile_pic')) . '/' . 'avatar.png' }}"
    @endif
    >

@endif

<p class="info-name">{{ config('chatify.name') }}</p>

<div class="messenger-infoView-btns">
    {{-- <a href="#" class="default"><i class="fas fa-camera"></i> default</a> --}}
    <a href="#" class="danger delete-conversation"><i class="fas fa-trash-alt"></i> Delete Conversation</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title">shared photos</p>
    <div class="shared-photos-list"></div>
</div>
