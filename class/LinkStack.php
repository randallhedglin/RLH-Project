<?php
/**
 * Class for displaying groups of Link Cards.
 * 
 * This class encapsulates an organized grouping of
 * {@see \RLHProject\LinkCard} objects.  This class is intended for use with
 * {@see \RLHProject\LinkContainer}.
 * 
 * @author    Randall Hedglin <randallhedglin@yahoo.com>
 * @copyright Copyright (c) 2021 Randall Hedglin
 * @license   Private
 * @package   RLHProject
 * @version   1.0.0 Original release.
 */

namespace RLHProject;

// class already defined?
if (!class_exists('LinkStack')) {

    /**
     * Class for displaying groups of Link Cards.
     * 
     * This class encapsulates an organized grouping of
     * {@see \RLHProject\LinkCard} objects.  This class is intended for use with
     * {@see \RLHProject\LinkContainer}.
     * 
     * @since 1.0.0
     */
    class LinkStack {

        /** @var string $m_icon FontAwesome icon to be displayed on the Link Stack. */
        private $m_icon = '';

        /** @var string $m_display_text Text to be displayed on the Link Stack. */
        private $m_display_text = '';

        /** @var string $sort_function A static sort function from
         * {@see \RLHProject\LinkCard} to be applied to the Link Stack.
         */
        private $m_sort_function = null;

        /** @var string $m_content Any number of Link Cards to be placed inside
         * this Link Stack.
         */
        private $m_content = null;

        /**
         * LinkStack class constructor.
         * 
         * Creates a new Link Stack object with the specified icon, display text,
         * sort function, and content.
         * 
         * @param string $icon          Icon to be displayed on the Link Stack.
         * @param string $display_text  Text to be displayed on the Link Stack.
         * @param mixed  $sort_function (Callable) A static sort function from
         * {@see \RLHProject\LinkCard} to be applied to the Link Stack.
         * @param mixed  $content       Any number of Link Cards to be placed
         * inside this Link Stack.
         * 
         * @return void
         * 
         * @throws \Exception If $icon or $display_text are not valid non-zero-
         * length strings, an Exception will be thrown.
         * 
         * @since 1.0.0
         */
        public function __construct($icon, $display_text, $sort_function, ...$content) {

            // store the data
            $this->set_icon($icon);
            $this->set_display_text($display_text);
            $this->set_sort_function($sort_function);
            $this->set_content($content);
        }

        /**
         * Set the icon.
         * 
         * Specify the icon to be displayed on the Link Stack, in the form of
         * a FontAwesome icon class (i.e., "fab fa-wordpress").
         * 
         * @param string $icon Icon to be displayed on the Link Stack, in the
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
         * Specify the text to be displayed on the Link Stack.
         * 
         * @param string $display_text Text to be displayed on the Link Stack.
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
         * Set the sort function.
         * 
         * Specify the sort function to be applied to this Link Stack.
         * 
         * @param mixed  $sort_function (Callable) A static sort function from
         * {@see \RLHProject\LinkCard} to be applied to the Link Stack.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function set_sort_function($sort_function) {

            // set the sort function
            $this->m_sort_function = $sort_function;
        }

        /**
         * Set the content array.
         * 
         * Specify the contents of this Link Stack in the form of an array of
         * Link Cards.
         * 
         * @param mixed  $content An array of {@see \RLHProject\LinkCard}
         * objects to be displayed by this Link Stack.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function set_content($content) {

            // set the content
            $this->m_content = $content;
        }

        /**
         * Get the icon.
         * 
         * Retrieve the icon associated with this LinkStack object.
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
         * Retrieve the display text associated with this LinkStack object.
         * 
         * @return string The display text associated with this object.
         * 
         * @since 1.0.0
         */
        public function get_display_text() {
            return $this->m_display_text;
        }

        /**
         * Get the sort function.
         * 
         * Retrieve the sort function associated with this LinkStack object.
         * 
         * @return mixed (Callable) The sort function associated with this object.
         * 
         * @since 1.0.0
         */
        public function get_sort_function() {
            return $this->m_sort_function;
        }

        /**
         * Get the contents.
         * 
         * Retrieve the array of Link Cards associated with this LinkStack object.
         * 
         * @return mixed The contents associated with this object.
         * 
         * @since 1.0.0
         */
        public function get_content() {
            return $this->m_content;
        }

        /**
         * Output the link stack.
         * 
         * Render the HTML code to display this Link Stack object.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function output_html() {

            // sort the Link Cards
            usort($this->m_content, $this->m_sort_function);

            // prepare content array with icon & header
            $content = [
                _div('class=rlh-link-stack-header',
                    _i("class=$this->m_icon style=padding-right:.5em"),
                    $this->m_display_text,
                )
            ];
            
            // add the link cards
            foreach ($this->m_content as $link_card)
                array_push($content, $link_card);
                
            // output the link stack
            _div('class=rlh-link-stack-outer',
                _div('class=rlh-link-stack', $content))->output_html();
        }

        /**
         * Get the Link Stack CSS.
         * 
         * Get the CSS for properly displaying Link Stacks.
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

.rlh-link-stack-outer {
    border: 4px solid red;
    flex:   1 1 calc($width + $border + $border);
}

.rlh-link-stack {
    background: orange;
    width:      calc($width + $border + $border);
    padding:    $border 0;
}

.rlh-link-stack-header {
    height: $height;
}
            
        "; }
    }
}
            
?>