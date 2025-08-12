


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
    document.querySelector('input[name="icon"]').value = '';

}