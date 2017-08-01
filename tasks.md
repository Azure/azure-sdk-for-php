1. AutoRest pipeline:
   ```
   AutoRest Model => Swagger Builder => PHP Builder => PHP Files
   ```
   Currently, PHP code generator doesn't follow these steps exactly. This task is a clean up task.
1. Special parameters:
   - subscriptionId
   - const
1. Authentication
1. Core library.
1. Extensions
   - long-running operations
   - flattering
1. Facade:
    1. Support for strong types. PHP 7, PHP 7.1 ?
    1. AutoRest should generate interfaces and static classes instead of concrete classes.
1. Generate examples for unit testing.
1. Select HTTP framework:
   - guzzle - 39,404,000
   - laravel - 5,508,000   
   - zend-diactoros - 4,986,000   
   - Slim - 3,613,000
   - Lumen -  160,000
   - Epiphany - 911
   - Frapi - ?
