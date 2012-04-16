<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the 'License');
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an 'AS IS' BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * PHP version 5
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Table\Models\Filters
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Table\Models\Filters;

/**
 * Filter operations
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Table\Models\Filters
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class Filter
{
    /**
     * Apply and operation between two filters
     * 
     * @param Filter $left  The left filter
     * @param Filter $right The right filter
     * 
     * @return \PEAR2\WindowsAzure\Services\Table\Models\Filters\BinaryFilter 
     */
    public static function applyAnd($left, $right)
    {
        $filter = new BinaryFilter();
        $filter->setOperator('and');
        $filter->setLeft($left);
        $filter->setRight($right);
        
        return $filter;
    }
   
    /**
     * Applies not operation on $operand
     * 
     * @param Filter $operand The operand
     * 
     * @return \PEAR2\WindowsAzure\Services\Table\Models\Filters\UnaryFilter 
     */
    public static function applyNot($operand)
    {
        $filter = new UnaryFilter();
        $filter->setOperator('not');
        $filter->setOperand($operand);
        
        return $filter;
    }

    /**
     * Apply or operation on the passed filers
     * 
     * @param Filter $left  The left operand
     * @param Filter $right The right operand
     * 
     * @return BinaryFilter
     */
    public static function applyOr($left, $right)
    {
        $filter = new BinaryFilter();
        $filter->setOperator('or');
        $filter->setLeft($left);
        $filter->setRight($right);
        
        return $filter;
    }

    /**
     * Apply eq operation on the passed filers
     * 
     * @param Filter $left  The left operand
     * @param Filter $right The right operand
     * 
     * @return BinaryFilter
     */
    public static function applyEq($left, $right)
    {
        $filter = new BinaryFilter();
        $filter->setOperator('eq');
        $filter->setLeft($left);
        $filter->setRight($right);
        
        return $filter;
    }

    /**
     * Apply ne operation on the passed filers
     * 
     * @param Filter $left  The left operand
     * @param Filter $right The right operand
     * 
     * @return BinaryFilter
     */
    public static function applyNe($left, $right)
    {
        $filter = new BinaryFilter();
        $filter->setOperator('ne');
        $filter->setLeft($left);
        $filter->setRight($right);
        
        return $filter;
    }

    /**
     * Apply ge operation on the passed filers
     * 
     * @param Filter $left  The left operand
     * @param Filter $right The right operand
     * 
     * @return BinaryFilter
     */
    public static function applyGe($left, $right)
    {
        $filter = new BinaryFilter();
        $filter->setOperator('ge');
        $filter->setLeft($left);
        $filter->setRight($right);
        
        return $filter;
    }

    /**
     * Apply gt operation on the passed filers
     * 
     * @param Filter $left  The left operand
     * @param Filter $right The right operand
     * 
     * @return BinaryFilter
     */
    public static function applyGt($left, $right)
    {
        $filter = new BinaryFilter();
        $filter->setOperator('gt');
        $filter->setLeft($left);
        $filter->setRight($right);
        
        return $filter;
    }

    /**
     * Apply lt operation on the passed filers
     * 
     * @param Filter $left  The left operand
     * @param Filter $right The right operand
     * 
     * @return BinaryFilter
     */
    public static function applyLt($left, $right)
    {
        $filter = new BinaryFilter();
        $filter->setOperator('lt');
        $filter->setLeft($left);
        $filter->setRight($right);
        
        return $filter;
    }

    /**
     * Apply le operation on the passed filers
     * 
     * @param Filter $left  The left operand
     * @param Filter $right The right operand
     * 
     * @return BinaryFilter
     */
    public static function applyLe($left, $right)
    {
        $filter = new BinaryFilter();
        $filter->setOperator('le');
        $filter->setLeft($left);
        $filter->setRight($right);
        
        return $filter;
    }

    /**
     * Apply constant filter on value.
     * 
     * @param mix    $value   The filter value
     * @param string $edmType The value EDM type.
     * 
     * @return \PEAR2\WindowsAzure\Services\Table\Models\Filters\ConstantFilter 
     */
    public static function applyConstant($value, $edmType)
    {
        $filter = new ConstantFilter();
        $filter->setValue($value);
        $filter->setEdmType($edmType);
        
        return $filter;
    }

    /**
     * Apply literal filter on $value
     * 
     * @param string $value The filter value
     * 
     * @return \PEAR2\WindowsAzure\Services\Table\Models\Filters\LiteralFilter 
     */
    public static function applyLiteral($value)
    {
        $filter = new LiteralFilter();
        $filter->setLiteral($value);
        
        return $filter;
    }

    /**
     * Takes raw string filter
     * 
     * @param string $value The raw string filter expression
     * 
     * @return \PEAR2\WindowsAzure\Services\Table\Models\Filters\RawStringFilter 
     */
    public static function applyRawString($value)
    {
        $filter = new RawStringFilter();
        $filter->setRawString($value);
        
        return $filter;
    }
}

?>
