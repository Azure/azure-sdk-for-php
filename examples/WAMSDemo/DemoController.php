<?php
use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\AccessPolicy;
use WindowsAzure\MediaServices\Models\AssetFile;
use WindowsAzure\MediaServices\Models\Locator;
use WindowsAzure\MediaServices\Models\Job;
use WindowsAzure\MediaServices\Models\Task;
use WindowsAzure\MediaServices\Models\TaskOptions;
use WindowsAzure\MediaServices\Models\JobTemplate;
use WindowsAzure\MediaServices\Models\TaskTemplate;

/**
 * Contorller for WAMS Demo
 */
class DemoController
{
    // Assets names
    const ASSET_NAME = 'DemoAsset';
    const SAS_ASSET_NAME = 'DemoAssetSASOutput';
    const STREAM_ASSET_NAME = 'DemoAssetStreamOutput';

    // Access policies names
    const ACCESS_POLICY_NAME = 'DemoAccessPolicy';
    const SAS_ACCESS_POLICY_NAME = 'SasDemoAccessPolicy';
    const STREAM_ACCESS_POLICY_NAME = 'StreamDemoAccessPolicy';

    // Job names
    const SAS_JOB_NAME = 'DemoSASJob';
    const STREAM_JOB_NAME = 'DemoStreamJob';

    // Active service builder insatnce
    private $_serviceBuilder;

    // Active media sevices REST proxy instance
    private $_mediaService;

    /**
     * Create controller. Perform common actions for all actions.
     */
    public function __construct()
    {
        if (isset($_SESSION['accountName']) && isset($_SESSION['accessKey'])) {
            $this->initMediaServicesProxy($_SESSION['accountName'], $_SESSION['accessKey']);
        }
    }

    /**
     * Process file action. Gets media file form a upload form and starts
     * encoding jobs.
     *
     * @return array Data for template
     */
    public function processFile()
    {
        session_unset();

        // If file is sent then run the jobs
        if (isset($_POST['process'])) {
            if (!empty($_FILES['media']['tmp_name'])) {
                $movie = file_get_contents($_FILES['media']['tmp_name']);
                $name = $_FILES['media']['name'];
                $_SESSION['currentMediaFile'] = $name;
            }
            else {
                die("No file specified");
            }

            // Remember media services credentials in session
            if (isset($_POST['accountName']) && isset($_POST['accessKey'])) {
                try {
                    $this->initMediaServicesProxy($_POST['accountName'], $_POST['accessKey']);
                }
                catch (\Exception $e) {
                    die("Unable to connect to Media Services");
                }
                $_SESSION['accountName'] = $_POST['accountName'];
                $_SESSION['accessKey'] = $_POST['accessKey'];
            }

            $this->cleanRepository();

            // Create asset with file
            $inputAsset = $this->uploadFileToAsset($name, $movie);

            // Run encoding for SAS
            $sasJob = $this->createJob(
                DemoController::SAS_JOB_NAME,
                $inputAsset,
                $this->createTask(DemoController::SAS_ASSET_NAME),
                'H264 Broadband SD 4x3'
            );

            // Run encoding for streaming video
            $streamJob = $this->createJob(
                DemoController::STREAM_JOB_NAME,
                $inputAsset,
                $this->createTask(DemoController::STREAM_ASSET_NAME),
                'H264 Smooth Streaming SD 4x3'
            );
        }

        return array(
            'showState' => isset($_SESSION['currentMediaFile'])
        );
    }

    /**
     * Show progress action. Gets actual info about running jobs and pass it to
     * the template
     *
     * @return array Data for template
     */
    public function showProgress()
    {
        // Get job objects
        $sasJob = $this->getJobByName(DemoController::SAS_JOB_NAME);
        $streamJob = $this->getJobByName(DemoController::STREAM_JOB_NAME);

        // Generate URL to resulting media if job is finished
        if (empty($_SESSION['sasLink'])
        && ($sasJob->getState() == Job::STATE_FINISHED)
        ) {
            $_SESSION['sasLink'] = $this->getSasLocator();
            $_SESSION['sasLinkFinished'] = time();
        }

        if (empty($_SESSION['streamLink'])
        && ($streamJob->getState() == Job::STATE_FINISHED)
        ) {
            $_SESSION['streamLink'] = $this->getStreamLocator();
            $_SESSION['streamLinkFinished'] = time();
        }

        // Build status message for every job
        $result = array();
        $result['sasState'] = $this->getJobStatusMessage($sasJob);
        $result['streamState'] = $this->getJobStatusMessage($streamJob);


        // Add url to status if exists
        $result['allDone'] = ((!empty($_SESSION['sasLink'])) && (!empty($_SESSION['streamLink'])));
        if (!empty($_SESSION['sasLink'])) {
            if ($_SESSION['sasLinkFinished'] + 30 < time()) {
                $result['sasState'] = 'SAS link: <a href="' . $_SESSION['sasLink'] . '">'
                    . $_SESSION['sasLink'] . '</a>';

                $result['sasLink'] = $_SESSION['sasLink'];
            }
            else {
                $result['sasState'] = sprintf($result['sasState'], $_SESSION['sasLinkFinished'] + 30 - time());
                $result['allDone'] = false;
            }
        }

        if (!empty($_SESSION['streamLink'])) {
            if ($_SESSION['streamLinkFinished'] + 30 < time()) {
                $result['streamState'] = 'Stream link: <a href="' . $_SESSION['streamLink'] . '">'
                    . $_SESSION['streamLink'] . '</a>';
            }
            else {
                $result['streamState'] = sprintf($result['streamState'], $_SESSION['streamLinkFinished'] + 30 - time());
                $result['allDone'] = false;
            }
        }

        $result['currentMediaFile'] = $_SESSION['currentMediaFile'];


        return $result;
    }

