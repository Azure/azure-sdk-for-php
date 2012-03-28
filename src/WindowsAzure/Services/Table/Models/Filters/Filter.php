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
    public static function applyAnd($left, $right)
    {
        $filer = new BinaryFilter();
        $filer->setOperator('and');
        $filer->setLeft($left);
        $filer->setRight($right);
        
        return $filer;
    }
    
    public static function applyNot($operand)
    {
        $filer = new UnaryFilter();
        $filer->setOperator('not');
        $filer->setOperand($operand);
        
        return $filer;
    }

    public static function applyOr($left, $right)
    {
        $filer = BinaryFilter();
        $filer->setOperator('or');
        $filer->setLeft($left);
        $filer->setRight($right);
        
        return $filer;
    }

    public static function applyEq($left, $right)
    {
        $filer = new BinaryFilter();
        $filer->setOperator('eq');
        $filer->setLeft($left);
        $filer->setRight($right);
        
        return $filer;
    }

    public static function applyNe($left, $right)
    {
        $filer = new BinaryFilter();
        $filer->setOperator('ne');
        $filer->setLeft($left);
        $filer->setRight($right);
        
        return $filer;
    }

    public static function applyGe($left, $right)
    {
        $filer = new BinaryFilter();
        $filer->setOperator('ge');
        $filer->setLeft($left);
        $filer->setRight($right);
        
        return $filer;
    }

    public static function applyGt($left, $right)
    {
        $filer = new BinaryFilter();
        $filer->setOperator('gt');
        $filer->setLeft($left);
        $filer->setRight($right);
        
        return $filer;
    }

    public static function applyLt($left, $right)
    {
        $filer = new BinaryFilter();
        $filer->setOperator('lt');
        $filer->setLeft($left);
        $filer->setRight($right);
        
        return $filer;
    }

    public static function applyLe($left, $right)
    {
        $filer = new BinaryFilter();
        $filer->setOperator('le');
        $filer->setLeft($left);
        $filer->setRight($right);
        
        return $filer;
    }

    public static function applyConstant($value) {
        $filer = new ConstantFilter();
        $filer->setValue($value);
        
        return $filer;
    }

    public static function applyLitteral($value) {
        $filer = new LitteralFilter();
        $filer->setLitteral($value);
        
        return $filer;
    }

    public static function applyRawString($value) {
        $filer = new RawStringFilter();
        $filer->setRawString($value);
        
        return $filer;
    }
}

?>
