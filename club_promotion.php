<?php
include 'php/db_connect.php'; // db_connect.php 파일 경로 확인

error_reporting(E_ALL);
ini_set('display_errors', 1);

// 검색어 가져오기
$search_query = isset($_GET['search']) ? $_GET['search'] : '';

// SQL 쿼리 준비
$sql = "SELECT b.board_id, b.board_name, b.board_content, i.image_name 
        FROM board b 
        LEFT JOIN image i ON b.board_id = i.board_id 
        WHERE b.boardkind_id = '1' 
        AND b.board_name != '' 
        AND b.board_content != ''";

if (!empty($search_query)) {
    $search_query_escaped = $conn->real_escape_string($search_query);
    $sql .= " AND (b.board_name LIKE ? OR b.board_content LIKE ?)";
}

$sql .= " ORDER BY b.board_id DESC";

// SQL 쿼리 실행
$stmt = $conn->prepare($sql);

if (!empty($search_query)) {
    $search_query_param = '%' . $search_query_escaped . '%';
    $stmt->bind_param('ss', $search_query_param, $search_query_param);
}

$stmt->execute();
$result = $stmt->get_result();

// 게시글 배열 생성
$posts = array();
while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>동아리 홍보 게시글</title>
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
            <li><a href="club_apply.php">동아리 정보 안내</a>
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
        <h1>동아리 홍보 게시글</h1>
        <form method="GET" action="">
            <input type="text" name="search" placeholder="검색어를 입력하세요" value="<?php echo htmlspecialchars($search_query); ?>">
            <button type="submit">검색</button>
        </form>
        <button id="post-btn">동아리 모집 공고 올리기</button>

        <div class="post-grid">
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
                            <img src="image/<?php echo htmlspecialchars($post['image_name']); ?>" alt="이미지" class="post-image">
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>현재 등록된 게시글이 없습니다.</p>
            <?php endif; ?>
        </div>
    </main>

    <script src="js/app.js"></script>
</body>
</html>
