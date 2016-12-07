<!-- Portfolio Grid Section -->
<section id="portfolio">

    <h2><?= $token ?></h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Inndot</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 portfolio-item">
                <a href="<?= base_url() ?>app/one" class="portfolio-link">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-play fa-3x"> Iniciar</i>
                        </div>
                    </div>
                    <img src="<?= base_url() ?>assets/img/portfolio/cabin.png" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="<?= base_url() ?>app/manual" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-book fa-3x"> Manual</i>
                        </div>
                    </div>
                    <img src="<?= base_url() ?>assets/img/portfolio/cake.png" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-sm-4 portfolio-item">
                <a href="<?= base_url() ?>app/next" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-terminal fa-3x"> Watson</i>
                        </div>
                    </div>
                    <img src="<?= base_url() ?>assets/img/portfolio/circus.png" class="img-responsive" alt="">
                </a>
            </div>
        </div>
    </div>
</section>