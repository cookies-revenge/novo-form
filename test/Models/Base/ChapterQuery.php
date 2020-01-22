<?php

namespace Test\Models\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Test\Models\Chapter as ChildChapter;
use Test\Models\ChapterQuery as ChildChapterQuery;
use Test\Models\Map\ChapterTableMap;

/**
 * Base class that represents a query for the 'nft__chapter' table.
 *
 *
 *
 * @method     ChildChapterQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildChapterQuery orderByCrdate($order = Criteria::ASC) Order by the crdate column
 * @method     ChildChapterQuery orderByTstamp($order = Criteria::ASC) Order by the tstamp column
 * @method     ChildChapterQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildChapterQuery orderByTotalPages($order = Criteria::ASC) Order by the total_pages column
 * @method     ChildChapterQuery orderByBookId($order = Criteria::ASC) Order by the book_id column
 *
 * @method     ChildChapterQuery groupById() Group by the id column
 * @method     ChildChapterQuery groupByCrdate() Group by the crdate column
 * @method     ChildChapterQuery groupByTstamp() Group by the tstamp column
 * @method     ChildChapterQuery groupByTitle() Group by the title column
 * @method     ChildChapterQuery groupByTotalPages() Group by the total_pages column
 * @method     ChildChapterQuery groupByBookId() Group by the book_id column
 *
 * @method     ChildChapterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildChapterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildChapterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildChapterQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildChapterQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildChapterQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildChapterQuery leftJoinBook($relationAlias = null) Adds a LEFT JOIN clause to the query using the Book relation
 * @method     ChildChapterQuery rightJoinBook($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Book relation
 * @method     ChildChapterQuery innerJoinBook($relationAlias = null) Adds a INNER JOIN clause to the query using the Book relation
 *
 * @method     ChildChapterQuery joinWithBook($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Book relation
 *
 * @method     ChildChapterQuery leftJoinWithBook() Adds a LEFT JOIN clause and with to the query using the Book relation
 * @method     ChildChapterQuery rightJoinWithBook() Adds a RIGHT JOIN clause and with to the query using the Book relation
 * @method     ChildChapterQuery innerJoinWithBook() Adds a INNER JOIN clause and with to the query using the Book relation
 *
 * @method     \Test\Models\BookQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildChapter findOne(ConnectionInterface $con = null) Return the first ChildChapter matching the query
 * @method     ChildChapter findOneOrCreate(ConnectionInterface $con = null) Return the first ChildChapter matching the query, or a new ChildChapter object populated from the query conditions when no match is found
 *
 * @method     ChildChapter findOneById(int $id) Return the first ChildChapter filtered by the id column
 * @method     ChildChapter findOneByCrdate(int $crdate) Return the first ChildChapter filtered by the crdate column
 * @method     ChildChapter findOneByTstamp(int $tstamp) Return the first ChildChapter filtered by the tstamp column
 * @method     ChildChapter findOneByTitle(string $title) Return the first ChildChapter filtered by the title column
 * @method     ChildChapter findOneByTotalPages(int $total_pages) Return the first ChildChapter filtered by the total_pages column
 * @method     ChildChapter findOneByBookId(int $book_id) Return the first ChildChapter filtered by the book_id column *

 * @method     ChildChapter requirePk($key, ConnectionInterface $con = null) Return the ChildChapter by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChapter requireOne(ConnectionInterface $con = null) Return the first ChildChapter matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChapter requireOneById(int $id) Return the first ChildChapter filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChapter requireOneByCrdate(int $crdate) Return the first ChildChapter filtered by the crdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChapter requireOneByTstamp(int $tstamp) Return the first ChildChapter filtered by the tstamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChapter requireOneByTitle(string $title) Return the first ChildChapter filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChapter requireOneByTotalPages(int $total_pages) Return the first ChildChapter filtered by the total_pages column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChapter requireOneByBookId(int $book_id) Return the first ChildChapter filtered by the book_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChapter[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildChapter objects based on current ModelCriteria
 * @method     ChildChapter[]|ObjectCollection findById(int $id) Return ChildChapter objects filtered by the id column
 * @method     ChildChapter[]|ObjectCollection findByCrdate(int $crdate) Return ChildChapter objects filtered by the crdate column
 * @method     ChildChapter[]|ObjectCollection findByTstamp(int $tstamp) Return ChildChapter objects filtered by the tstamp column
 * @method     ChildChapter[]|ObjectCollection findByTitle(string $title) Return ChildChapter objects filtered by the title column
 * @method     ChildChapter[]|ObjectCollection findByTotalPages(int $total_pages) Return ChildChapter objects filtered by the total_pages column
 * @method     ChildChapter[]|ObjectCollection findByBookId(int $book_id) Return ChildChapter objects filtered by the book_id column
 * @method     ChildChapter[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ChapterQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Test\Models\Base\ChapterQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'nf_test', $modelName = '\\Test\\Models\\Chapter', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildChapterQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildChapterQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildChapterQuery) {
            return $criteria;
        }
        $query = new ChildChapterQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildChapter|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ChapterTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ChapterTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildChapter A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, crdate, tstamp, title, total_pages, book_id FROM nft__chapter WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildChapter $obj */
            $obj = new ChildChapter();
            $obj->hydrate($row);
            ChapterTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildChapter|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildChapterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ChapterTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildChapterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ChapterTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChapterQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ChapterTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ChapterTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChapterTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the crdate column
     *
     * Example usage:
     * <code>
     * $query->filterByCrdate(1234); // WHERE crdate = 1234
     * $query->filterByCrdate(array(12, 34)); // WHERE crdate IN (12, 34)
     * $query->filterByCrdate(array('min' => 12)); // WHERE crdate > 12
     * </code>
     *
     * @param     mixed $crdate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChapterQuery The current query, for fluid interface
     */
    public function filterByCrdate($crdate = null, $comparison = null)
    {
        if (is_array($crdate)) {
            $useMinMax = false;
            if (isset($crdate['min'])) {
                $this->addUsingAlias(ChapterTableMap::COL_CRDATE, $crdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crdate['max'])) {
                $this->addUsingAlias(ChapterTableMap::COL_CRDATE, $crdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChapterTableMap::COL_CRDATE, $crdate, $comparison);
    }

    /**
     * Filter the query on the tstamp column
     *
     * Example usage:
     * <code>
     * $query->filterByTstamp(1234); // WHERE tstamp = 1234
     * $query->filterByTstamp(array(12, 34)); // WHERE tstamp IN (12, 34)
     * $query->filterByTstamp(array('min' => 12)); // WHERE tstamp > 12
     * </code>
     *
     * @param     mixed $tstamp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChapterQuery The current query, for fluid interface
     */
    public function filterByTstamp($tstamp = null, $comparison = null)
    {
        if (is_array($tstamp)) {
            $useMinMax = false;
            if (isset($tstamp['min'])) {
                $this->addUsingAlias(ChapterTableMap::COL_TSTAMP, $tstamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tstamp['max'])) {
                $this->addUsingAlias(ChapterTableMap::COL_TSTAMP, $tstamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChapterTableMap::COL_TSTAMP, $tstamp, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChapterQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChapterTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the total_pages column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalPages(1234); // WHERE total_pages = 1234
     * $query->filterByTotalPages(array(12, 34)); // WHERE total_pages IN (12, 34)
     * $query->filterByTotalPages(array('min' => 12)); // WHERE total_pages > 12
     * </code>
     *
     * @param     mixed $totalPages The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChapterQuery The current query, for fluid interface
     */
    public function filterByTotalPages($totalPages = null, $comparison = null)
    {
        if (is_array($totalPages)) {
            $useMinMax = false;
            if (isset($totalPages['min'])) {
                $this->addUsingAlias(ChapterTableMap::COL_TOTAL_PAGES, $totalPages['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPages['max'])) {
                $this->addUsingAlias(ChapterTableMap::COL_TOTAL_PAGES, $totalPages['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChapterTableMap::COL_TOTAL_PAGES, $totalPages, $comparison);
    }

    /**
     * Filter the query on the book_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBookId(1234); // WHERE book_id = 1234
     * $query->filterByBookId(array(12, 34)); // WHERE book_id IN (12, 34)
     * $query->filterByBookId(array('min' => 12)); // WHERE book_id > 12
     * </code>
     *
     * @see       filterByBook()
     *
     * @param     mixed $bookId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChapterQuery The current query, for fluid interface
     */
    public function filterByBookId($bookId = null, $comparison = null)
    {
        if (is_array($bookId)) {
            $useMinMax = false;
            if (isset($bookId['min'])) {
                $this->addUsingAlias(ChapterTableMap::COL_BOOK_ID, $bookId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bookId['max'])) {
                $this->addUsingAlias(ChapterTableMap::COL_BOOK_ID, $bookId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChapterTableMap::COL_BOOK_ID, $bookId, $comparison);
    }

    /**
     * Filter the query by a related \Test\Models\Book object
     *
     * @param \Test\Models\Book|ObjectCollection $book The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildChapterQuery The current query, for fluid interface
     */
    public function filterByBook($book, $comparison = null)
    {
        if ($book instanceof \Test\Models\Book) {
            return $this
                ->addUsingAlias(ChapterTableMap::COL_BOOK_ID, $book->getId(), $comparison);
        } elseif ($book instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ChapterTableMap::COL_BOOK_ID, $book->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByBook() only accepts arguments of type \Test\Models\Book or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Book relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildChapterQuery The current query, for fluid interface
     */
    public function joinBook($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Book');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Book');
        }

        return $this;
    }

    /**
     * Use the Book relation Book object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Test\Models\BookQuery A secondary query class using the current class as primary query
     */
    public function useBookQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBook($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Book', '\Test\Models\BookQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildChapter $chapter Object to remove from the list of results
     *
     * @return $this|ChildChapterQuery The current query, for fluid interface
     */
    public function prune($chapter = null)
    {
        if ($chapter) {
            $this->addUsingAlias(ChapterTableMap::COL_ID, $chapter->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the nft__chapter table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChapterTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ChapterTableMap::clearInstancePool();
            ChapterTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChapterTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ChapterTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ChapterTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ChapterTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ChapterQuery
