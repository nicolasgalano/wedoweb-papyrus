<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

extract(
    shortcode_atts(
        array(
            'testimonial_image' => '',
            'testimonial_text' => '',
            'testimonial_author' => '',
            'testimonial_author_position' => '',
			'text_color' => '#121618',
			'author_color' => '#121618',
            'custom_class' => ''
        ),
        $atts
    )
);


$compile = '';
$html = '';
$attach_meta = vincent_get_attachment($testimonial_image);
$photoAlt = $attach_meta['alt'];
$featured_image = aq_resize(esc_url(wp_get_attachment_url($testimonial_image)), '200', '200', true, true, true);

$html .= '
	<div class="vincent_testimonials_item ' . esc_attr($custom_class) . '">
		<div class="vincent_testimonials_item_inner">
		    <p class="vincent_testimonials_content vincent_js_color" data-color="'. esc_attr($text_color) .'">
		        '. $testimonial_text .'
            </p>
			<div class="vincent_testimonials_author_cont vincent_js_color" data-color="'. esc_attr($author_color) .'">
			    <img src="'. esc_url($featured_image) .'" alt="'. esc_attr($photoAlt) .'"  class="vincent_testimonials_img"/>
			    <span class="vincent_testimonial_author">'. $testimonial_author .'</span>
			    <br>
			    <span class="vincent_author_position">' . $testimonial_author_position . '</span>
            </div>
		</div>
	</div>';
echo $html;