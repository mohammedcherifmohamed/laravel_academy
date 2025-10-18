
window.openEditModel = function(id) {
    console.log("Editing Category:", id);
    document.getElementById('addCategoryModal').classList.remove('hidden');
     // Change form action to update route
    let form = document.getElementById('categoryForm');
    form.action = `/admin/categories/update/${id}`;
    
    // Remove any existing hidden _method
    let oldMethod = form.querySelector('input[name="_method"]');
    if (oldMethod) oldMethod.remove();
    
    // Add hidden _method for PUT
    let methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'PATCH';
    form.appendChild(methodInput);

    fetch(`/admin/categories/edit/`+id,{
       method: "GET",
       headers:{
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
       } 

    })
    .then(response => response.json()
    .then(data => {
        if(data.success){
            console.log("category data:", data.category);
            console.log("Fetched icon:", JSON.stringify(data.category.icon));
                        console.log("Set icon select to:", data.category.icon);

                let inputName = document.querySelector('input[name="name"]');
                let inputIcon= document.querySelector('select[name="icon"]');

            inputName.value = data.category.name;
            inputIcon.value = data.category.icon;
            // Delay until modal DOM is ready
                setTimeout(() => {
                    const iconSelect = document.querySelector('select[name="icon"]');
                    if (iconSelect) {
                        iconSelect.value = data.category.icon;
                        console.log("Set icon select to:", data.category.icon);
                    } else {
                        console.error("Select not found in DOM");
                    }
                }, 1);
        }else{
            console.error("Error fetching category data:", data.message);
        }
    })
    .catch(err => {

    })
);

}

window.openCategoryModal = function () {
    document.getElementById('addCategoryModal').classList.remove('hidden');
}


window.closeCategoryModal = function () {

    document.getElementById('addCategoryModal').classList.add('hidden');
     // Change form action to update route
    let form = document.getElementById('categoryForm');
    form.action = `/admin/categories/add`;
    
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
    document.querySelector('select[name="icon"]').value = '';

}