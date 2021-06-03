<?php
get_header();
?>
<div style="background: url('<?php echo get_template_directory_uri().'/assets/images/codage.jpg'; ?>'); background-size: cover; padding: 10px 2px;">
    <div class="container">
        <div class='row'>
            <?php
                dynamic_sidebar('hc-colab');
            ?>
        </div>
    </div>
</div>
<div class='container'>
    <!-- Display the countdown timer in an element -->
    <p style='text-align: center;font-size: 24px'>
    Fin du challenge Wordpress dans
    </p>
    <p id="countdown" style='text-align: center;font-size: 36px'></p>

    <script>
    // Set the date we're counting down to
    var countDownDate = new Date("Jun 4, 2021 15:00:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("countdown").innerHTML = days + "j " + hours + "h "
    + minutes + "m " + seconds + "s ";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("countdown").innerHTML = "FIN DU CHALLENGE WORDPRESS";
    }
    }, 1000);
</script>
</div>
<div>
    <h2 style='text-align: center;'>
        Rejoignez vous aussi nos formations
    </h2>
    <a href='https://www.diginamic.fr' target='_blank'>
        <img src='https://www.digiteamchallenge.com/wp-content/themes/twentytwentyone/assets/images/Logo_Diginamic.png' alt='diginamic' style='display: block;margin: 2px auto;background: #fff;'/>
    </a>
</div>
<div id="mapid" style="height: 450px">
</div>
<?php
dynamic_sidebar('hc-map');
get_footer();
