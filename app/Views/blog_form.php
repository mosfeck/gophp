<form action="<?php echo site_url('admin/blog/new'); ?>" method="post">
    <div class="form-group">
        <label for="">Title</label>
        <input type="text" name="title">
    </div>
    <div class="form-group">
        <label for="">Content</label>
        <textarea name="content" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="create">
    </div>
</form>