<?php
/**
 * Hero partial — child override.
 *
 * Renders the ARMPO hero with the design-system split layout:
 *  - left: dark→violet charter gradient + eyebrow + title + CTA
 *  - right: ACF `hero_image` (edge-to-edge)
 *
 * ACF fields used (page-level):
 *   hero_type     radio    — variant key (added as a CSS class)
 *   hero_title    wysiwyg  — full title HTML (already includes its own <h1> + eyebrow <span>)
 *   hero_subtitle text     — descriptive paragraph below the title
 *   hero_cta_url  text     — CTA href
 *   hero_cta_text text     — CTA label
 *   hero_image    image    — right-side picture
 *   hero_bg       image    — optional section background image (sits under the gradient)
 *   hero_overlay  bool     — when true, add a darker mask on top of bg
 */

$page_id = get_the_ID();

$hero_type     = function_exists('get_field') ? get_field('hero_type', $page_id) : '';
$hero_title    = function_exists('get_field') ? get_field('hero_title', $page_id) : '';
$hero_subtitle = function_exists('get_field') ? get_field('hero_subtitle', $page_id) : '';
$hero_cta_url  = function_exists('get_field') ? get_field('hero_cta_url', $page_id) : '';
$hero_cta_text = function_exists('get_field') ? get_field('hero_cta_text', $page_id) : '';
$hero_image    = function_exists('get_field') ? get_field('hero_image', $page_id) : null;
$hero_bg       = function_exists('get_field') ? get_field('hero_bg', $page_id) : null;
$hero_overlay  = function_exists('get_field') ? (bool) get_field('hero_overlay', $page_id) : false;

/**
 * Normalize an ACF image field to ['url' => …, 'alt' => …].
 * Handles array / attachment-ID / plain-URL return formats.
 */
$resolve_image = static function ($value, $size = 'large') {
    if (empty($value)) return ['url' => '', 'alt' => ''];
    if (is_array($value)) {
        return [
            'url' => $value['url'] ?? ($value['sizes'][$size] ?? ''),
            'alt' => $value['alt'] ?? '',
        ];
    }
    if (is_numeric($value)) {
        return [
            'url' => wp_get_attachment_image_url((int) $value, $size) ?: '',
            'alt' => get_post_meta((int) $value, '_wp_attachment_image_alt', true) ?: '',
        ];
    }
    return ['url' => (string) $value, 'alt' => ''];
};

$bg    = $resolve_image($hero_bg, 'full');
$image = $resolve_image($hero_image, 'large');

$classes = ['hero', 'hero-jumbo', 'hero-left'];
if ($hero_type)    $classes[] = 'hero-type-' . sanitize_html_class($hero_type);
if ($hero_overlay) $classes[] = 'has-overlay';
$class_attr = esc_attr(implode(' ', $classes));

$style_attr = $bg['url']
    ? ' style="background-image:url(' . esc_url($bg['url']) . ');"'
    : '';
?>

<section class="<?php echo $class_attr; ?>"<?php echo $style_attr; ?>>
    <div class="container d-flex align-center">
        <div class="hero-content flex-1">
            <?php if ($hero_title) : ?>
                <?php echo wp_kses_post($hero_title); ?>
            <?php endif; ?>

            <?php if ($hero_subtitle) : ?>
                <div class="hero-text">
                    <?php echo esc_html($hero_subtitle); ?>
                </div>
            <?php endif; ?>

            <?php if ($hero_cta_text || $hero_cta_url) : ?>
                <div class="hero-cta font-cond">
                    <a href="<?php echo esc_url($hero_cta_url ?: '#'); ?>" class="btn btn-orange">
                        <?php echo esc_html($hero_cta_text ?: ''); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <div class="hero-image d-flex">
            <?php if ($image['url']) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
        </div>
    </div>
</section>
