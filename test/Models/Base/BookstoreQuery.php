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
use Test\Models\Bookstore as ChildBookstore;
use Test\Models\BookstoreQuery as ChildBookstoreQuery;
use Test\Models\Map\BookstoreTableMap;

/**
 * Base class that represents a query for the 'nft__bookstores' table.
 *
 *
 *
 * @method     ChildBookstoreQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildBookstoreQuery orderByCrdate($order = Criteria::ASC) Order by the crdate column
 * @method     ChildBookstoreQuery orderByTstamp($order = Criteria::ASC) Order by the tstamp column
 * @method     ChildBookstoreQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildBookstoreQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildBookstoreQuery orderByAddress($order = Criteria::ASC) Order by the address column
 *
 * @method     ChildBookstoreQuery groupById() Group by the id column
 * @method     ChildBookstoreQuery groupByCrdate() Group by the crdate column
 * @method     ChildBookstoreQuery groupByTstamp() Group by the tstamp column
 * @method     ChildBookstoreQuery groupByTitle() Group by the title column
 * @method     ChildBookstoreQuery groupByCity() Group by the city column
 * @method     ChildBookstoreQuery groupByAddress() Group by the address column
 *
 * @method     ChildBookstoreQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBookstoreQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBookstoreQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBookstoreQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBookstoreQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBookstoreQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBookstoreQuery leftJoinBookstoreBook($relationAlias = null) Adds a LEFT JOIN clause to the query using the BookstoreBook relation
 * @method     ChildBookstoreQuery rightJoinBookstoreBook($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BookstoreBook relation
 * @method     ChildBookstoreQuery innerJoinBookstoreBook($relationAlias = null) Adds a INNER JOIN clause to the query using the BookstoreBook relation
 *
 * @method     ChildBookstoreQuery joinWithBookstoreBook($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the BookstoreBook relation
 *
 * @method     ChildBookstoreQuery leftJoinWithBookstoreBook() Adds a LEFT JOIN clause and with to the query using the BookstoreBook relation
 * @method     ChildBookstoreQuery rightJoinWithBookstoreBook() Adds a RIGHT JOIN clause and with to the query using the BookstoreBook relation
 * @method     ChildBookstoreQuery innerJoinWithBookstoreBook() Adds a INNER JOIN clause and with to the query using the BookstoreBook relation
 *
 * @method     \Test\Models\BookstoreBookQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildBookstore findOne(ConnectionInterface $con = null) Return the first ChildBookstore matching the query
 * @method     ChildBookstore findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBookstore matching the query, or a new ChildBookstore object populated from the query conditions when no match is found
 *
 * @method     ChildBookstore findOneById(int $id) Return the first ChildBookstore filtered by the id column
 * @method     ChildBookstore findOneByCrdate(int $crdate) Return the first ChildBookstore filtered by the crdate column
 * @method     ChildBookstore findOneByTstamp(int $tstamp) Return the first ChildBookstore filtered by the tstamp column
 * @method     ChildBookstore findOneByTitle(string $title) Return the first ChildBookstore filtered by the title column
 * @method     ChildBookstore findOneByCity(string $city) Return the first ChildBookstore filtered by the city column
 * @method     ChildBookstore findOneByAddress(string $address) Return the first ChildBookstore filtered by the address column *

 * @method     ChildBookstore requirePk($key, ConnectionInterface $con = null) Return the ChildBookstore by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookstore requireOne(ConnectionInterface $con = null) Return the first ChildBookstore matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBookstore requireOneById(int $id) Return the first ChildBookstore filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookstore requireOneByCrdate(int $crdate) Return the first ChildBookstore filtered by the crdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookstore requireOneByTstamp(int $tstamp) Return the first ChildBookstore filtered by the tstamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookstore requireOneByTitle(string $title) Return the first ChildBookstore filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookstore requireOneByCity(string $city) Return the first ChildBookstore filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookstore requireOneByAddress(string $address) Return the first ChildBookstore filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBookstore[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBookstore objects based on current ModelCriteria
 * @method     ChildBookstore[]|ObjectCollection findById(int $id) Return ChildBookstore objects filtered by the id column
 * @method     ChildBookstore[]|ObjectCollection findByCrdate(int $crdate) Return ChildBookstore objects filtered by the crdate column
 * @method     ChildBookstore[]|ObjectCollection findByTstamp(int $tstamp) Return ChildBookstore objects filtered by the tstamp column
 * @method     ChildBookstore[]|ObjectCollection findByTitle(string $title) Return ChildBookstore objects filtered by the title column
 * @method     ChildBookstore[]|ObjectCollection findByCity(string $city) Return ChildBookstore objects filtered by the city column
 * @method     ChildBookstore[]|ObjectCollection findByAddress(string $address) Return ChildBookstore objects filtered by the address column
 * @method     ChildBookstore[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BookstoreQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Test\Models\Base\BookstoreQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'nf_test', $modelName = '\\Test\\Models\\Bookstore', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBookstoreQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBookstoreQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBookstoreQuery) {
            return $criteria;
        }
        $query = new ChildBookstoreQuery();
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
     * @return ChildBookstore|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BookstoreTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BookstoreTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBookstore A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, crdate, tstamp, title, city, address FROM nft__bookstores WHERE id = :p0';
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
            /** @var ChildBookstore $obj */
            $obj = new ChildBookstore();
            $obj->hydrate($row);
            BookstoreTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBookstore|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBookstoreQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BookstoreTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBookstoreQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BookstoreTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildBookstoreQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BookstoreTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BookstoreTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookstoreTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildBookstoreQuery The current query, for fluid interface
     */
    public function filterByCrdate($crdate = null, $comparison = null)
    {
        if (is_array($crdate)) {
            $useMinMax = false;
            if (isset($crdate['min'])) {
                $this->addUsingAlias(BookstoreTableMap::COL_CRDATE, $crdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crdate['max'])) {
                $this->addUsingAlias(BookstoreTableMap::COL_CRDATE, $crdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookstoreTableMap::COL_CRDATE, $crdate, $comparison);
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
     * @return $this|ChildBookstoreQuery The current query, for fluid interface
     */
    public function filterByTstamp($tstamp = null, $comparison = null)
    {
        if (is_array($tstamp)) {
            $useMinMax = false;
            if (isset($tstamp['min'])) {
                $this->addUsingAlias(BookstoreTableMap::COL_TSTAMP, $tstamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tstamp['max'])) {
                $this->addUsingAlias(BookstoreTableMap::COL_TSTAMP, $tstamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookstoreTableMap::COL_TSTAMP, $tstamp, $comparison);
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
     * @return $this|ChildBookstoreQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookstoreTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%', Criteria::LIKE); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookstoreQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookstoreTableMap::COL_CITY, $city, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%', Criteria::LIKE); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookstoreQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookstoreTableMap::COL_ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query by a related \Test\Models\BookstoreBook object
     *
     * @param \Test\Models\BookstoreBook|ObjectCollection $bookstoreBook the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookstoreQuery The current query, for fluid interface
     */
    public function filterByBookstoreBook($bookstoreBook, $comparison = null)
    {
        if ($bookstoreBook instanceof \Test\Models\BookstoreBook) {
            return $this
                ->addUsingAlias(BookstoreTableMap::COL_ID, $bookstoreBook->getBookstoreId(), $comparison);
        } elseif ($bookstoreBook instanceof ObjectCollection) {
            return $this
                ->useBookstoreBookQuery()
                ->filterByPrimaryKeys($bookstoreBook->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBookstoreBook() only accepts arguments of type \Test\Models\BookstoreBook or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BookstoreBook relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBookstoreQuery The current query, for fluid interface
     */
    public function joinBookstoreBook($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BookstoreBook');

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
            $this->addJoinObject($join, 'BookstoreBook');
        }

        return $this;
    }

    /**
     * Use the BookstoreBook relation BookstoreBook object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Test\Models\BookstoreBookQuery A secondary query class using the current class as primary query
     */
    public function useBookstoreBookQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBookstoreBook($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BookstoreBook', '\Test\Models\BookstoreBookQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBookstore $bookstore Object to remove from the list of results
     *
     * @return $this|ChildBookstoreQuery The current query, for fluid interface
     */
    public function prune($bookstore = null)
    {
        if ($bookstore) {
            $this->addUsingAlias(BookstoreTableMap::COL_ID, $bookstore->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the nft__bookstores table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookstoreTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BookstoreTableMap::clearInstancePool();
            BookstoreTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BookstoreTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BookstoreTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BookstoreTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BookstoreTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BookstoreQuery
