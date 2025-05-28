<?php

namespace PhpOffice\PhpSpreadsheet\Chart;

use PhpOffice\PhpSpreadsheet\Calculation\Calculation;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DataSeriesValues extends Properties
{
    const DATASERIES_TYPE_STRING = 'String';
    const DATASERIES_TYPE_NUMBER = 'Number';

    private const DATA_TYPE_VALUES = [
        self::DATASERIES_TYPE_STRING,
        self::DATASERIES_TYPE_NUMBER,
    ];

    /**
     * Series Data Type.
<<<<<<< HEAD
     */
    private string $dataType;

    /**
     * Series Data Source.
     */
    private ?string $dataSource;

    /**
     * Format Code.
     */
    private ?string $formatCode;

    /**
     * Series Point Marker.
     */
    private ?string $pointMarker;

    private ChartColor $markerFillColor;

    private ChartColor $markerBorderColor;

    /**
     * Series Point Size.
     */
    private int $pointSize = 3;

    /**
     * Point Count (The number of datapoints in the dataseries).
     */
    private int $pointCount;

    /**
     * Data Values.
     */
    private ?array $dataValues;
=======
     *
     * @var string
     */
    private $dataType;

    /**
     * Series Data Source.
     *
     * @var ?string
     */
    private $dataSource;

    /**
     * Format Code.
     *
     * @var string
     */
    private $formatCode;

    /**
     * Series Point Marker.
     *
     * @var string
     */
    private $pointMarker;

    /** @var ChartColor */
    private $markerFillColor;

    /** @var ChartColor */
    private $markerBorderColor;

    /**
     * Series Point Size.
     *
     * @var int
     */
    private $pointSize = 3;

    /**
     * Point Count (The number of datapoints in the dataseries).
     *
     * @var int
     */
    private $pointCount = 0;

    /**
     * Data Values.
     *
     * @var mixed[]
     */
    private $dataValues = [];
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Fill color (can be array with colors if dataseries have custom colors).
     *
     * @var null|ChartColor|ChartColor[]
     */
    private $fillColor;

<<<<<<< HEAD
    private bool $scatterLines = true;

    private bool $bubble3D = false;

    private ?Layout $labelLayout = null;

    /** @var TrendLine[] */
    private array $trendLines = [];
=======
    /** @var bool */
    private $scatterLines = true;

    /** @var bool */
    private $bubble3D = false;

    /** @var ?Layout */
    private $labelLayout;

    /** @var TrendLine[] */
    private $trendLines = [];
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Create a new DataSeriesValues object.
     *
<<<<<<< HEAD
     * @param null|ChartColor|ChartColor[]|string|string[] $fillColor
     */
    public function __construct(
        string $dataType = self::DATASERIES_TYPE_NUMBER,
        ?string $dataSource = null,
        ?string $formatCode = null,
        int $pointCount = 0,
        ?array $dataValues = [],
        ?string $marker = null,
        null|ChartColor|array|string $fillColor = null,
        int|string $pointSize = 3
    ) {
=======
     * @param string $dataType
     * @param string $dataSource
     * @param null|mixed $formatCode
     * @param int $pointCount
     * @param mixed $dataValues
     * @param null|mixed $marker
     * @param null|ChartColor|ChartColor[]|string|string[] $fillColor
     * @param string $pointSize
     */
    public function __construct($dataType = self::DATASERIES_TYPE_NUMBER, $dataSource = null, $formatCode = null, $pointCount = 0, $dataValues = [], $marker = null, $fillColor = null, $pointSize = '3')
    {
>>>>>>> 50f5a6f (Initial commit from local project)
        parent::__construct();
        $this->markerFillColor = new ChartColor();
        $this->markerBorderColor = new ChartColor();
        $this->setDataType($dataType);
        $this->dataSource = $dataSource;
        $this->formatCode = $formatCode;
        $this->pointCount = $pointCount;
        $this->dataValues = $dataValues;
        $this->pointMarker = $marker;
        if ($fillColor !== null) {
            $this->setFillColor($fillColor);
        }
        if (is_numeric($pointSize)) {
            $this->pointSize = (int) $pointSize;
        }
    }

    /**
     * Get Series Data Type.
<<<<<<< HEAD
     */
    public function getDataType(): string
=======
     *
     * @return string
     */
    public function getDataType()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->dataType;
    }

    /**
     * Set Series Data Type.
     *
     * @param string $dataType Datatype of this data series
     *                                Typical values are:
     *                                    DataSeriesValues::DATASERIES_TYPE_STRING
     *                                        Normally used for axis point values
     *                                    DataSeriesValues::DATASERIES_TYPE_NUMBER
     *                                        Normally used for chart data values
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setDataType(string $dataType): static
=======
    public function setDataType($dataType)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (!in_array($dataType, self::DATA_TYPE_VALUES)) {
            throw new Exception('Invalid datatype for chart data series values');
        }
        $this->dataType = $dataType;

        return $this;
    }

    /**
     * Get Series Data Source (formula).
<<<<<<< HEAD
     */
    public function getDataSource(): ?string
=======
     *
     * @return ?string
     */
    public function getDataSource()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->dataSource;
    }

    /**
     * Set Series Data Source (formula).
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setDataSource(?string $dataSource): static
=======
     * @param ?string $dataSource
     *
     * @return $this
     */
    public function setDataSource($dataSource)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->dataSource = $dataSource;

        return $this;
    }

    /**
     * Get Point Marker.
<<<<<<< HEAD
     */
    public function getPointMarker(): ?string
