<div class="card mb-4 box-shadow bg-lightest-grey" id="adminSettings">

    <div class="card-body">
        <div id="userEducation">

            <p class="card-text mb-8">
                <span class="text-uppercase" id="education"><b>Education:</b></span>
                <a href="#" id="editEducation" data-user="{{ $user->id }}">
                    {{ $user->profile->education ? 'Change' : "Add" }}
                </a>
            </p>

            <p>
                {{ $user->profile->education }}
            </p>

        </div>
    </div>

</div>