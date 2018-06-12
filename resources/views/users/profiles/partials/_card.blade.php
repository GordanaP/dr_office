<div class="card mb-4 box-shadow  bg-lightest-grey" id="adminSettings">

    @php
        $parse = new Parsedown;
    @endphp

    <div class="card-body">
        <p class="card-text mb-3">
            <span class="text-uppercase">Education:</span>
            <a href="#" id="editEducation" data-user="{{ $user->id }}">
                {{ $user->profile->education ? 'Change' : "Add" }}
            </a>
        </p>
        <div id="userEducation">
            @php
                echo $parse->text($user->profile->education);
            @endphp
        </div>
    </div>

</div>
