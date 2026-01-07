// Handle create, edit User
const inputAvatar = document.getElementById("input-avatar");
const imageAvatar = document.getElementById("image-avatar");
const btnClearAvatar = document.getElementById("btn-clear-avatar");

if(inputAvatar){
    inputAvatar.addEventListener('change', function(){
        imageAvatar.src = window.URL.createObjectURL(inputAvatar.files[0]);
    })

    btnClearAvatar.addEventListener('click', function(){
        inputAvatar.value = null;
        imageAvatar.src = imageAvatar.dataset.defaultAvatar;
    })
}

// Handle selected Employee
const selectedEmployee = document.getElementById('selected-employee');

if(selectedEmployee){
    selectedEmployee.addEventListener('change', function () {
        // Get selected option
        const selectedOptionEmployee = this.options[this.selectedIndex];
        
        // Get data from data attributes
        const name = selectedOptionEmployee.getAttribute('data-name') || '';
        const citizen = selectedOptionEmployee.getAttribute('data-citizen') || '';
        const dateOfBirth = selectedOptionEmployee.getAttribute('data-dateOfBirth') || null;
        const phone = selectedOptionEmployee.getAttribute('data-phone') || '';
        const gender = selectedOptionEmployee.getAttribute('data-gender') || null;
        const startDate = selectedOptionEmployee.getAttribute('data-startDate') || null;
        const endDate = selectedOptionEmployee.getAttribute('data-endDate') || null;
        const address = selectedOptionEmployee.getAttribute('data-address') || '';
        const note = selectedOptionEmployee.getAttribute('data-note') || '';

        // Assign data to input fields
        document.querySelector('input[name="name"]').value = name || '';
        document.querySelector('input[name="citizen"]').value = citizen || '';
        if (dateOfBirth) document.querySelector('input[name="dateOfBirth"]').value = dateOfBirth;
        document.querySelector('input[name="phone"]').value = phone || '';
        if (startDate) document.querySelector('input[name="start_date"]').value = startDate;
        if (endDate) document.querySelector('input[name="end_date"]').value = endDate;
        document.querySelector('input[name="address"]').value = address || '';
        document.querySelector('input[name="note"]').value = note || '';
        if (gender) {
            document.querySelectorAll('input[name="gender"]').forEach(radio => {
                radio.checked = radio.value === String(gender);
            });
        }
    });
}

// Handle avatar Facility
const seletedFacility = document.getElementById('selected-facility');

if(seletedFacility){
    seletedFacility.addEventListener('change', function () {
        // Get selected option
        const selectedOptionFacility = this.options[this.selectedIndex];
        
        // Get data from data attributes
        const address = selectedOptionFacility.getAttribute('data-address') || '';
        const avatar = selectedOptionFacility.getAttribute('data-avatar') || null;
        const avatarDefault = selectedOptionFacility.getAttribute('data-avatar-default') || '';
    
        // Assign data to input fields
        document.getElementById('facility-address').value = address || '';
        document.getElementById("facility-avatar").src = avatar ? avatar : avatarDefault;
    });
}

// Handle Button submit form
const submitForm = document.getElementById('submit-form');

if(submitForm){
    submitForm.addEventListener('submit', function() {
        const btn = document.getElementById('submit-btn');
        btn.disabled = true;
        btn.innerText = 'Processing...';
    });
}

// Handle delete User
$('#confirm-small-modal').on('show.bs.modal', function (event) {
    // Button open modal
    const button = $(event.relatedTarget);

    // Get data from button data attributes
    const action = button.data('action') || null;
    const method = button.data('method') || 'POST';
    const userName = button.data('name') || null;
    const userEmail = button.data('email') || null;
    const title = button.data('title') || 'Xác nhận hành động';
    const message = button.data('message') || '';
    const btnText = button.data('btntext') || 'Đồng ý';

    // Update content in modal
    $(this).find('#confirm-small-modal__title').text(title);
    $(this).find('#confirm-small-modal__message').text(message);
    $(this).find('#confirm-small-modal__line-1').text(`Họ tên: ${userName}`);
    $(this).find('#confirm-small-modal__line-2').text(`Email: ${userEmail}`);
    $(this).find('#confirm-small-modal__btn-submit').text(btnText);

    // Assign action and method to form
    const form = document.getElementById('form-delete-restore');
    if(action && form){
        $('#form-delete-restore').attr('action', action);
    }
    if(method && form){
        $('#form-delete-restore__input-method').val(method);
    }
});

$('#confirm-small-modal__btn-submit').on('click', function() {
    $('#form-delete-restore').submit();
});

