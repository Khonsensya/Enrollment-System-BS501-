<div><h1 class="title">Benefits</h1></div>
<ul class="benefits">
    <?php foreach ($_benefits as $benefit_item) : ?>
        <li class="benefits-item">
            <img src="<?php echo $benefit_item['icon']; ?>" alt="">
            <div>
                <h2><?php echo $benefit_item['title']; ?></h2>
                <p><?php echo $benefit_item['description']; ?></p>
            </div>
        </li>
    <?php endforeach; ?>
</ul>