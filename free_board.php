<?php
include 'php/db_connect.php'; // db_connect.php 파일 경로 확인

error_reporting(E_ALL);
ini_set('display_errors', 1);

$sql = "SELECT b.board_id, b.board_name, b.board_content, i.image_name 
        FROM board b 
        LEFT JOIN image i ON b.board_id = i.board_id 
        WHERE b.boardkind_id = '2' 
        AND b.board_name != '' 
        AND b.board_content != ''
        ORDER BY b.board_id DESC";

$result = $conn->query($sql);

// 데이터베이스 쿼리 오류 확인
if (!$result) {
    die("쿼리 오류: " . $conn->error);
}

// 게시글 배열 생성
$posts = array();
while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
}

// 데이터 확인
// var_dump($posts); // 디버깅 용도

$conn->close();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자유 게시판</title>
    <link rel="stylesheet" href="style.css">
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
        <h1>자유 게시판</h1>
        <button id="write-post-btn">글쓰기</button>
        <div class="post-grid" id="free-board">
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="post-item">
                        <h2>
                            <a href="post_detail.php?id=<?php echo htmlspecialchars($post['board_id']); ?>">
                                <?php echo htmlspecialchars($post['board_name']); ?>
                            </a>
                        </h2>
                        <p><?php echo nl2br(htmlspecialchars($post['board_content'])); ?></p>
                        <?php if (!empty($post['image_name'])): ?>
                            <img src="/club_website-main/image/<?php echo htmlspecialchars($post['image_name']); ?>" alt="게시글 이미지" class="post-image">
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>현재 등록된 게시글이 없습니다.</p>
            <?php endif; ?>
        </div>
        <div id="pagination">
            <!-- 페이지네이션 (여기서는 페이지네이션을 구현하지 않았습니다) -->
        </div>
    </main>

    <script src="js/app.js"></script>
</body>
</html>
