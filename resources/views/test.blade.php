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

        var profile = "{{ $profile->slug }}",
            editScheduleModal = $('#editScheduleModal'),
            editScheduleForm = $('#editScheduleForm'),
            scheduleFields = ['working_day_id', 'start_at', 'end_at'],
            scheduleFieldsName = 'day',
            workingDays = @json($days),
            days = getDays(workingDays),
            arraySize = 6,
            i = 0

        editScheduleModal.on("hidden.bs.modal", function() {
            clearForm($(this))
            clearServerErrorsForArrayFields(scheduleFieldsName, scheduleFields, arraySize)
            $('.field').remove()
        })



        $(document).on('click', '#editSchedule', function(){

            editScheduleModal.modal('show')

            var showProfileUrl = '/tests/' + profile

            $.ajax({
                url: showProfileUrl,
                type: 'GET',
                success : function(response)
                {
                    $('#workingDaysUpdated').html(response.html)
                }
            });
        })

        $(document).on('click', '#addDay', function(){
            i++

            var fields = $(".field"),
                totalFields = fields.length,
                maxFields = 5,
                dynamicFields = makeNewArray(fields),
                index = findMissingValue(dynamicFields)

            if (totalFields < maxFields)
            {
                var html = ''

                html += '<div class="form-group flex field" id="'+ index +'">'

                html += '<div><select name="day['+ index +'][working_day_id]" class="form-control day-'+ index +'-working_day_id">'

                html += '<option value="">Day</option><option value="'+ days[0][0] +'">'+ days[0][1] +'</option><option value="'+ days[1][0] +'">'+ days[1][1] +'</option><option value="'+ days[2][0] +'">'+ days[2][1] +'</option><option value="'+ days[3][0] +'">'+ days[3][1] +'</option><option value="'+ days[4][0] +'">'+ days[4][1] +'</option><option value="'+ days[5][0] +'">'+ days[5][1] +'</option>'

                html += '</select><span class="invalid-feedback day-'+ index +'-working_day_id"></span></div>'

                html += '<div><input type="text" name="day['+ index +'][start_at]" class="form-control  day-'+ index +'-start_at" placeholder="00:00" /><span class="invalid-feedback day-'+ index +'-start_at"></span></div>'

                html += '<div><input type="text" name="day['+ index +'][end_at]" class="form-control day-'+ index +'-end_at"  placeholder="00:00" /><span class="invalid-feedback day-'+ index +'-end_at"></span></div>'

                html += '<button type="button" class="btn btn-remove"><i class="fa fa-remove"></i></button>'

                html += '</div>'

                $('#workingDaysUpdated').append(html)
            }
        })

        $(document).on('click', '.btn-remove', function(){

            $(this).parent('div').remove()
        })


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