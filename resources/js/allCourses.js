console.log('all courses  script loaded');

document.addEventListener('DOMContentLoaded', function() { 
  const categoryFilter = document.getElementById('categoryFilter'); 
    const courseSearch = document.getElementById('courseSearch');
    const levelFilter = document.getElementById('levelFilter');
    if(categoryFilter && courseSearch && levelFilter){
    categoryFilter.addEventListener('change', function() {
        filterCourses(); 
    });
    courseSearch.addEventListener('input', function() {
        filterCourses(); 
    });
    levelFilter.addEventListener('change', function() {
        filterCourses(); 
    });
    }
}); 

window.filterCourses = function() {
    console.log('Filtering with category ' +categoryFilter.value + " and " + courseSearch.value + " and level " + levelFilter.value); 

    fetch(`/courses/filter?category=` + encodeURIComponent(categoryFilter.value) +
          `&search=` + encodeURIComponent(courseSearch.value) +
          `&level=` + encodeURIComponent(levelFilter.value), {

            method: 'GET',

            headers:{
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }

          })
          .then(response => response.json())
          .then(data => { 
            if (data.success) { 
                const coursesContainer = document.getElementById('courseList'); 
                coursesContainer.innerHTML = ''; 

                data.courses.forEach(course => { 
                    coursesContainer.innerHTML += `
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden"> 
                            <img src="/storage/${course.image_path}" alt="${course.title}" class="w-full h-48 object-cover"> 
                            <div class="p-4"> 
                                <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-white">${course.title}</h3> 
                                <p class="text-sm text-gray-600 dark:text-gray-300">${course.category?.name ?? ''}</p> 
                                <div class="flex items-center mt-2"> 
                                    <img src="${course.instructor?.gender === 'female' ? '/icons/women.png' : '/icons/man.png'}" 
                                        alt="${course.instructor?.full_name ?? ''}" 
                                        class="w-8 h-8 rounded-full mr-2"> 
                                    <span class="text-sm text-gray-700 dark:text-gray-200">${course.instructor?.full_name ?? ''}</span> 
                                </div> 
                                <p class="mt-2 text-yellow-500"> 
                                    <span class="text-gray-500 dark:text-gray-400">(${course.overview?.duration ?? 'N/H'} hrs)</span> 
                                </p> 
                                <p class="text-gray-600 dark:text-gray-300 mt-2">${course.description.substring(0,80)} ...</p> 
                                <p class="text-xl font-bold mt-4 text-gray-800 dark:text-white">${course.price} DZ</p> 
                                <a href="${courseBaseUrl}/${course.id}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Course</a> 
                            </div> 
                        </div>
                    `;
                }); 
    } 
})

          .catch(error => {
              console.error('Error fetching filtered courses:', error);
          });


};