    /**
     * Perform file upload to media services. Create asset and add file into it.
     *
     * @param string $name    File name
     * @param string $content File contents
     *
     * @return Asset Created asset with a file in it
     */
    private function uploadFileToAsset($name, $content)
    {
        // Create asset
        $asset = new Asset(Asset::OPTIONS_NONE);
        $asset->setName(DemoController::ASSET_NAME);
        $asset = $this->_mediaService->createAsset($asset);

        // Create access policy
        $access = new AccessPolicy(DemoController::ACCESS_POLICY_NAME);
        $access->setDurationInMinutes(10);
        $access->setPermissions(AccessPolicy::PERMISSIONS_WRITE);
        $access = $this->_mediaService->createAccessPolicy($access);

        // Create locator
        $locator = new Locator($asset, $access, Locator::TYPE_SAS);
        $locator->setStartTime(new \DateTime('now -5 minutes'));
        $locator = $this->_mediaService->createLocator($locator);

        // Upload file
        $this->_mediaService->uploadAssetFile($locator, $name, $content);
        $this->_mediaService->createFileInfos($asset);

        // Clean after upload
        $this->_mediaService->deleteLocator($locator);
        $this->_mediaService->deleteAccessPolicy($access);

        return $asset;
    }

    /**
     * Create encoding job
     *
     * @param string $name       Job name
     * @param Asset  $inputAsset Asset to process
     * @param string $taskXml    Task XML represenation
     * @param string $config     Preset configuration name
     *
     * @return Job
     */
    private function createJob($name, $inputAsset, $taskXml, $config) {

        $mediaProcessor = $this->_mediaService->getLatestMediaProcessor(
            'Windows Azure Media Encoder'
        );

        $task = new Task($taskXml, $mediaProcessor->getId(), TaskOptions::NONE);
        $task->setConfiguration($config);

        $job = new Job();
        $job->setName($name);

        $job = $this->_mediaService->createJob(
            $job,
            array($inputAsset),
            array($task)
        );

        return $job;
    }

    /**
     * Create task XML
     *
     * @param string $outputAssetName Output asset name
     *
     * @return string
     */
    private function createTask($outputAssetName)
    {
        return '<?xml version="1.0" encoding="utf-8"?>
            <taskBody>
                <inputAsset>JobInputAsset(0)</inputAsset>
                <outputAsset
                    assetCreationOptions="0"
                    assetName="' . $outputAssetName . '"
                >JobOutputAsset(0)</outputAsset>
            </taskBody>';
    }

    /**
     * Build encoding status message based on job state
     *
     * @param Job $job Job to build message for
     *
     * @return string
     */
    private function getJobStatusMessage($job)
    {
        switch ($job->getState()) {
            case Job::STATE_FINISHED:
                return 'Job "' . $job->getName() . '" finished.
                    Media file would be accessible in %d seconds.';

            case Job::STATE_QUEUED:
                return 'Job "' . $job->getName() . '" is queued.';

            case Job::STATE_PROCESSING:
                return 'Job "' . $job->getName() . '" is processing.';

            case Job::STATE_ERROR:
                return 'Job "' . $job->getName() . '" finished with errors.';

            case Job::STATE_CANCELED:
                return 'Job "' . $job->getName() . '" is canceled.';

            case Job::STATE_CANCELING:
                return 'Job "' . $job->getName() . '" is canceling.';

            case Job::STATE_SCHEDULED:
                return 'Job "' . $job->getName() . '" is scheduled.';
        }
    }

