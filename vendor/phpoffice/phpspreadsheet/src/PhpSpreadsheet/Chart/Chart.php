<?php

namespace PhpOffice\PhpSpreadsheet\Chart;

use PhpOffice\PhpSpreadsheet\Settings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Chart
{
    /**
     * Chart Name.
<<<<<<< HEAD
     */
    private string $name;

    /**
     * Worksheet.
     */
    private ?Worksheet $worksheet = null;

    /**
     * Chart Title.
     */
    private ?Title $title;

    /**
     * Chart Legend.
     */
    private ?Legend $legend;

    /**
     * X-Axis Label.
     */
    private ?Title $xAxisLabel;

    /**
     * Y-Axis Label.
     */
    private ?Title $yAxisLabel;

    /**
     * Chart Plot Area.
     */
    private ?PlotArea $plotArea;

    /**
     * Plot Visible Only.
     */
    private bool $plotVisibleOnly;

    /**
     * Display Blanks as.
     */
    private string $displayBlanksAs;

    /**
     * Chart Asix Y as.
     */
    private Axis $yAxis;

    /**
     * Chart Asix X as.
     */
    private Axis $xAxis;

    /**
     * Top-Left Cell Position.
     */
    private string $topLeftCellRef = 'A1';

    /**
     * Top-Left X-Offset.
     */
    private int $topLeftXOffset = 0;

    /**
     * Top-Left Y-Offset.
     */
    private int $topLeftYOffset = 0;

    /**
     * Bottom-Right Cell Position.
     */
    private string $bottomRightCellRef = '';

    /**
     * Bottom-Right X-Offset.
     */
    private int $bottomRightXOffset = 10;

    /**
     * Bottom-Right Y-Offset.
     */
    private int $bottomRightYOffset = 10;

    private ?int $rotX = null;

    private ?int $rotY = null;

    private ?int $rAngAx = null;

    private ?int $perspective = null;

    private bool $oneCellAnchor = false;

    private bool $autoTitleDeleted = false;

    private bool $noFill = false;

    private bool $noBorder = false;

    private bool $roundedCorners = false;

    private GridLines $borderLines;

    private ChartColor $fillColor;

    /**
     * Rendered width in pixels.
     */
    private ?float $renderedWidth = null;

    /**
     * Rendered height in pixels.
     */
    private ?float $renderedHeight = null;
=======
     *
     * @var string
     */
    private $name = '';

    /**
     * Worksheet.
     *
     * @var ?Worksheet
     */
    private $worksheet;

    /**
     * Chart Title.
     *
     * @var ?Title
     */
    private $title;

    /**
     * Chart Legend.
     *
     * @var ?Legend
     */
    private $legend;

    /**
     * X-Axis Label.
     *
     * @var ?Title
     */
    private $xAxisLabel;

    /**
     * Y-Axis Label.
     *
     * @var ?Title
     */
    private $yAxisLabel;

    /**
     * Chart Plot Area.
     *
     * @var ?PlotArea
     */
    private $plotArea;

    /**
     * Plot Visible Only.
     *
     * @var bool
     */
    private $plotVisibleOnly = true;

    /**
     * Display Blanks as.
     *
     * @var string
     */
    private $displayBlanksAs = DataSeries::EMPTY_AS_GAP;

    /**
     * Chart Asix Y as.
     *
     * @var Axis
     */
    private $yAxis;

    /**
     * Chart Asix X as.
     *
     * @var Axis
     */
    private $xAxis;

    /**
     * Top-Left Cell Position.
     *
     * @var string
     */
    private $topLeftCellRef = 'A1';

    /**
     * Top-Left X-Offset.
     *
     * @var int
     */
    private $topLeftXOffset = 0;

    /**
     * Top-Left Y-Offset.
     *
     * @var int
     */
    private $topLeftYOffset = 0;

    /**
     * Bottom-Right Cell Position.
     *
     * @var string
     */
    private $bottomRightCellRef = '';

    /**
     * Bottom-Right X-Offset.
     *
     * @var int
     */
    private $bottomRightXOffset = 10;

    /**
     * Bottom-Right Y-Offset.
     *
     * @var int
     */
    private $bottomRightYOffset = 10;

    /** @var ?int */
    private $rotX;

    /** @var ?int */
    private $rotY;

    /** @var ?int */
    private $rAngAx;

    /** @var ?int */
    private $perspective;

    /** @var bool */
    private $oneCellAnchor = false;

    /** @var bool */
    private $autoTitleDeleted = false;

    /** @var bool */
    private $noFill = false;

    /** @var bool */
    private $roundedCorners = false;

    /** @var GridLines */
    private $borderLines;

    /** @var ChartColor */
    private $fillColor;
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Create a new Chart.
     * majorGridlines and minorGridlines are deprecated, moved to Axis.
<<<<<<< HEAD
     */
    public function __construct(string $name, ?Title $title = null, ?Legend $legend = null, ?PlotArea $plotArea = null, bool $plotVisibleOnly = true, string $displayBlanksAs = DataSeries::DEFAULT_EMPTY_AS, ?Title $xAxisLabel = null, ?Title $yAxisLabel = null, ?Axis $xAxis = null, ?Axis $yAxis = null, ?GridLines $majorGridlines = null, ?GridLines $minorGridlines = null)
=======
     *
     * @param mixed $name
     * @param mixed $plotVisibleOnly
     * @param string $displayBlanksAs
     */
    public function __construct($name, ?Title $title = null, ?Legend $legend = null, ?PlotArea $plotArea = null, $plotVisibleOnly = true, $displayBlanksAs = DataSeries::EMPTY_AS_GAP, ?Title $xAxisLabel = null, ?Title $yAxisLabel = null, ?Axis $xAxis = null, ?Axis $yAxis = null, ?GridLines $majorGridlines = null, ?GridLines $minorGridlines = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->name = $name;
        $this->title = $title;
        $this->legend = $legend;
        $this->xAxisLabel = $xAxisLabel;
        $this->yAxisLabel = $yAxisLabel;
        $this->plotArea = $plotArea;
        $this->plotVisibleOnly = $plotVisibleOnly;
<<<<<<< HEAD
        $this->setDisplayBlanksAs($displayBlanksAs);
=======
        $this->displayBlanksAs = $displayBlanksAs;
>>>>>>> 50f5a6f (Initial commit from local project)
        $this->xAxis = $xAxis ?? new Axis();
        $this->yAxis = $yAxis ?? new Axis();
        if ($majorGridlines !== null) {
            $this->yAxis->setMajorGridlines($majorGridlines);
        }
        if ($minorGridlines !== null) {
            $this->yAxis->setMinorGridlines($minorGridlines);
        }
        $this->fillColor = new ChartColor();
        $this->borderLines = new GridLines();
    }

<<<<<<< HEAD
    public function __destruct()
    {
        $this->worksheet = null;
    }

    /**
     * Get Name.
     */
    public function getName(): string
=======
    /**
     * Get Name.
     *
     * @return string
     */
    public function getName()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Worksheet.
     */
    public function getWorksheet(): ?Worksheet
    {
        return $this->worksheet;
    }

    /**
     * Set Worksheet.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setWorksheet(?Worksheet $worksheet = null): static
=======
    public function setWorksheet(?Worksheet $worksheet = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->worksheet = $worksheet;

        return $this;
    }

    public function getTitle(): ?Title
    {
        return $this->title;
    }

    /**
     * Set Title.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setTitle(Title $title): static
=======
    public function setTitle(Title $title)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->title = $title;

        return $this;
    }

    public function getLegend(): ?Legend
    {
        return $this->legend;
    }

    /**
     * Set Legend.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setLegend(Legend $legend): static
=======
    public function setLegend(Legend $legend)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->legend = $legend;

        return $this;
    }

    public function getXAxisLabel(): ?Title
    {
        return $this->xAxisLabel;
    }

    /**
     * Set X-Axis Label.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setXAxisLabel(Title $label): static
=======
    public function setXAxisLabel(Title $label)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->xAxisLabel = $label;

        return $this;
    }

    public function getYAxisLabel(): ?Title
    {
        return $this->yAxisLabel;
    }

    /**
     * Set Y-Axis Label.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setYAxisLabel(Title $label): static
=======
    public function setYAxisLabel(Title $label)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->yAxisLabel = $label;

        return $this;
    }

    public function getPlotArea(): ?PlotArea
    {
        return $this->plotArea;
    }

<<<<<<< HEAD
    public function getPlotAreaOrThrow(): PlotArea
    {
        $plotArea = $this->getPlotArea();
        if ($plotArea !== null) {
            return $plotArea;
        }

        throw new Exception('Chart has no PlotArea');
    }

=======
>>>>>>> 50f5a6f (Initial commit from local project)
    /**
     * Set Plot Area.
     */
    public function setPlotArea(PlotArea $plotArea): self
    {
        $this->plotArea = $plotArea;

        return $this;
    }

    /**
     * Get Plot Visible Only.
<<<<<<< HEAD
     */
    public function getPlotVisibleOnly(): bool
=======
     *
     * @return bool
     */
    public function getPlotVisibleOnly()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->plotVisibleOnly;
    }

    /**
     * Set Plot Visible Only.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setPlotVisibleOnly(bool $plotVisibleOnly): static
=======
     * @param bool $plotVisibleOnly
     *
     * @return $this
     */
    public function setPlotVisibleOnly($plotVisibleOnly)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->plotVisibleOnly = $plotVisibleOnly;

        return $this;
    }

    /**
     * Get Display Blanks as.
<<<<<<< HEAD
     */
    public function getDisplayBlanksAs(): string
