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


// Handle avatar Facility
const seletedFacility = document.getElementById('selected-facility');

if(seletedFacility){
    seletedFacility.addEventListener('change', function () {
        // Get selected option
        const selectedOption = this.options[this.selectedIndex];
        
        // Get data from data attributes
        const address = selectedOption.getAttribute('data-address') || '';
        const avatar = selectedOption.getAttribute('data-avatar') || null;
        const avatarDefault = selectedOption.getAttribute('data-avatar-default') || '';
    
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