    /**
     * Create URL for result of SAS job
     *
     * @return string
     */
    private function getSasLocator()
    {
        $asset = $this->getAssetByName(DemoController::SAS_ASSET_NAME);

        $accessPolicy = new AccessPolicy(DemoController::SAS_ACCESS_POLICY_NAME);
        $accessPolicy->setDurationInMinutes(1440);
        $accessPolicy->setPermissions(AccessPolicy::PERMISSIONS_READ);
        $accessPolicy = $this->_mediaService->createAccessPolicy($accessPolicy);

        $locator = new Locator($asset, $accessPolicy, Locator::TYPE_SAS);
        $locator->setStartTime(new \DateTime('now -5 minutes'));
        $locator = $this->_mediaService->createLocator($locator);

        $fileInfo = pathinfo($_SESSION['currentMediaFile']);

        return $locator->getBaseUri() . '/' . $fileInfo['filename']
            . '_H264_1800kbps_AAC_und_ch2_128kbps.mp4'
            . $locator->getContentAccessComponent();
    }

    /**
     * Create URL for result of streaming job
     *
     * @return string
     */
    private function getStreamLocator()
    {
        $asset = $this->getAssetByName(DemoController::STREAM_ASSET_NAME);

        $accessPolicy = new AccessPolicy(DemoController::STREAM_ACCESS_POLICY_NAME);
        $accessPolicy->setDurationInMinutes(1440);
        $accessPolicy->setPermissions(AccessPolicy::PERMISSIONS_READ);
        $accessPolicy = $this->_mediaService->createAccessPolicy($accessPolicy);

        $locator = new Locator($asset, $accessPolicy, Locator::TYPE_ON_DEMAND_ORIGIN);
        $locator->setStartTime(new \DateTime('now -5 minutes'));
        $locator = $this->_mediaService->createLocator($locator);

        $fileInfo = pathinfo($_SESSION['currentMediaFile']);

        return  $locator->getPath() . $fileInfo['filename'] . '.ism/Manifest';
    }

    /**
     * Get asset object by name
     *
     * @param string $name Asset name
     *
     * @return Asset|NULL
     */
    private function getAssetByName($name)
    {
        $assets = $this->_mediaService->getAssetList();
        foreach($assets as $asset) {
            if ($asset->getName() == $name) {
                return $asset;
            }
        }

        return null;
    }

    /**
     * Get job object by job name
     *
     * @param string $name Job name
     *
     * @return Job|NULL
     */
    private function getJobByName($name)
    {
        $jobs = $this->_mediaService->getJobList();
        foreach($jobs as $job) {
            if ($job->getName() == $name) {
                return $job;
            }
        }

        return null;
    }

    /**
     * Delete job. Job could be deleted at every moment. So method waits until
     * the job would move to the state it can be deleted
     *
     * @param Job $job Job object
     */
    private function deleteJob($job)
    {
        $status = $this->_mediaService->getJobStatus($job);
        while ($status != Job::STATE_FINISHED && $status != Job::STATE_ERROR && $status != Job::STATE_CANCELED) {
            sleep(1);
            $status = $this->_mediaService->getJobStatus($job);
        }
        $this->_mediaService->deleteJob($job->getId());
    }

    /**
     * Clean repository. Controller always use the same asset names, job names
     * and etc. So before start no operation we need to delete old one.
     *
     */
    private function cleanRepository()
    {
        $usedAssets = array(
            DemoController::ASSET_NAME,
            DemoController::SAS_ASSET_NAME,
            DemoController::STREAM_ASSET_NAME,
        );

        $usedAccessPolicies = array(
            DemoController::ACCESS_POLICY_NAME,
            DemoController::SAS_ACCESS_POLICY_NAME,
            DemoController::STREAM_ACCESS_POLICY_NAME,
        );

        $usedJobs = array(
            DemoController::SAS_JOB_NAME,
            DemoController::STREAM_JOB_NAME,
        );

        $assets = $this->_mediaService->getAssetList();
        foreach($assets as $asset) {
            if (in_array($asset->getName(), $usedAssets)) {
                $this->_mediaService->deleteAsset($asset);
            }
        }

        $accessPolicies = $this->_mediaService->getAccessPolicyList();
        foreach($accessPolicies as $accessPolicy) {
            if (in_array($accessPolicy->getName(), $usedAccessPolicies)) {
                $this->_mediaService->deleteAccessPolicy($accessPolicy);
            }
        }

        $jobs = $this->_mediaService->getJobList();
        foreach($jobs as $job) {
            if (in_array($job->getName(), $usedJobs)) {
                $this->deleteJob($job);
            }
        }
    }

    /**
     * Initializes Media Services REST proxy
     *
     * @param string $accountName Media Services account name
     * @param string $accessKey   Primary or secondary access key
     *
     * @return null
     */
    private function initMediaServicesProxy($accountName, $accessKey) {
        $this->_serviceBuilder = ServicesBuilder::getInstance();
        $this->_mediaService = $this->_serviceBuilder->createMediaServicesService(
            new MediaServicesSettings(
                $accountName,
                $accessKey
            )
        );
    }
}


