<div class="flex flex-center items-center">
    <form method="post" class="formulario" style="width: 100%; max-width: 900px;">
        <?= view("components/auth-nav", ["title" => "Register"]) ?>
        <div class="flex flex-column gap-8">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" minlength="3" value="<?= secureString($name ?? "") ?>" required>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" minlength="3" value="<?= secureString($username ?? "") ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" minlength="4" value="<?= secureString($email ?? "") ?>" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" minlength="8" required>
            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" minlength="8" required>
            <p class="t12">Already have an account? <a href="<?= DIR ?>login<?= PHP_EXTENSION ?>">Login here</a>.</p>
            <button type="submit" name="action" value="register" class="boton">Register</button>
        </div>
    </form>
</div>