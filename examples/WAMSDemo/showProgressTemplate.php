<h2>Job status (<?php echo $result['currentMediaFile']?>)</h2>
<p><?php echo $result['sasState']?></p>
<p><?php echo $result['streamState']?></p>
<?php if ($result['allDone']):?>
<h2>Here's your uploaded video encoded with 'H264 Broadband SD 4x3' preset</h2><video width="300" height="300" controls autoplay><source src="<?php echo ($result['sasLink']) ?>" />Your browser does not support the video tag.</video>
<?php else:?>
<script type="text/javascript">
setTimeout(function () {
    window.location.reload()
}, 5000);
</script>
<?php endif; ?>


