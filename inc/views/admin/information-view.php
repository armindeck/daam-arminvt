<div class="flex flex-evenly">
	<div method="post" style="width: 100%; max-width: 920px;">
		<details class="formulario" style="width: 99%;" open>
			<summary class="p-4 t-strong">
				Information
			</summary>
			<div class="flex flex-column gap-8 t-small">
                <small><?= CORE["core_about"] ?? "" ?></small>
                <hr>
                <div class="flex flex-between">
                    <span>Creator:</span>
                    <span><a href="<?= CORE["core_creator_link"] ?? "" ?>" target="_blank"><?= CORE["core_creator_name"] ?? "" ?></a></span>
                </div>
                <div class="flex flex-between">
                    <span>Name:</span>
                    <span><?= CORE["core_name"] ?? "" ?></span>
                </div>
                <div class="flex flex-between">
                    <span>Version:</span>
                    <span><?= (CORE["core_version"] ?? "") . "-" . (CORE["core_state"] ?? "") ?></span>
                </div>
                <div class="flex flex-between">
                    <span>Date:</span>
                    <span><?= (CORE["core_created"] ?? "") . " ~ " . (CORE["core_updated"] ?? "") ?></span>
                </div>
                <hr>
                <small><?= file_exists(raiz() . "/LICENSE") ? nl2br(secureString(file_get_contents(raiz() . "/LICENSE"))) : "License file not found" ?></small>
                <hr>
                <style type="text/css">
                    ul,
                    li {
                        border: none;
                        box-shadow: none;
                        text-decoration: none;
                    }

                    ul {
                        margin-left: 1rem;
                    }
                </style>
                <?= michelf\MarkdownExtra::defaultTransform(file_exists(raiz() . "/CHANGELOG.md") ? secureString(file_get_contents(raiz() . "/CHANGELOG.md")) : "CHANGELOG file not found") ?>
            </div>
        </details>
    </div>
</div>