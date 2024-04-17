<!DOCTYPE html>
<html>
<head>
    <title>View Article</title>
</head>
<body>
    <?php
    include_once 'db.php'; // Include your database connection code
    if (isset($_GET["id"])) {
        $article_id = $_GET["id"];
        
        // Retrieve article data based on $article_id from the database
        // Modify this query to match your table structure
        $query = "SELECT * FROM articles WHERE id = :article_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':article_id', $article_id, PDO::PARAM_INT);
        $stmt->execute();
        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($article) {
            $article_title = $article["title"];
            $article_author = $article["author"];
            $article_content = $article["content"];

            echo "<h1>$article_title</h1>";
            echo "<p>Author: $article_author</p>";
            echo "<p>$article_content</p>";

            echo '<a href="edit_article.php?id=' . $article_id . '">Edit Article</a>';
        } else {
            echo "Article not found.";
        }
    } else {
        echo "Invalid article ID.";
    }
    ?>
</body>
</html>
