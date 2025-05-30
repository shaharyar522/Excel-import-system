<?php

namespace PhpOffice\PhpSpreadsheet\Style\NumberFormat\Wizard;

use NumberFormatter;
use PhpOffice\PhpSpreadsheet\Exception;

<<<<<<< HEAD
class Accounting extends CurrencyBase
{
    protected ?bool $overrideSpacing = true;

    protected ?CurrencyNegative $overrideNegative = CurrencyNegative::parentheses;
=======
class Accounting extends Currency
{
    /**
     * @param string $currencyCode the currency symbol or code to display for this mask
     * @param int $decimals number of decimal places to display, in the range 0-30
     * @param bool $thousandsSeparator indicator whether the thousands separator should be used, or not
     * @param bool $currencySymbolPosition indicates whether the currency symbol comes before or after the value
     *              Possible values are Currency::LEADING_SYMBOL and Currency::TRAILING_SYMBOL
     * @param bool $currencySymbolSpacing indicates whether there is spacing between the currency symbol and the value
     *              Possible values are Currency::SYMBOL_WITH_SPACING and Currency::SYMBOL_WITHOUT_SPACING
     * @param ?string $locale Set the locale for the currency format; or leave as the default null.
     *          If provided, Locale values must be a valid formatted locale string (e.g. 'en-GB', 'fr', uz-Arab-AF).
     *          Note that setting a locale will override any other settings defined in this class
     *          other than the currency code; or decimals (unless the decimals value is set to 0).
     *
     * @throws Exception If a provided locale code is not a valid format
     */
    public function __construct(
        string $currencyCode = '$',
        int $decimals = 2,
        bool $thousandsSeparator = true,
        bool $currencySymbolPosition = self::LEADING_SYMBOL,
        bool $currencySymbolSpacing = self::SYMBOL_WITHOUT_SPACING,
        ?string $locale = null
    ) {
        $this->setCurrencyCode($currencyCode);
        $this->setThousandsSeparator($thousandsSeparator);
        $this->setDecimals($decimals);
        $this->setCurrencySymbolPosition($currencySymbolPosition);
        $this->setCurrencySymbolSpacing($currencySymbolSpacing);
        $this->setLocale($locale);
    }
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * @throws Exception if the Intl extension and ICU version don't support Accounting formats
     */
    protected function getLocaleFormat(): string
    {
<<<<<<< HEAD
        if (self::icuVersion() < 53.0) {
            // @codeCoverageIgnoreStart
            throw new Exception('The Intl extension does not support Accounting Formats without ICU 53');
            // @codeCoverageIgnoreEnd
=======
        if (version_compare(PHP_VERSION, '7.4.1', '<')) {
            throw new Exception('The Intl extension does not support Accounting Formats below PHP 7.4.1');
        }

        if ($this->icuVersion() < 53.0) {
            throw new Exception('The Intl extension does not support Accounting Formats without ICU 53');
>>>>>>> 50f5a6f (Initial commit from local project)
        }

        // Scrutinizer does not recognize CURRENCY_ACCOUNTING
        $formatter = new Locale($this->fullLocale, NumberFormatter::CURRENCY_ACCOUNTING);
<<<<<<< HEAD
        $mask = $formatter->format($this->stripLeadingRLM);
=======
        $mask = $formatter->format();
>>>>>>> 50f5a6f (Initial commit from local project)
        if ($this->decimals === 0) {
            $mask = (string) preg_replace('/\.0+/miu', '', $mask);
        }

        return str_replace('¤', $this->formatCurrencyCode(), $mask);
    }

<<<<<<< HEAD
    public static function icuVersion(): float
=======
    private function icuVersion(): float
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        [$major, $minor] = explode('.', INTL_ICU_VERSION);

        return (float) "{$major}.{$minor}";
    }

    private function formatCurrencyCode(): string
    {
        if ($this->locale === null) {
            return $this->currencyCode . '*';
        }

        return "[\${$this->currencyCode}-{$this->locale}]";
    }
<<<<<<< HEAD
=======

    public function format(): string
    {
        if ($this->localeFormat !== null) {
            return $this->localeFormat;
        }

        return sprintf(
            '_-%s%s%s0%s%s%s_-',
            $this->currencySymbolPosition === self::LEADING_SYMBOL ? $this->formatCurrencyCode() : null,
            (
                $this->currencySymbolPosition === self::LEADING_SYMBOL &&
                $this->currencySymbolSpacing === self::SYMBOL_WITH_SPACING
            ) ? "\u{a0}" : '',
            $this->thousandsSeparator ? '#,##' : null,
            $this->decimals > 0 ? '.' . str_repeat('0', $this->decimals) : null,
            (
                $this->currencySymbolPosition === self::TRAILING_SYMBOL &&
                $this->currencySymbolSpacing === self::SYMBOL_WITH_SPACING
            ) ? "\u{a0}" : '',
            $this->currencySymbolPosition === self::TRAILING_SYMBOL ? $this->formatCurrencyCode() : null
        );
    }
>>>>>>> 50f5a6f (Initial commit from local project)
}
