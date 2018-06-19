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

    <button type="button" class="btn btn-info" id="editSchedule">
        Change
    </button>

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
        var editScheduleModal = $('#editScheduleModal');
        var editScheduleForm = $('#editScheduleForm');
        var cheduleFields = ('day')


        $(document).on('click', '#editSchedule', function(){

            editScheduleModal.modal('show')

            var showProfileUrl = '/tests/' + profile

            $.ajax({
                url: showProfileUrl,
                type: 'GET',
                success : function(response)
                {
                    $('#updatedSchedule').html(response.html)
                }
            });
        })

        // $(document).on('click', '#editDay', function()
        // {
        //     editDayModal.modal('show')

        //     var showProfileUrl = '/tests/' + profile

        //     $.ajax({
        //         url: showProfileUrl,
        //         type: 'GET',
        //         success : function(response)
        //         {
        //             $('#schedule').html(response.html)
        //         }
        //     });
        // });


        $(document).on('click', '#updateSchedule', function(){

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


    </script>
@endsection