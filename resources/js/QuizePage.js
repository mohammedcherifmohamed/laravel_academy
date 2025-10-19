    let currentPage = 1;
    const totalPages = 3;
    document.getElementById("totalPages").textContent = totalPages;

    window.showPage = function(page) {
      document.querySelectorAll(".quiz-page").forEach((p, i) => {
        p.classList.toggle("hidden", i + 1 !== page);
      });
      document.getElementById("currentPage").textContent = page;
      document.getElementById("prevBtn").disabled = page === 1;
      document.getElementById("nextBtn").textContent = (page === totalPages) ? "Submit" : "Next";
    }

    window.nextPage=function () {
      if (currentPage < totalPages) {
        currentPage++;
        showPage(currentPage);
      } else {
        alert("✅ Quiz Submitted Successfully!");
      }
    }

    window.prevPage = function () {
      if (currentPage > 1) {
        currentPage--;
        showPage(currentPage);
      }
    }

  window.closeQuiz=  function () {
      document.getElementById("quizModal").classList.add("hidden");
    }

    showPage(currentPage);

    const form = document.getElementById("quizForm");
    const modal = document.getElementById("resultModal");

    form.addEventListener("submit", function(e) {
      e.preventDefault();

      const answers = {} ;
      document.querySelectorAll(".quiz-page input[type='radio']:checked").forEach(input => {
        answers[input.name] = input.value;
      });

      fetch("{{ route('course.submitQuiz', ['id' => $course->id]) }}", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify(answers)
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          document.getElementById("quizScore").innerText = `You scored ${data.score}%`;
          document.getElementById("courseName").innerText = data.course_name;
          document.getElementById("coursePrice").innerText = data.price;
          modal.classList.remove("hidden");
        }
      });
    });

    window.closeResultModal= function () {
      modal.classList.add("hidden");
    }