<?php
/**
 * Class for displaying groups of stacked link cards.
 * 
 * This class encapsulates a group of {@see \RLHProject\LinkStack} objects
 * for easy and organized output and display on a webpage.
 * 
 * @author    Randall Hedglin <randallhedglin@yahoo.com>
 * @copyright Copyright (c) 2021 Randall Hedglin
 * @license   Private
 * @package   RLHProject
 * @version   1.0.0 Original release.
 */

namespace RLHProject;

// class already defined?
if (!class_exists('LinkContainer')) {

    /**
     * Class for displaying groups of stacked link cards.
     * 
     * This class encapsulates a group of {@see \RLHProject\LinkStack} objects
     * for easy and organized output and display on a webpage.
     * 
     * @since 1.0.0
     */
    class LinkContainer {

        /** @var string $m_content Any number of Link Stacks to be placed inside
         * this Link Container.
         */
        private $m_content = null;

        /**
         * LinkContainer class constructor.
         * 
         * Creates a new Link Container object using the specified Link Stacks.
         * 
         * @param mixed  $content Any number of Link Stacks to be placed
         * inside this Link Container.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct(...$content) {

            // store the data
            $this->set_content($content);
        }

        /**
         * Set the content array.
         * 
         * Specify the contents of this Link Stack in the form of an array of
         * Link Stacks.
         * 
         * @param mixed  $content An array of {@see \RLHProject\LinkStack}
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
         * Get the contents.
         * 
         * Retrieve the array of Link Stacks associated with this LinkContainer
         * object.
         * 
         * @return mixed The contents associated with this object.
         * 
         * @since 1.0.0
         */
        public function get_content() {
            return $this->m_content;
        }

        /**
         * Output the link container.
         * 
         * Render the HTML code to display this Link Container object.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function output_html() {

            // output the link container with content
            _div('class=rlh-link-container-outer',
                _div('class=rlh-link-container', $this->m_content))->output_html();
        }

        /**
         * Get the Link Container CSS.
         * 
         * Get the CSS for properly displaying Link Containers.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public static function get_css() { return '

.rlh-link-container-outer {
    display:      flex;
    flex-flow:    col nowrap;
    min-height:   100%;
    margin-left:  3%;
    margin-right: 3%;
}

.rlh-link-container {
    display:   flex;
    flex-flow: row wrap;
    flex:      1;
}
            
'; }
    }
}
                        
?>