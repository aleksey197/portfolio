<?php get_header(); ?>

<section id="about" class="s_about bg_light">
    <div class="section_header">
        <h2><?php
            $idObj = get_category_by_slug('s_about');
            $id = $idObj->term_id;
            echo get_cat_name($id);
            ?></h2>
        <div class="s_descr_wrap">
            <div class="s_descr"><?php
                echo category_description($id);
                ?></div>
        </div>
    </div>
    <div class="section_content">
        <div class="container">
            <div class="row">

                <?php if ( have_posts()) : query_posts('p=11');
                    while (have_posts()) : the_post(); ?>
                <div class="col-md-4 col-md-push-4 animation-1">
                    <h3>Foto</h3>
                    <div class="person">
                        <?php if (has_post_thumbnail()) : ?>
                            <a class="popup" href="<?php 
                            $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                            echo $large_image_url[0];
                            ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail(array(220, 220)); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-4 col-md-pull-4 animation-2">
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                </div>
                <?php endwhile; endif; wp_reset_query(); ?>

                    <div class="col-md-4 animation-3 personal_last_block">
                        <?php if ( have_posts()) : query_posts('p=15');
                            while (have_posts()) : the_post(); ?>
                        <h3><?php the_title(); ?></h3>
                        <h2 class="personal_header"><?php echo get_bloginfo('name'); ?></h2>
                        <?php the_content(); ?>
                        <?php endwhile; endif; wp_reset_query(); ?>
                        <div class="social_wrap">
                            <ul>
                                <?php if ( have_posts()) : query_posts('cat=3');
                                    while (have_posts()) : the_post(); ?>
                                        <li><a href="<?php echo get_post_meta($post->ID, 'soc_url', true); ?>" target="_blank" title="<?php the_title(); ?>"><i class="fa <?php echo get_post_meta($post->ID, 'fonts_awesom', true); ?>"></i></a></li>
                                    <?php endwhile; endif; wp_reset_query(); ?>

                            </ul>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>

<section id="resume" class="s_resume">
    <div class="section_header">
        <h2><?php echo get_cat_name(4); ?></h2>
        <div class="s_descr_wrap">
            <div class="s_descr"><?php echo category_description(4); ?></div>
        </div>
    </div>
    <div class="section_content">
        <div class="container">
            <div class="row">
                <div class="resume_container">
                    <div class="col-md-6 col-sm-6 left">
                        <h3><?php echo get_cat_name(5); ?></h3>
                        <div class="resume_icon"><i class="icon-basic-case"></i></div>

                        <?php if ( have_posts()) : query_posts('cat=5');
                            while (have_posts()) : the_post(); ?>
                                <div class="resume_item">
                                    <div class="year"><?php echo get_post_meta($post->ID, 'resume_years', true); ?></div>
                                    <div class="resume_description"><?php echo get_post_meta($post->ID, 'resume_place', true); ?><strong><?php the_title(); ?></strong></div>
                                    <?php the_content(); ?>
                                </div>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </div>
                    <div class="col-md-6 col-sm-6 right">
                        <h3><?php echo get_cat_name(6); ?></h3>
                        <div class="resume_icon"><i class="icon-basic-book-pen"></i></div>

                        <?php if ( have_posts()) : query_posts('cat=6');
                            while (have_posts()) : the_post(); ?>
                                <div class="resume_item">
                                    <div class="year"><?php echo get_post_meta($post->ID, 'resume_years', true); ?></div>
                                    <div class="resume_description"><strong><?php the_title(); ?></strong><?php echo get_post_meta($post->ID, 'resume_place', true); ?></div>
                                    <?php the_content(); ?>
                                </div>
                        <?php endwhile; endif; wp_reset_query(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="portfolio" class="s_portfolio bg_dark">
    <div class="section_header">
        <h2><?php echo get_cat_name(7); ?></h2>
        <div class="s_descr_wrap">
            <div class="s_descr"><?php echo category_description(7); ?></div>
        </div>
    </div>
    <div class="section_content">
        <div class="container">
            <div class="row">
                <div class="filter_div controls">
                    <ul>
                        <li class="filter active" data-filter="all">All works</li>
                        <li class="filter" data-filter=".sites">Blogging Websites</li>
                        <li class="filter" data-filter=".identy">Landing page</li>
                        <li class="filter" data-filter=".logos">Informational Websites</li>
                    </ul>
                </div>
                <div id="portfolio_grid">
                    <?php if ( have_posts()) : query_posts('cat=7');
                        while (have_posts()) : the_post(); ?>

                            <div class="mix col-md-3 col-sm-6 col-xs-12 portfolio_item <?php
                            $tags = wp_get_post_tags($post->ID);
                            if ($tags) {
                                foreach ($tags as $tag) {
                                    echo ' ' . $tag->name;
                                }
                            }
                            ?> ">
                                <?php the_post_thumbnail(array(800, 600)); ?>
                                <div class="port_item_cont">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_excerpt(); ?>
                                    <a href="#" class="popup_content">View</a>
                                    <a href="works/site_portfolio1/index.html" target="_blank">View site</a>
                                </div>
                                <div class="hidden">
                                    <div class="port_descr">
                                        <h3><?php the_title(); ?></h3>
                                        <?php the_content(); ?>
                                        <img src="<?php
                                        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                                        echo $large_image_url[0];
                                        ?>" alt="<?php the_title(); ?>">
                                    </div>
                                </div>
                            </div>
                    <?php endwhile; endif; wp_reset_query(); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<section id="contacts" class="s_contacts bg_light">
    <div class="section_header">
        <h2><?php echo get_cat_name(11); ?></h2>
        <div class="s_descr_wrap">
            <div class="s_descr"><?php echo category_description(11); ?></div>
        </div>
    </div>
    <div class="section_content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="contact_box">
                        <div class="contacts_icon icon-basic-geolocalize-05"></div>
                        <h3>Address</h3>
                        <p><?php
                            $options = get_option('sample_theme_options');
                            echo $options['addresstext']; ?></p>
                    </div>
                    <div class="contact_box">
                        <div class="contacts_icon icon-basic-smartphone"></div>
                        <h3>Phone</h3>
                        <p><?php
                            $options = get_option('sample_theme_options');
                            echo $options['phonetext']; ?></p>
                    </div>
                    <div class="contact_box">
                        <div class="contacts_icon icon-basic-webpage-img-txt"></div>
                        <h3>Web-site</h3>
                        <p><a href="<?php
                            $options = get_option('sample_theme_options');
                            echo $options['sitetext']; ?>" target="_blank"><?php
                                $options = get_option('sample_theme_options');
                                echo $options['sitetext']; ?></a></p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <form action="https://formspree.io/azuev3199@gmail.com" class="main_form" novalidate target="_blank" method="POST">
                        <label class="form-group">
                            <span class="color_element">*</span> Your name:
                            <input type="text" name="name" placeholder="Your name:" data-validation-required-message="You have not entered a name" required />
                            <span class="help-block text-danger"></span>
                        </label>
                        <label class="form-group">
                            <span class="color_element">*</span> Your E-mail:
                            <input type="email" name="email" placeholder="Your E-mail:" data-validation-required-message="You entered an incorrect email" required />
                            <span class="help-block text-danger"></span>
                        </label>
                        <label class="form-group">
                            <span class="color_element">*</span> Your message:
                            <textarea name="message" placeholder="Your message:" data-validation-required-message="You have not entered a message" required /></textarea>
                            <span class="help-block text-danger"></span>

                            <button>Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
