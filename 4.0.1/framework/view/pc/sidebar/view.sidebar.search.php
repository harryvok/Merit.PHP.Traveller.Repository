<ul class="subButtons">
    <li data-open="basic" <?php if(isset($_GET['d']) && $_GET['d'] != "advanced") echo "class='act'"; ?> data-title="Basic Search">Basic</li>
    <li data-open="advanced" <?php if(isset($_GET['d']) && $_GET['d'] == "advanced") echo "class='act'"; ?> data-title="Advanced Search">Advanced</li>
</ul>
