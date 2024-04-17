<?php
// Include database connection code or use your preferred method

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $article_id = $_POST["article_id"];
    $new_title = $_POST["title"];
    $new_content = $_POST["content"];

    // Perform database update here
    // Example using PDO:
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=your_database", "username", "password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "UPDATE articles SET title = :title, content = :content WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(":title" => $new_title, ":content" => $new_content, ":id" => $article_id));

        // Redirect to view article page after updating
        header("Location: view_article.php?id=" . $article_id);
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