=======
     *
     * @return string
     */
    public function getDisplayBlanksAs()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->displayBlanksAs;
    }

    /**
     * Set Display Blanks as.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setDisplayBlanksAs(string $displayBlanksAs): static
    {
        $displayBlanksAs = strtolower($displayBlanksAs);
        $this->displayBlanksAs = in_array($displayBlanksAs, DataSeries::VALID_EMPTY_AS, true) ? $displayBlanksAs : DataSeries::DEFAULT_EMPTY_AS;
=======
     * @param string $displayBlanksAs
     *
     * @return $this
     */
    public function setDisplayBlanksAs($displayBlanksAs)
    {
        $this->displayBlanksAs = $displayBlanksAs;
>>>>>>> 50f5a6f (Initial commit from local project)

        return $this;
    }

    public function getChartAxisY(): Axis
    {
        return $this->yAxis;
    }

    /**
     * Set yAxis.
     */
    public function setChartAxisY(?Axis $axis): self
    {
        $this->yAxis = $axis ?? new Axis();

        return $this;
    }

    public function getChartAxisX(): Axis
    {
        return $this->xAxis;
    }

    /**
     * Set xAxis.
     */
    public function setChartAxisX(?Axis $axis): self
    {
        $this->xAxis = $axis ?? new Axis();

        return $this;
    }

    /**
<<<<<<< HEAD
     * Set the Top Left position for the chart.
     *
     * @return $this
     */
    public function setTopLeftPosition(string $cellAddress, ?int $xOffset = null, ?int $yOffset = null): static
