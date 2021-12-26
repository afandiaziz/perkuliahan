<?php
include 'includes/header.php';
?>

<div class="page-content page-home pb-5 mb-5">
    <section class="section-arana-header">
        <div class="row">
            <div class="col-12">
                <?= $config['maps'] ?>
            </div>
        </div>
        <div class="container pt-5 mt-4">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 mb-4">
                    <h1 class="text-primary font-weight-bolder">
                        Contact Us
                    </h1>
                </div>
                <div class="col-12" data-aos="zoom-in">
                    <div class="d-flex">
                        <div class="mr-4">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <?= $config['address'] ?>
                        </div>
                    </div>
                    <div class="d-flex mt-4">
                        <?php if ($config['email']) : ?>
                            <div class="mr-3">
                                <a href="mailto:<?= $config['email'] ?>" target="_blank" class="btn btn-danger text-white border"><i class="fas fa-envelope mr-2"></i> <?= $config['email'] ?></a>
                            </div>
                        <?php endif ?>
                        <?php if ($config['wa']) : ?>
                            <div class="mr-3">
                                <a href="https://wa.me/<?= $config['wa'] ?>" target="_blank" style="background-color: #128C7E;" class="btn text-white border"><i class="fab fa-whatsapp mr-2"></i> <?= $config['wa'] ?></a>
                            </div>
                        <?php endif ?>
                        <?php if ($config['ig']) : ?>
                            <div class="mr-3">
                                <a href="<?= $config['ig'] ?>" target="_blank" style="background-color: #C13584;" class="btn text-white border"><i class="fab fa-instagram mr-2"></i> Instagram</a>
                            </div>
                        <?php endif ?>
                        <?php if ($config['fb']) : ?>
                            <div class="mr-3">
                                <a href="<?= $config['fb'] ?>" target="_blank" style="background-color: #4267B2;" class="btn text-white border"><i class="fab fa-facebook mr-2"></i> Facebook</a>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>