# How to

## 1. Set Up Development Environment

### 1.1. Install PHP (Windows)

1. Download the latest
   [PHP-5.6 for Windows, VS11 x86 Thread Safe](http://windows.php.net/download#php-5.6).
2. Unpack it to `C:\php5`.

### 1.2. Confige PHP (Windows)

1. Go to the PHP installed folder `c:\php5` look for `php.ini`. If it does not exist,
   copy `php.ini-development` as `php.ini`.
2. Open the `php.ini` file.
3. Uncomment

   ```ini
   extension=php_openssl.dll
   ```

   and

   ```ini
   extension_dir = "ext"
   ```

4. Replace

   ```ini
   memory_limit = 128M
   ```

   with

   ```ini
   memory_limit = 1280M
   ```

### 1.3. Install Composer

Download and install [Composer](https://getcomposer.org/download/).

## 2. Setting Up Azure for E2E Tests

### 2.1. Storage Account

1. Create **Classic Storage Account**.
2. Assign its **Connection String** to the `AZURE_STORAGE_CONNECTION_STRING`
   environment variable.

### 2.2. Media Service

1. Create a **Media Service**.
2. Set the `AZURE_MEDIA_SERVICES_ACCOUNT_NAME` and `AZURE_MEDIA_SERVICES_ACCESS_KEY`
   environment variables.

### 2.3. Service Bus

Create a **Service Bus** using these PowerShell commands

```PowerShell
Add-AzureAccount # this will sign you in
New-AzureSBNamespace -CreateACSNamespace $true -Name 'mytestbusname' -Location 'West US' -NamespaceType 'Messaging'
```

### 2.4. Service Management

1. Install OpenSSL. For Windows use [GnuWin32](http://gnuwin32.sourceforge.net/).
2. Create certificates

   ```
   openssl req  -config "C:\Program Files (x86)\GnuWin32\share\openssl.cnf" -x509 -nodes -days 365 -newkey rsa:1024 -keyout mycert.pem -out mycert.pem
   openssl x509 -inform pem -in mycert.pem -outform der -out mycert.cer
   ```

3. Go to [manage.windowsazure.com](https://manage.windowsazure.com) then **Settings** / **Manage Certificates**
   and upload the created certificate.

### 2.5. Debugging HTTP/HTTPS Requests (Windows)

1. Install [Fiddler 4](https://www.telerik.com/download/fiddler/fiddler4).
2. Set environment variables `HTTP_PROXY` and `HTTPS_PROXY` to `localhost:8888`.
3. Start Fiddler.

### 2.6. Running E2E Test

```
vendor\bin\phpunit.bat -c phpunit.local.xml.dist
```

## 3. Creating Test Project

1. Create a project folder
2. Run `composer init`.
3. Run `composer install microsoft/windowsazure`

## 4. Code Conventions

1.	Use PHP 5 type hints as much as possible.
   1. For class arguments: `ClassName $argument`
   2. For array arguments: `array $argument`
   3. For nullable arguments: `ClassName $argument = null`
2.	Use phpDocumentator type declarations as much as possible.
   1. Use `Type[]` instead of array.
   2. Use unions for nullable types. For example, `Class|null`.
   3. Try to avoid `mixed` type.
