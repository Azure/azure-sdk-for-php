<?php

require_once 'PEAR2/autoload.php';
use ext\microsoft\windowsazure\services\queue\FiddlerFilter;

use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\WindowsAzure\Core\ServiceException;
use PEAR2\WindowsAzure\Core\IServiceFilter;
use PEAR2\WindowsAzure\Services\Core\Models\PeekMessagesOptions;
use PEAR2\WindowsAzure\Services\Core\Models\ListMessagesOptions;
use PEAR2\WindowsAzure\Services\Core\Models\ListBlobsOptions;
use PEAR2\WindowsAzure\Services\Blob\BlobSettings;
use PEAR2\WindowsAzure\Services\Blob\BlobService;

class blobJunk {
    protected $service;
    
    public function __construct() {
        $config = new Configuration();
        $config->setProperty(BlobSettings::ACCOUNT_KEY, 'Izez6VpcQAJaYqCEDONXHK8bH+Xqw/6q8D75WyZi8SdOiRgYvIA1Rq/rVmeEH7shv/N+NLuXT8k56zNmlxZrQg==');
        $config->setProperty(BlobSettings::ACCOUNT_NAME, 'azuresdkdev');
        $config->setProperty(BlobSettings::URI, 'http://azuresdkdev.blob.core.windows.net');
        $this->service = BlobService::create($config);
        $fiddlerFilter = new FiddlerFilter();
        $this->service = $this->service->withFilter($fiddlerFilter);
    }

    public function setup($containerName) {
        $listContainersResult = $this->service->listContainers();
        $conts = $listContainersResult->getContainers();
        foreach($conts as $cont) {
            $name = $cont->getName();         
            echo 'Deleting old blob container: ' . $name . "<br/>\n";
            $this->service->deleteContainer($name);
        }
        
        echo 'Creating blob container: ' . $containerName . "<br/>\n";
        $this->service->createContainer($containerName);
    }
        
    public function cleanup($containerName) {
        echo 'Deleting blob container: ' . $containerName . "<br/>\n";
        $this->service->deleteContainer($containerName);
    }
    
    public function ReadBlobCombined($containerName, $blobName) {
        $blobEntry = $this->service->getBlobProperties($containerName, $blobName);
        $fullData = $this->ReadWholeBlob($containerName, $blobName);
//        if ($blobEntry->getBlobType() == 'BlockBlob') {
//            $data = ReadBlockBlob($this->service, $containerName, $blobName);
//            Assert.assertEquals('String not equal to sum of parts', $fullData, $data);
//        } else {
//            $data = ReadPageBlob($service, $containerName, $blobName);
//        }
        $this->service->deleteBlob($containerName, $blobName);
        return $fullData;
    }
    
    private function ReadWholeBlob($containerName, $blobName) {
        $blobEntry = $this->service->getBlobProperties($containerName, $blobName);
        $result2 = $this->service->getBlob($containerName, $blobName);
        $meta = $this->service->getBlobMetadata($containerName, $blobName);
        echo 'meta' . "<br/>\n";
        var_dump($meta);
        $fullData = $result2->getContentStream();
        $actMD5 = $blobEntry->getProperties()->getContentMD5();
        echo 'actMD5' . "<br/>\n";
        var_dump($actMD5);
        if ($actMD5 != null) {
            Assert.assertEquals('MD5 codes', calculateMD5($fullData), $actMD5);
        }
        $metadata = $meta->getMetadata();
        $dataValue = $metadata[strtolower('dataValue')];
        if ($dataValue != null) {
            $realData = base64_decode($dataValue);
            echo 'Metadata string Equal? ' . ($realData == $fullData ? 'true' : 'false' ). "<br/>\n";
        }
        return $fullData;
    }
    
    public function UploadToBlob($containerName, $workId, $data, $blockSize) {
        if ($blockSize % 2 == 0) {
            $this->UploadToBlobBlock($containerName, $workId, $data, $blockSize);
        } else {
            $this->UploadToBlobPage($containerName, $workId, $data, $blockSize);
        }

        $metaResult = $this->service->getBlobMetadata($containerName, $workId);
        $meta = $metaResult->getMetadata();
        $meta['dataValue'] = base64_encode($data);
        $this->service->setBlobMetadata($containerName, $workId, $meta);
    }
    
