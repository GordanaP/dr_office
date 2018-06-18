@extends('layouts.master')

@section('links')
    <style>
        .is-hidden {display: none}
    </style>
@endsection

@section('content')
    <h1>Welcome to  {{ config('app.name') }}</h1>

    <button type="button" class="btn btn-warning mb-2" id="openModal">Open modal</button>

    <div class="modal" tabindex="-1" role="dialog" id="createScheduleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-calendar mr-2"></i> Create schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="createScheduleForm">
                    <div class="modal-body">

                        <div id="workingDaysFields">
                            <div class="form-group flex align-center" id="0">
                                <div>
                                    <label for="">Working day</label>
                                    <div>
                                        <select name="day-0-working_day_id" class="form-control day-0-working_day_id">
                                            <option value="">Day</option>
                                            @foreach ($days as $day)
                                                <option value="{{ $day->id }}">{{ $day->name }}</option>
                                            @endforeach
                                            <span class="invalid-feedback day-0-working_day_id"></span>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label for="">Start</label>
                                    <div>
                                        <input type="text" class="form-control day-0-start_at" name="day[0][start_at]" />
                                        <span class="invalid-feedback day-0-start_at"></span>
                                    </div>
                                </div>
                                <div>
                                    <label for="">End</label>
                                    <div>
                                        <input type="text" class="form-control day-0-end_at" name="day[0][end_at]" />
                                        <span class="invalid-feedback day-0-end_at"></span>
                                    </div>
                                </div>
                                <div>
                                    <label for=""></label>
                                    <button type="button" class="btn" id="add"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="storeSchedule">Create schedule</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>

        var profile = "{{ $profile->slug }}"

        var createScheduleModal = $('#createScheduleModal'),
            createScheduleForm = $('#createScheduleForm'),
            scheduleFields = ['working_day_id', 'start_at', 'end_at'],
            scheduleFieldsName = 'day'

        createScheduleModal.on("hidden.bs.modal", function() {
            clearForm($(this))
            clearServerErrorsForInputArray(scheduleFieldsName, scheduleFields, 6)
            $('.field').remove()
        })

        var workingDays = @json($days)

        var days = getDays(workingDays)

        $(document).on('click', '#openModal', function(){

            createScheduleModal.modal('show')

        })

        var i = 0

        $(document).on('click', '#add', function(){

            i++

            var fields = $(".field")
            var total = fields.length;
            var max = 5

            var dynamicArray = makeNewArray(fields)

            var missing;

            for(var i=1;i<=dynamicArray.length;i++)
            {
               if(dynamicArray[i-1] != i) {

                    missing = i;
                    break;
               }
            }

            if (total < max)
            {
                var index = missing ? missing : i

                $('#workingDaysFields').append('<div class="form-group flex field" id="'+ index +'"><div><select name="day-'+ index +'-working_day_id" class="form-control day-'+ index +'-working_day_id"><option value="">Day</option><option value="'+ days[0][0] +'">'+ days[0][1] +'</option><option value="'+ days[1][0] +'">'+ days[1][1] +'</option><option value="'+ days[2][0] +'">'+ days[2][1] +'</option><option value="'+ days[3][0] +'">'+ days[3][1] +'</option><option value="'+ days[4][0] +'">'+ days[4][1] +'</option><option value="'+ days[5][0] +'">'+ days[5][1] +'</option><span class="invalid-feedback day-'+ index +'-working_day_id"></span></select></div><div><input type="text" name="day['+ index +'][start_at]" class="form-control  day-'+ i +'-start_at" /><span class="invalid-feedback day-'+ i +'-start_at"></span></div><div><input type="text" name="day['+ index +'][end_at]" class="form-control day-'+ i +'-end_at" /><span class="invalid-feedback day-'+ i +'-end_at"></span></div><button type="button" class="btn btn-remove"><i class="fa fa-remove"></i></button></div>')
            }
        })

        $(document).on('click', '.btn-remove', function(){

            var formatted = []

            $(this).parent('div').remove()
        })

        $(document).on('click', '#storeSchedule', function()
        {
            var days = createScheduleArray('day', 3)
            var storeScheduleUrl = '/admin/working_days/' + profile

            $.ajax({
                url: storeScheduleUrl,
                type: "PATCH",
                data: {
                    day: days
                },
                success: function(response)
                {
                    // $('#displaySchedule').load(location.href + ' #displaySchedule')
                    // $('.btn-schedule').text('Change')

                    successResponse(createScheduleModal, response.message)
                },
                error: function(response)
                {
                    errorResponse(response.responseJSON.errors, createScheduleModal)
                }
            })
        })

    </script> @endsection