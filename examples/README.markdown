The examples tend to be clear from how to use the SDK and as usual to run them this requires specific PHP configuration which is listed here:
###Include path has the following paths

* Path to src azure folder which has autoload.php and WindowsAzure folder
* Path to WindowsAzure which has the actual SDK code.
* Path to PEAR folder.

###Long REST calls
Some REST calls like creating storage account will take couple of minutes to finish,you need to update 
your web server to expect long operation time like that.