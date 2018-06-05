$(document).on("click", '#editRole', function() {

    roleModal.modal('show')

    var role = $(this).val()
    var rolesShowUrl = rolesIndexUrl + '/' + role + '/edit'

    $('.modal-title i').addClass('fa-briefcase')
    $('.modal-title span').text('Edit role')
    $('.btn-role').text('Save changes').attr('id', 'updateRole').val(role);

    $.ajax({
        url : rolesShowUrl,
        type: "GET",
        success: function(response) {

            $('#name').val(response.role.name)
        }
    })
})