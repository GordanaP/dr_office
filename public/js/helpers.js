/**
 * Notify user about a successful action
 *
 * @param  {string} message
 * @param  {string} type
 * @return {mixed}
 */
function userNotification(message, type="success")
{
    return $.notify(message, type)
}


/**
 * Toggle hidden field visibility by changing checkbox field value
 *
 * @param  {string} checked_field
 * @param  {string} hidden_field
 * @return {void}
 */
function toggleHiddenFieldWithCheckbox(checked_field, hidden_field)
{
    checked_field.change(function() {

        this.checked ? hidden_field.hide().val('').end() : hidden_field.show()

    });
}

/**
 * Toggle hidden field by changing the radio field value.
 *
 * @param  {string} checked_value
 * @param  {string} hidden_field
 * @return {void}
 */
function toggleHiddenFieldWithRadio(checked_value, hidden_field)
{
    $('input:radio').change(function(){

        var value = $("form input[type='radio']:checked").val();

        value == checked_value ? hidden_field.show() : hidden_field.hide().val('').end()
    });
}

/**
 * Remove server side validation feedback
 *
 * @param  {array} fields
 * @return {void}
 */
// function removeServerSideValidationFeedback(fields)
// {
//     $.each(fields, function (index, value) {

//         var inputId = value.id

//         clearError(inputId)
//     })
// }

/**
 * Set datatable counter column
 *
 * @param {object} datatable
 * @return {void}
 */
function setTableCounterColumn(datatable)
{
    datatable.on('order.dt search.dt', function () {
        datatable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            x = i+1
            cell.innerHTML = '<span>'+ x +'</span>';
        } );
    } ).draw();
}


/**
 * Highlight the cells on hovering
 *
 * @param  {string} modeltable
 * @param  {object} datatable
 * @return void
 */
function highlightDataTable(modelTable, datatable)
{
    $(document).on('mouseenter', modelTable + " td", function () {

        var colIdx = $(this).parent().children().index($(this));

        $( datatable.cells().nodes() ).removeClass( 'highlight' );
        $( datatable.column( colIdx ).nodes() ).addClass( 'highlight' );
    });

    // Remove the highlight
    $(document).on('mouseleave', modelTable + " td" , function () {

        $( datatable.cells().nodes() ).removeClass( 'highlight' );
    });
}

/**
 * Generate random string
 *
 * @param  {{numeric}} length
 * @return string
 */
function randomString(length)
{
    return Math.random().toString(36).substring(length);
}


/**
 * Alert the user on deletion
 *
 * @param  {string} name
 * @param  {string} url
 * @return void
 */
function swalDelete(url, name, datatable, field)
{
    swal({
        title: 'Are you sure?',
        text: 'You will not be able to recover the '+ name + '!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if(result.value == true)
        {
            $.ajax({
                url : url,
                type : "DELETE",
                success : function(response) {

                    datatable ? datatable.ajax.reload() : ''
                    field ? $(field).load(location.href + ' ' + field) : ''

                    userNotification(response.message)
                },
                error: function(response) {
                    userNotification("This action is unauthorized", "error")
                    modal.modal("hide")
                }
            })
        }
    })
}

/**
 * Ajax error response
 *
 * @param  {array} errors
 * @param  {string} modal
 * @return {[void]}
 */
function errorResponse(errors, modal)
{
    if(errors) {
        displayErrors(errors)
        clearErrorOnNewInput()
    }
    else {
        userNotification("This action is unauthorized", "error")
        modal.modal("hide")
    }
}

/**
 * Display validation error messages for all form fields.
 *
 * @param  {array} errors
 * @return void
 */
function displayErrors(errors)
{
    for (let error in errors)
    {
        var formattedError = error.replace(/\./g , "-");

        var field = $("."+formattedError)
        var feedback = $("span."+formattedError).show()

        // var field = $("."+error)
        // var feedback = $("span."+error).show()

        // Attach server side validation
        displayServerError(field, feedback, errors[error][0])

        // Remove client side validation
        clearJSError(field)
    }
}

/**
 * Remove the error on inserting the new value.
 *
 * @return void
 */
