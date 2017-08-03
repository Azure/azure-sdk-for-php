1. AutoRest pipeline:
   ```
   AutoRest Model => Swagger Builder => PHP Builder => PHP Files
   ```
   Currently, PHP code generator doesn't follow these steps exactly. This task is a clean up task.
1. Special parameters:
   - [X] subscriptionId
   - [X] constants (API-VERSION, etc.)
1. Authentication
   - [+] https://docs.microsoft.com/en-us/azure/active-directory/develop/active-directory-protocols-oauth-code
     - AD tenant
   - [X] Frameworks
     - https://github.com/FriendsOfSymfony/oauth2-php
     - https://github.com/adoy/PHP-OAuth2 - LGPL
     - [X] none
1. Core library.
1. Extensions
   - long-running operations
   - flattering
   - [X] x-ms-skip-url-encoding
1. Facade:
    1. Support for strong types. PHP 7, PHP 7.1 ?
    1. AutoRest should generate interfaces and static classes instead of concrete classes.
1. Generate examples for unit testing.
1. [X] Select HTTP framework:
   - [X] guzzle - 39,404,000
   - laravel - 5,508,000
   - zend-diactoros - 4,986,000
   - Slim - 3,613,000
   - Lumen -  160,000
   - Epiphany - 911
   - Frapi - ?
1. CI
1. JSON-RPC server for testing (just a core library,
   AutoRest is not required)
1. Services:
    - Advisor: Recommendations.Get doesn't have the subscriptionId parameter
    - KeyVault 2016-10-01 has a different api_version parameter 2015-11-01
    - StorageImportExport has an explicit api_version
1. profiles and class aliases
1. Response object
   ```php
   interface HttpsResponse
   {
       function getCode();
       function getResult();
   }
   ```
1. Parameters by creation time
   1. [X] constant. for example 'api-version'
   2. [X] client initialization. 'subscriptionId'
   3. [X] call-time parameters.
1. Structure
    - overview:
      ```
      Swagger =[C#:AutoRest]=> PHP:Swagger =[PHP:RunTime]=> PHP:Operations
                            => PHP:Facade
      ```
    - C#:AutoRest:
      ```
      C#:CodeModel => C#:Swagger =[C#:JsonToPhp]========> PHP:Swagger
                                 =[C#:CodeGeneratorPhp]=> PHP:Facade
      ```
    - PHP:RunTime:
      ```
      PHP:Swagger => PHP:TypedSwagger => PHP:Operations
      ```
1. "parameters" - common parameters