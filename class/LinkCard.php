<?php
/**
 * Class for displaying individual Link Cards.
 * 
 * This class encapsulates a single Link Card, which includes an icon, a title,
 * and a URL.  This class is intended for use with
 * {@see \RLHProject\LinkStack}.
 * 
 * @author    Randall Hedglin <randallhedglin@yahoo.com>
 * @copyright Copyright (c) 2021 Randall Hedglin
 * @license   Private
 * @package   RLHProject
 * @version   1.0.0 Original release.
 */

namespace RLHProject;

// class already defined?
if (!class_exists('LinkCard')) {

    /**
     * Class for displaying individual Link Cards.
     * 
     * This class encapsulates a single Link Card, which includes an icon, a title,
     * and a URL.  This class is intended for use with
     * {@see \RLHProject\LinkStack}.
     * 
     * @since 1.0.0
     */
    class LinkCard {

        /** @var string $m_icon FontAwesome icon to be displayed on the Link Card. */
        private $m_icon = '';

        /** @var string $m_display_text Text to be displayed on the Link Card. */
        private $m_display_text = '';

        /** @var string $m_url URL associated with the Link Card. */
        private $m_url = '';

        /**
         * LinkCard class constructor.
         * 
         * Creates a new Link Card object with the specified icon, display text
         * and URL.
         * 
         * @param string $icon         Icon to be displayed on the Link Card.
         * @param string $display_text Text to be displayed on the Link Card.
         * @param string $url          URL associated with the Link Card.
         * 
         * @return void
         * 
         * @throws \Exception If any object passed is not a valid non-zero-
         * length string, an Exception will be thrown.
         * 
         * @since 1.0.0
         */
        public function __construct($icon, $display_text, $url) {

            // store the data
            $this->set_icon($icon);
            $this->set_display_text($display_text);
            $this->set_url($url);
        }

        /**
         * Set the icon.
         * 
         * Specify the icon to be displayed on the Link Card, in the form of
         * a FontAwesome icon class (i.e., "fab fa-wordpress").
         * 
         * @param string $icon Icon to be displayed on the Link Card, in the
         * form of a FontAwesome icon class (i.e., "fab fa-wordpress").
         * 
         * @return void
         * 
         * @throws \Exception If the object passed is not a valid non-zero-
         * length string, an Exception will be thrown.
         * 
         * @since 1.0.0
         */
        public function set_icon($icon) {

            // make sure it's a valid string
            if (is_string($icon) && strlen($icon))
                $this->m_icon = $icon;
            else
                throw new \Exception(__METHOD__ . ': Object passed must be a non-zero-length string.');
        }

        /**
         * Set the display text.
         * 
         * Specify the text to be displayed on the Link Card.
         * 
         * @param string $display_text Text to be displayed on the Link Card.
         * 
         * @return void
         * 
         * @throws \Exception If the object passed is not a valid non-zero-
         * length string, an Exception will be thrown.
         * 
         * @since 1.0.0
         */
        public function set_display_text($display_text) {

            // make sure it's a valid string
            if (is_string($display_text) && strlen($display_text))
                $this->m_display_text = $display_text;
            else
                throw new \Exception(__METHOD__ . ': Object passed must be a non-zero-length string.');
        }

        /**
         * Set the link URL.
         * 
         * Specify the URL to be associated with the LinkCard.
         * 
         * @param string $url URL to be associated with the LinkCard.
         * 
         * @return void
         * 
         * @throws \Exception If the object passed is not a valid non-zero-
         * length string, an Exception will be thrown.
         * 
         * @since 1.0.0
         */
        public function set_url($url) {

            // make sure it's a valid string
            if (is_string($url) && strlen($url))
                $this->m_url = $url;
            else
                throw new \Exception(__METHOD__ . ': Object passed must be a non-zero-length string.');
        }

        /**
         * Get the icon.
         * 
         * Retrieve the icon associated with this LinkCard object.
         * 
         * @return string The icon associated with this object.
         * 
         * @since 1.0.0
         */
        public function get_icon() {
            return $this->m_icon;
        }

        /**
         * Get the display text.
         * 
         * Retrieve the display text associated with this LinkCard object.
         * 
         * @return string The display text associated with this object.
         * 
         * @since 1.0.0
         */
        public function get_display_text() {
            return $this->m_display_text;
        }

        /**
         * Get the display text, converted for comparison purposes.
         * 
         * Retrieve the display text associated with this LinkCard object,
         * converted for comparison purposes.
         * 
         * @return string The display text associated with this object, with
         * all non-aplha-numeric characters stripped and converted to
         * lowercase.
         * 
         * @since 1.0.0
         */
        private function get_display_text_for_comparison() {
            return preg_replace('/[^a-z0-9]/i', '', strtolower($this->m_display_text));
        }

        /**
         * Get the URL.
         * 
         * Retrieve the URL associated with this LinkCard object.
         * 
         * @return string The URL associated with this object.
         * 
         * @since 1.0.0
         */
        public function get_url() {
            return $this->m_url;
        }

        /**
         * Get the URL text, converted for comparison purposes.
         * 
         * Retrieve the URL associated with this LinkCard object,
         * converted for comparison purposes.
         * 
         * @return string The URL associated with this object, with all non-
         * aplha-numeric characters stripped and converted to lowercase.
         * 
         * @since 1.0.0
         */
        private function get_url_for_comparison() {
            return preg_replace('/[^a-z0-9]/i', '', strtolower($this->m_url));
        }

        /**
         * Callback for ascending sort by display text.
         * 
         * Pass this function as the callback for usort() when you wish to sort
         * Link Cards in ascending order based on their display text values.
         * 
         * @param string $a First value for sort comparison.
         * @param string $b Second value for sort comparison.
         * 
         * @return int -1 if $a < $b, 0 if $a == $b, 1 if $a > $b.
         * 
         * @since 1.0.0
         */
        public static function ascending_sort_by_display_text($a, $b) {
            return strcmp($a->get_display_text_for_comparison(), $b->get_display_text_for_comparison());
        }

        /**
         * Callback for ascending sort by URL.
         * 
         * Pass this function as the callback for usort() when you wish to sort
         * Link Cards in ascending order based on their URL values.
         * 
         * @param string $a First value for sort comparison.
         * @param string $b Second value for sort comparison.
         * 
         * @return int -1 if $a < $b, 0 if $a == $b, 1 if $a > $b.
         * 
         * @since 1.0.0
         */
        public static function ascending_sort_by_url($a, $b) {
            return strcmp($a->get_url_for_comparison(), $b->get_url_for_comparison());
        }

        /**
         * Callback for descending sort by display text.
         * 
         * Pass this function as the callback for usort() when you wish to sort
         * Link Cards in descending order based on their display text values.
         * 
         * @param string $a First value for sort comparison.
         * @param string $b Second value for sort comparison.
         * 
         * @return int -1 if $a > $b, 0 if $a == $b, 1 if $a < $b.
         * 
         * @since 1.0.0
         */
        public static function descending_sort_by_display_text($a, $b) {
            return -strcmp($a->get_display_text_for_comparison(), $b->get_display_text_for_comparison());
        }

        /**
         * Callback for descending sort by URL.
         * 
         * Pass this function as the callback for usort() when you wish to sort
         * Link Cards in descending order based on their URL values.
         * 
         * @param string $a First value for sort comparison.
         * @param string $b Second value for sort comparison.
         * 
         * @return int -1 if $a > $b, 0 if $a == $b, 1 if $a < $b.
         * 
         * @since 1.0.0
         */
        public static function descending_sort_by_url($a, $b) {
            return -strcmp($a->get_url_for_comparison(), $b->get_url_for_comparison());
        }
        
        /**
         * Output the link card.
         * 
         * Render the HTML code to display this Link Card object.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function output_html() {

            // output the link card
            _div("class=rlh-link-card-outer onclick=window.open('$this->m_url', '_blank')",
                _div("class=rlh-link-card-icon",
                   _i("class=$this->m_icon style=padding-right:.5em"),
                ),
                _div("class=rlh-link-card-text",
                    $this->m_display_text,
                )
            )->output_html();
        }

        /**
         * Get the Link Card CSS.
         * 
         * Get the CSS for properly displaying Link Cards.
         * 
         * @param string $width  Width of the Link Cards.
         * @param string $height Height of the Link Cards.
         * @param string $border Border thickness for the Link Stack.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public static function get_css($width, $height, $border) { return "

.rlh-link-card-outer {
    background:    #ddd;
    cursor:        pointer;
    width:         $width;
    height:        $height;
    transform:     translate($border);
    margin-bottom: $border;
    border-radius: calc($border / 4);
    display:       flex;
    align-items:   center;
}

.rlh-link-card-icon {
    display:     inline-block;
    width:       $height;
    font-size:   150%;
    font-weight: 700;
    text-align:  right;
    margin-left: .8em;
}

.rlh-link-card-text {
    font-size:   125%;
    font-weight: 400;
    margin-left: .16em;
}

.rlh-link-card-outer:hover {
    background: #ccc;
}

        "; }
    }
}

?>