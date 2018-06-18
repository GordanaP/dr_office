$(document).on('click', '#add', function(){

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

        $('#workingDaysFields').append(html)
    }
})

$(document).on('click', '.btn-remove', function(){

    $(this).parent('div').remove()
})