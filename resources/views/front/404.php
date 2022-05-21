<?php 
require_once("../app/config.php");
$title="Page Not Found";
$desc="Page not found, 404 error";
require_once('include/header.php');  
require_once('include/navbar.php');  
?>
<div class="bg-orange"> 
<section class="wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                <div class="position-relative overflow-hidden width-100">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12 text-center center-col">
                               <h2 class="alt-font font-weight-600 letter-spacing-minus-1 text-white">Page Not Found</h2>
                            <span class="title-extra-large text-white font-weight-600 display-block margin-30px-bottom xs-margin-10px-bottom">404!</span>
                                <a href="./" class="btn btn-transparent-white btn-small text-extra-small"><i class="ti-arrow-left margin-5px-right no-margin-left" aria-hidden="true"></i> Back To Home</a>
            </div>
        </div>
    </div>
</section>
</div>
<?php      
require_once('include/footer.php');
?>