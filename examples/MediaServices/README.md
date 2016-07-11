This folder contains the following Azure Media Service PHP SDK samples:

* userconfig.php: common file to store the AMS credentials to execute the samples. 
* vodworkflow_aes.php: End-to-end VOD workflow that applies AES content protection.
* vodworkflow_drm_playready_widevine.php: End-to-end VOD workflow that applies DRM (PlayReady + Widevine) content protection.
* vodworkflow_drm_fairplay.php: End-to-end VOD workflow that applies DRM (FairPlay) content protection.
* scale_encoding_units.php: Scales the encoding reserved units.

To run these samples you can use the following command (assuming that your include_path are correctly configured)

```
php -d display_errors=1 %sample_name%.php
```
