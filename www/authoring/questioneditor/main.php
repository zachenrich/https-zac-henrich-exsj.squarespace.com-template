<?php

include_once '../../config.php';
include_once 'includes/header.php';

?>

<div class="jumbotron section">
    <div class="toolbar">
        <ul class="list-inline">
            <li data-toggle="tooltip" data-original-title="Visit the documentation"><a href="http://docs.learnosity.com/questioneditorapi/" title="Documentation"><span class="glyphicon glyphicon-book"></span></a></li>
            <li data-toggle="tooltip" data-original-title="Toggle product overview box"><a href="#"><span class="glyphicon glyphicon-chevron-up jumbotron-toggle"></span></a></li>
        </ul>
    </div>
    <div class="overview">
        <h1>Question Editor API</h1>
        <p>Our editor. Your item bank platform.<p>
    </div>
</div>

<!--
********************************************************************
*
* Nav for different Question Editor API examples
*
********************************************************************
-->
<div class="section">


    <!-- Container for the question editor api to load into -->
    <script src="http://questioneditor.vg.learnosity.com"></script>
    <div class="learnosity-question-editor"></div>
</div>
<script>


    var initOptions = {
            configuration: {
                questionsApiVersion: 'v2'
            },
            widgetType: 'response',
            ui: {
                public_methods: ['getResponses'],
                layout: '2-column',
                fixedPreview: {
                    marginTop: 50
                }
            },
            widget_json: {
                "is_math": true,
                "metadata": {
                    "distractor_rationale": "<p>Students may have an incorrect response because they may not understand how to find the rate of change in a table or they think that a graph with multiple line segments is linear.</p>\n\n<p>Students who&nbsp;said to determine that a table of values is a linear function, find the ratio&nbsp;of the change in&nbsp;\\(x\\)&nbsp;over the change in&nbsp;\\(y\\), reversed the ratio.</p>\n"
                },
                "possible_responses": ["\\(x\\)", "\\(y\\)", "change in&nbsp;\\(x\\)", "change in&nbsp;\\(y\\)", "is constant", "<p>varies</p>\n", "exactly one", "one or more"],
                "stimulus": "<p><strong>Part B</strong></p>\n\n<p>Marcy correctly explains how to determine if a table or a graph is a linear function. Drag a response into each box to complete her explanation. Answer choices may be used only&nbsp;once.</p>\n",
                "template": "<p>To determine if&nbsp;a table of values is a linear function, find the ratio of the {{response}} over the {{response}} for&nbsp;each set of ordered pairs to make sure&nbsp;that the rate of change {{response}}.a</p>\n\n<p>To determine if a graph is a linear function, verify that&nbsp;the graph has exactly one {{response}} -value for each {{response}} -value and verify that&nbsp;the graph shows {{response}} straight line(s).</p>\n",
                "type": "clozeassociation",
                "validation": {
                    "scoring_type": "exactMatch",
                    "valid_response": {
                        "score": 1,
                        "value": ["change in&nbsp;\\(y\\)", "change in&nbsp;\\(x\\)", "is constant", "\\(y\\)", "\\(x\\)", "exactly one"]
                    }
                }
            }
        };

    var qeApp = LearnosityQuestionEditor.init(initOptions);

</script>

<?php
    include_once 'views/modals/asset-upload.php';
    include_once 'includes/footer.php';
