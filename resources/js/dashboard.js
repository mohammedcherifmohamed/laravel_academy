
console.log('Dashboard script loaded');

window.openEditInstructorModel = function(id) {
    console.log("Editing instructor:", id);
    document.getElementById('addInstructorModal').classList.remove('hidden');
     // Change form action to update route
    let form = document.getElementById('instructorForm');
    form.action = `/admin/instructors/update/${id}`;
    
    // Remove any existing hidden _method
    let oldMethod = form.querySelector('input[name="_method"]');
    if (oldMethod) oldMethod.remove();
    
    // Add hidden _method for PUT
    let methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'PATCH';
    form.appendChild(methodInput);

    fetch(`/admin/instructors/edit/`+id,{
       method: "GET",
       headers:{
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
       } 

    })
    .then(response => response.json()
    .then(data => {
        if(data.success){
            console.log("Instructor data:", data.instructor);
                let inputName = document.querySelector('input[name="name"]');
                let inputEmail = document.querySelector('input[name="email"]');
                let inputSpecialization = document.querySelector('input[name="specialization"]');
                let inputGender= document.querySelector('input[name="gender"]');

            inputName.value = data.instructor.full_name;
            inputEmail.value = data.instructor.email;
            inputSpecialization.value = data.instructor.specialization;
            document.querySelector(`input[name="gender"][value="${data.instructor.gender}"]`).checked = true;

        }else{
            console.error("Error fetching instructor data:", data.message);
        }
    })
    .catch(err => {

    })
);

}

window.openInstructorModal = function () {
    document.getElementById('addInstructorModal').classList.remove('hidden');
}
window.closeInstructorModal = function () {

    document.getElementById('addInstructorModal').classList.add('hidden');
     // Change form action to update route
    let form = document.getElementById('instructorForm');
    form.action = `/admin/instructors/add`;
    
    // Remove any existing hidden _method
    let oldMethod = form.querySelector('input[name="_method"]');
    if (oldMethod) oldMethod.remove();
    
    // Add hidden _method for PUT
    let methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'POST';
    form.appendChild(methodInput);
    // Clear form fields
    document.querySelector('input[name="name"]').value = '';
    document.querySelector('input[name="email"]').value = '';
    document.querySelector('input[name="specialization"]').value = '';
    // uncheck gender
document.querySelectorAll('input[name="gender"]').forEach(radio => {
    radio.checked = false;
});

}