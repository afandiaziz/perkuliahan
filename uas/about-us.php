<?php
include 'includes/header.php';
$data = getData($connection, 'about');
?>

<div class="page-content page-home pb-5 mb-5">
    <section class="section-arana-header">
        <div class="container pt-5 mt-4">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 mb-4">
                    <h1 class="text-primary font-weight-bolder">
                        About Us
                    </h1>
                </div>
                <div class="col-12" data-aos="zoom-in">
                    <?= $data['content'] ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>