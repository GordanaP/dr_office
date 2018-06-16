@extends('layouts.app')

@section('title', '| Test')

@section('content')

{{--     @include('errors._list')

    <form action="{{ route('tests.update', $profile) }}" method="POST">

        @csrf
        @method('PATCH')

        <div id="workingDaysFields">

            <div class="form-group flex field">
                <input type="text" name="day[0][working_day_id]" id="day[0][working_day_id]">
                <input type="text" name="day[0][start_at]" id="day[0][start_at]">
                <input type="text" name="day[0][end_at]" id="day[0][end_at]">
                <button type="button" class="btn btn-sm" name="add" id="add">Add more</button>
            </div>
        </div>
        <button type="submit" class="btn btn-info">Add</button>

    </form>
 --}}
    {{-- -------------------       AJAX       --------------------------------- --}}

    <div id="profileSchedule">
        @foreach ($profile->workingDays as $day)
            <p>{{ $day->name }} {{ $day->work->start_at }}-{{ $day->work->end_at }}</p>
        @endforeach
    </div>

    <button type="button" class="btn btn-info" id="{{ $profile->hasSchedule() ? 'editDay' : 'newDay' }}">
        {{ $profile->hasSchedule() ? 'Change' : 'New' }}
    </button>

    @include('users.working_days.partials.modals._create')
    @include('users.working_days.partials.modals._edit')

@endsection

@section('scripts')
    <script>

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        var profile = "{{ $profile->slug }}";
        var createDayModal = $('#createDayModal');
        var editDayModal = $('#editDayModal');
        var dayFields = ('day')

        createDayModal.emptyModal(dayFields)

        var i = 0;
        var maxFields = 6;

        $(document).on('click', '#newDay', function(){

            createDayModal.modal('show')

        })

        $(document).on('click', '#add', function() {

            i++;

            var totalFields = $(".field").length;

            if (totalFields < maxFields) {
                $('#workingDaysFields, #schedule').append('<div class="form-group flex field"><input type="text" name="day[' + i + '][working_day_id]" id="day[' + i + '][working_day_id]" class="form-control day"><input type="text" name="day[' + i + '][start_at]" id="day[' + i + '][start_at]" class="form-control day"><input type="text" name="day[' + i + '][end_at]"id="day[' + i + '][end_at]" class="form-control day"><button type="button" class="btn btn-sm btn-remove"><i class="fa fa-remove"></i></button></div>')
            }
        })

        $(document).on('click', '.btn-remove', function(){
            $(this).parent('div').remove()
        })

        $(document).on('click', '#changeDay', function(){

            function chunkArray(myArray, chunk_size){
                var index = 0;
                var arrayLength = myArray.length;
                var tempArray = [];

                for (index = 0; index < arrayLength; index += chunk_size) {
                    myChunk = myArray.slice(index, index+chunk_size);
                    // Do something if you want with the group
                    tempArray.push(myChunk);
                }

                return tempArray;
            }

            var dayFields = $( "input[name*=day]" ).map(function() {
                return ($( this ).val());
            }).get()

            var chunked = chunkArray(dayFields, 3);

            var day = [];

            for (var i = 0; i < chunked.length; i++) {

                day[i] = {
                    'working_day_id': chunked[i][0],
                    'start_at': chunked[i][1],
                    'end_at': chunked[i][2],
                }
            }

            var data = {
                day: day
            }

            var updateScheduleUrl = '/tests/' + profile

            $.ajax({
                url: updateScheduleUrl,
                type: "PATCH",
                data: data,
                success: function(response)
                {
                    $('#profileSchedule').load(location.href + ' #profileSchedule')
                    successResponse(createDayModal, response.message)
                }
            })
        })

        $(document).on('click', '#editDay', function()
        {
            editDayModal.modal('show')

            var showProfileUrl = '/tests/' + profile

            $.ajax({
                url: showProfileUrl,
                type: 'GET',
                success : function(response)
                {
                    $('#schedule').html(response.html)
                }
            });
        });

    </script>
@endsection