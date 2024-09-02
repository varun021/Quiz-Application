<section class="categories">
    <div class="container">
        <h1 class="page-title">Quiz Categories</h1>
        <input type="text" id="categorySearch" placeholder="Search categories..." onkeyup="filterCategories()">
        <div class="category-grid" id="categoryGrid">
            <?php foreach ($categories as $category): ?>
                <div class="category-item">
                    <a href="quiz.php?category=<?php echo urlencode($category['id']); ?>" class="category-link">
                        <div class="category-box">
                            <h2><?php echo html_entity_decode($category['name']); ?></h2>
                            <div class="difficulty-buttons">
                                <a href="quiz.php?category=<?php echo urlencode($category['id']); ?>&difficulty=easy" class="difficulty-button">Easy</a>
                                <a href="quiz.php?category=<?php echo urlencode($category['id']); ?>&difficulty=medium" class="difficulty-button">Medium</a>
                                <a href="quiz.php?category=<?php echo urlencode($category['id']); ?>&difficulty=hard" class="difficulty-button">Hard</a>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
function filterCategories() {
    var input, filter, grid, items, h2, i, txtValue;
    input = document.getElementById("categorySearch");
    filter = input.value.toUpperCase();
    grid = document.getElementById("categoryGrid");
    items = grid.getElementsByClassName("category-item");

    for (i = 0; i < items.length; i++) {
        h2 = items[i].getElementsByTagName("h2")[0];
        txtValue = h2.textContent || h2.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            items[i].style.display = "";
        } else {
            items[i].style.display = "none";
        }
    }
}
</script>