    private function UploadToBlobBlock($containerName, $workId, $data, $blockSize) {
        $success = false;
        while (!$success) {
            // Cannot set MD5 on block blob, because it is inteneded for random access
            $this->service->createBlockBlob($containerName, $workId);
            $bytes = $data;
            // TODO: Remove the string concat when the following issue is fixed.
            // Tracked by https://github.com/WindowsAzure/azure-sdk-for-php/issues/93
            $meta = array(
                'stringSize' => '' . strlen($data),
                'blockSize'  => '' . $blockSize,
                'byteSize'   => '' . strlen($bytes),
            );
            $this->service->setBlobMetadata($containerName, $workId, $meta);            
        
            // TODO: Remove once the blocks code is online
            $this->service->createBlockBlob($containerName, $workId, $data);
            $this->service->setBlobMetadata($containerName, $workId, $meta);
            $success = true;
            
            $blockList = array();
            for ($i = 0; $i < strlen($bytes); $i += $blockSize) {
                $tmparraylen = min($blockSize, strlen($bytes) - 1);
                $x = substr($bytes, $i, $tmparraylen);
                echo $x . "<br/>\n";
    
                $blockId = $workId . (10000 + $i);
                $this->service->createBlobBlock($containerName, $workId, $blockId, $x);
                $success = ($statusCode == -1);
                if ($success) {
                    $blockList[$i] = $blockId;
                } else {
                    break;
                }
            }
            
            if ($success) {
                $statusCode = $this->service->commitBlobBlocks($containerName, $workId, $blockList);
            }
            
            $success = ($statusCode == -1);
            if (!$success) {
                // Error: Abandon blob and try again
                $this->service->deleteBlob($containerName, $workId);
            }
        }
    }
}
//	private void UploadToBlob(containerName, workId, data, blockSize) {
//	    if (blockSize % 2 == 0) {
//	        UploadToBlobBlock(containerName, workId, data, blockSize);
//	    } else {
//	        UploadToBlobPage(containerName, workId, data, blockSize);
//	    }
//	    meta = service.getBlobMetadata(containerName, workId);
//	    meta.put('dataValue', Base64.encode(data));
//	    service.setBlobMetadata(containerName, workId, meta);
//	}
//	 
//	private void UploadToBlobBlock(containerName, workId, data, blockSize) {
//	    success = false;
//	    while (!success) {
//	        // Cannot set MD5 on block blob, because it is inteneded for random access
//	        service.createBlockBlob(containerName, workId, null);
//	        bytes = data.getBytes('UTF-8');
//	 
//	        meta = new HashMap<String, String>();
//	        meta.put('stringSize', data.length());
//	        meta.put('blockSize', blockSize);
//	        meta.put('byteSize', bytes.length);
//	        service.setBlobMetadata(containerName, workId, meta);
//	 
//	        blockList = new BlockList();
//	        success = false;
//	        for (int i = 0; i < bytes.length; i += blockSize) {
//	            byte[] x = new byte[(int) Math.min(blockSize, bytes.length - i)];
//	            for (int j = 0; j < x.length; j++) {
//	                x[j] = bytes[i + j];
//	            }
//	 
//	            contentStream = new ByteArrayInputStream(x);
//	            blockId = workId + String.valueOf(10000 + i);
//	            statusCode = service.createBlobBlock(containerName, workId, 
//	                blockId, contentStream, ContentMD5 : calculateMD5(x));
//	            success = (statusCode == -1);
//	            if (success) {
//	                blockList.addUncommittedEntry(blockId);
//	            } else {
//	                break;
//	            }
//	        }
//	        if (success) {
//	            statusCode = service.commitBlobBlocks(containerName, workId, blockList);
//	        }
//	        success = (statusCode == -1);
//	        if (!success) {
//	            // Error: Abandon blob and try again
//	            service.deleteBlob(containerName, workId);
//	        }
//	    }
//	}
//	 
//	private void UploadToBlobPage(containerName, workId, data, blockSize) {
//	    service.createPageBlob(containerName, workId,
//	        Length: 2 * EndToEndBlobAndQueueTest.getPageBlobSize() * bytes.length, 
//	        ContentMD5 : calculateMD5(data));
//	    bytes = data.getBytes('UTF-8');
//	 
//	    meta = new HashMap<String, String>();
//	    meta.put('stringSize', data.length());
//	    meta.put('blockSize', blockSize);
//	    meta.put('byteSize', bytes.length);
//	    service.setBlobMetadata(containerName, workId, meta);
//	 
//	    for (int i = 0; i < bytes.length; i += blockSize) {
//	        x = new byte[EndToEndBlobAndQueueTest.getPageBlobSize()];
//	        for (int j = 0; j < Math.min(blockSize, bytes.length - i); j++) {
//	            x[j] = bytes[i + j];
//	        }
//	        contentStream = new ByteArrayInputStream(x);
//	        service.createBlobPages(containerName, workId, 
//	            RangeStart : (2 * i *getPageBlobSize()),
//	            RangeLength : getPageBlobSize(), x.length, contentStream, 
//	            ContentMD5 : calculateMD5(x));
//	   }
//	}
//
//
//    private String ReadWholeBlob(String containerName, String blobName) {
//        blobEntry = service.getBlobProperties(containerName, blobName);
//        result2 = service.getBlob(containerName, blobName);
//        meta = service.getBlobMetadata(containerName, blobName);
//        fullData = inputStreamToString(result2.getContentStream());
//        actMD5 = blobEntry.getProperties().getContentMD5();
//        if (actMD5 != null) {
//            Assert.assertEquals('MD5 codes', calculateMD5(fullData), actMD5);
//        }
//	 
//	    String dataValue = meta.get('dataValue');
//	    if (dataValue != null) {
//	        String realData = Base64.decode(dataValue);
//	        Assert.assertEquals('Metadata string not equal expected', realData, data);
//	    }
//	    return fullData;
//	}
//	 
//	private String ReadBlockBlob(String containerName, String blobName) {
//	    props = service.getBlobProperties(containerName, blobName);
//	    blobLength = props.getProperties().getContentLength();
//	    bytes = new byte[(int) blobLength];
//	 
//	    offset = 0;
//	    lbbr = service.listBlobBlocks(containerName, blobName);
//	    for (Entry x : lbbr.getCommittedBlocks()) {
//	        br = service.getBlob(containerName, blobName, 
//	            RangeStart: offset, RangeEnd : (offset + x.getBlockLength() - 1));
//	        buffer = br.getContentStream().read(x.getBlockLength());
//	        arraycopy(buffer INTO bytes AT offset);
//	        offset += x.getBlockLength;
//	    }
//	    String roundTrip = new String(bytes, "UTF8");
//	    return roundTrip;
//	}
//	 
//	private String ReadPageBlob(String containerName, String blobName) {
//	    meta = service.getBlobMetadata(containerName, blobName);
//	    stringSize = Integer.parseInt(meta.get("stringSize"));
//	    blockSize = Integer.parseInt(meta.get("blockSize"));
//	    byteSize = Integer.parseInt(meta.get("byteSize"));
//	 
//	    bytes = new byte[byteSize];
//	    offset = 0;
//	    listBlobRegionsResult = service.listBlobRegions(containerName, blobName);
//	    for (PageRange pr : listBlobRegionsResult.getPageRanges()) {
//	        GetBlobResult br = service.getBlob(containerName, blobName,
//	            RangeStart : pr.getStart(), RangeEnd : pr.getEnd());
//	        buffer = br.getContentStream().read((pr.getLength() + 1);
//	        arraycopy(buffer INTO bytes AT offset);
//	        offset += blockSize;
//	    }
//	 
//	    String roundTrip = new String(bytes, "UTF8");
//	    Assert.assertEquals("data length", stringSize, roundTrip.length());
//	    return roundTrip;
//	}
?>
