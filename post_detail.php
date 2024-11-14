<?php
include 'php/db_connect.php'; // DB 연결 코드

// 쿼리스트링으로 전달된 id를 받음
$post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// post_id가 존재할 때만 쿼리 실행
if ($post_id > 0) {
    // 게시글 정보를 가져오는 SQL 쿼리
    $sql = "SELECT b.board_name, b.board_content, i.image_name 
            FROM board b 
            LEFT JOIN image i ON b.board_id = i.board_id 
            WHERE b.board_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $post_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // 게시글 데이터가 있으면 가져오기
    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    } else {
        echo "해당 게시글을 찾을 수 없습니다.";
        exit;
    }

    // 댓글 정보를 가져오는 SQL 쿼리
    $comment_sql = "SELECT comment_id, comment_content 
                    FROM comment_1 
                    WHERE board_id = ?";
    $comment_stmt = $conn->prepare($comment_sql);
    $comment_stmt->bind_param('i', $post_id);
    $comment_stmt->execute();
    $comments_result = $comment_stmt->get_result();
} else {
    echo "유효하지 않은 접근입니다.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 상세보기</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* 이미지와 게시글 내용 사이에 간격 추가 */
        .post-image {
            margin-top: 15px; /* 간격을 원하는 크기만큼 설정 */
        }
        .comment {
            margin-top: 10px;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php">
                <img src="school_logo.png" alt="학교 로고">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="club_apply.php">동아리 정보 안내</a></li>
                <li><a href="club_promotion.php">동아리 홍보 게시글</a></li>
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
            <li><a href="club_promotion.php">동아리 홍보 게시글</a></li>
            <li><a href="free_board.php">자유 게시판</a></li>
        </ul>
    </div>
    <main>
        <!-- 게시글 제목 출력 -->
        <h1 id="post-title"><?php echo htmlspecialchars($post['board_name']); ?></h1>
        
        <!-- 게시글 내용 출력 -->
        <div id="post-content">
            <?php echo nl2br(htmlspecialchars($post['board_content'])); ?>
        </div>

        <!-- 이미지 출력 -->
        <?php if (!empty($post['image_name'])): ?>
            <div>
                <img src="image/<?php echo htmlspecialchars($post['image_name']); ?>" alt="게시글 이미지" class="post-image">
            </div>
        <?php endif; ?>
        
        <h2>댓글</h2>

        <!-- 댓글 작성 폼 -->
        <form method="POST" action="php/comment_server.php">
            <textarea name="comment" id="comment-input" placeholder="댓글을 작성하세요"></textarea>
            <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($post_id); ?>">
            <button type="submit" id="submit-comment">댓글 작성</button>
        </form>

        <!-- 댓글 출력 -->
        <div id="comment-section">
            <?php while ($comment = $comments_result->fetch_assoc()): ?>
                <div class="comment">
                    <?php echo nl2br(htmlspecialchars($comment['comment_content'])); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
    <script src="js/app.js"></script>
</body>
</html>
