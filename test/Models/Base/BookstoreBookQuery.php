<?php

namespace Test\Models\Base;

use \Exception;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Test\Models\BookstoreBook as ChildBookstoreBook;
use Test\Models\BookstoreBookQuery as ChildBookstoreBookQuery;
use Test\Models\Map\BookstoreBookTableMap;

/**
 * Base class that represents a query for the 'nft__bookstore_books_mm' table.
 *
 *
 *
 * @method     ChildBookstoreBookQuery orderByBookstoreId($order = Criteria::ASC) Order by the bookstore_id column
 * @method     ChildBookstoreBookQuery orderByBookId($order = Criteria::ASC) Order by the book_id column
 *
 * @method     ChildBookstoreBookQuery groupByBookstoreId() Group by the bookstore_id column
 * @method     ChildBookstoreBookQuery groupByBookId() Group by the book_id column
 *
 * @method     ChildBookstoreBookQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBookstoreBookQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBookstoreBookQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBookstoreBookQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBookstoreBookQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBookstoreBookQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBookstoreBookQuery leftJoinBookstore($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bookstore relation
 * @method     ChildBookstoreBookQuery rightJoinBookstore($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bookstore relation
 * @method     ChildBookstoreBookQuery innerJoinBookstore($relationAlias = null) Adds a INNER JOIN clause to the query using the Bookstore relation
 *
 * @method     ChildBookstoreBookQuery joinWithBookstore($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Bookstore relation
 *
 * @method     ChildBookstoreBookQuery leftJoinWithBookstore() Adds a LEFT JOIN clause and with to the query using the Bookstore relation
 * @method     ChildBookstoreBookQuery rightJoinWithBookstore() Adds a RIGHT JOIN clause and with to the query using the Bookstore relation
 * @method     ChildBookstoreBookQuery innerJoinWithBookstore() Adds a INNER JOIN clause and with to the query using the Bookstore relation
 *
 * @method     ChildBookstoreBookQuery leftJoinBook($relationAlias = null) Adds a LEFT JOIN clause to the query using the Book relation
 * @method     ChildBookstoreBookQuery rightJoinBook($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Book relation
 * @method     ChildBookstoreBookQuery innerJoinBook($relationAlias = null) Adds a INNER JOIN clause to the query using the Book relation
 *
 * @method     ChildBookstoreBookQuery joinWithBook($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Book relation
 *
 * @method     ChildBookstoreBookQuery leftJoinWithBook() Adds a LEFT JOIN clause and with to the query using the Book relation
 * @method     ChildBookstoreBookQuery rightJoinWithBook() Adds a RIGHT JOIN clause and with to the query using the Book relation
 * @method     ChildBookstoreBookQuery innerJoinWithBook() Adds a INNER JOIN clause and with to the query using the Book relation
 *
 * @method     \Test\Models\BookstoreQuery|\Test\Models\BookQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildBookstoreBook findOne(ConnectionInterface $con = null) Return the first ChildBookstoreBook matching the query
 * @method     ChildBookstoreBook findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBookstoreBook matching the query, or a new ChildBookstoreBook object populated from the query conditions when no match is found
 *
 * @method     ChildBookstoreBook findOneByBookstoreId(int $bookstore_id) Return the first ChildBookstoreBook filtered by the bookstore_id column
 * @method     ChildBookstoreBook findOneByBookId(int $book_id) Return the first ChildBookstoreBook filtered by the book_id column *

 * @method     ChildBookstoreBook requirePk($key, ConnectionInterface $con = null) Return the ChildBookstoreBook by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookstoreBook requireOne(ConnectionInterface $con = null) Return the first ChildBookstoreBook matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBookstoreBook requireOneByBookstoreId(int $bookstore_id) Return the first ChildBookstoreBook filtered by the bookstore_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookstoreBook requireOneByBookId(int $book_id) Return the first ChildBookstoreBook filtered by the book_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBookstoreBook[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBookstoreBook objects based on current ModelCriteria
 * @method     ChildBookstoreBook[]|ObjectCollection findByBookstoreId(int $bookstore_id) Return ChildBookstoreBook objects filtered by the bookstore_id column
 * @method     ChildBookstoreBook[]|ObjectCollection findByBookId(int $book_id) Return ChildBookstoreBook objects filtered by the book_id column
 * @method     ChildBookstoreBook[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BookstoreBookQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Test\Models\Base\BookstoreBookQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'nf_test', $modelName = '\\Test\\Models\\BookstoreBook', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBookstoreBookQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBookstoreBookQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBookstoreBookQuery) {
            return $criteria;
        }
        $query = new ChildBookstoreBookQuery();
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
     * @return ChildBookstoreBook|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The BookstoreBook object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The BookstoreBook object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildBookstoreBookQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The BookstoreBook object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBookstoreBookQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The BookstoreBook object has no primary key');
    }

    /**
     * Filter the query on the bookstore_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBookstoreId(1234); // WHERE bookstore_id = 1234
     * $query->filterByBookstoreId(array(12, 34)); // WHERE bookstore_id IN (12, 34)
     * $query->filterByBookstoreId(array('min' => 12)); // WHERE bookstore_id > 12
     * </code>
     *
     * @see       filterByBookstore()
     *
     * @param     mixed $bookstoreId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookstoreBookQuery The current query, for fluid interface
     */
    public function filterByBookstoreId($bookstoreId = null, $comparison = null)
    {
        if (is_array($bookstoreId)) {
            $useMinMax = false;
            if (isset($bookstoreId['min'])) {
                $this->addUsingAlias(BookstoreBookTableMap::COL_BOOKSTORE_ID, $bookstoreId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bookstoreId['max'])) {
                $this->addUsingAlias(BookstoreBookTableMap::COL_BOOKSTORE_ID, $bookstoreId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookstoreBookTableMap::COL_BOOKSTORE_ID, $bookstoreId, $comparison);
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
     * @return $this|ChildBookstoreBookQuery The current query, for fluid interface
     */
    public function filterByBookId($bookId = null, $comparison = null)
    {
        if (is_array($bookId)) {
            $useMinMax = false;
            if (isset($bookId['min'])) {
                $this->addUsingAlias(BookstoreBookTableMap::COL_BOOK_ID, $bookId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bookId['max'])) {
                $this->addUsingAlias(BookstoreBookTableMap::COL_BOOK_ID, $bookId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookstoreBookTableMap::COL_BOOK_ID, $bookId, $comparison);
    }

    /**
     * Filter the query by a related \Test\Models\Bookstore object
     *
     * @param \Test\Models\Bookstore|ObjectCollection $bookstore The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildBookstoreBookQuery The current query, for fluid interface
     */
    public function filterByBookstore($bookstore, $comparison = null)
    {
        if ($bookstore instanceof \Test\Models\Bookstore) {
            return $this
                ->addUsingAlias(BookstoreBookTableMap::COL_BOOKSTORE_ID, $bookstore->getId(), $comparison);
        } elseif ($bookstore instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BookstoreBookTableMap::COL_BOOKSTORE_ID, $bookstore->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByBookstore() only accepts arguments of type \Test\Models\Bookstore or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bookstore relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBookstoreBookQuery The current query, for fluid interface
     */
    public function joinBookstore($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bookstore');

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
            $this->addJoinObject($join, 'Bookstore');
        }

        return $this;
    }

    /**
     * Use the Bookstore relation Bookstore object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Test\Models\BookstoreQuery A secondary query class using the current class as primary query
     */
    public function useBookstoreQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBookstore($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bookstore', '\Test\Models\BookstoreQuery');
    }

    /**
     * Filter the query by a related \Test\Models\Book object
     *
     * @param \Test\Models\Book|ObjectCollection $book The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildBookstoreBookQuery The current query, for fluid interface
     */
    public function filterByBook($book, $comparison = null)
    {
        if ($book instanceof \Test\Models\Book) {
            return $this
                ->addUsingAlias(BookstoreBookTableMap::COL_BOOK_ID, $book->getId(), $comparison);
        } elseif ($book instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BookstoreBookTableMap::COL_BOOK_ID, $book->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildBookstoreBookQuery The current query, for fluid interface
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
     * @param   ChildBookstoreBook $bookstoreBook Object to remove from the list of results
     *
     * @return $this|ChildBookstoreBookQuery The current query, for fluid interface
     */
    public function prune($bookstoreBook = null)
    {
        if ($bookstoreBook) {
            throw new LogicException('BookstoreBook object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the nft__bookstore_books_mm table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookstoreBookTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BookstoreBookTableMap::clearInstancePool();
            BookstoreBookTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BookstoreBookTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BookstoreBookTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BookstoreBookTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BookstoreBookTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BookstoreBookQuery
