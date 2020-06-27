
<?php ob_start();?>
<!--Presentation Section -->
<section class="container-fluid homepage-firstSection">
    <div class="container">
        <div class="container homepage-inner-section-1 ">
        </div>
        <div class="row homepage-inner-section-2 ">
            <h1 class= "homepage-main-title ml-5 ml-md-0" >Jean Forteroche</h1>
            <p>ACTEUR & ÉCRIVAIN</p>
        </div>
        <div class="row justify-content-center align-items-center w-responsive pt-3 m-auto homepage-inner-section-3 ">
            <!--<div class="row justify-content-between homepage-inner-section-3 w-responsive pt-5">-->
            <a class="px-2" title="" target="_blank" href="#"> 
                <img src="public/img/partner/partner-01.png" alt=""> 
            </a>
            <a class="px-2" title="" target="_blank" href="#"> 
                <img src="public/img/partner/partner-02.png" alt=""> 
            </a>
            <a class="px-2" title="" target="_blank" href="#"> 
                <img src="public/img/partner/partner-03.png" alt=""> 
            </a>
            <a class="px-2" title="" target="_blank" href="#"> 
                <img src="public/img/partner/partner-04.png" alt=""> 
            </a>
        </div>
        <div class="container p-lg-5 text-left">
            <p class="pl-2 secondary-text-color">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus tenetur quod beatae dolore fugit voluptas nemo laboriosam amet ipsa excepturi quae quam incidunt officia illum, aspernatur nihil porro sequi dignissimos.
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus magnam tempore expedita non nemo ea assumenda eligendi doloremque debitis dolorum. Repellat saepe impedit nulla laudantium excepturi ad quasi similique reiciendis.
            </p>
        </div>
    </div>
    <div id="about-us" class="row px-md-5 m-auto ">
        <div class="col-md-12 pb-5">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-4 ">
                    <div class="card">
                        <div class="card-body py-0">
                            <h4 class="accent-color"> QUI SUIS-JE ?</h4>
                            <h1 class="my-5">Jean Forteroche</h1>
                            <p class="secondary-text-color mb-0">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero ipsam cupiditate laudantium adipisci minima, velit sapiente, provident delectus odio soluta quod error labore nam odit. Cum aut et neque ea.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 p-0 my-3">
                    <div class="card text-center">
                        <div class="card-body p-0">
                            <img class="author-img" src="public/img/single-image-11.jpg" alt="single-image-11" title="single-image-11">
                        </div>
                    </div>
                </div> 
                <div class="col-12 col-lg-4 ">
                    <div class="card">
                        <div class="card-body signature ">
                            <p class="font-italic text-center gold-color" style="line-height: 2;">” Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero ipsam cupiditate laudantium adipisci minima, velit sapiente”</p>
                            <p class="text-center mb-0"><img src="public/img/single-image-12-300x203.png" alt="" width="106" height="72"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END Presentation Section -->
<!--Book Section -->
<section id="chapitres" class="container-fluid homepage-secondSection px-0">
    <div class="container py-0">
        <div class="container text-center col-12 col-lg-6 py-5 seconSection-heading ">
            <h3 class="ss-secondary-heading mb-3 accent-color">MON LIVRE</h3>
            <h1 class="ss-main-heading mt-3">Billet simple pour l'Alaska </h1>
        </div>
    </div>
    <div class="row col-12 m-auto article-text-color align-items-start">
        <div class="col-lg-3  p-0 pb-3 pt-lg-3 pb-lg-0 pr-lg-5">
            <img src="public/img/Billet-Simple-Pour-Alaska.png" alt="book">
        </div>
        <article class="row m-0 p-0 col-lg-9 ">
            <!---->
            <?php $posts->showAllPosts()?>
            <div class="col-lg-12 pt-5">
                <p class="text-center m-0">
                    <a class="btn" href="?view=front&action=posts">Voir plus</a>
                </p>
            </div>
            <!---->
        </article>
    </div>
</section>
<?php require('view/templates/frontend/contact.php')?>
<?php $content = ob_get_clean();?>
<?php require('view/templates/frontend/frontend.php')?>
