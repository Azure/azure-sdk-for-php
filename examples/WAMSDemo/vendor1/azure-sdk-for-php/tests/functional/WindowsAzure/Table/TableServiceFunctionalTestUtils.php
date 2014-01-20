<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * PHP version 5
 *
 * @category  Microsoft
 * @package   Tests\Functional\WindowsAzure\Table
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Table;

use Tests\Functional\WindowsAzure\Table\Enums\MutatePivot;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Table\Models\EdmType;
use WindowsAzure\Table\Models\Entity;
use WindowsAzure\Table\Models\Property;
use WindowsAzure\Table\Models\Filters\BinaryFilter;
use WindowsAzure\Table\Models\Filters\ConstantFilter;
use WindowsAzure\Table\Models\Filters\Filter;
use WindowsAzure\Table\Models\Filters\PropertyNameFilter;
use WindowsAzure\Table\Models\Filters\QueryStringFilter;
use WindowsAzure\Table\Models\Filters\UnaryFilter;

class TableServiceFunctionalTestUtils
{
    static function isEqNotInTopLevel($filter)
    {
        return self::isEqNotInTopLevelWorker($filter, 0);
    }

    private static function isEqNotInTopLevelWorker($filter, $depth)
    {
        if (is_null($filter)) {
            return false;
        } else if ($filter instanceof UnaryFilter) {
            return self::isEqNotInTopLevelWorker($filter->getOperand(), $depth + 1);
        } else if ($filter instanceof BinaryFilter) {
            $binaryFilter = $filter;
            if ($binaryFilter->getOperator() == ('eq') && $depth != 0) {
                return true;
            }

            $left = self::isEqNotInTopLevelWorker($binaryFilter->getLeft(), $depth + 1);
            $right = self::isEqNotInTopLevelWorker($binaryFilter->getRight(), $depth + 1);
            return $left || $right;
        } else {
            return false;
        }
    }

    static function cloneRemoveEqNotInTopLevel($filter)
    {
        return self::cloneRemoveEqNotInTopLevelWorker($filter, 0);
    }

    private static function cloneRemoveEqNotInTopLevelWorker($filter, $depth)
    {
        if ($filter instanceof PropertyNameFilter) {
            $ret = new PropertyNameFilter($filter->getPropertyName());
            return $ret;
        } else if ($filter instanceof ConstantFilter) {
            $ret = new ConstantFilter($filter->getEdmType(), $filter->getValue());
            return $ret;
        } else if ($filter instanceof UnaryFilter) {
            $operand = self::cloneRemoveEqNotInTopLevelWorker($filter->getOperand(), $depth + 1);
            $ret = new UnaryFilter($filter->getOperator(), $operand);
            return $ret;
        } else if ($filter instanceof BinaryFilter) {
            if ($filter->getOperator() == ('eq') && $depth != 0) {
                return Filter::applyConstant(false);
            }
            $left = self::cloneRemoveEqNotInTopLevelWorker($filter->getLeft(), $depth + 1);
            $right = self::cloneRemoveEqNotInTopLevelWorker($filter->getRight(), $depth + 1);
            $ret = new BinaryFilter($left, $filter->getOperator(), $right);
            return $ret;
        } else if ($filter instanceof QueryStringFilter) {
            $ret = new QueryStringFilter($filter->getQueryString());
            return $ret;
        } else {
            var_dump($filter);
            throw new \Exception();
        }
    }

    public static function filterList($filter, $input)
    {
        $output = array();
        foreach($input as $i)  {
            if (self::filterInterperter($filter, $i)) {
                array_push($output, $i);
            }
        }
        return $output;
    }

    public static function filterEntityList($filter, $input)
    {
        $output = array();
        foreach($input as $i)  {
            $result = self::filterInterperter($filter, $i);
            if (!is_null($result) && $result) {
                array_push($output, $i);
            }
        }
        return $output;
    }

