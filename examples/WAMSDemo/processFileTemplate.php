<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Windows Azure for PHP Media Services Demo</title>
    </head>
    <body>
        <h1>Windows Azure for PHP Media Services Demo</h1>
        <?php if (!$result['showState']):?>
        <form enctype="multipart/form-data" method="post">
            Account name:
            <input type="text" name="accountName" size="50" value="<?php if (isset($_SESSION['accountName'])): echo $_SESSION['accountName']; endif;?>" />
            <br />
            Access key (primary or secondary):
            <input type="text" name="accessKey" size="50" value="<?php if (isset($_SESSION['accessKey'])): echo $_SESSION['accessKey']; endif;?>" />
            <br />
            Video file: <input type="file" name="media" /><br />
            <input type="submit" name="process" value="Process">
            </form>
        <?php endif;?>

        <?php if ($result['showState']): ?>
        <iframe src="index.php?q=showProgress" width="100%" height="600" frameBorder="0"/>
        <?php endif;?>
    </body>
</html>