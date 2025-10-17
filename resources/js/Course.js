
console.log('Dashboard1 script loaded');

window.openEditCourseModel = function(id) {
    console.log("Editing instructor:", id);
    document.getElementById('addCourseModal').classList.remove('hidden');
     // Change form action to update route
    let form = document.getElementById('addCourseForm');
    form.action = `/admin/courses/update/${id}`;
    
    // Remove any existing hidden _method
    let oldMethod = form.querySelector('input[name="_method"]');
    if (oldMethod) oldMethod.remove();
    
    // Add hidden _method for PUT
    let methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'PATCH';
    form.appendChild(methodInput);

    fetch(`/admin/courses/edit/`+id,{
       method: "GET",
       headers:{
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
       } 

    })
    .then(response => response.json()
    .then(data => {
        if(data.success){
            console.log("Course data:", data.course);

                let inputTitle = document.querySelector('input[name="title"]');
                let inputDescription = document.getElementById('courseDescription');
                let inputprice = document.querySelector('input[name="price"]');

            inputTitle.value = data.course.title + " test";
            inputDescription.value = data.course.description;
            inputprice.value = data.course.price;
            document.querySelector('select[name="category"]').value = data.course.category_id;
            document.querySelector('select[name="instructor"]').value = data.course.instructor_id;
            document.querySelector('select[name="duration"]').value = data.course.overview.duration;

        }else{
            console.error("Error fetching instructor data:", data.message);
        }
    })
    .catch(err => {

    })
);

}


window.openCourseModal = function () {
    document.getElementById('addCourseModal').classList.remove('hidden');
}

window.closeCourseModal = function () {

    document.getElementById('addCourseModal').classList.add('hidden');
     // Change form action to update route
    let form = document.getElementById('addCourseForm');
    form.action = `/admin/course/add`;
    
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
    document.querySelector('input[name="title"]').value = '';
   document.getElementById('courseDescription').value = '';
    document.querySelector('input[name="price"]').value = '';
    // uncheck gender


}