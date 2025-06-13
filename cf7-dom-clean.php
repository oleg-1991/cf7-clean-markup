<?php
/**
 * Plugin Name: CF7 Clean Markup
 * Description: Removes automatic span, p, and br tags from Contact Form 7 output for cleaner HTML.
 * Version: 1.0
 * Author: Oleg D. (oleg-1991)
 */

// Убираем <span class="wpcf7-form-control-wrap">...</span>
add_filter('wpcf7_form_elements', function ($content) {
    // Удаляем span.wpcf7-form-control-wrap
    $content = preg_replace('/<span class="wpcf7-form-control-wrap[^>]*>(.*?)<\/span>/s', '$1', $content);
    
    // Удаляем <p>…</p>, если они автоматически добавлены вокруг каждого поля
    $content = preg_replace('/<p[^>]*>(.*?)<\/p>/s', '$1', $content);
    
    // Удаляем <br>, если они присутствуют
    $content = str_replace('<br />', '', $content);
    $content = str_replace('<br>', '', $content);

    return $content;
});
