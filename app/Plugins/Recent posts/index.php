<?php

registerWidget(
    'Recent posts',
    'Recent posts',
    plugin_path('/Recent posts/widget/body.php'),
    [
        "text" => "Widget title",
        "text" => "Widget property",
        "number" => "Widget count",
        "checkbox" => "Widget show",
        "tel" => "Phone",
        "email" => "email"
    ]
);

registerWidget(
    'Updated pages',
    'Recent posts',
    plugin_path('/Recent posts/widget/body.php'),
    [
        "text" => "Widget title",
        "text" => "Widget property",
        "number" => "Widget count"
    ]
);
