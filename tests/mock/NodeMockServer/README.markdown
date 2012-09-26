The mock server is a Node.JS application that acts as a proxy for HTTPS traffic. It can run in three modes:
* *neutral*: acts as a passive proxy.
* *recording*: acts as a passive proxy, but also records the traffic for later playback.
* *playback*: appears as a proxy, but no network traffic is allowed through; the responses are constructed from the recordings from previous sessions.

This mock is intended to be used for the Service Management tests. As such, you need to provide subscription 
id along with certificate which is authorized to access the associated subscription. For more 
information check [Authenticating Service Management Requests](http://msdn.microsoft.com/en-us/library/windowsazure/ee460782.aspx).

You must take the PEM certificate that you use for the Service Management tests and split it into seperate files for the key and certificate:
* Copy the CERTIFICATE section of the .PEM file to a .CRT file.
* Copy the RSA PRIVATE KEY section to a .KEY file.

To tell the mock server which certificate to use,
* Set the `CLIENT_KEY` environment variable to the full path of the .KEY file.
* Set the `CLIENT_CRT` environment variable to the full path of the .CRT file.

When running the Service Management unit tests, you can specify that they should use the mock server by setting the `MOCK_SERVER_MODE` environment 
variable to one of the following values: 
* `neutral`
* `recording`
* `playback`
