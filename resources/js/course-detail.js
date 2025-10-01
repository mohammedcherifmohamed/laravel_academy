document.addEventListener('DOMContentLoaded', function() { 
  const enrollModal = document.getElementById('enrollModal'); 
  const closebtn = document.getElementById('closeModal'); 

  if (closebtn && enrollModal) {
    closebtn.addEventListener('click', function() { 
      enrollModal.classList.add('hidden'); 
    }); 
  }

  // fetch course data to fill them in the model





});


 window.openModal = function() {
    document.getElementById('enrollModal').classList.remove('hidden');
  }

