<div class="flex flex-center items-center">
    <form method="post" class="formulario" style="width: 100%; max-width: 900px;">
        <?= view("components/auth-nav", ["title" => "Forgot Password"]) ?>
        <small><i>Not found...</i></small>
        <div class="flex flex-column gap-8">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" minlength="4" value="<?= secureString($email ?? "") ?>" required>
            <label for="recovery_pin">Recovery pin:</label>
            <input type="password" id="recovery_pin" name="recovery_pin" placeholder="Enter your recovery pin" minlength="8" required>
            <button type="submit" name="action" value="forgot-password" class="boton">Reset Password</button>
        </div>
    </form>
</div>