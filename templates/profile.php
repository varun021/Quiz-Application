<div class="container">
    <h1 class="page-title">User Profile</h1>
    <div class="profile-content">
        <div class="user-info">
            <h2>User Information</h2>
            <p><strong>Username:</strong> <?php echo html_entity_decode($user['username']); ?></p>
            <p><strong>Email:</strong> <?php echo html_entity_decode($user['email']); ?></p>
        </div>
        <div class="user-progress">
            <h2>Quiz Progress</h2>
            <canvas id="progressChart"></canvas>
        </div>
    </div>
    <div class="quiz-history">
        <h2>Quiz History</h2>
        
        <table>
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Score</th>
                    <th>Total Questions</th>
                    <th>Date Taken</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quiz_results as $result): ?>
                <tr>
                    <td><?php echo html_entity_decode($result['category']); ?></td>
                    <td><?php echo $result['score']; ?></td>
                    <td><?php echo $result['total_questions']; ?></td>
                    <td><?php echo $result['date_taken']; ?></td>
                    <td>
                        <form method="POST" action="delete_quiz.php" onsubmit="return confirm('Are you sure you want to delete this quiz?');">
                            <input type="hidden" name="quiz_id" value="<?php echo $result['id']; ?>">
                            <button type="submit" class="btn-remove">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('progressChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode(array_column(array_reverse($quiz_results), 'date_taken')); ?>,
            datasets: [{
                label: 'Quiz Score',
                data: <?php echo json_encode(array_column(array_reverse($quiz_results), 'score')); ?>,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 10
                }
            }
        }
    });
</script>
