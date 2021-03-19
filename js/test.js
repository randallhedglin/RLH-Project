/**
 * This is a test file.
 * 
 * @author    Randall Hedglin <randallhedglin@yahoo.com>
 * @copyright Copyright (c) 2021 Randall Hedglin
 * @license   Private
 * @version   1.0.0
 * 
 * @todo All caught up!
 */

/** @namespace website */
/** @namespace website.imt */
if (typeof(website) == 'undefined') website = { imt: {} };

/** @const {number} website.imt.PI The value of pi. */
website.imt.PI = 3.14;

/**
 * Another test function.
 * 
 * This is another test function (long description).
 * 
 * @param {int} input An input value.
 * 
 * @returns {int} The input value but negativer.
 * 
 * @since 1.0.0
 */
website.imt.unnegate = function(input) {
    
    // can you see me?
    return -(-input);
};

/**
 * Test function.
 * 
 * This is a test function (long description).
 * 
 * @param {int} input An input value.
 * 
 * @returns {int} The input value but negative.
 * 
 * @example
 *      negate(2);
 * 
 * @since 1.0.0
 */
website.imt.negate = function(input) {
    
    // can you see me?
    return -input;
};

/** 
 * Calculator class definition.
 * 
 * @since 1.0.0
 */
website.imt.Calculator = class {

    /**
     * Creates a new Calculator object.
     * 
     * @constructs website.imt.Calculator
     * 
     * @param {number} num1 A number
     * @param {number} num2 Another number
     * 
     * @since 1.0.0
     */
    constructor(num1, num2) {

        // store values
        this._num1 = num1;
        this._num2 = num2;
    }

    /**
     * @memberof website.imt.Calculator
     * 
     * @property {number} num1 A number.
     * 
     * @since 1.0.0
     */
     get num1() { return this._num1; }
     set num1(value) { this._num1 = value; }
 
     /**
      * @memberof website.imt.Calculator
      * 
      * @property {number} num2 Another number.
      * 
      * @since 1.0.0
      */
     get num2() { return this._num2; }
     set num2(value) { this._num2 = value; }
 
     /** 
     * Return the version number.
     * 
     * @memberof website.imt.Calculator
     * 
     * @returns {string} The version number.
     * 
     * @since 1.0.0
     */
        static version() {
        return '1.0.0';
    }

     /** 
     * Perform addition.
     * 
     * @memberof website.imt.Calculator
     * 
     * @returns {number} num1 + num2
     * 
     * @since 1.0.0
     */
      add() {
        return(this._num1 + this._num2);
    }

     /** 
     * Perform subtraction.
     * 
     * @memberof website.imt.Calculator
     * @static
     * 
     * @returns {number} num1 - num2
     * 
     * @since 1.0.0
     */
      subtract() {
        return(this._num1 - this._num2);
    }

     /** 
     * Perform multiplication.
     * 
     * @memberof website.imt.Calculator
     * 
     * @returns {number} num1 * num2
     * 
     * @since 1.0.0
     */
      multiply() {
        return(this._num1 * this._num2);
    }

     /** 
     * Perform division.
     * 
     * @memberof website.imt.Calculator
     * 
     * @returns {number} num1 / num2
     * 
     * @throws {Error} An divide-by-zero error is thrown if num2 = 0.
     * 
     * @since 1.0.0
     */
      divide() {

        if (this._num2 == 0)
            throw new Error('website.imt.divide(): Division by zero');
        else
            return(this._num1 / this._num2);
    }
}

calc = new website.imt.Calculator(1, 2);
document.write(`${calc.add()}<br>`);
document.write(`${calc.subtract()}<br>`);
document.write(`${calc.multiply()}<br>`);
document.write(`${calc.divide()}<br>`);
calc.num1 = 3;
calc.num2 = 0;
document.write(`${calc.add()}<br>`);
document.write(`${calc.subtract()}<br>`);
document.write(`${calc.multiply()}<br>`);
document.write(`${calc.divide()}<br>`);