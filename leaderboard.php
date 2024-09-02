<?php
session_start();
require_once 'db.php';

// Fetch top 10 highest scores, ensuring each user appears only once
try {
    $stmt = $pdo->prepare("
        SELECT u.username, MAX(q.score) as max_score, q.date_taken 
        FROM quiz_results q 
        JOIN users u ON q.user_id = u.id 
        GROUP BY u.id 
        ORDER BY max_score DESC, q.date_taken ASC 
        LIMIT 10
    ");
    $stmt->execute();
    $leaderboard = $stmt->fetchAll();

    // Debugging: Check if the query returned any results
    if (!$leaderboard) {
        echo "No results found.";
        $leaderboard = [];
    }
} catch (PDOException $e) {
    // Debugging: Display the error message
    echo "Error: " . $e->getMessage();
    $leaderboard = [];
}

include 'templates/header.php';
?>

<div class="container">
    <h1 class="page-title">Leaderboard</h1>
    <div class="leaderboard-content">
        <table>
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Username</th>
                    <th>Highest Score</th>
                    <th>Date Taken</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($leaderboard as $rank => $entry): ?>
                <tr>
                    <td><?php echo $rank + 1; ?></td>
                    <td><?php echo htmlspecialchars($entry['username']); ?></td>
                    <td><?php echo $entry['max_score']; ?></td>
                    <td><?php echo $entry['date_taken']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
