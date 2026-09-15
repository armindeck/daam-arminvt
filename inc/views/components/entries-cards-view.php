<div class="entries-cards">
	<?php foreach (array_reverse($posts) as $post): if($post["type"] != "blog" || $post["status"] != "published") { continue; } ?>
		<div class="entry-card">
			<p class="ctg"><?= $post['catalog'] ?? "" ?></p>
			<a href="<?= DIR . ltrim($post["slug"] ?? "", "/") . PHP_EXTENSION ?>">
			    <div class="entry-card--image">
				    <img src="<?= DIR . ($post['image'] ?? "") ?>" loading="lazy" alt="<?= substr($post['fragment'] ?? "", 0, 50) ?>...">
			    </div>
			    <p class="entry-card--text"><?= substr($post['fragment'] ?? "", 0, 145) ?>...</p>
            </a>
	    </div>
    <?php endforeach ?>
</div>