    static function cloneEntity($initialEnt)
    {
        $ret = new Entity();
        $initialProps = $initialEnt->getProperties();
        $retProps = array();
        foreach($initialProps as $propName => $initialProp)  {
            // Don't mess with the timestamp.
            if ($propName == ('Timestamp')) {
                continue;
            }

            $retProp = new Property();
            $retProp->setEdmType($initialProp->getEdmType());
            $retProp->setValue($initialProp->getValue());
            $retProps[$propName] = $retProp;
        }
        $ret->setProperties($retProps);
        $ret->setETag($initialEnt->getETag());
        return $ret;
    }

    static function mutateEntity($ent, $pivot)
    {
        if ($pivot == MutatePivot::CHANGE_VALUES) {
            self::mutateEntityChangeValues($ent);
        } else if ($pivot == MutatePivot::ADD_PROPERTY) {
            $ent->addProperty('BOOLEAN' . TableServiceFunctionalTestData::getNewKey(), EdmType::BOOLEAN, true);
            $ent->addProperty('DATETIME' . TableServiceFunctionalTestData::getNewKey(), EdmType::DATETIME, Utilities::convertToDateTime('2012-01-26T18:26:19.0000473Z'));
            $ent->addProperty('DOUBLE' . TableServiceFunctionalTestData::getNewKey(), EdmType::DOUBLE, 12345678901);
            $ent->addProperty('GUID' . TableServiceFunctionalTestData::getNewKey(), EdmType::GUID, '90ab64d6-d3f8-49ec-b837-b8b5b6367b74');
            $ent->addProperty('INT32' . TableServiceFunctionalTestData::getNewKey(), EdmType::INT32, 23);
            $ent->addProperty('INT64' . TableServiceFunctionalTestData::getNewKey(), EdmType::INT64, '-1');
            $ent->addProperty('STRING' . TableServiceFunctionalTestData::getNewKey(), EdmType::STRING, 'this is a test!');
        } else if ($pivot == MutatePivot::REMOVE_PROPERTY) {
            $propToRemove = null;
            foreach($ent->getProperties() as $propName => $propValue)  {
                // Don't mess with the keys.
                if ($propName == ('PartitionKey') || $propName == ('RowKey') || $propName == ('Timestamp')) {
                    continue;
                }
                $propToRemove = $propName;
                break;
            }

            $props = $ent->getProperties();
            unset($props[$propToRemove]);
        } else if ($pivot == MutatePivot::NULL_PROPERTY) {
            foreach($ent->getProperties() as $propName => $propValue)  {
                // Don't mess with the keys.
                if ($propName == ('PartitionKey') || $propName == ('RowKey') || $propName == ('Timestamp')) {
                    continue;
                }
                $propValue->setValue(null);
            }
        }
    }

    private static function mutateEntityChangeValues($ent)
    {
        foreach($ent->getProperties() as $propName => $initialProp)  {
            // Don't mess with the keys.
            if ($propName == ('PartitionKey') || $propName == ('RowKey') || $propName == ('Timestamp')) {
                continue;
            }

            $ptype = $initialProp->getEdmType();
            if (is_null($ptype)) {
                $eff = $initialProp->getValue();
                $initialProp->setValue($eff . 'AndMore');
            } else if ($ptype == (EdmType::DATETIME)) {
                $value = $initialProp->getValue();
                if (is_null($value)) {
                    $value = new \DateTime("1/26/1692");
                }
                $value->modify('+1 day');
                $initialProp->setValue($value);
            } else if ($ptype == (EdmType::BINARY)) {
                $eff = $initialProp->getValue();
                $initialProp->setValue($eff . 'x');
            } else if ($ptype == (EdmType::BOOLEAN)) {
                $eff = $initialProp->getValue();
                $initialProp->setValue(!$eff);
            } else if ($ptype == (EdmType::DOUBLE)) {
                $eff = $initialProp->getValue();
                $initialProp->setValue($eff + 1);
            } else if ($ptype == (EdmType::GUID)) {
                $initialProp->setValue(Utilities::getGuid());
            } else if ($ptype == (EdmType::INT32)) {
                $eff = $initialProp->getValue();
                $eff = ($eff > 10 ? 0 : $eff + 1);
                $initialProp->setValue($eff);
            } else if ($ptype == (EdmType::INT64)) {
                $eff = $initialProp->getValue();
                $eff = ($eff > 10 ? 0 : $eff + 1);
                $initialProp->setValue(strval($eff));
            } else if ($ptype == (EdmType::STRING)) {
                $eff = $initialProp->getValue();
                $initialProp->setValue($eff . 'AndMore');
            }
        }
    }

