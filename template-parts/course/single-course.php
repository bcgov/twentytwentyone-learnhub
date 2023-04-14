
<details class="course">


    <summary class="coursename">
        
            <?= the_title(); ?>
        
    </summary>
    
    <div class="delivery-method">
        <?php the_terms( $post->ID, 'delivery_method', '', ', ', ' ' ); ?>
    </div>

    
            <?php the_content(); ?>
    
            <?php the_terms( $post->ID, 'learning_partner', 'Offered by: ', ', ', ' ' ); ?>
    
        <?php if(!empty($post->course_link)): ?>
        
        <?php $exsys = get_the_terms( $post->ID, 'external_system', '', ', ', ' ' ) ?>
        <a class="" 
            href="<?= $post->course_link ?>" 
            target="_blank" 
            rel="noopener">
                <?php if(!empty($exsys[0]->name)): ?>
                Register on <?= $exsys[0]->name ?>
                <?php elseif($exsys[0]->name == 'Youtube'): ?>
                Watch on <?= $exsys[0]->name ?>
                <?php else: ?>
                Get More Information
                <?php endif ?>
        </a>

        <?php else: ?>

            <div>Oh no! There's something wrong with this course. Please <?php the_terms( $post->ID, 'learning_partner', 'contact', ', ', ' ' ); ?></div>

        <?php endif ?>
        


        <div class="coursecats mt-1" style="display:none;">
            <?php the_terms( $post->ID, 'course_category', 'Categories: ', ', ', ' ' ); ?>
        </div>

    
</details> <!-- /.course -->