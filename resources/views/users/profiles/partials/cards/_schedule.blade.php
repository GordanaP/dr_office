<div class="card">

    <!-- Avatar -->
    <div id="userProfileAvatar" class="text-center mb-3">
        <img class="card-img-top image image-responsive" src="{{ asset($profile->getAvatar()) }}" alt="" style="max-height: 280px" />
    </div>
    <a href="#" id="changeAvatar" class="text-center" data-name="{{ $profile->user->name }}" data-profile="{{ $profile->slug }}">
        Change
    </a>

    <!-- Working days -->
    <div class="card-body mt-3">
        <h5 class="card-title align-center justify-between flex mb-0">
            <span>Working days</span>
            <button type="button" class="btn btn-info rounded-none btn-schedule" id="{{ $profile->hasSchedule() ? 'editSchedule' : 'createSchedule'}}">
                {{ $profile->hasSchedule() ? 'Change' : 'Add'}}
            </button>
        </h5>
    </div>
    <ul class="list-group list-group-flush" id="displaySchedule">
        @foreach ($profile->workingDays as $day)
            <li class="list-group-item">
                {{ $day->name }}
                <span class="pull-right">{{ $day->work->start_at }}-{{ $day->work->end_at }}</span>
            </li>
        @endforeach
    </ul>

</div>