    public static function filterToString($filter, $pad = '  ')
    {
        if (is_null($filter)) {
            return $pad . 'filter <null>' . "\n";
        } else if ($filter instanceof PropertyNameFilter) {
            return $pad . 'entity.' . $filter->getPropertyName() . "\n";
        } else if ($filter instanceof ConstantFilter) {
           $ret = $pad;
           if (is_null($filter->getValue())) {
               $ret .= 'constant <null>';
           } else if (is_bool ($filter->getValue())) {
               $ret .= ($filter->getValue() ? 'true' : 'false');
           }  else {
               $ret .=  '\'' . FunctionalTestBase::tmptostring($filter->getValue()) . '\'';
           }
           return $ret . "\n";
        } else if ($filter instanceof UnaryFilter) {
            $ret = $pad . $filter->getOperator() . "\n";
            $ret .= self::filterToString($filter->getOperand(), $pad . '  ');
            return $ret;
        } else if ($filter instanceof BinaryFilter) {
            $ret = self::filterToString($filter->getLeft(), $pad . '  ');
            $ret .= $pad . $filter->getOperator() . "\n";
            $ret .= self::filterToString($filter->getRight(), $pad . '  ');
            return $ret;
        }
    }

    private static function filterInterperter($filter, $obj)
    {
        if (is_null($filter)) {
            return true;
        } else if (is_null($obj)) {
            return false;
        } else if ($filter instanceof PropertyNameFilter) {
            $name = $filter->getPropertyName();
            $value = ($obj instanceof Entity ? $obj->getPropertyValue($name) : $obj->{$name});
            return $value;
        } else if ($filter instanceof ConstantFilter) {
            $value = $filter->getValue();
            return $value;
        } else if ($filter instanceof UnaryFilter) {
            $ret = null;
            if ($filter->getOperator() == ('not')) {
                $op = self::filterInterperter($filter->getOperand(), $obj);
                if (is_null($op)) {
                    // http://msdn.microsoft/com/en-us/library/ms191504.aspx
                    $ret = true;
                } else {
                    $ret = !$op;
                }

                return $ret;
            }
        } else if ($filter instanceof BinaryFilter) {
            $left = self::filterInterperter($filter->getLeft(), $obj);
            $right = self::filterInterperter($filter->getRight(), $obj);

            $ret = null;
            if ($filter->getOperator() == ('and')) {
                $ret = self::nullPropAnd($left, $right);
            } else if ($filter->getOperator() == ('or')) {
                $ret = self::nullPropOr($left, $right);
            } else if ($filter->getOperator() == ('eq')) {
                $ret = self::nullPropEq($left, $right);
            } else if ($filter->getOperator() == ('ne')) {
                $ret = self::nullPropNe($left, $right);
            } else if ($filter->getOperator() == ('ge')) {
                $ret = self::nullPropGe($left, $right);
            } else if ($filter->getOperator() == ('gt')) {
                $ret = self::nullPropGt($left, $right);
            } else if ($filter->getOperator() == ('lt')) {
                $ret = self::nullPropLt($left, $right);
            } else if ($filter->getOperator() == ('le')) {
                $ret = self::nullPropLe($left, $right);
            }

            return $ret;
        }

        var_dump(array($filter, $obj));
        throw new \Exception();
    }

