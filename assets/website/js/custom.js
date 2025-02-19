
document.addEventListener("DOMContentLoaded", function () {
    const quizDuration = 30 * 60; // 30 minutes

    let base_url = "http://localhost/online_examination_website/";
    // Check if there's a stored time in sessionStorage, otherwise start fresh
    let timeLeft = sessionStorage.getItem("timeLeft")
        ? parseInt(sessionStorage.getItem("timeLeft"))
        : quizDuration;

    function updateTimer() {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;
        document.getElementById("timer").innerText = `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;

        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            submitQuiz();
        } else {
            timeLeft--;
            sessionStorage.setItem("timeLeft", timeLeft); // Save time left
        }
    }

    // Function to submit the quiz and redirect
    function submitQuiz() {
        //alert("Time is up! Submitting your quiz...");
        sessionStorage.removeItem("timeLeft");
        window.location.href = base_url + "website/Questionnaire/result";
    }

    // Start the countdown timer
    let timerInterval = setInterval(updateTimer, 1000);
    // Initial call to display timer immediately
    updateTimer();

});
