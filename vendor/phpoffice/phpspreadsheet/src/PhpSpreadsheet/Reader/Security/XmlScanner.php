<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Security;

use PhpOffice\PhpSpreadsheet\Reader;

class XmlScanner
{
<<<<<<< HEAD
    private const ENCODING_PATTERN = '/encoding\s*=\s*(["\'])(.+?)\1/s';
    private const ENCODING_UTF7 = '/encoding\s*=\s*(["\'])UTF-7\1/si';

    private string $pattern;
=======
    private const ENCODING_PATTERN = '/encoding\\s*=\\s*(["\'])(.+?)\\1/s';
    private const ENCODING_UTF7 = '/encoding\\s*=\\s*(["\'])UTF-7\\1/si';

    /**
     * String used to identify risky xml elements.
     *
     * @var string
     */
    private $pattern;
>>>>>>> 50f5a6f (Initial commit from local project)

    /** @var ?callable */
    private $callback;

<<<<<<< HEAD
    public function __construct(string $pattern = '<!DOCTYPE')
    {
        $this->pattern = $pattern;
=======
    /** @var ?bool */
    private static $libxmlDisableEntityLoaderValue;

    /**
     * @var bool
     */
    private static $shutdownRegistered = false;

    public function __construct(string $pattern = '<!DOCTYPE')
    {
        $this->pattern = $pattern;

        $this->disableEntityLoaderCheck();

        // A fatal error will bypass the destructor, so we register a shutdown here
        if (!self::$shutdownRegistered) {
            self::$shutdownRegistered = true;
            register_shutdown_function([__CLASS__, 'shutdown']);
        }
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    public static function getInstance(Reader\IReader $reader): self
    {
        $pattern = ($reader instanceof Reader\Html) ? '<!ENTITY' : '<!DOCTYPE';

        return new self($pattern);
    }

<<<<<<< HEAD
=======
    /**
     * @codeCoverageIgnore
     */
    public static function threadSafeLibxmlDisableEntityLoaderAvailability(): bool
    {
        if (PHP_MAJOR_VERSION === 7) {
            switch (PHP_MINOR_VERSION) {
                case 2:
                    return PHP_RELEASE_VERSION >= 1;
                case 1:
                    return PHP_RELEASE_VERSION >= 13;
                case 0:
                    return PHP_RELEASE_VERSION >= 27;
            }

            return true;
        }

        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    private function disableEntityLoaderCheck(): void
    {
        if (\PHP_VERSION_ID < 80000) {
            $libxmlDisableEntityLoaderValue = libxml_disable_entity_loader(true);

            if (self::$libxmlDisableEntityLoaderValue === null) {
                self::$libxmlDisableEntityLoaderValue = $libxmlDisableEntityLoaderValue;
            }
        }
    }

    /**
     * @codeCoverageIgnore
     */
    public static function shutdown(): void
    {
        if (self::$libxmlDisableEntityLoaderValue !== null && \PHP_VERSION_ID < 80000) {
            libxml_disable_entity_loader(self::$libxmlDisableEntityLoaderValue);
            self::$libxmlDisableEntityLoaderValue = null;
        }
    }

    public function __destruct()
    {
        self::shutdown();
    }

>>>>>>> 50f5a6f (Initial commit from local project)
    public function setAdditionalCallback(callable $callback): void
    {
        $this->callback = $callback;
    }

<<<<<<< HEAD
    private static function forceString(mixed $arg): string
=======
    /** @param mixed $arg */
    private static function forceString($arg): string
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return is_string($arg) ? $arg : '';
    }

<<<<<<< HEAD
    private function toUtf8(string $xml): string
=======
    /**
     * @param string $xml
     *
     * @return string
     */
    private function toUtf8($xml)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $charset = $this->findCharSet($xml);
        $foundUtf7 = $charset === 'UTF-7';
        if ($charset !== 'UTF-8') {
<<<<<<< HEAD
            $testStart = '/^.{0,4}\s*<?xml/s';
=======
            $testStart = '/^.{0,4}\\s*<?xml/s';
>>>>>>> 50f5a6f (Initial commit from local project)
            $startWithXml1 = preg_match($testStart, $xml);
            $xml = self::forceString(mb_convert_encoding($xml, 'UTF-8', $charset));
            if ($startWithXml1 === 1 && preg_match($testStart, $xml) !== 1) {
                throw new Reader\Exception('Double encoding not permitted');
            }
            $foundUtf7 = $foundUtf7 || (preg_match(self::ENCODING_UTF7, $xml) === 1);
            $xml = preg_replace(self::ENCODING_PATTERN, '', $xml) ?? $xml;
        } else {
            $foundUtf7 = $foundUtf7 || (preg_match(self::ENCODING_UTF7, $xml) === 1);
        }
        if ($foundUtf7) {
            throw new Reader\Exception('UTF-7 encoding not permitted');
        }
        if (substr($xml, 0, Reader\Csv::UTF8_BOM_LEN) === Reader\Csv::UTF8_BOM) {
            $xml = substr($xml, Reader\Csv::UTF8_BOM_LEN);
        }

        return $xml;
    }

    private function findCharSet(string $xml): string
    {
        if (substr($xml, 0, 4) === "\x4c\x6f\xa7\x94") {
            throw new Reader\Exception('EBCDIC encoding not permitted');
        }
        $encoding = Reader\Csv::guessEncodingBom('', $xml);
        if ($encoding !== '') {
            return $encoding;
        }
        $xml = str_replace("\0", '', $xml);
        if (preg_match(self::ENCODING_PATTERN, $xml, $matches)) {
            return strtoupper($matches[2]);
        }

        return 'UTF-8';
    }

    /**
     * Scan the XML for use of <!ENTITY to prevent XXE/XEE attacks.
     *
     * @param false|string $xml
<<<<<<< HEAD
     */
    public function scan($xml): string
    {
        // Don't rely purely on libxml_disable_entity_loader()
        $pattern = '/\0*' . implode('\0*', mb_str_split($this->pattern, 1, 'UTF-8')) . '\0*/';
=======
     *
     * @return string
     */
    public function scan($xml)
    {
        $this->disableEntityLoaderCheck();
        // Don't rely purely on libxml_disable_entity_loader()
        $pattern = '/\\0*' . implode('\\0*', /** @scrutinizer ignore-type */ str_split($this->pattern)) . '\\0*/';
>>>>>>> 50f5a6f (Initial commit from local project)

        $xml = "$xml";
        if (preg_match($pattern, $xml)) {
            throw new Reader\Exception('Detected use of ENTITY in XML, spreadsheet file load() aborted to prevent XXE/XEE attacks');
        }

        $xml = $this->toUtf8($xml);
<<<<<<< HEAD
=======

>>>>>>> 50f5a6f (Initial commit from local project)
        if (preg_match($pattern, $xml)) {
            throw new Reader\Exception('Detected use of ENTITY in XML, spreadsheet file load() aborted to prevent XXE/XEE attacks');
        }

        if ($this->callback !== null) {
            $xml = call_user_func($this->callback, $xml);
        }

        return $xml;
    }

    /**
     * Scan the XML for use of <!ENTITY to prevent XXE/XEE attacks.
<<<<<<< HEAD
     */
    public function scanFile(string $filestream): string
=======
     *
     * @param string $filestream
     *
     * @return string
     */
    public function scanFile($filestream)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->scan(file_get_contents($filestream));
    }
}
