<?php

include_once '../../config.php';
include_once 'includes/header.php';

use LearnositySdk\Request\Init;

$security = array(
    'consumer_key' => $consumer_key,
    'domain'       => $domain
);
$request = [];

$Init = new Init('data', $security, $consumer_secret, $request);
$signedRequest = $Init->generate();

#var_dump($signedRequest);

?>

<script>
    $(function() {
        submitToApi();
    });

    function submitToApi () {
        $.ajax({
            url: 'https://data.learnosity.com/latest/itembank/questions',
            data: '<?php echo($signedRequest); ?>',
            dataType: 'json',
            type: 'POST'
        })
        .done(function(data, status, xhr) {
            console.log(data, status, xhr);
        });
    }
</script>

<?php
    include_once 'includes/footer.php';
