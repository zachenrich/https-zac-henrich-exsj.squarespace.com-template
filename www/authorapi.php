<?php

include_once 'config.php';
include_once '../src/utils/RequestHelper.php';
include_once '../src/includes/header.php';

$security = [
    "consumer_key" => $consumer_key,
    "domain"       => $domain,
    "timestamp"    => $timestamp
];

$request = [
    "limit" => 100,
    "tags"  => [
        ["type" => "course", "name" =>"commoncore"],
        ["type" => "subject", "name" =>"English"]
    ]
];

$RequestHelper = new RequestHelper(
    'author',
    $security,
    $consumer_secret,
    $request
);

$signedRequest = $RequestHelper->generateRequest();

?>

<div class="jumbotron">
    <h1>Author API</h1>
    <p>Learnosity's Author API allows searching and integration of Learnosity powered content into your content management system.<p>
    <div class="row">
        <div class="col-md-8">
            <h4><a href="http://docs.learnosity.com/authorapi/" class="text-muted">
                <span class="glyphicon glyphicon-book"></span> Online docs
            </a></h4>
        </div>
        <div class="col-md-4"><p class='text-right'><a class="btn btn-primary btn-lg" href="questioneditorapi.php">Continue</a></p></div>
    </div>
</div>

<!-- Container for the author api to load into -->
<span class="learnosity-author"></span>
<script src="http://authorapi.learnosity.com/"></script>
<script>
    var config = <?php echo $signedRequest; ?>;
    config.ui = {
        onItemClick: function (item) {
            console.log(item);
        }
    }
    LearnosityAuthor.init(config);
</script>

<?php include_once '../src/includes/footer.php';