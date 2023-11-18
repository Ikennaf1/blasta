<?php

require_once base_path('/app/Blasta/Classes/Tag.php');

function updateTags($keywordString)
{
    $tags = Tag::getInstance();
    $keywords = $tags->parse($keywordString);
    $tags->add(...$keywords);
}