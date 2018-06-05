var options = avatarForm.find('[name="avatar_options"]').val(),
    avatar  = avatarForm.find('[name="avatar"]').val(),
    fv      = avatarForm.data('formValidation');

// Enable avatar validator if avatar_options value = 1
if(options == 1) {
    fv.enableFieldValidators('avatar', true).revalidateField('avatar');
}
// Disable avatar validator
else {
    fv.enableFieldValidators('avatar', false).revalidateField('avatar');
}