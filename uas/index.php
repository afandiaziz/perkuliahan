<?php
include 'includes/header.php';
$sliders = fetchData($connection, 'SELECT * FROM sliders');
$projects = fetchData($connection, 'SELECT * FROM projects');
?>

<div class="page-content page-home">
    <section class="section-arana-header">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12 col-lg-4" data-aos="zoom-in">
                    <h1 class="title-header"><?= $config['header_title'] ?></h1>
                    <p class="description-header"><?= $config['header_desc'] ?> </p>
                    <div class="btn-toolbar">
                        <a href="https://wa.me/+6281299366151" target="_blank" rel="noreferrer noopener" class="btn btn-warning d-lg-block px-3 text-white mr-xl-4">
                            Build Your Project Now
                        </a>
                        <a href="our-projects.php" class="btn btn-outline-light d-lg-block text-primary mr-auto">
                            Our Projects
                        </a>
                    </div>
                </div>
                <?php if ($sliders) : ?>
                    <div class="col-md-12 col-lg-8" data-aos="zoom-in">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php $index = 0;
                                foreach ($sliders as $item) : ?>
                                    <div class="carousel-item <?= ($index == 0 ? 'active' : null) ?>">
                                        <img class="d-block w-75 mx-auto" src="images/<?= $item['image'] ?>" />
                                    </div>
                                <?php $index++;
                                endforeach; ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php if ($projects) : ?>
        <section class="bg-different py-5 mt-4">
            <div class="container py-4">
                <div class="row">
                    <div class="col-12 mb-4">
                        <h1 class="text-primary font-weight-bolder text-center">
                            Our Projects
                        </h1>
                        <p class="text-center">Some projects we have created</p>
                    </div>
                    <?php $index = 0;
                    foreach ($projects as $item) : ?>
                        <?php if ($index < 4) : ?>
                            <div class="col-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="100">
                                <a href="#" class="component-products d-block p-3">
                                    <div class="products-thumbnail">
                                        <div class="products-image" style="background-image: url('images/<?= $item['image'] ?>')"></div>
                                    </div>
                                    <h3 class="font-weight-bold text-dark mt-3"><?= $item['title'] ?></h3>
                                    <p class="text-dark">
                                        <?= $item['description'] ?>
                                    </p>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php $index++;
                    endforeach; ?>
                    <div class="col-12 text-center" data-aos="fade-in">
                        <a href="our-projects.php" class="btn btn-warning px-3 text-white mr-xl-4">
                            More Projects &nbsp;<i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>
        </section>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>