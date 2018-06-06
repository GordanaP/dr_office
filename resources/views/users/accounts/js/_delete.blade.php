$(document).on('click', '#deleteAccount', function() {

    var user = $(this).val();
    var deleteAccountUrl = '/admin/accounts/' + user

    swalDelete(deleteAccountUrl, 'account', datatable)
})