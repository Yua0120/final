<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    <a href="index.php">トップページへ</a>
    <form action="write_output.php" method="POST" class="write-area">
        <input type="text" name="title" id="title" placeholder="タイトル">
        <textarea name="body_text" id="body_text" cols="30" rows="50" placeholder="今日あったこと"></textarea>
        <label for="emotion">今日の気分</label>
        <select id="emotion" name="emotion">
            <option value="#aacf53">穏やか</option>
            <option value="#e9546b">喜び</option>
            <option value="#f08300">楽しみ</option>
            <option value="#f2797b">ときめき</option>
            <option value="#19448e">悲しみ</option>
            <option value="#c9171e">怒り</option>
            <option value="#9ea1a3">虚無</option>
            <option value="#4d4398">憂鬱</option>
        </select>
        <input type="submit" value="編集完了" class="written">
    </form>
</body>
<div class="post-fail">
    <?php
    // $_GET['flag']がセットされているか確認
    if (isset($_GET['flag']) && $_GET['flag'] == 'fail') {
        echo '<p class="error">コーディネートの投稿に失敗しました。もう一度入力してください。</p>';
    } else if (isset($_GET['flag']) && $_GET['flag'] == 'none') {
        echo '<p class="error">セッションが無効です。ログインしなおしてください。</p>';
    }
    ?>
</div>
</html>