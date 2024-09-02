<section class="quiz">
    <div class="container">
        <div id="progress-bar-container">
            <div id="progress-bar">
                <div id="progress"></div>
            </div>
        </div>
        <h1 class="page-title">Quiz</h1>
        <form action="result.php" method="post" class="quiz-form" id="quiz-form">
            <input type="hidden" name="quiz_data" value="<?php echo htmlspecialchars(json_encode($questions)); ?>">
            <div id="questions-container">
                <?php foreach ($questions as $index => $question): ?>
                    <div class="question" style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>;">
                        <h2 class="question-text"><?php echo html_entity_decode($question['question']); ?></h2>
                        <div class="answers">
                            <?php
                            $answers = array_merge([$question['correct_answer']], $question['incorrect_answers']);
                            shuffle($answers);
                            foreach ($answers as $answer):
                            ?>
                                <label class="answer-label">
                                    <input type="radio" name="answers[<?php echo $index; ?>]" value="<?php echo htmlspecialchars($answer); ?>" required>
                                    <?php echo html_entity_decode($answer); ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div id="navigation">
                <button type="button" id="prev-btn">Previous</button>
                <button type="button" id="next-btn">Next</button>
            </div>
            <button type="submit" class="btn btn-primary" id="submit-btn">Submit Answers</button>
        </form>
        <div id="timer">Time Remaining: <span id="time">600</span> seconds</div>
    </div>
</section>

<script>
// Timer functionality
let timeLeft = 600; // Time in seconds (10 minutes)
const timerElement = document.getElementById('time');
const timer = setInterval(() => {
    timeLeft--;
    timerElement.textContent = timeLeft;
    if (timeLeft <= 0) {
        clearInterval(timer);
        alert('Time is up!');
        document.getElementById('quiz-form').submit();
    }
}, 1000);

// Question Navigation functionality
let currentQuestion = 0;
const questions = document.querySelectorAll('.question');
const progressBar = document.getElementById('progress');
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');
const submitBtn = document.getElementById('submit-btn');

const updateProgressBar = () => {
    const progress = ((currentQuestion + 1) / questions.length) * 100;
    progressBar.style.width = progress + '%';
};

function showQuestion(index) {
    questions.forEach((q, i) => q.style.display = (i === index) ? 'block' : 'none');
    updateProgressBar();
    prevBtn.style.display = index === 0 ? 'none' : 'inline-block';
    nextBtn.style.display = index === questions.length - 1 ? 'none' : 'inline-block';
    submitBtn.style.display = index === questions.length - 1 ? 'inline-block' : 'none';
}

nextBtn.addEventListener('click', () => {
    if (currentQuestion < questions.length - 1) {
        currentQuestion++;
        showQuestion(currentQuestion);
    }
});

prevBtn.addEventListener('click', () => {
    if (currentQuestion > 0) {
        currentQuestion--;
        showQuestion(currentQuestion);
    }
});

// Form submission
document.getElementById('quiz-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent default form submission
    clearInterval(timer); // Stop the timer
    this.submit(); // Submit the form
});

// Initialize
showQuestion(currentQuestion);
</script>