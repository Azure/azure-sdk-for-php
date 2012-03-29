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
        $filer = new BinaryFilter();
        $filer->setOperator('and');
        $filer->setLeft($left);
        $filer->setRight($right);
        
        return $filer;
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
        $filer = new UnaryFilter();
        $filer->setOperator('not');
        $filer->setOperand($operand);
        
        return $filer;
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
        $filer = new BinaryFilter();
        $filer->setOperator('or');
        $filer->setLeft($left);
        $filer->setRight($right);
        
        return $filer;
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
        $filer = new BinaryFilter();
        $filer->setOperator('eq');
        $filer->setLeft($left);
        $filer->setRight($right);
        
        return $filer;
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
        $filer = new BinaryFilter();
        $filer->setOperator('ne');
        $filer->setLeft($left);
        $filer->setRight($right);
        
        return $filer;
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
        $filer = new BinaryFilter();
        $filer->setOperator('ge');
        $filer->setLeft($left);
        $filer->setRight($right);
        
        return $filer;
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
        $filer = new BinaryFilter();
        $filer->setOperator('gt');
        $filer->setLeft($left);
        $filer->setRight($right);
        
        return $filer;
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
        $filer = new BinaryFilter();
        $filer->setOperator('lt');
        $filer->setLeft($left);
        $filer->setRight($right);
        
        return $filer;
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
        $filer = new BinaryFilter();
        $filer->setOperator('le');
        $filer->setLeft($left);
        $filer->setRight($right);
        
        return $filer;
    }

    /**
     * Apply constant filter on value
     * 
     * @param mix $value The filter value
     * 
     * @return \PEAR2\WindowsAzure\Services\Table\Models\Filters\ConstantFilter 
     */
    public static function applyConstant($value)
    {
        $filer = new ConstantFilter();
        $filer->setValue($value);
        
        return $filer;
    }

    /**
     * Apply litteral filter on $value
     * 
     * @param string $value The filter value
     * 
     * @return \PEAR2\WindowsAzure\Services\Table\Models\Filters\LitteralFilter 
     */
    public static function applyLitteral($value)
    {
        $filer = new LitteralFilter();
        $filer->setLitteral($value);
        
        return $filer;
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
        $filer = new RawStringFilter();
        $filer->setRawString($value);
        
        return $filer;
    }
}

?>
