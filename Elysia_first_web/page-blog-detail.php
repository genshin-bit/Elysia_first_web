<?php

/**
 * Template Name: 文章详情
 *
 * Blog 详情页模板（从 swforming/index-12.html 迁移）
 */

get_header();

$elysia_detail_post_id = 0;
if (get_query_var('post_id')) {
    $elysia_detail_post_id = (int) get_query_var('post_id');
}
if (!$elysia_detail_post_id && isset($_GET['post_id'])) {
    $elysia_detail_post_id = (int) $_GET['post_id'];
}
if ($elysia_detail_post_id <= 0) {
    $elysia_detail_post_id = get_the_ID();
}
$elysia_detail_post = null;
if ($elysia_detail_post_id > 0) {
    $elysia_detail_post = get_post($elysia_detail_post_id);
}
?>

<link rel='stylesheet' id='widget-posts-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-posts.min.css' media='all' />
<link rel='stylesheet' id='widget-divider-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-divider.min.css' media='all' />
<link rel='stylesheet' id='widget-post-navigation-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-post-navigation.min.css' media='all' />
<link rel='stylesheet' id='widget-table-of-contents-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-table-of-contents.min.css' media='all' />
<link rel='stylesheet' id='elementor-post-1361-css' href='<?php echo get_template_directory_uri(); ?>/static/css/post-1361.css' media='all' />

<script>
    window.okkiConfigs = window.okkiConfigs || [];

    function okkiAdd() {
        okkiConfigs.push(arguments);
    }
    okkiAdd("analytics", {
        siteId: "39166-9223",
        gId: "UA-238156102-34"
    });

    document.addEventListener('DOMContentLoaded', function() {
        var links = document.querySelectorAll('.elementor-toc__list-wrapper a[href^="#"]');
        links.forEach(function(link) {
            link.addEventListener('click', function(e) {
                var targetId = this.getAttribute('href').slice(1);
                var target = document.getElementById(targetId);
                if (!target) {
                    return;
                }
                e.preventDefault();
                var rect = target.getBoundingClientRect();
                var offsetTop = rect.top + window.pageYOffset - 80;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            });
        });

        function elysiaRebuildBlogToc(retry) {
            if (retry > 10) {
                return;
            }

            var article = document.querySelector('.elysia-article-content');
            var tocBody = document.querySelector('.elementor-1361 .elementor-toc__body');

            if (!article || !tocBody) {
                setTimeout(function() {
                    elysiaRebuildBlogToc(retry + 1);
                }, 300);
                return;
            }

            var headings = article.querySelectorAll('h2, h3');
            if (!headings.length) {
                return;
            }

            var listWrapper = tocBody.querySelector('ol.elementor-toc__list-wrapper');
            if (!listWrapper) {
                listWrapper = document.createElement('ol');
                listWrapper.className = 'elementor-toc__list-wrapper';
                tocBody.innerHTML = '';
                tocBody.appendChild(listWrapper);
            } else {
                listWrapper.innerHTML = '';
            }

            var currentParentLi = null;

            headings.forEach(function(heading, index) {
                var tag = heading.tagName;
                if (tag !== 'H2' && tag !== 'H3') {
                    return;
                }

                if (!heading.id) {
                    heading.id = 'elysia-heading-' + (index + 1);
                }

                if (tag === 'H2') {
                    var li = document.createElement('li');
                    li.className = 'elementor-toc__list-item';

                    var a = document.createElement('a');
                    a.className = 'elementor-toc__list-item-text-wrapper';
                    a.href = '#' + heading.id;

                    var span = document.createElement('span');
                    span.className = 'elementor-toc__list-item-text';
                    span.textContent = heading.textContent.trim();

                    a.appendChild(span);
                    li.appendChild(a);
                    listWrapper.appendChild(li);
                    currentParentLi = li;
                } else { // H3
                    if (!currentParentLi) {
                        var liTop = document.createElement('li');
                        liTop.className = 'elementor-toc__list-item';

                        var aTop = document.createElement('a');
                        aTop.className = 'elementor-toc__list-item-text-wrapper';
                        aTop.href = '#' + heading.id;

                        var spanTop = document.createElement('span');
                        spanTop.className = 'elementor-toc__list-item-text';
                        spanTop.textContent = heading.textContent.trim();

                        aTop.appendChild(spanTop);
                        liTop.appendChild(aTop);
                        listWrapper.appendChild(liTop);
                        currentParentLi = liTop;
                        return;
                    }

                    var subOl = currentParentLi.querySelector('ol.elementor-toc__list-wrapper');
                    if (!subOl) {
                        subOl = document.createElement('ol');
                        subOl.className = 'elementor-toc__list-wrapper';
                        currentParentLi.appendChild(subOl);
                    }

                    var subLi = document.createElement('li');
                    subLi.className = 'elementor-toc__list-item';

                    var subA = document.createElement('a');
                    subA.className = 'elementor-toc__list-item-text-wrapper';
                    subA.href = '#' + heading.id;

                    var subSpan = document.createElement('span');
                    subSpan.className = 'elementor-toc__list-item-text';
                    subSpan.textContent = heading.textContent.trim();

                    subA.appendChild(subSpan);
                    subLi.appendChild(subA);
                    subOl.appendChild(subLi);
                }
            });
        }

        setTimeout(function() {
            elysiaRebuildBlogToc(0);
        }, 500);
    });
</script>
<script async src="<?php echo get_template_directory_uri(); ?>/static/js/analyze.js"></script>

<main id="main" class="site-main hfeed" itemscope="itemscope" itemtype="https://schema.org/CreativeWork">

    <div data-elementor-type="single-post" data-elementor-id="1361" class="elementor elementor-1361 elementor-location-single post-5707 post type-post status-publish format-standard hentry category-uncategorized" data-elementor-post-type="elementor_library">

        <?php
        if ($elysia_detail_post instanceof WP_Post) {
            global $post;
            $post = $elysia_detail_post;
            setup_postdata($post);
        }
        get_template_part('template-parts/blog_detail/blog-detail', 'hero');
        ?>

        <section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-2d6a3b2 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2d6a3b2" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-70 elementor-top-column elementor-element elementor-element-2806ac2f" data-id="2806ac2f" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <?php get_template_part('template-parts/blog_detail/blog-detail', 'content'); ?>
                    </div>
                </div>
                <div class="elementor-column elementor-col-30 elementor-top-column elementor-element elementor-element-4cf90785" data-id="4cf90785" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <?php get_template_part('template-parts/components/toc'); ?>
                        <?php get_template_part('template-parts/blog/blog', 'sidebar-share'); ?>
                        <?php get_template_part('template-parts/blog_detail/blog-detail', 'sidebar-latest'); ?>
                        <?php get_template_part('template-parts/blog_detail/blog-detail', 'sidebar-contact'); ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
        if ($elysia_detail_post instanceof WP_Post) {
            wp_reset_postdata();
        }
        ?>
    </div>
</main>

<?php
get_footer();
?>