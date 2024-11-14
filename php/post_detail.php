<?php
include 'db_connect.php';

// URL에서 게시글 ID 가져오기
$post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 게시글 내용 가져오기
$sql = "SELECT board_name, board_content FROM board WHERE board_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $post_id);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 상세보기</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php">
                <img src="../school_logo.png" alt="학교 로고">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="club_apply.php">동아리 정보 안내</a></li>
                <li><a href="../php/upload_post.php">동아리 홍보 게시글</a></li>
                <li><a href="free_board.php">자유 게시판</a></li>
            </ul>
        </nav>
    </header>
    <div class="sidebar">
        <ul>
            <li><a href="#">동아리 정보 안내</a>
                <ul>
                    <li><a href="club_apply.php">동아리 신청방법</a></li>
                    <li><a href="club_tips.php">동아리 팁</a></li>
                </ul>
            </li>
            <li><a href="../php/upload_post.php">동아리 홍보 게시글</a></li>
            <li><a href="free_board.php">자유 게시판</a></li>
        </ul>
    </div>
    <main>
        <h1 id="post-title"><?php echo htmlspecialchars($post['board_name']); ?></h1>
        <div id="post-content">
            <?php echo nl2br(htmlspecialchars($post['board_content'])); ?>
        </div>
        <h2>댓글</h2>
        <div id="comment-section">
            <!-- 댓글이 여기에 로드됨 -->
        </div>
        <textarea id="comment-input" placeholder="댓글을 작성하세요"></textarea>
        <button id="submit-comment">댓글 작성</button>
    </main>

    <script src="js/app.js"></script>
</body>
</html>
