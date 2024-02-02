<?php $this->extend('./layouts/app.php'); ?>
<?php $this->section('content'); ?>
<div class="section search-result-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">Category: <?= ucfirst($name) ?></div>
            </div>
        </div>
        <div class="row posts-entry">
            <div class="col-lg-8">
                <?php foreach ($postCategory as $post) : ?>
                    <div class="blog-entry d-flex blog-entry-search-item">
                        <a href="<?= base_url('/posts/single/' .$post['id']. '') ?>" class="img-link me-4">
                            <img src="<?= base_url('public/assets/images/' . $post['image'] . '') ?>" alt="Image" class="img-fluid">
                        </a>
                        <div>
                            <span class="date"><?= date('M. jS, Y', strtotime($post['created_at'])) ?> &bullet; <a href="#"><?= ucfirst($name) ?></a></span>
                            <h2><a href="<?= base_url('/posts/single/' .$post['id']. '') ?>"><?= $post['title'] ?></a></h2>
                            <p><?= substr($post['body'], 0, 80) ?></p>
                            <p><a href="<?= base_url('/posts/single/' .$post['id']. '') ?>" class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

            <div class="col-lg-4 sidebar">


                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            <?php foreach($popularPosts as $popularPost) : ?>
                            <li>
                                <a href="<?= base_url('posts/single/'.$popularPost['id'].'') ?>">
                                    <img src="<?= base_url('public/assets/images/' . $popularPost['image'] . '') ?>" alt="Image placeholder" class="me-4 rounded">
                                    <div class="text">
                                        <h4><?= $popularPost['title'] ?></h4>
                                        <div class="post-meta">
                                            <span class="mr-2"><?= date('M. jS, Y', strtotime($popularPost['created_at'])) ?> </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        <?php foreach($categories as $category) : ?>
                        <li><a href="<?= base_url('posts/category/' .$category['category']. '') ?>"><?= ucfirst($category['category']) ?> <span>(<?=$category['count'] ?>)</span></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <!-- END sidebar-box -->




            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>