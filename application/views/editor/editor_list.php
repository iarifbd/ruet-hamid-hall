<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content List</title>
</head>
<body>
    <div class="container">
        <h2>Saved Contents</h2>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($contents)): ?>
                    <?php foreach ($contents as $content): ?>
                        <tr>
                            <td><?php echo $content->id; ?></td>
                            <td><?php echo word_limiter(strip_tags($content->content), 100); ?></td>
                            <td><?php echo $content->created_at; ?></td>
                            <td>
                                <a href="<?php echo site_url('editor/view/' . $content->id); ?>">View</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No content found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
