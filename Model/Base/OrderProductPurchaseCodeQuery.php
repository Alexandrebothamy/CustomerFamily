<?php

namespace CustomerFamily\Model\Base;

use \Exception;
use \PDO;
use CustomerFamily\Model\OrderProductPurchaseCode as ChildOrderProductPurchaseCode;
use CustomerFamily\Model\OrderProductPurchaseCodeQuery as ChildOrderProductPurchaseCodeeQuery;
use CustomerFamily\Model\Map\OrderProductPurchasePCodeTableMap;
use CustomerFamily\Model\Thelia\Model\OrderProduct;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'order_product_purchase_price' table.
 *
 *
 *
 * @method     ChildOrderProductPurchaseCodeQuery orderByOrderProductId($order = Criteria::ASC) Order by the order_product_id column
 * @method     ChildOrderProductPurchaseCodeQuery orderByPurchasePrice($order = Criteria::ASC) Order by the purchase_code column
 * @method     ChildOrderProductPurchaseCodeQuery orderBySaleDayEquation($order = Criteria::ASC) Order by the sale_day_equation column
 *
 * @method     ChildOrderProductPurchaseCodeQuery groupByOrderProductId() Group by the order_product_id column
 * @method     ChildOrderProductPurchaseCodeQuery groupByPurchasePrice() Group by the purchase_code column
 * @method     ChildOrderProductPurchaseCodeQuery groupBySaleDayEquation() Group by the sale_day_equation column
 *
 * @method     ChildOrderProductPurchaseCodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrderProductPurchaseCodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrderProductPurchaseCodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrderProductPurchaseCodeQuery leftJoinOrderProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderProduct relation
 * @method     ChildOrderProductPurchaseCodeQuery rightJoinOrderProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderProduct relation
 * @method     ChildOrderProductPurchaseCodeQuery innerJoinOrderProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderProduct relation
 *
 * @method     ChildOrderProductPurchaseCode findOne(ConnectionInterface $con = null) Return the first ChildOrderProductPurchaseCode matching the query
 * @method     ChildOrderProductPurchaseCode findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOrderProductPurchaseCode matching the query, or a new ChildOrderProductPurchaseCode object populated from the query conditions when no match is found
 *
 * @method     ChildOrderProductPurchaseCode findOneByOrderProductId(int $order_product_id) Return the first ChildOrderProductPurchaseCode filtered by the order_product_id column
 * @method     ChildOrderProductPurchaseCode findOneByPurchasePrice(string $purchase_price) Return the first ChildOrderProductPurchaseCode filtered by the purchase_price column
 * @method     ChildOrderProductPurchaseCode findOneBySaleDayEquation(string $sale_day_equation) Return the first ChildOrderProductPurchaseCode filtered by the sale_day_equation column
 *
 * @method     array findByOrderProductId(int $order_product_id) Return ChildOrderProductPurchasePrice objects filtered by the order_product_id column
 * @method     array findByPurchaseCode(string $purchase_code) Return ChildOrderProductPurchaseCode objects filtered by the purchase_code column
 * @method     array findBySaleDayEquation(string $sale_day_equation) Return ChildOrderProductPurchaseCode objects filtered by the sale_day_equation column
 *
 */
abstract class OrderProductPurchaseCodeQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \CustomerFamily\Model\Base\OrderProductPurchaseCodeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\CustomerFamily\\Model\\OrderProductPurchaseCode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOrderProductPurchaseCodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOrderProductPurchaseCodeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \CustomerFamily\Model\OrderProductPurchaseCodeQuery) {
            return $criteria;
        }
        $query = new \CustomerFamily\Model\OrderProductPurchaseCodeQuery();
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
     * @return ChildOrderProductPurchaseCode|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrderProductPurchaseCodeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OrderProductPurchaseCodeTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildOrderProductPurchaseCode A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ORDER_PRODUCT_ID, PURCHASE_CODE, SALE_DAY_EQUATION FROM order_product_purchase_code WHERE ORDER_PRODUCT_ID = :p0';
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
            $obj = new ChildOrderProductPurchaseCode();
            $obj->hydrate($row);
            OrderProductPurchaseCodeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildOrderProductPurchaseCode|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
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
    public function findPks($keys, $con = null)
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
     * @return ChildOrderProductPurchaseCodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrderProductPurchaseCodeTableMap::ORDER_PRODUCT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildOrderProductPurchaseCodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrderProductPurchaseCodeTableMap::ORDER_PRODUCT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the order_product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderProductId(1234); // WHERE order_product_id = 1234
     * $query->filterByOrderProductId(array(12, 34)); // WHERE order_product_id IN (12, 34)
     * $query->filterByOrderProductId(array('min' => 12)); // WHERE order_product_id > 12
     * </code>
     *
     * @see       filterByOrderProduct()
     *
     * @param     mixed $orderProductId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildOrderProductPurchaseCodeQuery The current query, for fluid interface
     */
    public function filterByOrderProductId($orderProductId = null, $comparison = null)
    {
        if (is_array($orderProductId)) {
            $useMinMax = false;
            if (isset($orderProductId['min'])) {
                $this->addUsingAlias(OrderProductPurchaseCodeableMap::ORDER_PRODUCT_ID, $orderProductId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderProductId['max'])) {
                $this->addUsingAlias(OrderProductPurchaseCodeTableMap::ORDER_PRODUCT_ID, $orderProductId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderProductPurchaseCodeTableMap::ORDER_PRODUCT_ID, $orderProductId, $comparison);
    }

    /**
     * Filter the query on the purchase_price column
     *
     * Example usage:
     * <code>
     * $query->filterByPurchasePrice(1234); // WHERE purchase_price = 1234
     * $query->filterByPurchasePrice(array(12, 34)); // WHERE purchase_price IN (12, 34)
     * $query->filterByPurchasePrice(array('min' => 12)); // WHERE purchase_price > 12
     * </code>
     *
     * @param     mixed $purchasePrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildOrderProductPurchaseCodeQuery The current query, for fluid interface
     */
    public function filterByPurchasePrice($purchaseCode = null, $comparison = null)
    {
        if (is_array($purchaseCode)) {
            $useMinMax = false;
            if (isset($purchaseCode['min'])) {
                $this->addUsingAlias(OrderProductPurchaseCodeTableMap::PURCHASE_CODE, $purchaseCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($purchaseCode['max'])) {
                $this->addUsingAlias(OrderProductPurchaseCodeTableMap::PURCHASE_CODE, $purchaseCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderProductPurchasePriceTableMap::PURCHASE_PRICE, $purchasePrice, $comparison);
    }

    /**
     * Filter the query on the sale_day_equation column
     *
     * Example usage:
     * <code>
     * $query->filterBySaleDayEquation('fooValue');   // WHERE sale_day_equation = 'fooValue'
     * $query->filterBySaleDayEquation('%fooValue%'); // WHERE sale_day_equation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $saleDayEquation The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildOrderProductPurchasePriceQuery The current query, for fluid interface
     */
    public function filterBySaleDayEquation($saleDayEquation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saleDayEquation)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $saleDayEquation)) {
                $saleDayEquation = str_replace('*', '%', $saleDayEquation);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrderProductPurchasePriceTableMap::SALE_DAY_EQUATION, $saleDayEquation, $comparison);
    }

    /**
     * Filter the query by a related \CustomerFamily\Model\Thelia\Model\OrderProduct object
     *
     * @param \CustomerFamily\Model\Thelia\Model\OrderProduct|ObjectCollection $orderProduct The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildOrderProductPurchasePriceQuery The current query, for fluid interface
     */
    public function filterByOrderProduct($orderProduct, $comparison = null)
    {
        if ($orderProduct instanceof \CustomerFamily\Model\Thelia\Model\OrderProduct) {
            return $this
                ->addUsingAlias(OrderProductPurchasePriceTableMap::ORDER_PRODUCT_ID, $orderProduct->getId(), $comparison);
        } elseif ($orderProduct instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrderProductPurchasePriceTableMap::ORDER_PRODUCT_ID, $orderProduct->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOrderProduct() only accepts arguments of type \CustomerFamily\Model\Thelia\Model\OrderProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrderProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildOrderProductPurchasePriceQuery The current query, for fluid interface
     */
    public function joinOrderProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrderProduct');

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
            $this->addJoinObject($join, 'OrderProduct');
        }

        return $this;
    }

    /**
     * Use the OrderProduct relation OrderProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CustomerFamily\Model\Thelia\Model\OrderProductQuery A secondary query class using the current class as primary query
     */
    public function useOrderProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrderProduct', '\CustomerFamily\Model\Thelia\Model\OrderProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOrderProductPurchaseCode $orderProductPurchaseCode Object to remove from the list of results
     *
     * @return ChildOrderProductPurchaseCodeQuery The current query, for fluid interface
     */
    public function prune($orderProductPurchaseCode = null)
    {
        if ($orderProductPurchaseCode) {
            $this->addUsingAlias(OrderProductPurchaseCodeTableMap::ORDER_PRODUCT_ID, $orderProductPurchasePrice->getOrderProductId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the order_product_purchase_code table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrderProductPurchaseCodeTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrderProductPurchaseCodeTableMap::clearInstancePool();
            OrderProductPurchaseCodeTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildOrderProductPurchaseCode or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildOrderProductPurchaseCode object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrderProductPurchaseCodeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OrderProductPurchaseCodeTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


            OrderProductPurchaseCodeeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OrderProductPurchaseCodeTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // OrderProductPurchaseCodeQuery
