<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Content</title>
</head>
<body>
    <div class="container">
        <h2>Content Details</h2>
        <div class="content">
            <?php echo $content->content; ?>
        </div>
        <a href="<?php echo site_url('editor/view_all'); ?>">Back to List</a>
    </div>
</body>
</html>
