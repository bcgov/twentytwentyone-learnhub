<div class="course">
			<div style="background: #28537d; height: 6px; width: 100%;"></div> 
                <div class="coursename">
                <a  href="<?php echo get_permalink(); ?>">
                    <?= the_title(); ?>
                </a>
                <!-- <a href="#course-<?= $post->ID ?>" class="showdeets">#</a> -->
                </div>
                <div class="details" id="course-<?= $post->ID ?>">
                    <div class="learningpartner">
                        <?php the_terms( $post->ID, 'learning_partner', 'Offered by: ', ', ', ' ' ); ?>
                    </div>
                    <div class="coursedesc">
                        <?php the_content(); ?>
                    </div>
                    <div class="coursecats">
                        <?php the_terms( $post->ID, 'course_category', 'Categories: ', ', ', ' ' ); ?>
                    </div>
                    <div class="delivery-method">
                        <?php the_terms( $post->ID, 'delivery_method', 'Delivery Method: ', ', ', ' ' ); ?>
                    </div>
                    <div class="courseregister">
                    <?php $exsys = get_the_terms( $post->ID, 'external_system', '', ', ', ' ' ) ?>
                    <a style="background: #28537d; color: #F2F2F2; font-size: 1.2rem; padding: .5em 1em; text-align: center; text-decoration: none;" 
                        href="<?= $post->course_link ?>" 
                        target="_blank" 
                        rel="noopener">
                            Register on <?= $exsys[0]->name ?>
                    </a>
                    </div>
                </div>
           </div> <!-- /.course -->