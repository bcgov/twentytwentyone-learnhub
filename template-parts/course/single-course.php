<div class="course bg-white">
<div style="background: #28537d; height: 6px; width: 100%;"></div> 
<div class="p-1">
    <div class="delivery-method">
        <?php the_terms( $post->ID, 'delivery_method', '', ', ', ' ' ); ?>
    </div>
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

        <div class="courseregister mt-1">
        <?php if(!empty($post->course_link)): ?>
        
        <?php $exsys = get_the_terms( $post->ID, 'external_system', '', ', ', ' ' ) ?>
        <a class="registerbutton" 
            href="<?= $post->course_link ?>" 
            target="_blank" 
            rel="noopener">
                <?php if(!empty($exsys[0]->name)): ?>
                Register on <?= $exsys[0]->name ?>
                <?php else: ?>
                Get More Information
                <?php endif ?>
        </a>

        <?php else: ?>

            <div>Oh no! There's something wrong with this course. Please <?php the_terms( $post->ID, 'learning_partner', 'contact', ', ', ' ' ); ?></div>

        <?php endif ?>
        </div>


        <div class="coursecats mt-1" style="display:none;">
            <?php the_terms( $post->ID, 'course_category', 'Categories: ', ', ', ' ' ); ?>
        </div>

    </div>
    </div>
</div> <!-- /.course -->