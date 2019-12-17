<?php

namespace CookiesRevenge\Novo\Utilities\NovoFormBuilder;

abstract class Abstract_Builder
{

    abstract public function BuildTable();
    abstract public function BuildTableResults();

    public function SetTemplatingEngine($templatingEngine)
    {
        switch ($templatingEngine) {
            case "smarty":
                $this->templatingEngine_ = new \CookiesRevenge\Novo\Utilities\NovoTableBuilder\Template_Engine_Facades\Smarty_Tpl_Facade();
                break;
            default:
                throw new \Exception("Template engine is either invalid or unsupported.");
        }
        return $this;
    }

    /**
     * Inject a definitions map.
     * Map stores meta data about Table (dynamic search properties, filters, buttons & actions, fields, pagination...)
     *
     * @param mixed $definitionsMap Map with definitions for table wrapper, filters, buttons, actions, fields.
     * @return $this The current object (for fluent API support)
     */
    public function SetDefinitionsMap($definitionsMap)
    {
        $this->definitionsMap_ = $definitionsMap;
        return $this;
    }

    /**
     * Define a data collection (table rows) for the table.
     * Implicitly calculates $resultsTotal by counting the data collection.
     *
     * @param array<mixed> $dataCollection new value
     * @return $this The current object (for fluent API support)
     */
    public function SetDataCollection($dataCollection)
    {
        $this->dataCollection_ = $dataCollection;
        $this->resultsTotal_ = count($dataCollection);
        return $this;
    }

    /**
     * Define active page for the table.
     * This is used when user selects a pagination page.
     *
     * @param int $resultsPerPage new value
     * @return $this The current object (for fluent API support)
     */
    public function SetActivePage($activePage)
    {
        $this->activePage_ = $activePage;
        return $this;
    }

    /**
     * Define number of table rows to be displayed in a single page.
     * Default value = 20. You may use this function to override it.
     *
     * @param int $resultsPerPage new value
     * @return $this The current object (for fluent API support)
     */
    public function SetResultsPerPage($resultsPerPage)
    {
        $this->resultsPerPage_ = $resultsPerPage;
        return $this;
    }

    /**
     * Define sorting column for the table.
     * This refers to a column name from definitions map.
     *
     * @param string $sortingColumn new value
     * @return $this The current object (for fluent API support)
     */
    public function SetSortingColumn($sortingColumn)
    {
        $this->sortingColumn_ = $sortingColumn;
        return $this;
    }

    /**
     * Define sorting order for the sorting column. Allowed values "ASC" or "DESC"
     *
     * @param string $sortingOrder new value
     * @return $this The current object (for fluent API support)
     */
    public function SetSortingOrder($sortingOrder)
    {
        if (!in_array(strtoupper($sortingOrder), [Table_Builder_Constants::ORDER_ASCENDING, Table_Builder_Constants::ORDER_DESCENDING])) {
            throw new \Exception("Invalid value set for Sorting Type");
        }

        $this->sortingOrder_ = $sortingOrder;
        return $this;
    }

    /**
     * Define whether Table should display all results in one page (no pagination)
     *
     * @param boolean $showAll new value
     * @return $this The current object (for fluent API support)
     */
    public function SetShowAll(bool $showAll)
    {
        $this->showAll_ = $showAll;
        return $this;
    }

    /**
     * Define whether Table should be responsive.
     *
     * @param boolean $isResponsive new value
     * @return $this The current object (for fluent API support)
     */
    public function SetIsResponsive(bool $isResponsive)
    {
        $this->isResponsive_ = $isResponsive;
        return $this;
    }

    /**
     * Define whether Table should be striped.
     *
     * @param boolean $isStriped new value
     * @return $this The current object (for fluent API support)
     */
    public function SetIsStriped(bool $isStriped)
    {
        $this->isStriped_ = $isStriped;
        return $this;
    }

    /**
     * Define whether Table should be bordered.
     *
     * @param boolean $isBordered new value
     * @return $this The current object (for fluent API support)
     */
    public function SetIsBordered(bool $isBordered)
    {
        $this->isBordered_ = $isBordered;
        return $this;
    }

    /*
     * templating engine
     */
    /** @var mixed */
    protected $templatingEngine_;

    /*
     * definitions map to build upon
     */
    /** @var mixed */
    protected $definitionsMap_;

    /*
     * dataset
     */
    /** @var array */
    protected $dataCollection_ = [];

    /*
     * dataset sorting and batch options
     */
    /** @var integer */
    protected $activePage_ = 1;

    /** @var integer */
    protected $resultsPerPage_ = 20;

    /** @var integer */
    protected $resultsTotal_ = 0;

    /** @var string */
    protected $sortingColumn_ = "Id";

    /** @var string */
    protected $sortingOrder_ = "ASC";

    /** @var boolean */
    protected $showAll_ = false;

    /*
     * styling options
     */
    /** @var boolean */
    protected $isBordered_;

    /** @var boolean */
    protected $isStriped_;

    /** @var boolean */
    protected $isResponsive_;
}
