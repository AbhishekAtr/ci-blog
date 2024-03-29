<?php $this->extend('layouts/app.php'); ?>
<?php $this->section('content'); ?>

<!-- Start retroy layout blog posts -->
<section class="section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout">
            <div class="col-md-4">
                <?php foreach ($data as $post) : ?>
                    <a href="<?= base_url('/posts/single/' .$post->id. '') ?>" class="h-entry mb-30 v-height gradient">

                        <div class="featured-img" style="background-image: url('<?= base_url('public/assets/images/' . $post->image . '') ?>');"></div>

                        <div class="text">
                            <span class="date"><?= $post->created_at ?></span>
                            <h2><?= $post->title ?></h2>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
            <div class="col-md-4">
                <?php foreach ($dataOnePosts as $post) : ?>
                    <a href="<?= base_url('/posts/single/' .$post->id. '') ?>" class="h-entry img-5 h-100 gradient">

                        <div class="featured-img" style="background-image: url('<?= base_url('public/assets/images/' . $post->image . '') ?>');"></div>

                        <div class="text">
                            <span class="date"><?= $post->created_at ?></span>
                            <h2><?= $post->title ?></h2>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
            <div class="col-md-4">
                <?php foreach ($dataTwoPosts as $post) : ?>
                    <a href="<?= base_url('/posts/single/' .$post->id. '') ?>" class="h-entry mb-30 v-height gradient">

                        <div class="featured-img" style="background-image: url('<?= base_url('public/assets/images/' . $post->image . '') ?>');"></div>

                        <div class="text">
                            <span class="date"><?= $post->created_at ?></span>
                            <h2><?= $post->title ?></h2>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<!-- End retroy layout blog posts -->

<!-- Start posts-entry -->
<section class="section posts-entry">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Business</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
        </div>
        <div class="row g-3">
            <div class="col-md-9">
                <div class="row g-3">
                    <?php foreach ($businessPosts as $businessPost) : ?>
                        <div class="col-md-6">
                            <div class="blog-entry">
                                <a href="<?= base_url('/posts/single/' .$businessPost->id. '') ?>" class="img-link">
                                    <img src="<?= base_url('public/assets/images/' . $businessPost->image . '') ?>" alt="Image" class="img-fluid">
                                </a>
                                <span class="date"><?= $businessPost->created_at ?></span>
                                <h2><a href="<?= base_url('/posts/single/' .$businessPost->id. '') ?>"><?= $businessPost->title ?></a></h2>
                                <p><?= substr($businessPost->body, 0, 50) ?></p>
                                <p><a href="<?= base_url('/posts/single/' .$businessPost->id. '') ?>" class="btn btn-sm btn-outline-primary">Read More</a></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="col-md-3">
                <ul class="list-unstyled blog-entry-sm">
                    <?php foreach ($businessThreePosts as $businessPost) : ?>
                        <li>
                            <span class="date"><?= $businessPost->created_at ?></span>
                            <h3><a href="<?= base_url('/posts/single/' .$businessPost->id. '') ?>"><?= $businessPost->title ?></a></h3>
                            <p><?= substr($businessPost->body, 0, 50) ?></p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End posts-entry -->

<!-- Start posts-entry -->
<section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
        <div class="row">
            <?php foreach ($businessFourPosts as $post) : ?>
                <div class="col-md-6 col-lg-3">
                    <div class="blog-entry">
                        <a href="<?= base_url('/posts/single/' .$post->id. '') ?>" class="img-link">
                            <img src="<?= base_url('public/assets/images/' . $post->image . '') ?>" alt="Image" class="img-fluid">
                        </a>
                        <span class="date"><?= $post->created_at ?></span>
                        <h3><a href="<?= base_url('/posts/single/' .$post->id. '') ?>"><?= $post->title ?></a></h3>
                        <p><?= substr($post->body, 0, 50) ?></p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<!-- End posts-entry -->

<!-- Start posts-entry -->
<section class="section posts-entry">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Culture</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
        </div>
        <div class="row g-3">
            <div class="col-md-9 order-md-2">
                <div class="row g-3">
                    <?php foreach($culturePosts as $post) : ?>
                    <div class="col-md-6">
                        <div class="blog-entry">
                            <a href="<?= base_url('/posts/single/' .$post->id. '') ?>" class="img-link">
                                <img src="<?= base_url('public/assets/images/' . $post->image . '') ?>" alt="Image" class="img-fluid">
                            </a>
                            <span class="date"><?= $post->created_at ?></span>
                            <h2><a href="<?= base_url('/posts/single/' .$post->id. '') ?>"><?= $post->title ?></a></h2>
                            <p><?= substr($post->body, 0, 50) ?></p>
                            <p><a href="<?= base_url('/posts/single/' .$post->id. '') ?>" class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">

        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Politics</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_7_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">


                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_2_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">


                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_2.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_5_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">


                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_3.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_4_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">


                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_4.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_3_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">


                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_5.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_2_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">


                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_4.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_1_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">


                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_3.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_4_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">



                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_2.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="single.html" class="img-link"><img src="images/img_3_horizontal.jpg" alt="Image" class="img-fluid"></a>
                    <div class="excerpt">



                        <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_5.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                            <span>&nbsp;-&nbsp; July 19, 2019</span>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                        <p><a href="#" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<div class="section bg-light">
    <div class="container">

        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Travel</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
        </div>

        <div class="row align-items-stretch retro-layout-alt">

            <div class="col-md-5 order-md-2">
                <a href="single.html" class="hentry img-1 h-100 gradient">
                    <div class="featured-img" style="background-image: url('images/img_2_vertical.jpg');"></div>
                    <div class="text">
                        <span>February 12, 2019</span>
                        <h2>Meta unveils fees on metaverse sales</h2>
                    </div>
                </a>
            </div>

            <div class="col-md-7">

                <a href="single.html" class="hentry img-2 v-height mb30 gradient">
                    <div class="featured-img" style="background-image: url('images/img_1_horizontal.jpg');"></div>
                    <div class="text text-sm">
                        <span>February 12, 2019</span>
                        <h2>AI can now kill those annoying cookie pop-ups</h2>
                    </div>
                </a>

                <div class="two-col d-block d-md-flex justify-content-between">
                    <a href="single.html" class="hentry v-height img-2 gradient">
                        <div class="featured-img" style="background-image: url('images/img_2_sq.jpg');"></div>
                        <div class="text text-sm">
                            <span>February 12, 2019</span>
                            <h2>Don’t assume your user data in the cloud is safe</h2>
                        </div>
                    </a>
                    <a href="single.html" class="hentry v-height img-2 ms-auto float-end gradient">
                        <div class="featured-img" style="background-image: url('images/img_3_sq.jpg');"></div>
                        <div class="text text-sm">
                            <span>February 12, 2019</span>
                            <h2>Startup vs corporate: What job suits you best?</h2>
                        </div>
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

<?php $this->endsection(); ?>