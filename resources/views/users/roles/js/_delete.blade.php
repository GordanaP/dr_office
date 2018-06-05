$(document).on('click', '#deleteRole', function(){

    var role = $(this).val();
    var rolesDeleteUrl = rolesIndexUrl + '/' + role
    name = 'role'
    var field = '#displayRoles'

    swalDelete(rolesDeleteUrl, name, datatable=null, field)
})