=======
     *
     * @return string
     */
    public function getPointMarker()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->pointMarker;
    }

    /**
     * Set Point Marker.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setPointMarker(string $marker): static
=======
     * @param string $marker
     *
     * @return $this
     */
    public function setPointMarker($marker)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->pointMarker = $marker;

        return $this;
    }

    public function getMarkerFillColor(): ChartColor
    {
        return $this->markerFillColor;
    }

    public function getMarkerBorderColor(): ChartColor
    {
        return $this->markerBorderColor;
    }

    /**
     * Get Point Size.
     */
    public function getPointSize(): int
    {
        return $this->pointSize;
    }

    /**
     * Set Point Size.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setPointSize(int $size = 3): static
=======
    public function setPointSize(int $size = 3)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->pointSize = $size;

        return $this;
    }

    /**
     * Get Series Format Code.
<<<<<<< HEAD
     */
    public function getFormatCode(): ?string
=======
     *
     * @return string
     */
    public function getFormatCode()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->formatCode;
    }

    /**
     * Set Series Format Code.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setFormatCode(string $formatCode): static
=======
     * @param string $formatCode
     *
     * @return $this
     */
    public function setFormatCode($formatCode)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->formatCode = $formatCode;

        return $this;
    }

    /**
     * Get Series Point Count.
<<<<<<< HEAD
     */
    public function getPointCount(): int
=======
     *
     * @return int
     */
    public function getPointCount()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->pointCount;
    }

    /**
     * Get fill color object.
     *
     * @return null|ChartColor|ChartColor[]
     */
    public function getFillColorObject()
    {
        return $this->fillColor;
    }

    private function stringToChartColor(string $fillString): ChartColor
    {
        $value = $type = '';
<<<<<<< HEAD
        if (str_starts_with($fillString, '*')) {
            $type = 'schemeClr';
            $value = substr($fillString, 1);
        } elseif (str_starts_with($fillString, '/')) {
=======
        if (substr($fillString, 0, 1) === '*') {
            $type = 'schemeClr';
            $value = substr($fillString, 1);
        } elseif (substr($fillString, 0, 1) === '/') {
>>>>>>> 50f5a6f (Initial commit from local project)
            $type = 'prstClr';
            $value = substr($fillString, 1);
        } elseif ($fillString !== '') {
            $type = 'srgbClr';
            $value = $fillString;
            $this->validateColor($value);
        }

        return new ChartColor($value, null, $type);
    }

    private function chartColorToString(ChartColor $chartColor): string
    {
        $type = (string) $chartColor->getColorProperty('type');
        $value = (string) $chartColor->getColorProperty('value');
        if ($type === '' || $value === '') {
            return '';
        }
        if ($type === 'schemeClr') {
            return "*$value";
        }
        if ($type === 'prstClr') {
            return "/$value";
        }

        return $value;
    }

    /**
     * Get fill color.
     *
     * @return string|string[] HEX color or array with HEX colors
     */
<<<<<<< HEAD
    public function getFillColor(): string|array
=======
    public function getFillColor()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->fillColor === null) {
            return '';
        }
        if (is_array($this->fillColor)) {
            $array = [];
            foreach ($this->fillColor as $chartColor) {
                $array[] = $this->chartColorToString($chartColor);
            }

            return $array;
        }

        return $this->chartColorToString($this->fillColor);
    }

    /**
     * Set fill color for series.
     *
     * @param ChartColor|ChartColor[]|string|string[] $color HEX color or array with HEX colors
     *
<<<<<<< HEAD
     * @return   $this
     */
    public function setFillColor($color): static
