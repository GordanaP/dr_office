$(document).on('click', '#editRoles', function() {

    revokeRolesModal.modal("show")

    var user = $(this).attr('data-user');
    var username = $(this).attr('data-name');
    var UserRolesUrl = adminAccountsUrl + '/' + user

    $(".modal-title span").text(username)
    $("#revokeRoles").val(user) // attach user

    $.ajax({
        url: UserRolesUrl,
        type: "GET",
        success: function(response) {
            $('#role').html(response.html);
        }
    })
})
