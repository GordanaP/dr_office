var name        = profileForm.find('[name="name"]').val()
var about       = profileForm.find('[name="about"]').val()
var location    = profileForm.find('[name="location"]').val()
var fv          = profileForm.data('formValidation')

switch ($(this).attr('name')) {
    case 'name':
        fv.enableFieldValidators('location', name === '').revalidateField('location');
        fv.enableFieldValidators('about', name === '').revalidateField('about');

        if (name && fv.getOptions('name', null, 'enabled') === false) {
            fv.enableFieldValidators('name', true).revalidateField('name');
        }
        else if (name === '' && location == '' && about !== '') {
            fv.enableFieldValidators('name', false).revalidateField('name');
            fv.enableFieldValidators('location', false).revalidateField('location');
        }
        else if (name === ''  && about == ''  && location !== '') {
            fv.enableFieldValidators('name', false).revalidateField('name');
            fv.enableFieldValidators('about', false).revalidateField('about');
        }
        else if (name == '' && location !== ''  && about !== ''  ) {
            fv.enableFieldValidators('name', false).revalidateField('name');
        }

        break;

    case 'about':
        fv.enableFieldValidators('location', about === '').revalidateField('location');
        fv.enableFieldValidators('name', about === '').revalidateField('name');

        if (about && fv.getOptions('about', null, 'enabled') === false) {
            fv.enableFieldValidators('about', true).revalidateField('about');
        }
        else if (about === '' && name == '' && location !== '') {
            fv.enableFieldValidators('about', false).revalidateField('about');
            fv.enableFieldValidators('name', false).revalidateField('name');
        }
        else if (about === '' && location == '' && name !== '') {
            fv.enableFieldValidators('about', false).revalidateField('about');
            fv.enableFieldValidators('location', false).revalidateField('location');
        }
        else if (about === '' && name !== ''  && location !== '') {
            fv.enableFieldValidators('about', false).revalidateField('about');
        }
        break;

    case 'location':
        fv.enableFieldValidators('name', location === '').revalidateField('name');
        fv.enableFieldValidators('about', location === '').revalidateField('about');

        if (location && fv.getOptions('location', null, 'enabled') === false) {
            fv.enableFieldValidators('location', true).revalidateField('location');
        }
        else if (location === '' && about == '' && name !== '') {
            fv.enableFieldValidators('location', false).revalidateField('location');
            fv.enableFieldValidators('about', false).revalidateField('about');
        }
        else if (location === '' && name == '' && about !== '') {
            fv.enableFieldValidators('location', false).revalidateField('location');
            fv.enableFieldValidators('name', false).revalidateField('name');
        }
        else if (location === '' && about !== '' && name !== '' ) {
            fv.enableFieldValidators('location', false).revalidateField('location');
        }
        break;
}