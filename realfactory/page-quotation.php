<?php get_header(); ?>
<style>
    body{
        background: #e6e6e6;
        padding-top:88px
    }
    .wpcf7-submit{
        float:right
    }
</style>
<div class="container">
<div class="custome-form" style="background:white;padding: 30px;">
<h1> Quotation for <span id="forProd"></span></h1>

<?php echo do_shortcode('[contact-form-7 id="4551" title="quotation"]'); ?>
<script>
    (function(){
        let productName = localStorage.getItem("lastProduct");
    let prodOfInterestInput = document.getElementById('prodNameValue')
    let productnameEle = document.getElementById('forProd')
    productnameEle.innerText = productName;
    prodOfInterestInput.value = productName
    })();
    
</script>
</div>
</div>
<?php get_footer(); ?>