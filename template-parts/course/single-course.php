<div class="course bg-white">
<div style="background: #28537d; height: 6px; width: 100%;"></div> 
<div class="p-1">
    <div class="coursename">
    <a  href="<?php echo get_permalink(); ?>">
        <?= the_title(); ?>
    </a>
    <!-- <a href="#course-<?= $post->ID ?>" class="showdeets">#</a> -->
    </div>
    <div class="details" id="course-<?= $post->ID ?>">

        <div class="coursedesc bg-white mt-wee">
            <?php the_content(); ?>
        </div>
        <div class="learningpartner mt-wee">
            <?php the_terms( $post->ID, 'learning_partner', 'Offered by: ', ', ', ' ' ); ?>
        </div>
        <div class="courseregister my-1">
        <?php $exsys = get_the_terms( $post->ID, 'external_system', '', ', ', ' ' ) ?>
        <a class="registerbutton" 
            href="<?= $post->course_link ?>" 
            target="_blank" 
            rel="noopener">
                Register on <?= $exsys[0]->name ?>
        </a>
        </div>
        <div class="coursecats mt-1">
            <?php the_terms( $post->ID, 'course_category', 'Categories: ', ', ', ' ' ); ?>
        </div>
        <div class="delivery-method">
            <?php the_terms( $post->ID, 'delivery_method', 'Delivery Method: ', ', ', ' ' ); ?>
        </div>

    </div>
    </div>
</div> <!-- /.course -->