=======
     * Get Major Gridlines.
     *
     * @deprecated 1.24.0 Use Axis->getMajorGridlines()
     * @see Axis::getMajorGridlines()
     *
     * @codeCoverageIgnore
     */
    public function getMajorGridlines(): ?GridLines
    {
        return $this->yAxis->getMajorGridLines();
    }

    /**
     * Get Minor Gridlines.
     *
     * @deprecated 1.24.0 Use Axis->getMinorGridlines()
     * @see Axis::getMinorGridlines()
     *
     * @codeCoverageIgnore
     */
    public function getMinorGridlines(): ?GridLines
    {
        return $this->yAxis->getMinorGridLines();
    }

    /**
     * Set the Top Left position for the chart.
     *
     * @param string $cellAddress
     * @param int $xOffset
     * @param int $yOffset
     *
     * @return $this
     */
    public function setTopLeftPosition($cellAddress, $xOffset = null, $yOffset = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->topLeftCellRef = $cellAddress;
        if ($xOffset !== null) {
            $this->setTopLeftXOffset($xOffset);
        }
        if ($yOffset !== null) {
            $this->setTopLeftYOffset($yOffset);
        }

        return $this;
    }

    /**
     * Get the top left position of the chart.
     *
     * Returns ['cell' => string cell address, 'xOffset' => int, 'yOffset' => int].
     *
     * @return array{cell: string, xOffset: int, yOffset: int} an associative array containing the cell address, X-Offset and Y-Offset from the top left of that cell
     */
    public function getTopLeftPosition(): array
    {
        return [
            'cell' => $this->topLeftCellRef,
            'xOffset' => $this->topLeftXOffset,
            'yOffset' => $this->topLeftYOffset,
        ];
    }

    /**
     * Get the cell address where the top left of the chart is fixed.
<<<<<<< HEAD
     */
    public function getTopLeftCell(): string
