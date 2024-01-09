<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="write_output.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" id="title" placeholder="タイトル">
        <textarea name="body_text" id="" cols="70" rows="100" placeholder="今日あったこと"></textarea>
        <label id="upload-wrapper" for="upload">
            <!--acceptで画像ファイルのみ投稿可能と指定 -->
            <p onclick="fileUpload()"></p>
            <input type="file" name="image_path" onchange="previewFile(this);" id="image_path" accept="image/*">
        </label>
        <img id="preview">
    </form>
</body>
</html>