=======
     * @return   DataSeriesValues
     */
    public function setFillColor($color)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (is_array($color)) {
            $this->fillColor = [];
            foreach ($color as $fillString) {
                if ($fillString instanceof ChartColor) {
                    $this->fillColor[] = $fillString;
                } else {
                    $this->fillColor[] = $this->stringToChartColor($fillString);
                }
            }
        } elseif ($color instanceof ChartColor) {
            $this->fillColor = $color;
        } else {
            $this->fillColor = $this->stringToChartColor($color);
        }

        return $this;
    }

    /**
     * Method for validating hex color.
     *
     * @param string $color value for color
     *
     * @return bool true if validation was successful
     */
<<<<<<< HEAD
    private function validateColor(string $color): bool
=======
    private function validateColor($color)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (!preg_match('/^[a-f0-9]{6}$/i', $color)) {
            throw new Exception(sprintf('Invalid hex color for chart series (color: "%s")', $color));
        }

        return true;
    }

    /**
     * Get line width for series.
<<<<<<< HEAD
     */
    public function getLineWidth(): null|float|int
=======
     *
     * @return null|float|int
     */
    public function getLineWidth()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->lineStyleProperties['width'];
    }

    /**
     * Set line width for the series.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setLineWidth(null|float|int $width): static
=======
     * @param null|float|int $width
     *
     * @return $this
     */
    public function setLineWidth($width)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->lineStyleProperties['width'] = $width;

        return $this;
    }

    /**
     * Identify if the Data Series is a multi-level or a simple series.
<<<<<<< HEAD
     */
    public function isMultiLevelSeries(): ?bool
