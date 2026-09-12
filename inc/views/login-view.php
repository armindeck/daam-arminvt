<div class="flex flex-center items-center">
    <form method="post" class="formulario" style="width: 100%; max-width: 900px;">
        <?= view("components/auth-nav", ["title" => "Login"]) ?>
        <div class="flex flex-column gap-8">
            <label for="username_ord_email">Username ord email:</label>
            <input type="text" id="username_ord_email" name="username_ord_email" placeholder="Enter your username or email" minlength="4" value="<?= secureString($username_ord_email ?? "") ?>" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" minlength="8" required>
            <button type="submit" name="action" value="login" class="boton">Login</button>
        </div>
    </form>
</div>