=======
     *
     * @return string
     */
    public function getTopLeftCell()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return $this->topLeftCellRef;
    }

    /**
     * Set the Top Left cell position for the chart.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setTopLeftCell(string $cellAddress): static
=======
     * @param string $cellAddress
     *
     * @return $this
     */
    public function setTopLeftCell($cellAddress)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->topLeftCellRef = $cellAddress;

        return $this;
    }

    /**
     * Set the offset position within the Top Left cell for the chart.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setTopLeftOffset(?int $xOffset, ?int $yOffset): static
=======
     * @param ?int $xOffset
     * @param ?int $yOffset
     *
     * @return $this
     */
    public function setTopLeftOffset($xOffset, $yOffset)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($xOffset !== null) {
            $this->setTopLeftXOffset($xOffset);
        }

        if ($yOffset !== null) {
            $this->setTopLeftYOffset($yOffset);
        }

        return $this;
    }

    /**
     * Get the offset position within the Top Left cell for the chart.
     *
     * @return int[]
     */
<<<<<<< HEAD
    public function getTopLeftOffset(): array
=======
    public function getTopLeftOffset()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return [
            'X' => $this->topLeftXOffset,
            'Y' => $this->topLeftYOffset,
        ];
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function setTopLeftXOffset(int $xOffset): static
=======
     * @param int $xOffset
     *
     * @return $this
     */
    public function setTopLeftXOffset($xOffset)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->topLeftXOffset = $xOffset;

        return $this;
    }

    public function getTopLeftXOffset(): int
    {
        return $this->topLeftXOffset;
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function setTopLeftYOffset(int $yOffset): static
=======
     * @param int $yOffset
     *
     * @return $this
     */
    public function setTopLeftYOffset($yOffset)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->topLeftYOffset = $yOffset;

        return $this;
    }

    public function getTopLeftYOffset(): int
    {
        return $this->topLeftYOffset;
    }

    /**
     * Set the Bottom Right position of the chart.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setBottomRightPosition(string $cellAddress = '', ?int $xOffset = null, ?int $yOffset = null): static
=======
     * @param string $cellAddress
     * @param int $xOffset
     * @param int $yOffset
     *
     * @return $this
     */
    public function setBottomRightPosition($cellAddress = '', $xOffset = null, $yOffset = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->bottomRightCellRef = $cellAddress;
        if ($xOffset !== null) {
            $this->setBottomRightXOffset($xOffset);
        }
        if ($yOffset !== null) {
            $this->setBottomRightYOffset($yOffset);
        }

        return $this;
    }

    /**
     * Get the bottom right position of the chart.
     *
     * @return array an associative array containing the cell address, X-Offset and Y-Offset from the top left of that cell
     */
<<<<<<< HEAD
    public function getBottomRightPosition(): array
=======
    public function getBottomRightPosition()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return [
            'cell' => $this->bottomRightCellRef,
            'xOffset' => $this->bottomRightXOffset,
            'yOffset' => $this->bottomRightYOffset,
        ];
    }

    /**
     * Set the Bottom Right cell for the chart.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setBottomRightCell(string $cellAddress = ''): static
=======
    public function setBottomRightCell(string $cellAddress = '')
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->bottomRightCellRef = $cellAddress;

        return $this;
    }

    /**
     * Get the cell address where the bottom right of the chart is fixed.
     */
    public function getBottomRightCell(): string
    {
        return $this->bottomRightCellRef;
    }

    /**
     * Set the offset position within the Bottom Right cell for the chart.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setBottomRightOffset(?int $xOffset, ?int $yOffset): static
=======
     * @param ?int $xOffset
     * @param ?int $yOffset
     *
     * @return $this
     */
    public function setBottomRightOffset($xOffset, $yOffset)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($xOffset !== null) {
            $this->setBottomRightXOffset($xOffset);
        }

        if ($yOffset !== null) {
            $this->setBottomRightYOffset($yOffset);
        }

        return $this;
    }

    /**
     * Get the offset position within the Bottom Right cell for the chart.
     *
     * @return int[]
     */
<<<<<<< HEAD
    public function getBottomRightOffset(): array
=======
    public function getBottomRightOffset()
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return [
            'X' => $this->bottomRightXOffset,
            'Y' => $this->bottomRightYOffset,
        ];
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function setBottomRightXOffset(int $xOffset): static
=======
     * @param int $xOffset
     *
     * @return $this
     */
    public function setBottomRightXOffset($xOffset)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->bottomRightXOffset = $xOffset;

        return $this;
    }

    public function getBottomRightXOffset(): int
    {
        return $this->bottomRightXOffset;
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function setBottomRightYOffset(int $yOffset): static
=======
     * @param int $yOffset
     *
     * @return $this
     */
    public function setBottomRightYOffset($yOffset)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->bottomRightYOffset = $yOffset;

        return $this;
    }

    public function getBottomRightYOffset(): int
    {
        return $this->bottomRightYOffset;
    }

    public function refresh(): void
    {
        if ($this->worksheet !== null && $this->plotArea !== null) {
            $this->plotArea->refresh($this->worksheet);
        }
    }

    /**
     * Render the chart to given file (or stream).
     *
<<<<<<< HEAD
     * @param ?string $outputDestination Name of the file render to
     *
     * @return bool true on success
     */
    public function render(?string $outputDestination = null): bool
