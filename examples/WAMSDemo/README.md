WAMSDemo
========

This demo uploads a video file (supplied by the user) encodes it with "H264 Broadband SD 4x3" preset (for SAS access) and "H264 Smooth Streaming SD 4x3" preset (for streaming access) and returns the url's where it can be viewed.

The demo then opens the browser compatible stream and plays the video via SAS access.

Configuration:
The following will need to be configured in your php.ini file to get the demo to work

•	“session.save_path” has a valid path (it should be a path to folder where http server has a write permissions)

•	“session.use_cookies” is set to true

•	“session.auto_start” is set to “1”

•	“max_execution_time” is set to “0” or some great value to handle a big video file upload

•	“upload_max_filesize” and “post_max_size” is set to greater value than your planned to upload video file size

This demo relies on the PHP SDK for Windows Azure and PEAR.