function clearErrorOnNewInput()
{
    $("input, textarea").on('keydown', function () {

        clearError($(this).attr('name'));
    });

    $('input[type="file"]').change(function(){

        var id = $(this).attr('id');

        clearError(id)
    })

    $("select").on('change', function () {

        var select_id = $(this).attr('id');
        var id = select_id.charAt(0) == '_' ? select_id.substring(1) : select_id

        clearError(id)
    });

    $("input[type=checkbox], input[type=radio]").click(function() {

        var id = $(this).parents(':eq(1)').attr('id');
        var name = $(this).parents(':eq(1)').attr('name');

        var splitted = name ? name.split("-") : ''
        var splitted_name = splitted[1]

        clearError(name)
        clearError(id)
    })
}

/**
 * Display server error.
 *
 * @param  {string} field
 * @param  {string} feedback
 * @param  {string} error
 * @return {void}
 */
function displayServerError(field, feedback, error)
{
    field.addClass('is-invalid')
    feedback.text(error)
}

/**
 * Clear client side error.
 *
 * @param  {string} field
 * @return {void}
 */
function clearJSError(field)
{
    field.parent('.form-group').removeClass('has-success')
    field.siblings('i.fv-control-feedback.fa.fa-check').removeClass('fa-check')
}

/**
 * Success ajax response.
 *
 * @param  {string} modal
 * @param  {string} message
 * @return {void}
 */
function successResponse(modal, message)
{
    userNotification(message)
    modal.modal("hide")
}

/**
 * Set modal autofocus field
 *
 * @param {string} modalName
 * @param {string} inputId
 * @return {void}
 */
$.fn.setAutofocus = function(field)
{
    $(this).on('shown.bs.modal', function () {
        $(this).find(field).focus()
    })
}

/**
 * Determine how to create the password.
 *
 * @param  {string} field
 * @return {string}
 */
function generatePassword(field)
{
    var auto_password = randomString(6);
    var manual_password = $('input[type=password]').val();

    return isChecked(field) ? auto_password : manual_password;
}

/**
 * Determine if the field is checked.
 *
 * @param  {string}  field
 * @return {Boolean}
 */
function isChecked(field) {

    return field[0].checked
}

/**
 * Change password
 *
 * @return {string}
 */
function changePassword()
{
    var auto_password = randomString(6)
    var manual_password = $("#_password").val()

    var checked_value = $("input[type='radio']:checked").val();

    if(checked_value == "manual")
    {
        var password = manual_password
    }
    else if(checked_value == "auto")
    {
        var password = auto_password
    }

    return password;
}

/**
 * Empty the modal upon close.
 *
 * @param  {array} fields
 * @param  {object} form
 * @param  {string} checked_filed
 * @param  {string} hidden_filed
 * @return {void}
 */
$.fn.emptyModal = function(fields, checked_field, hidden_field) {

    $(this).on("hidden.bs.modal", function() {

        // Remove form values
        clearForm(this, checked_field, hidden_field)

        // Remove server side errors
        clearServerErrors(fields)
    });
}

/**
 * Clear the form values.
 *
 * @param  {object} form
 * @return {void}
 */
 function clearForm(modal, checked_field=null, hidden_field=null)
 {
    $(modal)
        .find('form').trigger('reset').end()

        .find("select").val(null).trigger('change').end()

        .find("input:checkbox, input:radio").prop("checked", false)

    $(modal)
        .find(checked_field).prop('checked', true)

    hidden_field ? hidden_field.hide() : ''
 }

/**
 * Remove all server side errors.
 *
 * @param  {array} fields
 * @return void
 */
function clearServerErrors(fields)
{
    $.each(fields, function (index, name) {
      clearError(name)
    });
}

/**
 * Remove the server side error for a specified field.
 *
 * @param  {string} name
 * @return void
 */
function clearError(name)
{
    var field = $("."+name);
    var feedback = $("span."+name).hide();

    field.removeClass('is-invalid');
    feedback.text('');
}

/**
 * Format the date.
 *
 * @param  {timestamp} date
 * @return {string}
 */
function getFormattedDate(date)
{
    var d = new Date(date);

    var date = d.getDate();
    var month = getMonthsNames()[d.getMonth()];
    var year = d.getFullYear();

    return date +  " " + month + " " + year;
}

/**
 * Get the months names.
 *
 * @return {array}
 */
function getMonthsNames()
{
    return [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ]
}

/**
 * Determine if the user is verified.
 *
 * @param  {boolean} verified
 * @return {string}
 */
function getAccountStatus(verified)
{
    return verified == true ? '<i class="fa fa-check-circle"></i> verified' : '<i class="fa fa-times-circle"></i> inactive'
}

/**
 * Get the roles names.
 *
 * @param  {array} roles
 * @return {array}
 */