=======
     *
     * @return null|bool
     */
    public function isMultiLevelSeries()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if (!empty($this->dataValues)) {
            return is_array(array_values($this->dataValues)[0]);
        }

        return null;
    }

    /**
     * Return the level count of a multi-level Data Series.
<<<<<<< HEAD
     */
    public function multiLevelCount(): int
    {
        $levelCount = 0;
        foreach (($this->dataValues ?? []) as $dataValueSet) {
=======
     *
     * @return int
     */
    public function multiLevelCount()
    {
        $levelCount = 0;
        foreach ($this->dataValues as $dataValueSet) {
>>>>>>> 50f5a6f (Initial commit from local project)
            $levelCount = max($levelCount, count($dataValueSet));
        }

        return $levelCount;
    }

    /**
     * Get Series Data Values.
<<<<<<< HEAD
     */
    public function getDataValues(): ?array
=======
     *
     * @return mixed[]
     */
    public function getDataValues()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->dataValues;
    }

    /**
     * Get the first Series Data value.
<<<<<<< HEAD
     */
    public function getDataValue(): mixed
    {
        if ($this->dataValues === null) {
            return null;
        }
=======
     *
     * @return mixed
     */
    public function getDataValue()
    {
>>>>>>> 50f5a6f (Initial commit from local project)
        $count = count($this->dataValues);
        if ($count == 0) {
            return null;
        } elseif ($count == 1) {
            return $this->dataValues[0];
        }

        return $this->dataValues;
    }

    /**
     * Set Series Data Values.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setDataValues(array $dataValues): static
=======
     * @param array $dataValues
     *
     * @return $this
     */
    public function setDataValues($dataValues)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->dataValues = Functions::flattenArray($dataValues);
        $this->pointCount = count($dataValues);

        return $this;
    }

    public function refresh(Worksheet $worksheet, bool $flatten = true): void
    {
        if ($this->dataSource !== null) {
            $calcEngine = Calculation::getInstance($worksheet->getParent());
            $newDataValues = Calculation::unwrapResult(
                $calcEngine->_calculateFormulaValue(
                    '=' . $this->dataSource,
                    null,
                    $worksheet->getCell('A1')
                )
            );
            if ($flatten) {
                $this->dataValues = Functions::flattenArray($newDataValues);
                foreach ($this->dataValues as &$dataValue) {
                    if (is_string($dataValue) && !empty($dataValue) && $dataValue[0] == '#') {
                        $dataValue = 0.0;
                    }
                }
                unset($dataValue);
            } else {
<<<<<<< HEAD
                [, $cellRange] = Worksheet::extractSheetTitle($this->dataSource, true);
                $dimensions = Coordinate::rangeDimension(str_replace('$', '', $cellRange ?? ''));
                if (($dimensions[0] == 1) || ($dimensions[1] == 1)) {
                    $this->dataValues = Functions::flattenArray($newDataValues);
                } else {
                    /** @var array<int, array> */
                    $newDataValuesx = $newDataValues;
                    $newArray = array_values(array_shift($newDataValuesx) ?? []);
=======
                [$worksheet, $cellRange] = Worksheet::extractSheetTitle($this->dataSource, true);
                $dimensions = Coordinate::rangeDimension(str_replace('$', '', $cellRange));
                if (($dimensions[0] == 1) || ($dimensions[1] == 1)) {
                    $this->dataValues = Functions::flattenArray($newDataValues);
                } else {
                    $newArray = array_values(array_shift(/** @scrutinizer ignore-type */ $newDataValues));
>>>>>>> 50f5a6f (Initial commit from local project)
                    foreach ($newArray as $i => $newDataSet) {
                        $newArray[$i] = [$newDataSet];
                    }

<<<<<<< HEAD
                    foreach ($newDataValuesx as $newDataSet) {
=======
                    foreach ($newDataValues as $newDataSet) {
>>>>>>> 50f5a6f (Initial commit from local project)
                        $i = 0;
                        foreach ($newDataSet as $newDataVal) {
                            array_unshift($newArray[$i++], $newDataVal);
                        }
                    }
                    $this->dataValues = $newArray;
                }
            }
            $this->pointCount = count($this->dataValues);
        }
    }

    public function getScatterLines(): bool
    {
        return $this->scatterLines;
    }

    public function setScatterLines(bool $scatterLines): self
    {
        $this->scatterLines = $scatterLines;

        return $this;
    }

    public function getBubble3D(): bool
    {
        return $this->bubble3D;
    }

    public function setBubble3D(bool $bubble3D): self
    {
        $this->bubble3D = $bubble3D;

        return $this;
    }

    /**
     * Smooth Line. Must be specified for both DataSeries and DataSeriesValues.
<<<<<<< HEAD
     */
    private bool $smoothLine = false;

    /**
     * Get Smooth Line.
     */
    public function getSmoothLine(): bool
=======
     *
     * @var bool
     */
    private $smoothLine;

    /**
     * Get Smooth Line.
     *
     * @return bool
     */
    public function getSmoothLine()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->smoothLine;
    }

    /**
     * Set Smooth Line.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setSmoothLine(bool $smoothLine): static
=======
     * @param bool $smoothLine
     *
     * @return $this
     */
    public function setSmoothLine($smoothLine)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->smoothLine = $smoothLine;

        return $this;
    }

    public function getLabelLayout(): ?Layout
    {
        return $this->labelLayout;
    }

    public function setLabelLayout(?Layout $labelLayout): self
    {
        $this->labelLayout = $labelLayout;

        return $this;
    }

    public function setTrendLines(array $trendLines): self
    {
        $this->trendLines = $trendLines;

        return $this;
    }

    public function getTrendLines(): array
    {
        return $this->trendLines;
    }
<<<<<<< HEAD

    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
        parent::__clone();
        $this->markerFillColor = clone $this->markerFillColor;
        $this->markerBorderColor = clone $this->markerBorderColor;
        if (is_array($this->fillColor)) {
            $fillColor = $this->fillColor;
            $this->fillColor = [];
            foreach ($fillColor as $color) {
                $this->fillColor[] = clone $color;
            }
        } elseif ($this->fillColor instanceof ChartColor) {
            $this->fillColor = clone $this->fillColor;
        }
        $this->labelLayout = ($this->labelLayout === null) ? null : clone $this->labelLayout;
        $trendLines = $this->trendLines;
        $this->trendLines = [];
        foreach ($trendLines as $trendLine) {
            $this->trendLines[] = clone $trendLine;
        }
    }
=======
>>>>>>> 50f5a6f (Initial commit from local project)
}
