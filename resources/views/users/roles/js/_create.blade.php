$(document).on("click", '#createRole', function(){

    roleModal.modal('show')

    $('.modal-title i').addClass('fa-briefcase')
    $('.modal-title span').text('New role')
    $('.btn-role').text('Save').attr('id', 'storeRole');
})