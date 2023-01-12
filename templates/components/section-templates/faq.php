<!-- FAQ -->
<!-- Content -->
<main class="content">
    <?php
        $terms = get_terms(array(
          'taxonomy' => 'topic',
          'hide_empty' => false,
          'order' => 'ASC',
          'orderby' => 'menu_order'
        ));
        foreach ($terms as $term) {
          $questions = new WP_Query(array(
            'post_type' => 'faq',
            'tax_query' => array(
              array(
                'taxonomy' => 'topic',
                'field'    => 'term_id',
                'terms'    => $term->term_id
              ),
            ),
          ));
          if ($questions) : ?>
    <div class="faq-group">

        <div class="faq-title">
            <h3><?php echo $term->name; ?></h3>
        </div>

        <div class="accordion faq-accordion">
            <?php while ($questions->have_posts()) :
                  $questions->the_post(); ?>

            <div class="accordion_item">

                <div class="accordion_header">
                    <h4><span></span>
                        <?php the_title(); ?>
                    </h4>
                </div>

                <div class="accordion_content">
                    <div class="card-body">
                        <?php the_content(); ?>
                    </div>
                </div>

            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php
          endif;
          wp_reset_query();
        } ?>
</main>
<!-- End Content -->

<script>
const accordions = document.querySelectorAll(".accordion_item");

const openAccordion = (accordion) => {
    const content = accordion.querySelector(".accordion_content");
    accordion.classList.add("accordion_active");
    content.style.maxHeight = content.scrollHeight + "px";
};

const closeAccordion = (accordion) => {
    const content = accordion.querySelector(".accordion_content");
    accordion.classList.remove("accordion_active");
    content.style.maxHeight = null;
};

accordions.forEach((accordion) => {
    const intro = accordion.querySelector(".accordion_header");
    const content = accordion.querySelector(".accordion_content");

    intro.onclick = () => {
        if (content.style.maxHeight) {
            closeAccordion(accordion);
        } else {
            accordions.forEach((accordion) => closeAccordion(accordion));
            openAccordion(accordion);
        }
    };
});
</script>