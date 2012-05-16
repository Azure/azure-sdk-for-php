<?php
namespace WindowsAzure\Services\ServiceBus\Models;

class SqlRuleAction
{
    private $_sqlExpression;
    private $_compatibilityLevel;

    public function getSqlExpression()
    {
        return $this->_sqlExpression;
    }

    public function setSqlExpression($sqlExpression)
    {
        $this->_sqlExpression = $sqlExpression;
    }

    public function getCompatiblityLevel()
    {
        return $this->_compatibilityLevel;
    }

    public function setCompatibilityLevel($compatibilityLevel)
    {
        $this->_compatibilityLevel = $compatibilityLevel;
    }

}
?>
