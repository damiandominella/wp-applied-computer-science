<?php
/**
 * Template Name: Home Page
 *
 * @package applied-computer-science
 */

get_header();
if (have_posts()) the_post();

?>

<div id="homepage">
    <div class="cover-image">
        <div class="container">
        <h3>Università degli studi di Urbino Carlo Bo</h3>
        <div class="intro">
            <p>Corso di laurea triennale in</p>
            <h1>Informatica<br/>Applicata</h1>
        </div>
        <div class="extra">
            <p>100% di occupati ad<br/> un anno dalla laurea</p>
            <a href="mailto:cdl.informatica@uniurb.it">cdl.informatica@uniurb.it</a>
        </div>
        <div class="robot"><img src="<?php echo get_template_directory_uri() .'/img/robot.png' ?>"/></div>
    </div>
        
    </div>
    <div class="container">
        <?php the_content(); ?>
    </div>
</div>

<?php 
get_footer();
?>