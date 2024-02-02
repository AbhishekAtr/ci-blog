<?php $this->extend('./layouts/app.php'); ?>
<?php $this->section('content'); ?>
<div class="container">
    <div class="comment-form-wrap pt-5">
        <?php if (session()->has('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->has('error')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session('error') ?>
            </div>
        <?php endif; ?>
        <h3 class="mb-5">Create a New Post</h3>
        <form action="<?= url_to('store.post') ?>" method="POST" class="p-5 bg-light" enctype="multipart/form-data">

            <div class="form-group">
                <label for="title">Title</label>

                <input type="text" placeholder="title" name="title" class="form-control" id="website">
            </div>
            <div class="form-group">

                <select name="category" class="form-select" aria-label="Default select example">
                    <option selected>Select Categories...</option>
                    <?php foreach ($categories as $item) : ?>
                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                    <?php endforeach; ?>

                </select>
            </div>

            <div class="form-group">
                <label for="title">Image</label>

                <input type="file" name="image" class="form-control" id="website">
            </div>

            <div class="form-group">
                <label for="message">Description</label>
                <textarea placeholder="Description" name="description" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Create Post" class="btn btn-primary">
            </div>

        </form>
    </div>
</div>
<?php $this->endsection() ?>