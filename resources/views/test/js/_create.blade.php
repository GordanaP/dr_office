$(document).on('click', '#createSchedule', function(){

    createScheduleModal.modal('show')

    $('#field_0').remove()

    let i=0
    var field = i > 0 ? 'field' : '' //
    var id =  i > 0 ? i : 'field_0' //
    var btnRemove = i > 0 ? 'btn-remove' : ''
    var addCreateSchedule = i === 0 ? 'addCreateSchedule' : ''
    var dynamicIcon = i > 0 ? 'fa-remove' : 'fa-plus'

    var html = ''

    html += '<div class="form-row ' + field + '" id="' + id + '">'

    html += '<div class="form-group col-md-4 offset-md-1"><select name="day['+ i +'][working_day_id]" class="form-control day-'+ 0 +'-working_day_id"><option value="">Select a day</option><option value="'+ days[0][0] +'">'+ days[0][1] +'</option><option value="'+ days[1][0] +'">'+ days[1][1] +'</option><option value="'+ days[2][0] +'">'+ days[2][1] +'</option><option value="'+ days[3][0] +'">'+ days[3][1] +'</option><option value="'+ days[4][0] +'">'+ days[4][1] +'</option><option value="'+ days[5][0] +'">'+ days[5][1] +'</option></select><span class="invalid-feedback day-'+ i +'-working_day_id"></span></div>'

    html += '<div class="form-group col-md-3"><input type="text" name="day['+ i +'][start_at]" class="form-control day-'+ i +'-start_at" placeholder="00:00" /><span class="invalid-feedback day-'+ i +'-start_at"></span></div>'

    html += '<div class="form-group col-md-3"><input type="text" name="day['+ i +'][end_at]" class="form-control day-'+ i +'-end_at" placeholder="00:00"><span class="invalid-feedback day-'+ i +'-end_at"></span></div>'

    html += '<div class="form-group col-md-1"><button type="button" class="btn btn-dynamic '+ btnRemove +' " id="'+ addCreateSchedule +'"><i class="fa '+ dynamicIcon +'" ></i></button></div></div>'

    $('#createFormGroups').append(html)
})