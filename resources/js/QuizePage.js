let currentPage = 1;
const totalPages = 3;
const answers = {}; 

document.getElementById("totalPages").textContent = totalPages;

function showPage(page) {
  document.querySelectorAll(".quiz-page").forEach((p, i) => {
    p.classList.toggle("hidden", i + 1 !== page);
  });
  document.getElementById("currentPage").textContent = page;
  document.getElementById("prevBtn").disabled = page === 1;
  document.getElementById("nextBtn").textContent = (page === totalPages) ? "Submit" : "Next";
}

function saveCurrentAnswer() {
  const currentInputs = document.querySelectorAll(`#page${currentPage} input[type='radio']`);
  currentInputs.forEach(input => {
    if (input.checked) {
      answers[input.name] = input.value;
    }
  });
}

window.nextPage = function () {
  saveCurrentAnswer(); 

  if (currentPage < totalPages) {
    currentPage++;
    showPage(currentPage);
  } else {
    submitQuiz();
  }
};

window.prevPage = function () {
  if (currentPage > 1) {
    currentPage--;
    showPage(currentPage);
  }
};

window.closeQuiz = function () {
  document.getElementById("quizModal").classList.add("hidden");
};

showPage(currentPage);

const modal = document.getElementById("resultModal");

function submitQuiz() {
  saveCurrentAnswer();
  console.log("Submitted Answers:", answers);

  fetch(quizSubmitUrl, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": csrfToken 
    },
    body: JSON.stringify(answers)
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      document.getElementById("quizModal").classList.add("hidden");
      document.getElementById("quizScore").innerText = `You scored ${data.score}%`;
      document.getElementById("studentScore").value = data.score;
      document.getElementById("courseName").innerText = data.course_name;
      document.getElementById("coursePrice").innerText = data.price;
      modal.classList.remove("hidden");
    } else {
      alert("Something went wrong submitting your quiz.");
    }
  })
  .catch(err => {
    console.error(err);
    alert("Error submitting quiz.");
  });
}

window.closeResultModal = function () {
  modal.classList.add("hidden");
};
