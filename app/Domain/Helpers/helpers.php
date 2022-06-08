<?php

declare(strict_types=1);

if (!function_exists('wc_hex_is_light')) {
    /**
     * Determine whether a hex color is light.
     *
     * @param mixed $color Color.
     * @return bool  True if a light color.
     * @package WooCommerce\Functions
     * @author WooCoomerce
     */
    function wc_hex_is_light($color)
    {
        $hex = str_replace('#', '', $color);

        $c_r = hexdec(substr($hex, 0, 2));
        $c_g = hexdec(substr($hex, 2, 2));
        $c_b = hexdec(substr($hex, 4, 2));

        $brightness = (($c_r * 299) + ($c_g * 587) + ($c_b * 114)) / 1000;

        return $brightness > 155;
    }
}
