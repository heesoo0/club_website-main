<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자유 게시글 작성</title>
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
        <h1>자유 게시글 작성</h1>
        <form action="php/upload_free_post.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="제목을 입력하세요" required>
            <textarea name="content" placeholder="내용을 입력하세요" required></textarea>
            <input type="file" name="images[]" multiple>
            <button type="submit">업로드</button>
        </form>
    </main>
</body>
</html>
