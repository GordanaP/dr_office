@extends('layouts.master')

@section('title', '| Test')

@section('links')
    <style>
        .is-hidden {display: none}

    </style>
@endsection

@section('content')

<h1>
    {{ $profile->getFullName() }}
</h1>

<h4 class="mb-4"><small>Schedule</small></h4>
    <div id="displaySchedule">
        @forelse ($profile->workingDays as $day)
            <p>{{ $day->name }} {{ $day->work->start_at }}-{{ $day->work->end_at }}</p>
        @empty
            No schedule yet
        @endforelse
    </div>

    <button type="button" class="btn btn-info btn-schedule" id="{{ $profile->hasSchedule() ? 'editSchedule' : 'createSchedule' }}">
        {{ $profile->hasSchedule() ? 'Change' : 'Add' }}
    </button>

    <button type="button" class="btn btn-danger {{ ! $profile->hasSchedule() ? 'is-hidden' : '' }}" id="deleteSchedule">Dellete</button>

    @include('test.modals._create')
    @include('test.modals._edit')

@endsection

@section('scripts')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        var scheduleUrl = "{{ route('tests.update', $profile)  }}",
            createScheduleModal = $('#createScheduleModal'),
            editScheduleModal = $('#editScheduleModal'),
            createScheduleForm = $('#createScheduleForm'),
            editScheduleForm = $('#editScheduleForm'),
            scheduleArrayName = 'day',
            arrayFields = ['working_day_id', 'start_at', 'end_at'],
            arraySize = 6,
            maxDynamicFields = 5,
            workingDays = @json($days),
            days = getDays(workingDays),
            chunkSize = 3,
            i = 0

        createScheduleModal.add(editScheduleModal).on("hidden.bs.modal", function() {
            clearForm($(this))
            clearServerErrorsForArrayFields(scheduleArrayName, arrayFields, arraySize)
            $('.field').remove()
        })

        // Open create schedule modal
        @include('test.js._create')

        // Add dynamic fields in create schedule form
        @include('test.partials._dynFieldsCreate')

        // Add dynamic fields in edit schedule form
        @include('test.partials._dynFieldsEdit')

        // Remove dynamic fields
        @include('test.partials._dynFieldsRemove')

        // Store schedule
        @include('test.js._store')

        // Edit schedule
        $(document).on('click', '#editSchedule', function(){

            editScheduleModal.modal('show')

            $('#0').remove()

            $.ajax({
                url: scheduleUrl,
                type: 'GET',
                success : function(response)
                {
                    const schedule = response.profile.working_days

                    for(let day of schedule)
                    {
                        var index = schedule.indexOf(day) // start counting fields with 0 to get proper dyn field action button
                        var field = index > 0 ? 'field' : '' //
                        var btnRemove = index > 0 ? 'btn-remove' : ''
                        var addEditSchedule = index === 0 ? 'addEditSchedule' : ''
                        var dynamicIcon = index > 0 ? 'fa-remove' : 'fa-plus'
                        var start = day.work.start_at ? day.work.start_at : '00:00'
                        var end = day.work.end_at ? day.work.end_at : '00:00'

                        var html = ''

                        html += '<div class="form-row ' + field + '" id="' + index + '">'

                        html += '<div class="form-group col-md-4 offset-md-1"><select name="day['+ index +'][working_day_id]" class="form-control day-'+ index +'-working_day_id"><option value="">Select a day</option></select><span class="invalid-feedback day-'+ index +'-working_day_id"></span></div>'

                        html += '<div class="form-group col-md-3"><input type="text" name="day['+ index +'][start_at]" class="form-control day-'+ index +'-start_at" placeholder="00:00" value="'+ start +'"><span class="invalid-feedback day-'+ index +'-start_at"></span></div>'

                        html += '<div class="form-group col-md-3"><input type="text" name="day['+ index +'][end_at]" class="form-control day-'+ index +'-end_at" placeholder="00:00" value="'+ end +'"><span class="invalid-feedback day-'+ index +'-end_at"></span></div>'

                        html += '<div class="form-group col-md-1"><button type="button" class="btn btn-dynamic '+ btnRemove +' " id="'+ addEditSchedule +'"><i class="fa '+ dynamicIcon +'" ></i></button></div></div>'


                        $('#editFormGroups').append(html)

                        var sel_opn = $("select[name*=day]")
                        var id = day.id
                        getDynamicOptions(sel_opn, days, id)

                        // $('option', sel_opn).remove();

                        // $.each(days, function(key, value) {

                        //     var option = new Option(value[1], value[0]); // text, value

                        //     value[0] == day.id ? option.selected=true : '';

                        //     sel_opn.append($(option));

                        // });

                        // $('select :nth-child(1)').before("<option value=''>Select a day</option>");

                    }
                }
            });
        })

        $(document).on('click', '#updateSchedule', function(){

            var day = createScheduleArray(scheduleArrayName, chunkSize)

            $.ajax({
                url: scheduleUrl,
                type: "PATCH",
                data: {
                    day: day
                },
                success: function(response)
                {
                    $('#displaySchedule').load(location.href + ' #displaySchedule')

                    successResponse(editScheduleModal, response.message)
                },
                error: function(response)
                {
                    errorResponse(editScheduleModal, jsonErrors(response))
                }
            })
        });

    </script>
@endsection

{{-- <option value="'+ days[0][0] +'" selected="selected">'+ days[0][1] +'</option><option value="'+ days[1][0] +'">'+ days[1][1] +'</option><option value="'+ days[2][0] +'">'+ days[2][1] +'</option><option value="'+ days[3][0] +'">'+ days[3][1] +'</option><option value="'+ days[4][0] +'">'+ days[4][1] +'</option><option value="'+ days[5][0] +'">'+ days[5][1] +'</option></select> --}}