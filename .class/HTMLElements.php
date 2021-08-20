<?php
/**
 * PHP classes for creating HTML elements in a simple and organized manner.
 * 
 * The HTMLElements namespace contains classes for incorporating many HTML 5.0
 * tags.  The _HTMLElement class serves as a base class for all other
 * HTMLElements classes.
 * 
 * You will find useful information in the documentation of the _HTMLElements
 * constructor expaining how to use all the remaining HTMLElements classes,
 * most importantly the $attributes parameter.
 
 * @author    Randall Hedglin <randallhedglin@yahoo.com>
 * @copyright Copyright (c) 2021 Randall Hedglin
 * @license   Private
 * @package   HTMLElements
 * @version   1.0.0 Original release.
 */

namespace HTMLElements;

// classes already defined?
if (!class_exists('HTMLElements\\_HTMLElement')) {

    /**
     * Base class for all other HTMLElements classes.
     * 
     * This class serves as the base class for all other HTMLElements classes.
     * You will find useful information in the documentation of the _HTMLElement
     * constructor (see {@see _HTMLElement::__construct()}) expaining how to
     * use all the remaining HTMLElements classes, most importantly the
     * $attributes parameter.
     * 
     * @since 1.0.0
     */
    class _HTMLElement {

        /** 
         * @var string $m_tag The HTML tag associated with this _HTMLElement.
         */
        private $m_tag = null;

        /**
         * @var string[] $m_attributes The HTML attributes associated with this
         * _HTMLElement.
         */
        private $m_attributes = null;

        /**
         * @var string[] $m_reserved_attributes The "special/reserved"
         * attributes associated with this _HTMLElement.
         */
        private $m_reserved_attributes = array();

        /**
         * @var string $m_pre_output Text to be output before the HTML tag.
         */
        private $m_pre_output = null;

        /**
         * _HTMLElement class constructor.
         * 
         * Creates a new _HTMLElement object with the specified tag and
         * attributes.  If $tag is null or contains a zero-length string, the
         * $attributes parameter will be ignored, and no HTML will be produced
         * during output of this _HTMLElement.
         * 
         * If supplied, the optional $attributes parameter must be an
         * associative array containing any combination of HTML attributes and
         * "special/reserved" attributes (as described below) to be applied to
         * the _HTMLElement.
         * 
         * The following "special/reserved" attributes are available, but all
         * are optional:
         * 
         * + '_classes':  An array of strings containing a list of classes to be
         *  applied to this _HTMLElement.  If $attributes also contains a
         * 'class' attribute, the classes listed in '_classes' will be appended
         * to any value given in the 'class' attribute.
         * 
         * + '_content':  A single string or an array containing any combination
         * of strings and other _HTMLElement objects* to be nested within this
         * _HTMLElement.
         * 
         * + '_styles':  An associative array containing a list of CSS styles,
         * in the format 'property' => 'value', to be applied to this
         * _HTMLElement.  If $attributes also contains a 'style' attribute, the
         * style properties listed in '_styles' will be appended to any value
         * given in the 'style' attribute.
         * 
         * \* This includes any object that is an _HTMLElement or subclass of
         * _HTMLElement, or any object that includes an "output_html(void)"
         * method.
         *  
         * For forward compatibility, no validation of $tag or $attributes
         * is performed by _HTMLElement, other than ensuring that only valid
         * "special/reserved" attributes are used; however, derived classes
         * may require certain parameters to be present within $attributes.
         * Such requirements will be documented within the derived class.
         * 
         * NOTE:  Please be aware that if any attribute value passed in the
         * $attributes parameter contains both a single quote (') and a double
         * quote (") in the same string, an exception will be thrown upon
         * calling {@see _HTMLElement::output_html()}.
         * 
         * @param string $tag The HTML tag associated with this _HTMLElement.
         * 
         * @param string[] $attributes Optional:  An associative array containing 
         * any combination of HTML attributes, in the format 'attribute' =>
         * 'value', or "special/reserved" attributes (as described above), to be
         * applied to the HTML tag associated with this _HTMLElement.<br><br>
         * IMPORTANT:  For proper functioning, all attributes and values passed
         * via $attributes:  (a) must be in lowercase and (b) must not contain
         * leading or trailing whitespace.  In the interest of efficiency,
         * these factors are not verified or modified at runtime.  If any part
         * of $attributes includes any of these characteristics, results are
         * undefined.
         * 
         * @return void
         * 
         * @throws \Exception If any invalid "special/reserved" attribute
         * (i.e., any attribute beginning with an underscore) is supplied, an
         * Exception wil be thrown.
         * 
         * @since 1.0.0
         */
        public function __construct($tag, $attributes = null) {

            // store the data
            $this->m_tag        = $tag;
            $this->m_attributes = $attributes;

            // separate special/reserved attributes
            $this->separate_reserved_attributes();

            // validate special/reserved attributes
            $invalid_attribute = $this->validate_reserved_attributes();
            
            // check for invalid attribute
            if ($invalid_attribute)
                throw new \Exception(__METHOD__ . "(): Invalid special/reserved attribute '$invalid_attribute' passed.");
        }

        /**
         * Separate "special/reserved" attributes from other HTML attributes.
         * 
         * This function removes any "special/reserved" attributes found in the
         * $m_attributes array (i.e., any attribute beginning with an
         * underscore) and moves them to the $m_reserved_attributes array.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        private function separate_reserved_attributes() {

            // verify attributes array
            if (is_array($this->m_attributes)) {

                // get keys & values
                $keys   = array_keys($this->m_attributes);
                $values = array_values($this->m_attributes);
                
                // reset index counter
                $i = 0;

                // process attributes
                while ($i < count($keys)) {

                    // check for "special/reserved" attribute
                    if ('_' === substr($keys[$i], 0, 1)) {
                        
                        // move to reserved attributes array
                        $this->m_reserved_attributes[$keys[$i]] = $values[$i];

                        // remove from keys/values & reprocess this index
                        array_splice($keys, $i, 1);
                        array_splice($values, $i, 1);
                    }
                    else {

                        // increment index counter
                        $i++;
                    }
                }

                // reconstruct attributes array
                $this->m_attributes = array_combine($keys, $values);
            }
        }

        /**
         * Validate "special/reserved" attributes.
         * 
         * This function determines if the $m_reserved_attributes array
         * contains any attributes that are not valid.
         *
         * @return string If an invalid attribute is found, the offending
         * attribute is returned.  If all attributes are valid, returns null.
         * 
         * @since 1.0.0
         */
        private function validate_reserved_attributes() {

            // verify reserved attributes array
            if (is_array($this->m_reserved_attributes)) {

                // get keys
                $keys = array_keys($this->m_reserved_attributes);
                
                // process keys
                for ($i = 0; $i < count($keys); $i++) {

                    // check for valid special/reserved attributes
                    switch ($keys[$i]) {

                        // valid
                        case('_classes'):
                        case('_content'):
                        case('_styles'):

                            // ok
                            break;

                        // invalid
                        default:
                        
                            // return the offending attribute
                            return($keys[$i]);
                    }
                }
            }

            // ok
            return null;
        }

        /**
         * Prepend a class name to any existing class names.
         * 
         * This function first checks to see if $m_attributes contains any
         * class names.  If so, the new class name is prepended to the list
         * (provided it's not already in the list).  If not, a 'class'
         * attribute is created with the new class name.
         * 
         * @param string $class_name The new class name to be prepended to the
         * list.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        protected function prepend_class($class_name) {

            // got any classy attributes?
            if (array_key_exists('class', $this->m_attributes)) {

                // get the existing classes
                $existing_classes = $this->m_attributes['class'];

                // not in the list yet?
                if (false === strpos(" $existing_classes ", " $class_name ")) {

                    // prepend it
                    $this->m_attributes['class'] = "$class_name $existing_classes";
                }
            }
            else {

                // create the class list with the new name
                $this->m_attributes['class'] = $class_name;
            }
        }

        /**
         * Append a class name to any existing class names.
         * 
         * This function first checks to see if $m_reserved_attributes contains
         * any classes.  If so, the new class name is added to the end of the
         * list of classes (unless it's already in the list).  If not, a list
         * of classes is created, and the new class is added to that list.
         * 
         * @param string $class_name The new class name to be appended to the
         * list.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        protected function append_class($class_name) {

            // got any classy reserved attributes?
            if (array_key_exists('_classes', $this->m_reserved_attributes)) {

                // not in the list yet?
                if (false === in_array($class_name, $this->m_reserved_attributes['_classes'])) {

                    // append it
                    array_push($this->m_reserved_attributes['_classes'], $class_name);
                }
            }
            else {

                // create the class list with the new name
                $this->m_reserved_attributes['_classes'] = array($class_name);
            }
        }

        /**
         * Prepend a stylesheet property to any existing stylesheet properties.
         * 
         * This function first checks to see if $m_attributes contains any
         * stylesheet properties.  If so, the new stylesheet property is
         * prepended to the list (unless the property is already in the list,
         * in which case its value is replaced with the new value).  If not, a
         * 'style' attribute is created with the new stylesheet property.
         * 
         * @param string $property A CSS stylesheet property to be prepended
         * to the list of stylesheet properties.
         * 
         * @param string $value The value to be assigned to $property.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        protected function prepend_style($property, $value) {

            // got any stylish attributes?
            if (array_key_exists('style', $this->m_attributes)) {

                // get the existing styles
                $existing_styles = $this->deconstruct_style_string($this->m_attributes['style']);

                // append/replace the value
                $existing_styles[$property] = $value;

                // store the updated style list
                $this->m_attributes['style'] = $this->reconstruct_style_string($existing_styles);
            }
            else {

                // create the style list with the new property & value
                $this->m_attributes['style'] = "$property:$value";
            }
        }

        /**
         * Append a stylesheet property to any existing stylesheet properties.
         * 
         * This function first checks to see if $m_reserved_attributes contains
         * any stylesheet properties.  If so, the new stylesheet property is
         * added to the end of the list of properties (unless it's already in
         * the list, in which case its value is replaced with the new value).
         * If not, a list of stylesheet properties is created, and the new
         * property is added to that list.
         * 
         * @param string $property A CSS stylesheet property to be prepended
         * to the list of stylesheet properties.
         * 
         * @param string $value The value to be assigned to $property.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        protected function append_style($property, $value) {

            // got any stylish reserved attributes?
            if (array_key_exists('_styles', $this->m_reserved_attributes)) {

                // append/replace the value
                $this->m_reserved_attributes['_styles'][$property] = $value;
            }
            else {

                // create the property & value with the new name
                $this->m_reserved_attributes['_styles'] = array($property => $value);
            }
        }

        /**
         * Prepend a value to any existing attribute.
         * 
         * This function first checks to see if $m_attributes contains the
         * requested attribute.  If so, the new attribute value is prepended
         * to the list (provided it's not already in the list).  If not, a new
         * attribute is created with the new value.
         * 
         * @param string $attribute The attribute to be added to this
         * _HTMLElement object.
         * 
         * @param string $value The value to be associated with $attribute.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        protected function prepend_attribute($attribute, $value) {

            // does the attribute exist?
            if (array_key_exists($attribute, $this->m_attributes)) {

                // get the existing values
                $existing_values = $this->m_attributes[$attribute];

                // not in the list yet?
                if (false === strpos(" $existing_values ", " $value ")) {

                    // prepend it
                    $this->m_attributes[$attribute] = "$value $existing_values";
                }
            }
            else {

                // create the new attribute with the given value
                $this->m_attributes[$attribute] = $value;
            }
        }

        /**
         * Append a value to any existing attribute.
         * 
         * This function first checks to see if $m_attributes contains the
         * requested attribute.  If so, the new attribute value is appended
         * to the list (provided it's not already in the list).  If not, a new
         * attribute is created with the new value.
         * 
         * @param string $attribute The attribute to be added to this
         * _HTMLElement object.
         * 
         * @param string $value The value to be associated with $attribute.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        protected function append_attribute($attribute, $value) {

            // does the attribute exist?
            if (array_key_exists($attribute, $this->m_attributes)) {

                // get the existing values
                $existing_values = $this->m_attributes[$attribute];

                // not in the list yet?
                if (false === strpos(" $existing_values ", " $value ")) {

                    // append it
                    $this->m_attributes[$attribute] = "$existing_values $value";
                }
            }
            else {

                // create the new attribute with the given value
                $this->m_attributes[$attribute] = $value;
            }
        }

        /**
         * Convert a string containing CSS properties and values into an associative array.
         * 
         * This function accepts as input a string containing CSS properties
         * and values (in the format 'property-1:value-1;property-2:value-2')
         * and converts it into an associative array ('property-1' =>
         * 'value-1', 'property-2' => 'value-2').  For forward compatibility,
         * no validation is performed of either properties or values.
         * 
         * @param string $styles A CSS style string in the format
         * 'property-1:value-1;property-2:value-2'.
         * 
         * @return string[] An associative array containing CSS properties in the
         * format ('property-1' => 'value-1', 'property-2' => 'value-2').
         * 
         * @throws \Exception If an improperly formatted key/value pair is
         * encountered (i.e., property/value pairs are not separated by
         * semicolons or properties and values are not separated by a colon),
         * an Exception will be thrown.
         */
        private function deconstruct_style_string($styles) {

            // prepare output
            $output = array();
            
            // anything to do?
            if ($styles) {

                // get the list of properties
                $properties = explode(';', $styles);

                // process each property
                for ($i = 0; $i < count($properties); $i++) {

                    // get key & value
                    $key_and_value = explode(':', $properties[$i]);

                    // validate result
                    if (2 === count($key_and_value)) {

                        // save to output
                        $output[$key_and_value[0]] = $key_and_value[1];
                    }
                    else
                        throw new \Exception(__METHOD__ . "(): Invalid property:value pair: '" . $properties[$i] . "'.");
                }
            }

            // return the result
            return $output;
        }

        /**
         * Convert an associative array containing CSS properties into a properly formatted string.
         * 
         * This function accepts as input an associative array containing CSS
         * properties ('property-1' => 'value-1', 'property-2' => 'value-2')
         * and converts it into a properly formatted style string (in the
         * format 'property-1:value-1;property-2:value-2').  For forward
         * compatibility, no validation is performed of either properties or
         * values.
         * 
         * @param string[] $styles An associative array containing CSS
         * properties in the format ('property-1' => 'value-1', 'property-2'
         * => 'value-2').
         * 
         * @return string A CSS style string in the format
         * 'property-1:value-1;property-2:value-2'.
         */
        private function reconstruct_style_string($styles) {

            // prepare output
            $output = '';
            
            // anything to do?
            if (is_array($styles)) {

                // get keys & values
                $keys   = array_keys($styles);
                $values = array_values($styles);

                // process each pair
                for ($i = 0; $i < count($keys); $i++) {

                    // add to output
                    $output .= $keys[$i] . ':' . $values[$i] . ';';
                }

                // delete trailing semicolon
                $output = substr($output, 0, -1);
            }

            // return the result
            return $output;
        }

        /**
         * Prepare a string containing the HTML attributes for this _HTMLElement.
         * 
         * This function constructs a string based on all attributes passed in
         * the constructor function for this _HTMLElement.
         * 
         * @return string A properly formatted string containing all HTML
         * attributes passed in the constructor function for this _HTMLElement.
         * 
         * @throws \Exception If any attribute value earlier passed to the
         * class constructor contains both a single quote (') and a double
         * quote (") in the same string, an exception will be thrown here.
         * 
         * @since 1.0.0
         */
        private function prepare_html_attributes_string() {

            // combine attributes & reserved attributes
            $attributes = $this->combine_attributes_and_reserved_attributes();

            // get attribute keys & values
            $keys   = array_keys($attributes);
            $values = array_values($attributes);

            // prepare output
            $output = '';

            // process each attribute/value pair
            for ($i = 0; $i < count($keys); $i++) {

                // check for single quotes
                if (false === strpos($values[$i], "'")) {

                    // enclose in single quotes
                    $output .= $keys[$i] . "='" . $values[$i] . "' ";
                }
                else {

                    // check for double quotes
                    if (false === strpos($values[$i], '"')) {

                        // enclose in double quotes
                        $output .= $keys[$i] . '="' . $values[$i] . '" ';
                    }
                    else
                        throw new \Exception(__METHOD__ . "(): Attribute value cannot contain both single and double quotes: '" . $values[$i] . "'.");
                }
            }
            
            // trim trailing space & return result
            return rtrim($output);
        }

        /**
         * Combine attributes with reserved attributes for output.
         * 
         * This function creates and returns a working copy of $m_attributes
         * that has been combined with the values in $m_reserved_attributes
         * (excluding and/or combining duplicates between the two).
         * 
         * @return string[] An associative array containing the result of the
         * above-described concatenation.
         * 
         * @since 1.0.0
         */
        private function combine_attributes_and_reserved_attributes() {

            // get working copy of attributes
            $attributes = is_array($this->m_attributes) ? $this->m_attributes : array();

            // extract classes & styles from attributes
            $class = array_key_exists('class', $attributes) ? $attributes['class'] : '';
            $style = array_key_exists('style', $attributes) ? $attributes['style'] : '';

            // add reserved classes & styles
            $class = $this->insert_reserved_classes($class);
            $style = $this->insert_reserved_styles($style);

            // reinsert classes & styles into attributes
            if ($class) $attributes['class'] = $class;
            if ($style) $attributes['style'] = $style;

            // return result
            return $attributes;
        }

        /**
         * Insert classes from $m_reserved_attributes into the passed string.
         * 
         * This function adds or combines all classes from
         * $m_reserved_attributes into the passed string and returns the
         * result of that concatenation.
         * 
         * @param string $class A string containing class names (presumably
         * from $m_attributes).
         * 
         * @return string The result of the above-described concatenation.
         * 
         * @since 1.0.0
         */
        private function insert_reserved_classes($class) {

            // got any classy reserved attributes?
            if (array_key_exists('_classes', $this->m_reserved_attributes)) {

                // get the reserved classes
                $reserved_classes = $this->m_reserved_attributes['_classes'];

                // process each one
                for ($i = 0; $i < count($reserved_classes); $i++) {

                    // not in the list yet?
                    if (false === strpos(" $class ", ' ' . $reserved_classes[$i] . ' ')) {

                        // append it
                        $class .= ' ' . $reserved_classes[$i];
                    }
                }
            }

            // return the result
            return $class;
        }

        /**
         * Insert styles from $m_reserved_attributes into the passed string.
         * 
         * This function adds or combines all styles from
         * $m_reserved_attributes into the passed string and returns the
         * result of that concatenation.
         * 
         * @param string $style A string containing stylesheet properties
         * (presumably from $m_attributes).
         * 
         * @return string The result of the above-described concatenation.
         * 
         * @since 1.0.0
         */
        private function insert_reserved_styles($style) {

            // got any stylish reserved attributes?
            if (array_key_exists('_styles', $this->m_reserved_attributes)) {

                // get the existing styles
                $existing_styles = $this->deconstruct_style_string($style);

                // get the reserved styles
                $reserved_styles = $this->m_reserved_attributes['_styles'];

                // extract keys & values
                $reserved_style_keys   = array_keys($reserved_styles);
                $reserved_style_values = array_values($reserved_styles);

                // process each one
                for ($i = 0; $i < count($reserved_style_keys); $i++) {

                    // add/replace the value
                    $existing_styles[$reserved_style_keys[$i]] = $reserved_style_values[$i];
                }

                // put the style string back together
                $style = $this->reconstruct_style_string($existing_styles);
            }

            // return the result
            return $style;
        }

        /**
         * Output the HTML associated with this _HTMLElement.
         * 
         * This function outputs the HTML opening tag, along with any
         * attributes that have been specified, then any enclosed '_content',
         * followed by the HTML closing tag associated with this _HTMLElement.
         * 
         * If there is no '_content' specified, then the opening tag is closed
         * immediately (i.e., &lt;tag attribute='value' /&gt;).
         * 
         * @throws \Exception If any attribute value earlier passed to the
         * class constructor contains both a single quote (') and a double
         * quote (") in the same string, an exception will be thrown here.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function output_html() {

            // check tag
            if ($this->m_tag) {

                // output pre-output (if available)
                if ($this->m_pre_output)
                    echo $this->m_pre_output;

                // prepare attributes string
                $attributes = $this->prepare_html_attributes_string();

                // check for content
                if (array_key_exists('_content', $this->m_reserved_attributes)) {

                    // output opening tag
                    echo ($attributes ? "<$this->m_tag $attributes>" : "<$this->m_tag>");

                    // output inner content
                    $this->output_html_inner_content($this->m_reserved_attributes['_content']);

                    // output closing tag
                    echo "</$this->m_tag>";
                }
                else
                {
                    // output contentless html tag
                    echo ($attributes ? "<$this->m_tag $attributes></$this->m_tag>" : "<$this->m_tag></$this->m_tag>");
                }
            }
        }

        /**
         * Output the inner HTML content associated with this _HTMLElement.
         * 
         * This function outputs the HTML '_content' specified in
         * $m_reserved_attributes, recursively if needed.  (This function
         * assumes that '_content' has already been verified to exist.)
         * 
         * @param object[] $content The content to be processed.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        private function output_html_inner_content($content) {

            // check content type
            if (is_string($content)) {

                // output the string
                echo $content;

            }
            else if (is_object($content) && method_exists($content, 'output_html')) {

                // output the object (fail silently)
                try { $content->output_html(); } catch (\Exception $e) {}
            }
            else if (is_array($content)) {

                // process the array
                while(count($content)) {

                    // process the next item
                    $this->output_html_inner_content(array_shift($content));
                }
            }
        }

        /**
         * Set a pre-output string for this _HTMLElement.
         * 
         * This function defines a string that is to be output before the HTML tag
         * associated with this _HTMLElement.  (This is primarily used to output
         * a &lt;DOCTYPE&gt; tag prior to the &lt;html&gt; tag.)
         * 
         * @param string $value The pre-output string to be used.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        protected function set_pre_output_text($value) {

            // save the string
            $this->m_pre_output = $value;
        }

        /**
         * Prepare attributes array for helper functions.
         * 
         * This function accepts an attributes string and content from a helper
         * function and combines them into a proper $attributes array for the
         * associated _HTMLElement.
         * 
         * @param string $attributes The attributes string passed to the helper
         * function.
         * 
         * @param object[] $content Any content passed to the
         * helper function.
         * 
         * @return object[] An array containing suitable attributes for all
         * _HTMLElement constructor functions.
         * 
         * @throws \Exception If $attributes does not contain valid
         * 'key="value"' pairs, an exception will be thrown.
         * 
         * @since 1.0.0
         */
        public static function prepare_attributes_for_helper_function($attributes, $content) {

            // get the components
            $components = _HTMLElement::get_string_components_from_attributes($attributes);

            // prepare keys & values
            $keys = $values = array();

            // extract key/value pairs from components
            _HTMLElement::extract_key_value_pairs_from_components($keys, $values, $components);

            // prepare the output
            $output = array_combine($keys, $values);

            // append the _content
            if ($content)
                $output['_content'] = $content;

            // return result
            return $output;
        }

        /**
         * Prepare components array from attributes string.
         * 
         * This function accepts an attributes string and converts it into an 
         * array of 'key="value"' pairs.
         * 
         * @param string $attributes The attributes string passed to the helper
         * function.
         * 
         * @return string[] An array containing separated 'key="value"' pairs (in
         * string form) as parsed from $attributes.
         * 
         * @throws \Exception If $attributes are passed but not as a string, an
         * Exception will be thrown.
         *
         * @since 1.0.0
         */
        private static function get_string_components_from_attributes($attributes) {

            // validate attributes
            if ($attributes && !is_string($attributes))
                throw new \Exception(__METHOD__ . "(): Non-string attributes '$attributes' passed.");   

            // explode the attributes
            $components = explode(' ', trim($attributes));

            // combine grouped components
            for ($i = 1; $i < count($components); $i++) {

                // not a key/value pair?
                if (false === strpos($components[$i], '=')) {

                    // append it to the previous component
                    $components[$i - 1] .= ' ' . $components[$i];

                    // remove this component
                    array_splice($components, $i, 1);

                    // process this item again
                    $i--;
                }
            }

            // return result
            return $components;
        }

        /**
         * Extract key/value pairs from components array.
         * 
         * This function accepts a components array and extracts the associated
         * key/value pairs from it, returning the components as individual
         * arrays.
         * 
         * @param string[] $keys Iniitalized, empty array which will be filled
         * with the keys found in $components.
         * 
         * @param string[] $values Iniitalized, empty array which will be filled
         * with the values found in $components.
         * 
         * @param string[] $components A components array, as returned by
         * {@see _HTMLElement::get_string_components_from_attributes}.
         * 
         * @throws \Exception If $attributes does not contain valid
         * 'key="value"' pairs, an exception will be thrown.
         * 
         * @return void

         * @since 1.0.0
         */

         private static function extract_key_value_pairs_from_components(&$keys, &$values, $components) {

            // process each component
            for ($i = 0; $i < count($components); $i++) {

                // skip empty strings
                if (strlen($components[$i]) > 0) {

                    // explode it
                    $key_value = explode('=', $components[$i], 2);

                    // check for bad pair
                    if (2 !== count($key_value))
                        throw new \Exception(__METHOD__ . "(): Invalid key/value pair '" . $components[$i] . "' passed.");

                    // remove opening/closing quotes from value
                    if (substr($key_value[1], 0, 1) === substr($key_value[1], -1, 1))
                        if (substr($key_value[1], 0, 1) === '"' || substr($key_value[1], 0, 1) === "'")
                            $key_value[1] = substr($key_value[1], 1, -1);

                    // assign to provided arrays
                    array_push($keys,   trim($key_value[0]));
                    array_push($values, trim($key_value[1]));
                }
            }
        }
    }

    /**
     * HTML anchor tag <a>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Anchor extends _HTMLElement {
        /**
         * Anchor tag <a> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('a', $attributes);
        }
    }

    /**
     * HTML anchor tag <a> for opening a link in a new tab.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class AnchorLink extends _HTMLElement {
        /**
         * Anchor tag <a> class constructor for opening a link in a new tab.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('a', $attributes);

            // add attributes specific to this element
            $this->append_attribute('target', '_blank');
            $this->append_attribute('rel',    'noopener');
            $this->append_attribute('rel',    'noreferrer');
        }
    }

    /**
     * HTML base tag <base>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Base extends _HTMLElement {
        /**
         * Base tag <base> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('base', $attributes);
        }
    }

    /**
     * HTML block quote tag <blockquote>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class BlockQuote extends _HTMLElement {
        /**
         * Block quote tag <blockquote> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('blockquote', $attributes);
        }
    }

    /**
     * HTML body tag <body>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Body extends _HTMLElement {
        /**
         * Body tag <body> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('body', $attributes);
        }
    }

    /**
     * HTML button tag <button>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Button extends _HTMLElement {
        /**
         * Button tag <button> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('button', $attributes);
        }
    }

    /**
     * HTML code tag <code>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Code extends _HTMLElement {
        /**
         * Code tag <code> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('code', $attributes);
        }
    }

    /**
     * HTML data list tag <datalist>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class DataList extends _HTMLElement {
        /**
         * Data list tag <datalist> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('datalist', $attributes);
        }
    }

    /**
     * HTML deleted tag <del>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Deleted extends _HTMLElement {
        /**
         * Deleted tag <del> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('del', $attributes);
        }
    }

    /**
     * HTML details tag <details>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Details extends _HTMLElement {
        /**
         * Details tag <details> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('details', $attributes);
        }
    }

    /**
     * HTML division tag <div>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Division extends _HTMLElement {
        /**
         * Division tag <div> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('div', $attributes);
        }
    }

    /**
     * HTML division tag <div>, styled for use as a table.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class DivisionTable extends _HTMLElement {
        /**
         * Division tag <div> class constructor, with styling for use as a table.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('div', $attributes);

            // add attributes specific to this element
            $this->append_style('display', 'table');
        }
    }

    /**
     * HTML division tag <div>, styled for use as a table caption.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class DivisionTableCaption extends _HTMLElement {
        /**
         * Division tag <div> class constructor, with styling for use as a table caption.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('div', $attributes);

            // add attributes specific to this element
            $this->append_style('display', 'table-caption');
        }
    }

    /**
     * HTML division tag <div>, styled for use as a table cell.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class DivisionTableCell extends _HTMLElement {
        /**
         * Division tag <div> class constructor, with styling for use as a table cell.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('div', $attributes);

            // add attributes specific to this element
            $this->append_style('display', 'table-cell');
        }
    }

    /**
     * HTML division tag <div>, styled for use as a table row.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class DivisionTableRow extends _HTMLElement {
        /**
         * Division tag <div> class constructor, with styling for use as a table row.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('div', $attributes);

            // add attributes specific to this element
            $this->append_style('display', 'table-row');
        }
    }

    /**
     * HTML form tag <form>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Form extends _HTMLElement {
        /**
         * Form tag <form> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('form', $attributes);
        }
    }

    /**
     * HTML heading level 1 tag <h1>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Heading1 extends _HTMLElement {
        /**
         * Heading level 1 tag <h1> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('h1', $attributes);
        }
    }

    /**
     * HTML heading level 2 tag <h2>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Heading2 extends _HTMLElement {
        /**
         * Heading level 2 tag <h2> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('h2', $attributes);
        }
    }

    /**
     * HTML heading level 3 tag <h3>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Heading3 extends _HTMLElement {
        /**
         * Heading level 3 tag <h3> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('h3', $attributes);
        }
    }

    /**
     * HTML heading level 4 tag <h4>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Heading4 extends _HTMLElement {
        /**
         * Heading level 4 tag <h4> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('h4', $attributes);
        }
    }

    /**
     * HTML heading level 5 tag <h5>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Heading5 extends _HTMLElement {
        /**
         * Heading level 5 tag <h5> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('h5', $attributes);
        }
    }

    /**
     * HTML heading level 6 tag <h6>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Heading6 extends _HTMLElement {
        /**
         * Heading level 6 tag <h6> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('h6', $attributes);
        }
    }

    /**
     * HTML head tag <head>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Head extends _HTMLElement {
        /**
         * Head tag <head> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('head', $attributes);
        }
    }

    /**
     * HTML tag <html>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class HTML extends _HTMLElement {
        /**
         * HTML tag <html> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('html', $attributes);

            // add attributes specific to this element
            $this->append_attribute('lang', 'en');

            // set pre-output text
            $this->set_pre_output_text('<!DOCTYPE html>');
        }
    }

    /**
     * HTML FontAwesome icon tag <i>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Icon extends _HTMLElement {
        /**
         * FontAwesome icon tag <i> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('i', $attributes);
        }
    }

    /**
     * HTML inline frame tag <iframe>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class InlineFrame extends _HTMLElement {
        /**
         * Inline frame tag <iframe> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('iframe', $attributes);
        }
    }

    /**
     * HTML image tag <img>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Image extends _HTMLElement {
        /**
         * Image tag <img> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('img', $attributes);
        }
    }

    /**
     * HTML input tag <input>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Input extends _HTMLElement {
        /**
         * Input tag <input> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('input', $attributes);
        }
    }

    /**
     * HTML inserted tag <ins>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Inserted extends _HTMLElement {
        /**
         * Inserted tag <ins> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('ins', $attributes);
        }
    }

    /**
     * HTML label tag <label>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Label extends _HTMLElement {
        /**
         * Label tag <label> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('label', $attributes);
        }
    }

    /**
     * HTML list item tag <li>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class ListItem extends _HTMLElement {
        /**
         * List item tag <li> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('li', $attributes);
        }
    }

    /**
     * HTML link tag <link>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Link extends _HTMLElement {
        /**
         * Link tag <link> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('link', $attributes);
        }
    }

    /**
     * HTML link tag <link> for a stylesheet.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class LinkStylesheet extends _HTMLElement {
        /**
         * Link tag <link> class constructor for a sytlesheet.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('link', $attributes);

            // add attributes specific to this element
           $this->append_attribute('rel', 'stylesheet');
        }
    }

    /**
     * HTML meta tag <meta>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Meta extends _HTMLElement {
        /**
         * Meta tag <meta> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('meta', $attributes);
        }
    }

    /**
     * HTML ordered list tag <ol>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class OrderedList extends _HTMLElement {
        /**
         * Ordered list tag <ol> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('ol', $attributes);
        }
    }

    /**
     * HTML option tag <option>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Option extends _HTMLElement {
        /**
         * Option tag <option> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('option', $attributes);
        }
    }

    /**
     * HTML option group tag <optgroup>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class OptionGroup extends _HTMLElement {
        /**
         * Option group tag <optgroup> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('optgroup', $attributes);
        }
    }

    /**
     * HTML paragraph tag <p>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Paragraph extends _HTMLElement {
        /**
         * Paragraph tag <p> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('p', $attributes);
        }
    }

    /**
     * HTML preformatted tag <pre>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Preformatted extends _HTMLElement {
        /**
         * Preformatted tag <pre> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('pre', $attributes);
        }
    }

    /**
     * HTML script tag <script>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Script extends _HTMLElement {
        /**
         * Script tag <script> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('script', $attributes);
        }
    }

    /**
     * HTML select tag <select>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Select extends _HTMLElement {
        /**
         * Select tag <select> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('select', $attributes);
        }
    }

    /**
     * HTML span tag <span>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Span extends _HTMLElement {
        /**
         * Span tag <span> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('span', $attributes);
        }
    }

    /**
     * HTML style tag <style>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Style extends _HTMLElement {
        /**
         * Style tag <style> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('style', $attributes);
        }
    }

    /**
     * HTML summary tag <summary>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Summary extends _HTMLElement {
        /**
         * Summary tag <summary> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('summary', $attributes);
        }
    }

    /**
     * HTML text area tag <textarea>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class TextArea extends _HTMLElement {
        /**
         * Text area tag <textarea> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('textarea', $attributes);
        }
    }

    /**
     * HTML time tag <time>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Time extends _HTMLElement {
        /**
         * Time tag <time> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('time', $attributes);
        }
    }

    /**
     * HTML title tag <title>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class Title extends _HTMLElement {
        /**
         * Title tag <title> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('title', $attributes);
        }
    }

    /**
     * HTML unordered list tag <ul>.
     * 
     * This class extends {@see _HTMLElement} specific to the above-noted
     * HTML tag.
     * 
     * @since 1.0.0
     */
    class UnorderedList extends _HTMLElement {
        /**
         * Unordered list tag <ul> class constructor.
         * 
         * Creates the above HTML object with the specified attributes.  For
         * further details on the $attributes parameter, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @param string[] $attributes Optional:  For more information, please see
         * {@see _HTMLElement::__construct()}.
         * 
         * @return void
         * 
         * @since 1.0.0
         */
        public function __construct($attributes = null) {

            // call parent constructor with required tag
            parent::__construct('ul', $attributes);
        }
    }
}

?>