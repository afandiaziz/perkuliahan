<?php
include 'includes/header.php';
$sliders = fetchData($connection, 'SELECT * FROM sliders');
$projects = fetchData($connection, 'SELECT * FROM projects');
?>

<div class="page-content page-home">
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
                    <?php $index++;
                    endforeach; ?>
                </div>

            </div>
        </section>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>