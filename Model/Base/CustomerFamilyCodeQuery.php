<?php

namespace CustomerFamily\Model\Base;

use \Exception;
use \PDO;
use CustomerFamily\Model\CustomerFamilyPrice as ChildCustomerFamilyCode;
use CustomerFamily\Model\CustomerFamilyPriceQuery as ChildCustomerFamilyCodeQuery;
use CustomerFamily\Model\Map\CustomerFamilyCodeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'customer_family_code' table.
 *
 *
 *
 * @method     ChildCustomerFamilyCodeQuery orderByCustomerFamilyId($order = Criteria::ASC) Order by the customer_family_id column
 * @method     ChildCustomerFamilyCodeQuery orderByPromoCode($order = Criteria::ASC) Order by the promo_code column
 * @method     ChildCustomerFamilyCodeQuery orderByUseEquationProductSelling($order = Criteria::ASC) Order by the use_equation_product_selling column
 * @method     ChildCustomerFamilyCodeQuery orderByAmountAddedBefore($order = Criteria::ASC) Order by the amount_added_before column
 * @method     ChildCustomerFamilyCodeQuery orderByAmountAddedAfter($order = Criteria::ASC) Order by the amount_added_after column
 * @method     ChildCustomerFamilyCodeQuery orderByMultiplicationCoefficient($order = Criteria::ASC) Order by the multiplication_coefficient column
 * @method     ChildCustomerFamilyCodeQuery orderByShippingOffered($order = Criteria::ASC) Order by the shipping_offered column
 *
 * @method     ChildCustomerFamilyCodeQuery groupByCustomerFamilyId() Group by the customer_family_id column
 * @method     ChildCustomerFamilyCodeQuery groupByPromoCode() Group by the promo_code column
 * @method     ChildCustomerFamilyCodeQuery groupByUseEquationProductSelling() Group by the use_equation_product_selling column
 * @method     ChildCustomerFamilyCodeQuery groupByAmountAddedBefore() Group by the amount_added_before column
 * @method     ChildCustomerFamilyCodeQuery groupByAmountAddedAfter() Group by the amount_added_after column
 * @method     ChildCustomerFamilyCodeQuery groupByMultiplicationCoefficient() Group by the multiplication_coefficient column
 * @method     ChildCustomerFamilyCodeQuery groupByShippingOffered() Group by the shipping_offered column
 *
 * @method     ChildCustomerFamilyCodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCustomerFamilyCodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCustomerFamilyCodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCustomerFamilyCodeQuery leftJoinCustomerFamily($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerFamily relation
 * @method     ChildCustomerFamilyCodeQuery rightJoinCustomerFamily($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerFamily relation
 * @method     ChildCustomerFamilyCodeQuery innerJoinCustomerFamily($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerFamily relation
 *
 * @method     ChildCustomerFamilyCode findOne(ConnectionInterface $con = null) Return the first ChildCustomerFamilyCode matching the query
 * @method     ChildCustomerFamilyCode findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCustomerFamilyCode matching the query, or a new ChildCustomerFamilyCode object populated from the query conditions when no match is found
 *
 * @method     ChildCustomerFamilyCode findOneByCustomerFamilyId(int $customer_family_id) Return the first ChildCustomerFamilyPrice filtered by the customer_family_id column
 * @method     ChildCustomerFamilyCode findOneByPromoCode(int $promo_code) Return the first ChildCustomerFamilyCode filtered by the promo_code column
 * @method     ChildCustomerFamilyCode findOneByUseEquation(int $use_equation_product_selling) Return the first ChildCustomerFamilyCode filtered by the use_equation_product_selling column
 * @method     ChildCustomerFamilyCode findOneByAmountAddedBefore(string $amount_added_before) Return the first ChildCustomerFamilyCode filtered by the amount_added_before column
 * @method     ChildCustomerFamilyCode findOneByAmountAddedAfter(string $amount_added_after) Return the first ChildCustomerFamilyCode filtered by the amount_added_after column
 * @method     ChildCustomerFamilyCode findOneByMultiplicationCoefficient(string $multiplication_coefficient) Return the first ChildCustomerFamilyCode filtered by the multiplication_coefficient column
 * @method     ChildCustomerFamilyCode findOneByIsTaxed(int $shipping_offered) Return the first ChildCustomerFamilyCode filtered by the shipping_offered column
 *
 * @method     array findByCustomerFamilyId(int $customer_family_id) Return ChildCustomerFamilyCode objects filtered by the customer_family_id column
 * @method     array findByPromoCode(int $promo_code) Return ChildCustomerFamilyCode objects filtered by the promo_code column
 * @method     array findByUseEquationProductSelling(int $use_equation_product_selling) Return ChildCustomerFamilyCode objects filtered by the use_equation_product_selling column
 * @method     array findByAmountAddedBefore(string $amount_added_before) Return ChildCustomerFamilyCode objects filtered by the amount_added_before column
 * @method     array findByAmountAddedAfter(string $amount_added_after) Return ChildCustomerFamilyCpde objects filtered by the amount_added_after column
 * @method     array findByMultiplicationCoefficient(string $multiplication_coefficient) Return ChildCustomerFamilyCode objects filtered by the multiplication_coefficient column
 * @method     array findByIsTaxed(int $shipping_offered) Return ChildCustomerFamilyCode objects filtered by the shipping_offered column
 *
 */
abstract class CustomerFamilyCodeQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \CustomerFamily\Model\Base\CustomerFamilyCodeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\CustomerFamily\\Model\\CustomerFamilyCode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCustomerFamilyCodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCustomerFamilyCodeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \CustomerFamily\Model\CustomerFamilyCodeQuery) {
            return $criteria;
        }
        $query = new \CustomerFamily\Model\CustomerFamilyCodeQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$customer_family_id, $promo_code] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCustomerFamilyPrice|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CustomerFamilyCodeTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CustomerFamilyCodeTableMap::DATABASE_NAME);
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
     * @return   ChildCustomerFamilyCode A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT CUSTOMER_FAMILY_ID, PROMO_CODE, USE_EQUATION_PRODUCT_SELLING, AMOUNT_ADDED_BEFORE, AMOUNT_ADDED_AFTER, MULTIPLICATION_COEFFICIENT, SHIPPING_OFFERED FROM customer_family_code WHERE CUSTOMER_FAMILY_ID = :p0 AND PROMO_CODE = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            $obj = new ChildCustomerFamilyPrice();
            $obj->hydrate($row);
            CustomerFamilyPriceTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildCustomerFamilyPrice|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return ChildCustomerFamilyCodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CustomerFamilyCodeTableMap::CUSTOMER_FAMILY_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CustomerFamilyCodeTableMap::PROMO_CODE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildCustomerFamilyCodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CustomerFamilyCodeTableMap::CUSTOMER_FAMILY_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CustomerFamilyCodeTableMap::PROMO_CODE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the customer_family_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerFamilyId(1234); // WHERE customer_family_id = 1234
     * $query->filterByCustomerFamilyId(array(12, 34)); // WHERE customer_family_id IN (12, 34)
     * $query->filterByCustomerFamilyId(array('min' => 12)); // WHERE customer_family_id > 12
     * </code>
     *
     * @see       filterByCustomerFamily()
     *
     * @param     mixed $customerFamilyId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyPriceQuery The current query, for fluid interface
     */
    public function filterByCustomerFamilyId($customerFamilyId = null, $comparison = null)
    {
        if (is_array($customerFamilyId)) {
            $useMinMax = false;
            if (isset($customerFamilyId['min'])) {
                $this->addUsingAlias(CustomerFamilyCodeTableMap::CUSTOMER_FAMILY_ID, $customerFamilyId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerFamilyId['max'])) {
                $this->addUsingAlias(CustomerFamilyCodeTableMap::CUSTOMER_FAMILY_ID, $customerFamilyId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerFamilyCodeTableMap::CUSTOMER_FAMILY_ID, $customerFamilyId, $comparison);
    }

    /**
     * Filter the query on the promo column
     *
     * Example usage:
     * <code>
     * $query->filterByPromo(1234); // WHERE promo = 1234
     * $query->filterByPromo(array(12, 34)); // WHERE promo IN (12, 34)
     * $query->filterByPromo(array('min' => 12)); // WHERE promo > 12
     * </code>
     *
     * @param     mixed $promo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyCodeQuery The current query, for fluid interface
     */
    public function filterByPromo($promo = null, $comparison = null)
    {
        if (is_array($promoCode)) {
            $useMinMax = false;
            if (isset($promo['min'])) {
                $this->addUsingAlias(CustomerFamilyCodeTableMap::PROMO_CODE, $promoCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($promoCode['max'])) {
                $this->addUsingAlias(CustomerFamilyCodeTableMap::PROMO_CODE, $promoCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerFamilyCodeTableMap::PROMO_CODE, $promoCode, $comparison);
    }

    /**
     * Filter the query on the use_equation_product_selling column
     *
     * Example usage:
     * <code>
     * $query->filterByUseEquationProductSelling(1234); // WHERE use_equation_product_selling = 1234
     * $query->filterByUseEquationProductSelling(array(12, 34)); // WHERE use_equation_product_selling IN (12, 34)
     * $query->filterByUseEquationProductSelling(array('min' => 12)); // WHERE use_equation_product_selling > 12
     * </code>
     *
     * @param     mixed $useEquationProductSelling The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyCodeQuery The current query, for fluid interface
     */
    public function filterByUseEquationProductSelling($useEquationProductSelling = null, $comparison = null)
    {
        if (is_array($useEquationProductSelling)) {
            $useMinMax = false;
            if (isset($useEquationProductSelling['min'])) {
                $this->addUsingAlias(CustomerFamilyCodeTableMap::USE_EQUATION_PRODUCT_SELLING, $useEquationProductSelling['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($useEquationProductSelling['max'])) {
                $this->addUsingAlias(CustomerFamilyCodeTableMap::USE_EQUATION_PRODUCT_SELLING, $useEquationProductSelling['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerFamilyCodeTableMap::USE_EQUATION_PRODUCT_SELLING, $useEquationProductSelling, $comparison);
    }

    /**
     * Filter the query on the amount_added_before column
     *
     * Example usage:
     * <code>
     * $query->filterByAmountAddedBefore(1234); // WHERE amount_added_before = 1234
     * $query->filterByAmountAddedBefore(array(12, 34)); // WHERE amount_added_before IN (12, 34)
     * $query->filterByAmountAddedBefore(array('min' => 12)); // WHERE amount_added_before > 12
     * </code>
     *
     * @param     mixed $amountAddedBefore The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyCodeQuery The current query, for fluid interface
     */
    public function filterByAmountAddedBefore($amountAddedBefore = null, $comparison = null)
    {
        if (is_array($amountAddedBefore)) {
            $useMinMax = false;
            if (isset($amountAddedBefore['min'])) {
                $this->addUsingAlias(CustomerFamilyCodeTableMap::AMOUNT_ADDED_BEFORE, $amountAddedBefore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amountAddedBefore['max'])) {
                $this->addUsingAlias(CustomerFamilyCodeTableMap::AMOUNT_ADDED_BEFORE, $amountAddedBefore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerFamilyCodeTableMap::AMOUNT_ADDED_BEFORE, $amountAddedBefore, $comparison);
    }

    /**
     * Filter the query on the amount_added_after column
     *
     * Example usage:
     * <code>
     * $query->filterByAmountAddedAfter(1234); // WHERE amount_added_after = 1234
     * $query->filterByAmountAddedAfter(array(12, 34)); // WHERE amount_added_after IN (12, 34)
     * $query->filterByAmountAddedAfter(array('min' => 12)); // WHERE amount_added_after > 12
     * </code>
     *
     * @param     mixed $amountAddedAfter The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyPriceQuery The current query, for fluid interface
     */
    public function filterByAmountAddedAfter($amountAddedAfter = null, $comparison = null)
    {
        if (is_array($amountAddedAfter)) {
            $useMinMax = false;
            if (isset($amountAddedAfter['min'])) {
                $this->addUsingAlias(CustomerFamilyCodeTableMap::AMOUNT_ADDED_AFTER, $amountAddedAfter['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amountAddedAfter['max'])) {
                $this->addUsingAlias(CustomerFamilyCodeTableMap::AMOUNT_ADDED_AFTER, $amountAddedAfter['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerFamilyCodeTableMap::AMOUNT_ADDED_AFTER, $amountAddedAfter, $comparison);
    }

    /**
     * Filter the query on the multiplication_coefficient column
     *
     * Example usage:
     * <code>
     * $query->filterByMultiplicationCoefficient(1234); // WHERE multiplication_coefficient = 1234
     * $query->filterByMultiplicationCoefficient(array(12, 34)); // WHERE multiplication_coefficient IN (12, 34)
     * $query->filterByMultiplicationCoefficient(array('min' => 12)); // WHERE multiplication_coefficient > 12
     * </code>
     *
     * @param     mixed $multiplicationCoefficient The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyCodeQuery The current query, for fluid interface
     */
    public function filterByMultiplicationCoefficient($multiplicationCoefficient = null, $comparison = null)
    {
        if (is_array($multiplicationCoefficient)) {
            $useMinMax = false;
            if (isset($multiplicationCoefficient['min'])) {
                $this->addUsingAlias(CustomerFamilyCodeTableMap::MULTIPLICATION_COEFFICIENT, $multiplicationCoefficient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($multiplicationCoefficient['max'])) {
                $this->addUsingAlias(CustomerFamilyCodeTableMap::MULTIPLICATION_COEFFICIENT, $multiplicationCoefficient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustomerFamilyCodeTableMap::MULTIPLICATION_COEFFICIENT, $multiplicationCoefficient, $comparison);
    }


    /**
     * Filter the query by a related \CustomerFamily\Model\CustomerFamily object
     *
     * @param \CustomerFamily\Model\CustomerFamily|ObjectCollection $customerFamily The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCustomerFamilyCodeQuery The current query, for fluid interface
     */
    public function filterByCustomerFamily($customerFamily, $comparison = null)
    {
        if ($customerFamily instanceof \CustomerFamily\Model\CustomerFamily) {
            return $this
                ->addUsingAlias(CustomerFamilyCodeTableMap::CUSTOMER_FAMILY_ID, $customerFamily->getId(), $comparison);
        } elseif ($customerFamily instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CustomerFamilyCodeTableMap::CUSTOMER_FAMILY_ID, $customerFamily->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCustomerFamily() only accepts arguments of type \CustomerFamily\Model\CustomerFamily or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerFamily relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCustomerFamilyCodeQuery The current query, for fluid interface
     */
    public function joinCustomerFamily($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerFamily');

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
            $this->addJoinObject($join, 'CustomerFamily');
        }

        return $this;
    }

    /**
     * Use the CustomerFamily relation CustomerFamily object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CustomerFamily\Model\CustomerFamilyQuery A secondary query class using the current class as primary query
     */
    public function useCustomerFamilyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomerFamily($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerFamily', '\CustomerFamily\Model\CustomerFamilyQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCustomerFamilyCode $customerFamilyCode Object to remove from the list of results
     *
     * @return ChildCustomerFamilyCodeQuery The current query, for fluid interface
     */
    public function prune($customerFamilyCode = null)
    {
        if ($customerFamilyCode) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CustomerFamilyCodeTableMap::CUSTOMER_FAMILY_ID), $customerFamilyCode->getCustomerFamilyId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CustomerFamilyCodeTableMap::PROMO_CODE), $customerFamilyCode->getPromoCode(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the customer_family_price table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustomerFamilyCodeTableMap::DATABASE_NAME);
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
            CustomerFamilyCodeTableMap::clearInstancePool();
            CustomerFamilyCodeTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildCustomerFamilyPrice or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildCustomerFamilyPrice object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CustomerFamilyCodeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CustomerFamilyCodeTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


            CustomerFamilyCodeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CustomerFamilyCodeTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // CustomerFamilyCodeQuery
