<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('template/header'); ?>
    <title>Text Editor Form</title>
    <!-- Load TinyMCE script -->
    <script src="https://cdn.tiny.cloud/1/eipbur2dhzgxc3t1euofniyzjfabcy0ilp8yo0xorz6bkz5l/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'lists link image preview',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        });
    </script>
</head>
<body class="sb-nav-fixed">
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
    <?php $this->load->view('template/topnav'); ?>
    <div id="layoutSidenav">
        <?php $this->load->view('template/sidenav'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- Begin Editor Form Content -->
                    <?php echo form_open('editor/save_content'); ?>
                    <div class="card mt-4">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title"><i class="bi bi-pencil-square"></i> Custom Terms and Conditions  </h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <!-- <label for="content"><i class="bi bi-file-earmark-text"></i> Content</label> -->
                                <textarea name="content" id="content" rows="10" class="form-control"><?php echo set_value('content'); ?></textarea>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            
                            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Save</button>
                            
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                    <!-- End Editor Form Content -->

                    <!-- Begin Card with Table Content -->
                    <div class="card mt-5">
                        <div class="card-header bg-info text-white">
                            <h4 class="card-title"><i class="bi bi-list"></i> Saved Terms and Conditions List</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-strip">
                                <thead>
                                    <tr>
                                        <th>SL#</th>
                                        <th>Content</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($contents)): ?>
                                        <?php foreach ($contents as $key => $content): ?>
                                            <tr>
                                                <td><?php echo ($key+1); ?></td>
                                                <td><?php echo word_limiter(strip_tags($content->content), 100); ?></td>
                                                <td><?php echo $content->created_at; ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('editor/delete/' . $content->id); ?>" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center">No content found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End Card with Table Content -->

                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <?php $this->load->view('template/footer'); ?>
            </footer>
        </div>
    </div>
    <?php $this->load->view('template/SiteScript'); ?>
</body>
</html>
