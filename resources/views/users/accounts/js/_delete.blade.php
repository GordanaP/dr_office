$(document).on('click', '#deleteAccount', function(){

    var user = $(this).val()
    var adminAccountsDeleteUrl = '/admin/accounts/' + user

    swalDelete(adminAccountsDeleteUrl, 'account', datatable)
})