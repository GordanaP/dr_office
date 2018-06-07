$(document).on('click', '#deleteAccount', function() {

    var user = $(this).val();
    var deleteAccountUrl = adminAccountsUrl + '/' + user

    swalDelete(deleteAccountUrl, 'account', datatable)
})