    private static function nullPropAnd($left, $right)
    {
        // http://msdn.microsoft.com/en-us/library/ms191504.aspx
        if (is_null($left) && is_null($right)) {
            return null;
        } else if (is_null($left)) {
            return ($right ? null : false);
        } else if (is_null($right)) {
            return ($left ? null : false);
        } else {
            return $left && $right;
        }
    }

    private static function nullPropOr($left, $right)
    {
        // http://msdn.microsoft.com/en-us/library/ms191504.aspx
        if (is_null($left) && is_null($right)) {
            return null;
        } else if (is_null($left)) {
            return ($right ? true : null);
        } else if (is_null($right)) {
            return ($left ? true : null);
        } else {
            return $left || $right;
        }
    }

    private static function nullPropEq($left, $right)
    {
        if (is_null($left) || is_null($right)) {
            return null;
        } else if (is_string($left) || is_string($right)) {
            return ('' . $left) == ('' . $right);
        }
        return $left == $right;
    }

    private static function nullPropNe($left, $right)
    {
        if (is_null($left) || is_null($right)) {
            return null;
        } else if (is_string($left) || is_string($right)) {
            return ('' . $left) != ('' . $right);
        }
        return $left != $right;
    }

    private static function nullPropGt($left, $right)
    {
        if (is_null($left) || is_null($right)) {
            return null;
        } else if (is_string($left) || is_string($right)) {
            return ('' . $left) > ('' . $right);
        }
        return $left > $right;
    }

    private static function nullPropGe($left, $right)
    {
        if (is_null($left) || is_null($right)) {
            return null;
        } else if (is_string($left) || is_string($right)) {
            return ('' . $left) >= ('' . $right);
        }
        return $left >= $right;
    }

    private static function nullPropLt($left, $right)
    {
        if (is_null($left) || is_null($right)) {
            return null;
        } else if (is_string($left) || is_string($right)) {
            return ('' . $left) < ('' . $right);
        }
        return $left < $right;
    }

    private static function nullPropLe($left, $right)
    {
        if (is_null($left) || is_null($right)) {
            return null;
        } else if (is_string($left) || is_string($right)) {
            return ('' . $left) <= ('' . $right);
        }
        return $left <= $right;
    }

    public static function showEntityListDiff($actualData, $expectedData)
    {
        $ret = '';
        if (count($expectedData) != count($actualData)) {
            $ret .= 'VVV actual VVV' . "\n";
            for ($i = 0; $i < count($actualData); $i++) {
                $e = $actualData[$i];
                $ret .= $e->getPartitionKey() . '/' . $e->getRowKey() . "\n";
            }
            $ret .= '-----------------' . "\n";

            for ($i = 0; $i < count($expectedData); $i++) {
                $e = $expectedData[$i];
                $ret .= $e->getPartitionKey() . '/' . $e->getRowKey() . "\n";
            }
            $ret .= '^^^ expected ^^^' . "\n";

            for ($i = 0; $i < count($actualData); $i++) {
                $in = false;
                $ei = $actualData[$i];
                for ($j = 0; $j < count($expectedData); $j++) {
                    $ej = $expectedData[$j];
                    if ($ei->getPartitionKey() == $ej->getPartitionKey() && $ei->getRowKey() == $ej->getRowKey()) {
                        $in = true;
                    }
                }
                if (!$in) {
                    $ret .= 'returned ' . $this->tmptostring($ei). "\n";
                }
            }

            for ($j = 0; $j < count($expectedData); $j++) {
                $in = false;
                $ej = $expectedData[$j];
                for ($i = 0; $i < count($actualData); $i++) {
                    $ei = $actualData[$i];
                    if ($ei->getPartitionKey() == $ej->getPartitionKey() && $ei->getRowKey() == $ej->getRowKey()) {
                        $in = true;
                    }
                }
                if (!$in) {
                    $ret .= 'expected ' . $this->tmptostring($ej). "\n";
                }
            }
        }
    return $ret;
    }
}


