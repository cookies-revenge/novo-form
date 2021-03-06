<?php

namespace Test\Models\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use Test\Models\Book;
use Test\Models\BookQuery;


/**
 * This class defines the structure of the 'nft__books' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BookTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Test.Models.Map.BookTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'nf_test';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'nft__books';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Test\\Models\\Book';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Test.Models.Book';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the id field
     */
    const COL_ID = 'nft__books.id';

    /**
     * the column name for the crdate field
     */
    const COL_CRDATE = 'nft__books.crdate';

    /**
     * the column name for the tstamp field
     */
    const COL_TSTAMP = 'nft__books.tstamp';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'nft__books.title';

    /**
     * the column name for the subtitle field
     */
    const COL_SUBTITLE = 'nft__books.subtitle';

    /**
     * the column name for the total_pages field
     */
    const COL_TOTAL_PAGES = 'nft__books.total_pages';

    /**
     * the column name for the publish_date field
     */
    const COL_PUBLISH_DATE = 'nft__books.publish_date';

    /**
     * the column name for the abstract field
     */
    const COL_ABSTRACT = 'nft__books.abstract';

    /**
     * the column name for the genre_id field
     */
    const COL_GENRE_ID = 'nft__books.genre_id';

    /**
     * the column name for the author_id field
     */
    const COL_AUTHOR_ID = 'nft__books.author_id';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Crdate', 'Tstamp', 'Title', 'Subtitle', 'TotalPages', 'PublishDate', 'Abstract', 'GenreId', 'AuthorId', ),
        self::TYPE_CAMELNAME     => array('id', 'crdate', 'tstamp', 'title', 'subtitle', 'totalPages', 'publishDate', 'abstract', 'genreId', 'authorId', ),
        self::TYPE_COLNAME       => array(BookTableMap::COL_ID, BookTableMap::COL_CRDATE, BookTableMap::COL_TSTAMP, BookTableMap::COL_TITLE, BookTableMap::COL_SUBTITLE, BookTableMap::COL_TOTAL_PAGES, BookTableMap::COL_PUBLISH_DATE, BookTableMap::COL_ABSTRACT, BookTableMap::COL_GENRE_ID, BookTableMap::COL_AUTHOR_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'crdate', 'tstamp', 'title', 'subtitle', 'total_pages', 'publish_date', 'abstract', 'genre_id', 'author_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Crdate' => 1, 'Tstamp' => 2, 'Title' => 3, 'Subtitle' => 4, 'TotalPages' => 5, 'PublishDate' => 6, 'Abstract' => 7, 'GenreId' => 8, 'AuthorId' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'crdate' => 1, 'tstamp' => 2, 'title' => 3, 'subtitle' => 4, 'totalPages' => 5, 'publishDate' => 6, 'abstract' => 7, 'genreId' => 8, 'authorId' => 9, ),
        self::TYPE_COLNAME       => array(BookTableMap::COL_ID => 0, BookTableMap::COL_CRDATE => 1, BookTableMap::COL_TSTAMP => 2, BookTableMap::COL_TITLE => 3, BookTableMap::COL_SUBTITLE => 4, BookTableMap::COL_TOTAL_PAGES => 5, BookTableMap::COL_PUBLISH_DATE => 6, BookTableMap::COL_ABSTRACT => 7, BookTableMap::COL_GENRE_ID => 8, BookTableMap::COL_AUTHOR_ID => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'crdate' => 1, 'tstamp' => 2, 'title' => 3, 'subtitle' => 4, 'total_pages' => 5, 'publish_date' => 6, 'abstract' => 7, 'genre_id' => 8, 'author_id' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('nft__books');
        $this->setPhpName('Book');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Test\\Models\\Book');
        $this->setPackage('Test.Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('crdate', 'Crdate', 'INTEGER', true, null, 0);
        $this->addColumn('tstamp', 'Tstamp', 'INTEGER', true, null, 0);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 128, null);
        $this->addColumn('subtitle', 'Subtitle', 'VARCHAR', true, 256, null);
        $this->addColumn('total_pages', 'TotalPages', 'INTEGER', true, null, 0);
        $this->addColumn('publish_date', 'PublishDate', 'INTEGER', true, null, 0);
        $this->addColumn('abstract', 'Abstract', 'LONGVARCHAR', false, null, null);
        $this->addColumn('genre_id', 'GenreId', 'INTEGER', true, null, 0);
        $this->addForeignKey('author_id', 'AuthorId', 'INTEGER', 'nft__authors', 'id', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Author', '\\Test\\Models\\Author', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':author_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Chapter', '\\Test\\Models\\Chapter', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':book_id',
    1 => ':id',
  ),
), null, null, 'Chapters', false);
        $this->addRelation('BookstoreBook', '\\Test\\Models\\BookstoreBook', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':book_id',
    1 => ':id',
  ),
), null, null, 'BookstoreBooks', false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? BookTableMap::CLASS_DEFAULT : BookTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Book object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BookTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BookTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BookTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BookTableMap::OM_CLASS;
            /** @var Book $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BookTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = BookTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BookTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Book $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BookTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(BookTableMap::COL_ID);
            $criteria->addSelectColumn(BookTableMap::COL_CRDATE);
            $criteria->addSelectColumn(BookTableMap::COL_TSTAMP);
            $criteria->addSelectColumn(BookTableMap::COL_TITLE);
            $criteria->addSelectColumn(BookTableMap::COL_SUBTITLE);
            $criteria->addSelectColumn(BookTableMap::COL_TOTAL_PAGES);
            $criteria->addSelectColumn(BookTableMap::COL_PUBLISH_DATE);
            $criteria->addSelectColumn(BookTableMap::COL_ABSTRACT);
            $criteria->addSelectColumn(BookTableMap::COL_GENRE_ID);
            $criteria->addSelectColumn(BookTableMap::COL_AUTHOR_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.crdate');
            $criteria->addSelectColumn($alias . '.tstamp');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.subtitle');
            $criteria->addSelectColumn($alias . '.total_pages');
            $criteria->addSelectColumn($alias . '.publish_date');
            $criteria->addSelectColumn($alias . '.abstract');
            $criteria->addSelectColumn($alias . '.genre_id');
            $criteria->addSelectColumn($alias . '.author_id');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(BookTableMap::DATABASE_NAME)->getTable(BookTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(BookTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(BookTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new BookTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Book or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Book object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Test\Models\Book) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BookTableMap::DATABASE_NAME);
            $criteria->add(BookTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = BookQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BookTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BookTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the nft__books table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BookQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Book or Criteria object.
     *
     * @param mixed               $criteria Criteria or Book object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Book object
        }

        if ($criteria->containsKey(BookTableMap::COL_ID) && $criteria->keyContainsValue(BookTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BookTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = BookQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // BookTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BookTableMap::buildTableMap();
