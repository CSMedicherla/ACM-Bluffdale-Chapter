<?php
/**
 * ACM Bluffdale – Blog Page Template
 * Template Name: Blog Page
 *
 * UNCHANGED reference copy of the existing listing template.
 * Keep this in sync with whatever is currently installed in the active
 * theme on bluffdale.acm.org. If you publish AdaptIndex as a WP Post with
 * category="blog" (see blog/adaptindex-post-body.html), it will appear here
 * automatically — no edits required to this file.
 */
get_header(); ?>

<main id="main-content" class="site-main">
  <div class="container" style="max-width: 860px; margin: 3rem auto; padding: 0 2rem;">
    <h1 style="font-size: 32px; font-weight: 600; color: #111; margin-bottom: 0.5rem;">Blog</h1>
    <p style="font-size: 14px; color: #888; margin-bottom: 2.5rem;">Thoughts, insights and stories from our community</p>

    <div class="news-list" id="acm-blog-list">
      <?php
        $blog_posts = new WP_Query([
          'category_name'  => 'blog',
          'posts_per_page' => 20,
          'post_status'    => 'publish',
        ]);

        if ( $blog_posts->have_posts() ) :
          while ( $blog_posts->have_posts() ) : $blog_posts->the_post();
            $day    = get_the_date('d');
            $month  = get_the_date('M Y');
            $url    = get_permalink();
            $author = get_the_author();
      ?>
      <div class="news-item" data-url="<?php echo esc_url($url); ?>">
        <div class="news-date">
          <span class="news-day"><?php echo $day; ?></span>
          <span class="news-month"><?php echo $month; ?></span>
        </div>
        <div class="news-body">
          <div class="news-meta">
            <span class="news-cat">Blog</span>
            <span class="news-author">&#9997; <?php echo esc_html($author); ?></span>
          </div>
          <p class="news-title"><?php the_title(); ?></p>
          <p class="news-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
        </div>
        <div class="news-arrow">&rarr;</div>
      </div>
      <?php endwhile; wp_reset_postdata();
        else : ?>
      <p style="color:#888; padding: 2rem 0;">No blog posts yet. Check back soon!</p>
      <?php endif; ?>
    </div>
  </div>
</main>

<style>
.news-list { padding: 1rem 0; }
.news-item {
  display: grid;
  grid-template-columns: 80px 1fr auto;
  gap: 16px;
  align-items: center;
  padding: 16px 0;
  border-bottom: 1px solid #e5e7eb;
  cursor: pointer;
}
.news-item:first-child { border-top: 1px solid #e5e7eb; }
.news-item:hover .news-title { color: #185FA5; }
.news-item:hover .news-arrow { color: #185FA5; }
.news-date { text-align: center; }
.news-day { display: block; font-size: 26px; font-weight: 500; line-height: 1; color: #111; }
.news-month { display: block; font-size: 11px; color: #888; text-transform: uppercase; letter-spacing: 0.05em; margin-top: 2px; }
.news-meta { display: flex; align-items: center; gap: 8px; margin-bottom: 6px; flex-wrap: wrap; }
.news-cat {
  display: inline-block;
  font-size: 11px;
  font-weight: 500;
  padding: 2px 10px;
  border-radius: 20px;
  background: #E1F5EE;
  color: #085041;
}
.news-author {
  display: inline-block;
  font-size: 11px;
  font-weight: 500;
  padding: 2px 10px;
  border-radius: 20px;
  background: #EEEDFE;
  color: #3C3489;
}
.news-title { font-size: 15px; font-weight: 500; margin: 0 0 4px; color: #111; }
.news-excerpt { font-size: 13px; color: #666; margin: 0; line-height: 1.5; }
.news-arrow { font-size: 18px; color: #aaa; }
</style>

<script>
window.addEventListener('load', function() {
  var items = document.querySelectorAll('#acm-blog-list .news-item');
  items.forEach(function(item) {
    item.style.cursor = 'pointer';
    item.addEventListener('click', function(e) {
      var url = this.getAttribute('data-url');
      if (url) { window.location.assign(url); }
    }, true);
  });
});
</script>

<?php get_footer(); ?>
