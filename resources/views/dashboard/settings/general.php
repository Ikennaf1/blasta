<?php
use App\Http\Controllers\PageController;
$currHomepage = settings('r', 'general.homepage');
$pageController = new PageController;
$pages = $pageController->listForSettings();
?>

<div class="w-64">
    <label class="flex flex-col gap-2">
        <div>App name</div>
        <input class="border border-gray-400 rounded-lg w-full" type="text" name="name" id="" placeholder="App name" value="<?= settings('r', 'general.name') ?>">
    </label>
</div>

<div class="w-64">
    <label class="flex flex-col gap-2">
        <div>Homepage</div>
        <select class="border border-gray-400 rounded-lg w-full" name="homepage" id="">
            <option <?= $currHomepage === 'default' ? 'selected' : '' ?> value="default">Default</option>
            <?php
            foreach ($pages as $page) {
                $option = '<option value="'.$page['link'].'"';
                $option .= $currHomepage == $page['link'] ? 'selected' : '';
                $option .= '>'.$page['title'].'</option>';
                echo $option;
            }
            ?>
        </select>
    </label>
</div>
