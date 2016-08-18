<?php

require_once 'PEAR2/autoload.php';
use ext\microsoft\windowsazure\services\queue\FiddlerFilter;

use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\WindowsAzure\Core\ServiceException;
use PEAR2\WindowsAzure\Core\IServiceFilter;
use PEAR2\WindowsAzure\Services\Core\Models\PeekMessagesOptions;
use PEAR2\WindowsAzure\Services\Core\Models\ListMessagesOptions;
use PEAR2\WindowsAzure\Services\Core\Models\ListQueuesOptions;
use PEAR2\WindowsAzure\Services\Queue\QueueSettings;
use PEAR2\WindowsAzure\Services\Queue\QueueService;

class queueJunk {
    protected $queueService;
    
    public function __construct() {
        $config = new Configuration();
            $config->setProperty(QueueSettings::ACCOUNT_KEY, 'lhURaXGhNOOV8Tq0PSaxsn7pxjh7Y3WfUVaDqRdyHjkQNXqUqbZb4M46sn18EBw7KKiCSf821eaTlMrbJY1szg==');
        $config->setProperty(QueueSettings::ACCOUNT_NAME, 'azuresdkdev');
        $config->setProperty(QueueSettings::URI, 'http://azuresdkdev.queue.core.windows.net');
        $this->queueService = QueueService::create($config);
        $fiddlerFilter   = new FiddlerFilter();
        $this->queueService  = $this->queueService->withFilter($fiddlerFilter);
    }
    
    public function testListQueuesSimple()
    {
        $queue1 = 'listqueuesimp';
        echo "Creating: " . $queue1 . "<br/>\n";
        $this->queueService->createQueue($queue1);
        
        echo "Getting list of queues" . "<br/>\n";
        $result = $this->queueService->listQueues();

        $queues = $result->getQueues();
        foreach ($queues as $q) {
            echo "Found queue: " . $q->getName() . "<br/>\n";
        }

        foreach ($queues as $q) {
            echo "Deleting: " . $q->getName() . "<br/>\n";
            $this->queueService->deleteQueue($q->getName());
        }        

           echo "Deleting queue: " . $queue1 . "<br/>\n";
        $this->queueService->deleteQueue($queue1);        
        }
    
    public function setup($completedQueueName) {
        echo "Creating: " . $completedQueueName . "<br/>\n";
        $this->queueService->createQueue($completedQueueName);
        
        echo "Creating messages in queue<br/>\n";
        $this->queueService->createMessage($completedQueueName, "this is a test!!!");
        $this->queueService->createMessage($completedQueueName, "this is another test!!!");
        $this->queueService->createMessage($completedQueueName, "still more test!!!");
    }
        
    public function cleanup($completedQueueName) {
        $opts = new ListMessagesOptions();
        $opts->setNumberOfMessages(32);            
        echo 'Deleting messages from queue' . "<br/>\n";
        $result = $this->queueService->listMessages($completedQueueName, $opts);
        $messages = $result->getQueueMessages();        
        foreach ($messages as $pm)
        {
            $this->queueService->deleteMessage($completedQueueName,
                    $pm->getMessageId(), $pm->getPopReceipt());
        }

        echo 'Deleting queue: ' . $completedQueueName . "<br/>\n";
        $this->queueService->deleteQueue($completedQueueName);
        $this->deleteQueues();
    }
    
    public function deleteQueues() {
        echo 'Getting list of queues' . "<br/>\n";
        $result = $this->queueService->listQueues();
        $queues = $result->getQueues();
        foreach ($queues as $q) {
            echo 'Deleting queue: ' . $q->getName() . "<br/>\n";
            $this->queueService->deleteQueue($q->getName());
        }        
    }

    public function checkMessageNotInPeekedQueued($m, $peekMsgsResult) {
        $peekMsgs = $peekMsgsResult->getQueueMessages();
        foreach ($peekMsgs as $pm)
        {
            $pmid = $pm->getMessageId();
            $mid  =  $m->getMessageId();
            $eq = ($pmid == $mid ? 'true' : 'false');
            echo 'Is message in peeked messages: ' . $eq . "<br/>\n";
            // Assety that $eq is false.
        }
    }
    
    public function PollQueue($completedQueueName)
    {
        $result = $this->queueService->listMessages($completedQueueName);
        $messages = $result->getQueueMessages();
      
        if (count($messages) == 0)
        {
            return null;
        }

        $m = $messages[0];
        // Peek the queue to make sure the message is hidden
        $opts = new PeekMessagesOptions();
        $opts->setNumberOfMessages(32);        
        $peekMsgsResult = $this->queueService->peekMessages($completedQueueName, $opts);
        $this->checkMessageNotInPeekedQueued($m, $peekMsgsResult);

        // Update the message, just for testing the pop receipts, keeping invisible
        $x = $this->queueService->updateMessage(
                $completedQueueName,
                $m->getMessageId(),
                $m->getPopReceipt(),
                'useless message', 
                120);
        
        // Peek the queue to make sure the message is still hidden
        $peekMsgsResult = $this->queueService->peekMessages($completedQueueName, $opts);
        $this->checkMessageNotInPeekedQueued($m, $peekMsgsResult);

        // Try to remove the original message from the queue.
        // This should fail.
        try {
            $this->queueService->deleteMessage($completedQueueName,
                    $m->getMessageId(), $m->getPopReceipt());
        } catch (ServiceException $ex) {            
            echo 'got expected error 404, not found: ' . $ex->getCode() . ' ' . $ex->getErrorText() . '<br/>';
        }

        // Remove message from queue.
        $this->queueService->deleteMessage($completedQueueName,
                $m->getMessageId(), $x->getPopReceipt());
        
        return $m->getMessageText();
    }
}
?>
