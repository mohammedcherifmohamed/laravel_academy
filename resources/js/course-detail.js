console.log('course details script loaded');

document.addEventListener('DOMContentLoaded', function() { 
  const enrollModal = document.getElementById('enrollModal'); 
  const closebtn = document.getElementById('closeModal'); 

  if (closebtn && enrollModal) {
    closebtn.addEventListener('click', function() { 
      enrollModal.classList.add('hidden'); 
    }); 
  }

  const dialogModal = document.getElementById('dialogModal');
  const dialogClosebtn = document.getElementById('closeDialogModal');

  if (dialogClosebtn && dialogModal) {
    dialogClosebtn.addEventListener('click', function() {
      dialogModal.classList.add('hidden');
    });
  }

  // fetch course data to fill them in the model





});


 window.openModal = function() {
    document.getElementById('enrollModal').classList.remove('hidden');
  }
 window.showDialog = function() {
    document.getElementById('dialogModal').classList.remove('hidden');
  }

