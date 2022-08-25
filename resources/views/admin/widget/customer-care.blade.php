<div class="card">
    <div class="card-body">
        <h5>Kontak Narahubung</h5>
        @foreach ($data as $row)
            <div class="d-flex justify-content-start align-items-center mt-2">
                <div class="avatar mr-75">
                    <img src="{{asset('storage/images/users').'/'.$row->getUser->profile_photo_path}}" alt="avatar" height="40" width="40" />
                </div>
                <div class="profile-user-info">
                    <h6 class="mb-0">{{ $row->getUser->name }}</h6>
                    <small class="text-muted">{{ $row->getUser->phone }}</small>
                </div>
                <a href="https://wa.me/{{ $row->getUser->phone }}" target="_blank" class="btn btn-success btn-icon btn-sm ml-auto">
                    <i data-feather="message-circle"></i>
                </a>
            </div>

            @if ($loop->depth == 8)
                @break
            @endif
        @endforeach
    </div>
</div>