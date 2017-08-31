<?php namespace KnowTheCode\CollapsibleContent\FAQ\Templates; ?>
<div class="collapsible-content--term-container faq faq-topic--<?php esc_attr_e( $record['term_slug'] ); ?>">
    <h1><?php esc_html_e( $record['term_name'] ); ?></h1>

    <dl class="collapsible-content--container qa">
		<?php loop_and_render_faqs( $record['posts'] ); ?>
    </dl>
</div>