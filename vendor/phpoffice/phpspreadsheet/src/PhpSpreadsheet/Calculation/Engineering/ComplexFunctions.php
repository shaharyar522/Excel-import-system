<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Engineering;

use Complex\Complex as ComplexObject;
use Complex\Exception as ComplexException;
use PhpOffice\PhpSpreadsheet\Calculation\ArrayEnabled;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;

class ComplexFunctions
{
    use ArrayEnabled;

    /**
     * IMABS.
     *
     * Returns the absolute value (modulus) of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMABS(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the absolute value
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|float|string         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMABS(array|string $complexNumber): array|float|string
=======
     * @return array|float|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMABS($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        return $complex->abs();
    }

    /**
     * IMARGUMENT.
     *
     * Returns the argument theta of a complex number, i.e. the angle in radians from the real
     * axis to the representation of the number in polar coordinates.
     *
     * Excel Function:
     *        IMARGUMENT(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the argument theta
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|float|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMARGUMENT(array|string $complexNumber): array|float|string
=======
     * @return array|float|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMARGUMENT($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        if ($complex->getReal() == 0.0 && $complex->getImaginary() == 0.0) {
            return ExcelError::DIV0();
        }

        return $complex->argument();
    }

    /**
     * IMCONJUGATE.
     *
     * Returns the complex conjugate of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMCONJUGATE(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the conjugate
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMCONJUGATE(array|string $complexNumber): array|string
=======
     * @return array|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMCONJUGATE($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        return (string) $complex->conjugate();
    }

    /**
     * IMCOS.
     *
     * Returns the cosine of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMCOS(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the cosine
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMCOS(array|string $complexNumber): array|string
=======
     * @return array|float|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMCOS($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        return (string) $complex->cos();
    }

    /**
     * IMCOSH.
     *
     * Returns the hyperbolic cosine of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMCOSH(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the hyperbolic cosine
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMCOSH(array|string $complexNumber): array|string
=======
     * @return array|float|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMCOSH($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        return (string) $complex->cosh();
    }

    /**
     * IMCOT.
     *
     * Returns the cotangent of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMCOT(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the cotangent
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMCOT(array|string $complexNumber): array|string
=======
     * @return array|float|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMCOT($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        return (string) $complex->cot();
    }

    /**
     * IMCSC.
     *
     * Returns the cosecant of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMCSC(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the cosecant
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMCSC(array|string $complexNumber): array|string
=======
     * @return array|float|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMCSC($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        return (string) $complex->csc();
    }

    /**
     * IMCSCH.
     *
     * Returns the hyperbolic cosecant of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMCSCH(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the hyperbolic cosecant
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMCSCH(array|string $complexNumber): array|string
=======
     * @return array|float|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMCSCH($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        return (string) $complex->csch();
    }

    /**
     * IMSIN.
     *
     * Returns the sine of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMSIN(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the sine
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMSIN(array|string $complexNumber): array|string
=======
     * @return array|float|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMSIN($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        return (string) $complex->sin();
    }

    /**
     * IMSINH.
     *
     * Returns the hyperbolic sine of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMSINH(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the hyperbolic sine
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMSINH(array|string $complexNumber): array|string
=======
     * @return array|float|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMSINH($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        return (string) $complex->sinh();
    }

    /**
     * IMSEC.
     *
     * Returns the secant of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMSEC(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the secant
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMSEC(array|string $complexNumber): array|string
=======
     * @return array|float|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMSEC($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        return (string) $complex->sec();
    }

    /**
     * IMSECH.
     *
     * Returns the hyperbolic secant of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMSECH(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the hyperbolic secant
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMSECH(array|string $complexNumber): array|string
=======
     * @return array|float|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMSECH($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        return (string) $complex->sech();
    }

    /**
     * IMTAN.
     *
     * Returns the tangent of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMTAN(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the tangent
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMTAN(array|string $complexNumber): array|string
=======
     * @return array|float|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMTAN($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        return (string) $complex->tan();
    }

    /**
     * IMSQRT.
     *
     * Returns the square root of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMSQRT(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the square root
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMSQRT(array|string $complexNumber): array|string
=======
     * @return array|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMSQRT($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        $theta = self::IMARGUMENT($complexNumber);
        if ($theta === ExcelError::DIV0()) {
            return '0';
        }

        return (string) $complex->sqrt();
    }

    /**
     * IMLN.
     *
     * Returns the natural logarithm of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMLN(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the natural logarithm
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMLN(array|string $complexNumber): array|string
=======
     * @return array|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMLN($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        if ($complex->getReal() == 0.0 && $complex->getImaginary() == 0.0) {
            return ExcelError::NAN();
        }

        return (string) $complex->ln();
    }

    /**
     * IMLOG10.
     *
     * Returns the common logarithm (base 10) of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMLOG10(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the common logarithm
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMLOG10(array|string $complexNumber): array|string
=======
     * @return array|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMLOG10($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        if ($complex->getReal() == 0.0 && $complex->getImaginary() == 0.0) {
            return ExcelError::NAN();
        }

        return (string) $complex->log10();
    }

    /**
     * IMLOG2.
     *
     * Returns the base-2 logarithm of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMLOG2(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the base-2 logarithm
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMLOG2(array|string $complexNumber): array|string
=======
     * @return array|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMLOG2($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        if ($complex->getReal() == 0.0 && $complex->getImaginary() == 0.0) {
            return ExcelError::NAN();
        }

        return (string) $complex->log2();
    }

    /**
     * IMEXP.
     *
     * Returns the exponential of a complex number in x + yi or x + yj text format.
     *
     * Excel Function:
     *        IMEXP(complexNumber)
     *
     * @param array|string $complexNumber the complex number for which you want the exponential
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMEXP(array|string $complexNumber): array|string
=======
     * @return array|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMEXP($complexNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $complexNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        return (string) $complex->exp();
    }

    /**
     * IMPOWER.
     *
     * Returns a complex number in x + yi or x + yj text format raised to a power.
     *
     * Excel Function:
     *        IMPOWER(complexNumber,realNumber)
     *
     * @param array|string $complexNumber the complex number you want to raise to a power
     *                      Or can be an array of values
     * @param array|float|int|string $realNumber the power to which you want to raise the complex number
     *                      Or can be an array of values
     *
<<<<<<< HEAD
     * @return array|string If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMPOWER(array|string $complexNumber, array|float|int|string $realNumber): array|string
=======
     * @return array|string
     *         If an array of numbers is passed as an argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function IMPOWER($complexNumber, $realNumber)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($complexNumber) || is_array($realNumber)) {
            return self::evaluateArrayArguments([self::class, __FUNCTION__], $complexNumber, $realNumber);
        }

        try {
            $complex = new ComplexObject($complexNumber);
<<<<<<< HEAD
        } catch (ComplexException) {
=======
        } catch (ComplexException $e) {
>>>>>>> 50f5a6f (Initial commit from local project)
            return ExcelError::NAN();
        }

        if (!is_numeric($realNumber)) {
            return ExcelError::VALUE();
        }

        return (string) $complex->pow((float) $realNumber);
    }
}