function getRoleNames(roles)
{
    var roleNames = []

    $.each(roles, function(key, value) {

        roleNames.push(value.name)
    })

    return roleNames
}

/**
 * Set user avatar
 *
 * @param {[type]} userAvatarFilename    [description]
 * @param {[type]} defaultAvatarFilename [description]
 */
function setAvatar(avatarFilename, className)
{
    return '<img src="/images/avatars/'+ avatarFilename +'" class="'+className+'">';
}

/**
 * Get the user roles.
 *
 * @param  {array} roles
 * @return {array}
 */
function getUserRoles(roles)
{
    var roleIds = []

    $.each(roles, function(key, role) {
        roleIds.push(role.id)
    })

    return roleIds
}

function getCheckedValue(form, fieldName)
{
    return form.find('input[name="'+fieldName+'"]:checked').val()
}


/**
 * Get checkbox values
 *
 * @param  {array} checked
 * @return {array}
 */
function checkedValues(checkbox)
{
    var checkedValues = [];

    var checked = $('input[name*="'+checkbox+'"]:checked')

    $.each(checked, function(key, value) {

        var value = $(this).val()
        checkedValues.push(value)
    })

    return checkedValues;
}

/**
 * Chunk an array
 *
 * @param  {array} myArray
 * @param  {int} chunkSize
 * @return {array}
 */
function chunkArray(myArray, chunkSize)
{
    var index = 0;
    var arrayLength = myArray.length;
    var tempArray = [];

    for (index = 0; index < arrayLength; index += chunkSize) {

        myChunk = myArray.slice(index, index+chunkSize);

        tempArray.push(myChunk);
    }

    return tempArray;
}

/**
 * Get chunked array values
 *
 * @param  {string} inputArrayName
 * @param  {integer} chunkSize
 * @return {array}
 */
function getChunks(arrayName, chunkSize)
{
    var values = $( "select[name*="+ arrayName +"], input[name*="+ arrayName +"]" ).map(function() {
        return this.value;
    }).get()

    var chunks = chunkArray(values, chunkSize);

    return chunks;
}

/**
 * Create multidimensional array
 *
 * @param  {string} inputArrayName
 * @param  {integer} chunkSize
 * @return {array}                [multidimensional array]
 */
function createScheduleArray(arrayName, chunkSize)
{
    var chunks = getChunks(arrayName, chunkSize)

    var days = [];

    for (var i = 0; i < chunks.length; i++) {

        days[i] = {
            'working_day_id': chunks[i][0],
            'start_at': chunks[i][1],
            'end_at': chunks[i][2],
        }
    }

    return days;
}

/**
 * Clear server errors for array of inputs
 *
 * @param  {string} arrayName
 * @param  {array} arrayFields
 * @param  {integer} arraySize
 * @return {void}
 */
function clearServerErrorsForInputArray(arrayName, arrayFields, arraySize)
{
    $.each(arrayFields, function (index, name)
    {
        for (var i = 0; i < arraySize; i++) {

            var field = $("."+ arrayName +"-"+ i +"-"+ name);
            var feedback = $("span." + arrayName +"-"+ i +"-" + name).hide();

            field.removeClass('is-invalid');
            feedback.text('');
        }
    });
}

/**
 * Add dynamic fields
 *
 * @param {int} totalFields
 * @param {int} maxFields
 * @param {string} targetElement
 * @param {string} html
 */
function addDynamicFields(totalFieldsNumber, maxFieldsNumber, targetElement, html)
{
    if (totalFieldsNumber < maxFieldsNumber)
    {
        targetElement.append(html)
    }
}

/**
 * Make a new array
 *
 * @param  {array} fields
 * @return {array}
 */
function makeNewArray(fields)
{
    var tempArray = []

    $.each(fields, function(index, field) {

        tempArray.push(field.id)

        tempArray.sort()
    });

    return tempArray
}

/**
 * Get days
 *
 * @param  {array} days
 * @return {array}
 */
function getDays(days)
{
    var tempArray = [];

    $.each(days, function(index, day) {
         tempArray.push([day.id, day.name]);
    });

    return tempArray;
}

/**
 * Find missing value in a sequence of values
 *
 * @param  {array} array
 * @return {int}
 */
function findMissingValue(array)
{
    var missing;

    for(var i=1;i<=array.length;i++)
    {
       if(array[i-1] != i) {

            missing = i;
            break;
       }
    }

    return i
}