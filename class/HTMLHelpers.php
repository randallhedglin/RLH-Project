<?php
/**
 * Helper functions for classes in the HTMLElements namespace.
 * 
 * The HTMLElements namespace contains classes for incorporating many HTML 5.0
 * tags.  Functions defined in this file (residing in the global namespace)
 * serve as helper functions for quick and easy output of HTMLElements
 * objects, nested to any level of complexity.
 
 * @author    Randall Hedglin <randallhedglin@yahoo.com>
 * @copyright Copyright (c) 2021 Randall Hedglin
 * @license   Private
 * @package   Global
 * @version   1.0.0 Original release.
 */

/**
 * Helper function for \HTMLElements\Anchor.
 * 
 * Creates and returns a new {@see \HTMLElements\Anchor}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Anchor A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _a($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Anchor(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\AnchorLink.
 * 
 * Creates and returns a new {@see \HTMLElements\AnchorLink}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\AnchorLink A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _a_link($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\AnchorLink(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Base.
 * 
 * Creates and returns a new {@see \HTMLElements\Base}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Base A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _base($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Base(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\BlockQuote.
 * 
 * Creates and returns a new {@see \HTMLElements\BlockQuote}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\BlockQuote A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _blockquote($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\BlockQuote(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Body.
 * 
 * Creates and returns a new {@see \HTMLElements\Body}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Body A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _body($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Body(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Button.
 * 
 * Creates and returns a new {@see \HTMLElements\Button}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Button A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _button($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Button(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Code.
 * 
 * Creates and returns a new {@see \HTMLElements\Code}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Code A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _code($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Code(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\DataList.
 * 
 * Creates and returns a new {@see \HTMLElements\DataList}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\DataList A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _datalist($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\DataList(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Deleted.
 * 
 * Creates and returns a new {@see \HTMLElements\Deleted}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Deleted A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _del($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Deleted(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Details.
 * 
 * Creates and returns a new {@see \HTMLElements\Details}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Details A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _details($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Details(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Division.
 * 
 * Creates and returns a new {@see \HTMLElements\Division}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Division A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _div($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Division(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\DivisionTable.
 * 
 * Creates and returns a new {@see \HTMLElements\DivisionTable}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\DivisionTable A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _div_table($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\DivisionTable(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\DivisionTableCaption.
 * 
 * Creates and returns a new {@see \HTMLElements\DivisionTableCaption}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\DivisionTableCaption A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _div_caption($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\DivisionTableCaption(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\DivisionTableCell.
 * 
 * Creates and returns a new {@see \HTMLElements\DivisionTableCell}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\DivisionTableCell A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _div_cell($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\DivisionTableCell(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\DivisionTableRow.
 * 
 * Creates and returns a new {@see \HTMLElements\DivisionTableRow}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\DivisionTableRow A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _div_row($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\DivisionTableRow(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Form.
 * 
 * Creates and returns a new {@see \HTMLElements\Form}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Form A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _form($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Form(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Heading1.
 * 
 * Creates and returns a new {@see \HTMLElements\Heading1}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Heading1 A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _h1($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Heading1(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Heading2.
 * 
 * Creates and returns a new {@see \HTMLElements\Heading2}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Heading2 A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _h2($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Heading2(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Heading3.
 * 
 * Creates and returns a new {@see \HTMLElements\Heading3}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Heading3 A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _h3($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Heading3(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Heading4.
 * 
 * Creates and returns a new {@see \HTMLElements\Heading4}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Heading4 A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _h4($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Heading4(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Heading5.
 * 
 * Creates and returns a new {@see \HTMLElements\Heading5}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Heading5 A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _h5($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Heading5(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Heading6.
 * 
 * Creates and returns a new {@see \HTMLElements\Heading6}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Heading6 A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _h6($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Heading6(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Head.
 * 
 * Creates and returns a new {@see \HTMLElements\Head}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Head A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _head($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Head(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\HTML.
 * 
 * Creates and returns a new {@see \HTMLElements\HTML}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\HTML A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _html($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\HTML(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Icon.
 * 
 * Creates and returns a new {@see \HTMLElements\Icon}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\InlineFrame A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _i($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Icon(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\InlineFrame.
 * 
 * Creates and returns a new {@see \HTMLElements\InlineFrame}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\InlineFrame A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _iframe($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\InlineFrame(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Image.
 * 
 * Creates and returns a new {@see \HTMLElements\Image}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Image A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _img($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Image(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Input.
 * 
 * Creates and returns a new {@see \HTMLElements\Input}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Input A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _input($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Input(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Inserted.
 * 
 * Creates and returns a new {@see \HTMLElements\Inserted}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Inserted A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _ins($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Inserted(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Label.
 * 
 * Creates and returns a new {@see \HTMLElements\Label}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Label A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _label($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Label(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\ListItem.
 * 
 * Creates and returns a new {@see \HTMLElements\ListItem}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\ListItem A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _li($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\ListItem(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Link.
 * 
 * Creates and returns a new {@see \HTMLElements\Link}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Link A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _link($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Link(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\LinkStylesheet.
 * 
 * Creates and returns a new {@see \HTMLElements\LinkStylesheet}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\LinkStylesheet A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _link_stylesheet($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\LinkStylesheet(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Meta.
 * 
 * Creates and returns a new {@see \HTMLElements\Meta}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Meta A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _meta($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Meta(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\OrderedList.
 * 
 * Creates and returns a new {@see \HTMLElements\OrderedList}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\OrderedList A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _ol($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\OrderedList(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Option.
 * 
 * Creates and returns a new {@see \HTMLElements\Option}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Option A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _option($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Option(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\OptionGroup.
 * 
 * Creates and returns a new {@see \HTMLElements\OptionGroup}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\OptionGroup A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _optgroup($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\OptionGroup(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Paragraph.
 * 
 * Creates and returns a new {@see \HTMLElements\Paragraph}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Paragraph A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _p($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Paragraph(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Preformatted.
 * 
 * Creates and returns a new {@see \HTMLElements\Preformatted}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Preformatted A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _pre($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Preformatted(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Script.
 * 
 * Creates and returns a new {@see \HTMLElements\Script}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Script A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _script($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Script(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Select.
 * 
 * Creates and returns a new {@see \HTMLElements\Select}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Select A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _select($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Select(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Span.
 * 
 * Creates and returns a new {@see \HTMLElements\Span}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Span A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _span($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Span(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Style.
 * 
 * Creates and returns a new {@see \HTMLElements\Style}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Style A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _style($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Style(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Summary.
 * 
 * Creates and returns a new {@see \HTMLElements\Summary}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Summary A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _summary($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Summary(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\TextArea.
 * 
 * Creates and returns a new {@see \HTMLElements\TextArea}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\TextArea A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _text_area($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\TextArea(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Time.
 * 
 * Creates and returns a new {@see \HTMLElements\Time}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Time A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _time($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Time(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\Title.
 * 
 * Creates and returns a new {@see \HTMLElements\Title}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Title A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _title($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\Title(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\UnorderedList.
 * 
 * Creates and returns a new {@see \HTMLElements\UnorderedList}
 * object with the specified attributes.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\UnorderedList A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _ul($attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\UnorderedList(HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}

/**
 * Helper function for \HTMLElements\_HTMLElement.
 * 
 * Creates and returns a new {@see \HTMLElements\_HTMLElement}
 * object with the specified tag and attributes.
 * 
 * @param string $tag The HTML tag to be associated with this object.
 * 
 * @param string $attributes Optional:  HTML attributes (in the format
 * 'id="my-id" class="my-class" foo="bar" ...') to be applied to this object.
 * NOTE:  Outer quotes may be omitted from key/value pairs if desired (e.g., 
 * 'id=id-1 class=class-1 class-2 class-3 foo=bar' will be parsed the same as
 * 'id="id-1" class="class-1 class-2 class-3" foo="bar"')
 * 
 * @param object[] $content Optional:  A string, any
 * {@see \HTMLElements\_HTMLElement} object or any other object that includes
 * an "output_html(void)" method, or an array containing any combination of
 * these.  Can be omitted if a contentless HTML tag is desired.
 * 
 * @return \HTMLElements\Tag A new, initialized instance of the
 * above object.
 * 
 * @throws \Exception If $attributes does not contain valid key="value" pairs,
 * an exception will be thrown.
 * 
 * @since 1.0.0
 */
function _tag($tag, $attributes = null, ...$content) {

    // create & return the object
    return new HTMLElements\_HTMLElement($tag, HTMLElements\_HTMLElement::prepare_attributes_for_helper_function($attributes, $content));
}
?>