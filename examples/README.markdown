The examples here demonstrate some of the basic functionalities of the Azure PHP SDK.

# Getting Started

* Download **[composer.phar](http://getcomposer.org/composer.phar)** to the examples directory

* Create a file named composer.json in the examples directory and add the following code to it:

  ```json
  {
      "require": {
          "microsoft/windowsazure": "^0.4"
      }
  }
  ```
  
* Open a command prompt and execute this in the examples directory

   ```
   php composer.phar install
   ```

This will download all dependencies to the vendor sub directory.

# Run the Task List example

* Open tasklist\userconfig.php, enter you Azure subscription Id and the full path to your .pem cert file.
see https://azure.microsoft.com/en-us/blog/introducing-the-windows-azure-service-management-api/ for details on certificates.

* In the example directory, run

  ```
  php -S localhost:8000
  ```

* In a browser, navigate to `http://localhost:8000/tasklist/index.php`.

# Run the Media Services examples
* Open MediaServices\userconfig.php, enter "Media Service Account Name" and "Primary Media Service access key" for your Media Service from the Azure portal.

* In the examples directory, run

  ```
  php MediaServices\%sample_name%.php
  ```

# Using Fiddler to Debug HTTP/HTTPS Requests

* Install [Fiddler](http://www.telerik.com/fiddler).

* Set the `HTTP_PROXY` and `HTTPS_PROXY` enviroment variables to `localhost:8888`. For example

  ```bat
  set HTTP_PROXY=localhost:8888
  set HTTPS_PROXY=localhost:8888
  ```

* Start your program.
