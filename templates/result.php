<section class="result">
    <div class="container">
    <h1 class="page-title">Quiz Result</h1>
    <p class="result-text">You scored <?php echo $score; ?> out of <?php echo $total_questions; ?>.</p>
    <h2>Questions and Answers</h2>
    <?php foreach ($quiz_data as $index => $question): ?>
        <div class="question-result">
            <p><strong>Question:</strong> <?php echo html_entity_decode($question['question']); ?></p>
            <p><strong>Your Answer:</strong> <?php echo html_entity_decode($user_answers[$index] ?? 'Not answered'); ?></p>
            <p><strong>Correct Answer:</strong> <?php echo html_entity_decode($question['correct_answer']); ?></p>
        </div>
    <?php endforeach; ?>
    <a href="quiz.php" class="btn btn-primary">Take Another Quiz</a>
    <a href="index.php" class="btn btn-primary">Home</a>
    </div>
</section>