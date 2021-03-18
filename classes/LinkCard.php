<?php
/**
 * This is the short file description.
 * 
 * This is the long file description.
 * 
 * @author    Randall Hedglin <randallhedglin@yahoo.com>
 * @copyright Copyright 2021 Randall Hedglin
 * @license   https://example.com
 * @package   RLHProject
 * @version   1.0.0 Original release.
 * @filesource
 * 
 * @todo Create the LinkStack and LinkContainer classes.
 */

namespace RLHProject;

// class already defined?
if (!class_exists('LinkCard')) {

    /**
     * Container class for displaying Link Cards.
     * 
     * This class creates and displays links as Link Cards using the desired
     * styles and settings as provided.
     * 
     * @since 1.0.0
     */
    class LinkCard {

        /** @var string $m_display_text Text to be displayed on the Link Card. */
        private $m_display_text = '';

        /** @var string $url URL associated with the Link Card. */
        private $m_url = '';

        /**
         * LinkCard class constructor.
         * 
         * Creates a new Link Card object with the specified display text and
         * URL.
         * 
         * @param string $display_text Text to be displayed on the Link Card.
         * @param string $url          URL associated with the Link Card.
         * 
         * @return void
         * 
         * @throws \Exception If either object passed is not a valid non-zero-
         * length string, an Exception will be thrown.
         * 
         * @since 1.0.0
         */
        public function __construct($display_text, $url) {

            // store the data
            $this->set_display_text($display_text);
            $this->set_url($url);
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
         * Output the link.
         * 
         * Render the HTML code to display this Link Card object.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function output() {
            echo "<div><a href='$this->m_url' target='_blank' rel='noopener noreferrer'>$this->m_display_text</a></div>";
        }

        /**
         * Callback for ascending sort by display text.
         * 
         * Pass this function as the callback for usort() when you wish to sort
         * Link Cards in ascending order based on their display text values.
         * 
         * @param $a First value for sort comparison.
         * @param $b Second value for sort comparison.
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
         * @param $a First value for sort comparison.
         * @param $b Second value for sort comparison.
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
         * @param $a First value for sort comparison.
         * @param $b Second value for sort comparison.
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
         * @param $a First value for sort comparison.
         * @param $b Second value for sort comparison.
         * 
         * @return int -1 if $a > $b, 0 if $a == $b, 1 if $a < $b.
         * 
         * @since 1.0.0
         */
        public static function descending_sort_by_url($a, $b) {
            return -strcmp($a->get_url_for_comparison(), $b->get_url_for_comparison());
        }
    }
}

?>