=======
     * @param string $outputDestination Name of the file render to
     *
     * @return bool true on success
     */
    public function render($outputDestination = null)
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($outputDestination == 'php://output') {
            $outputDestination = null;
        }

        $libraryName = Settings::getChartRenderer();
        if ($libraryName === null) {
            return false;
        }

        // Ensure that data series values are up-to-date before we render
        $this->refresh();

        $renderer = new $libraryName($this);

<<<<<<< HEAD
        return $renderer->render($outputDestination);
=======
        return $renderer->render($outputDestination); // @phpstan-ignore-line
>>>>>>> 50f5a6f (Initial commit from local project)
    }

    public function getRotX(): ?int
    {
        return $this->rotX;
    }

    public function setRotX(?int $rotX): self
    {
        $this->rotX = $rotX;

        return $this;
    }

    public function getRotY(): ?int
    {
        return $this->rotY;
    }

    public function setRotY(?int $rotY): self
    {
        $this->rotY = $rotY;

        return $this;
    }

    public function getRAngAx(): ?int
    {
        return $this->rAngAx;
    }

    public function setRAngAx(?int $rAngAx): self
    {
        $this->rAngAx = $rAngAx;

        return $this;
    }

    public function getPerspective(): ?int
    {
        return $this->perspective;
    }

    public function setPerspective(?int $perspective): self
    {
        $this->perspective = $perspective;

        return $this;
    }

    public function getOneCellAnchor(): bool
    {
        return $this->oneCellAnchor;
    }

    public function setOneCellAnchor(bool $oneCellAnchor): self
    {
        $this->oneCellAnchor = $oneCellAnchor;

        return $this;
    }

    public function getAutoTitleDeleted(): bool
    {
        return $this->autoTitleDeleted;
    }

    public function setAutoTitleDeleted(bool $autoTitleDeleted): self
    {
        $this->autoTitleDeleted = $autoTitleDeleted;

        return $this;
    }

    public function getNoFill(): bool
    {
        return $this->noFill;
    }

    public function setNoFill(bool $noFill): self
    {
        $this->noFill = $noFill;

        return $this;
    }

<<<<<<< HEAD
    public function getNoBorder(): bool
    {
        return $this->noBorder;
    }

    public function setNoBorder(bool $noBorder): self
    {
        $this->noBorder = $noBorder;

        return $this;
    }

=======
>>>>>>> 50f5a6f (Initial commit from local project)
    public function getRoundedCorners(): bool
    {
        return $this->roundedCorners;
    }

    public function setRoundedCorners(?bool $roundedCorners): self
    {
        if ($roundedCorners !== null) {
            $this->roundedCorners = $roundedCorners;
        }

        return $this;
    }

    public function getBorderLines(): GridLines
    {
        return $this->borderLines;
    }

    public function setBorderLines(GridLines $borderLines): self
    {
        $this->borderLines = $borderLines;

        return $this;
    }

    public function getFillColor(): ChartColor
    {
        return $this->fillColor;
    }
<<<<<<< HEAD

    public function setRenderedWidth(?float $width): self
    {
        $this->renderedWidth = $width;

        return $this;
    }

    public function getRenderedWidth(): ?float
    {
        return $this->renderedWidth;
    }

    public function setRenderedHeight(?float $height): self
    {
        $this->renderedHeight = $height;

        return $this;
    }

    public function getRenderedHeight(): ?float
    {
        return $this->renderedHeight;
    }

    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
        $this->worksheet = null;
        $this->title = ($this->title === null) ? null : clone $this->title;
        $this->legend = ($this->legend === null) ? null : clone $this->legend;
        $this->xAxisLabel = ($this->xAxisLabel === null) ? null : clone $this->xAxisLabel;
        $this->yAxisLabel = ($this->yAxisLabel === null) ? null : clone $this->yAxisLabel;
        $this->plotArea = ($this->plotArea === null) ? null : clone $this->plotArea;
        $this->xAxis = clone $this->xAxis;
        $this->yAxis = clone $this->yAxis;
        $this->borderLines = clone $this->borderLines;
        $this->fillColor = clone $this->fillColor;
    }
=======
>>>>>>> 50f5a6f (Initial commit from local project)
}
