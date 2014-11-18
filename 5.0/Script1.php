<?php
include("inc/php/Workflow.php");
    $workflow = new Workflow();
    $workflow->addNode('1', '', 'Title', 'Rectangle Text');
    $workflow->addNode('2', '1', 'Title', 'Rectangle Text Child');
    $workflow->addNode('3', '1', 'Title', 'Rectangle Text Child');
    $workflow->addNode('4', '3', 'Title', 'Rectangle Text');
    $workflow->render();
    ?>