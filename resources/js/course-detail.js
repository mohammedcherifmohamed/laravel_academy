document.addEventListener('DOMContentLoaded', function() { 
  const enrollModal = document.getElementById('enrollModal'); 
  const closebtn = document.getElementById('closeModal'); 

  if (closebtn && enrollModal) {
    closebtn.addEventListener('click', function() { 
      enrollModal.classList.add('hidden'); 
    }); 
  }
});


 window.openModal = function() {
    document.getElementById('enrollModal').classList.remove('hidden');
  }

