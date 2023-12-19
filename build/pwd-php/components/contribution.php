<div><h1 class="title">Contributors</h1></div>
<ul class="contributions">
    <?php foreach ($_contributors as $contributor_item) : ?>
        <li class="contributions-item">
            <img src="<?php echo $contributor_item['icon']; ?>" alt="">
            <div>
                <h3><?php echo $contributor_item['name']; ?></h3>
                <p><?php echo $contributor_item['contribution']; ?></p>
            </div>
        </li>
    <?php endforeach; ?>
</ul>