<div class="profile">
    <div class="profile-container">
        <header class="profile-header">
            <h1><?= secureString($user['name'] ?? 'User'); ?></h1>
        </header>
        <nav class="profile-nav">
            <a href="?tab=overview" class="<?= $active_tab === 'overview' ? 'active' : ''; ?>">Overview</a>
            <?= isAdmin() ? '<a href="'. DIR .'admin' . PHP_EXTENSION . '">Admin</a>' : '' ?>
            <a href="?tab=settings" class="<?= $active_tab === 'settings' ? 'active' : ''; ?>">Settings</a>
            <a href="?tab=activity" class="<?= $active_tab === 'activity' ? 'active' : ''; ?>">Activity</a>
        </nav>
        <hr>
        <div class="profile-content">
            <?php if ($active_tab === 'overview'): ?>
                <p>Welcome to your profile overview, <?= secureString($user['name'] ?? 'User'); ?>!</p>
            <?php elseif ($active_tab === 'settings'): ?>
                <p>Here you can change your settings.</p>
            <?php elseif ($active_tab === 'activity'): ?>
                <p>Here is your recent activity.</p>
            <?php else: ?>
                <p>Welcome to your profile, <?= secureString($user['name'] ?? 'User'); ?>!</p>
            <?php endif; ?>

            <?php if($active_tab === 'overview'): ?>
                <div style="margin: 20px 0;"></div>
                <ul style="list-style: none;">
                    <li><strong>Name:</strong> <?= secureString($user['name'] ?? ''); ?></li>
                    <li><strong>Email:</strong> <?= secureString($user['email'] ?? ''); ?></li>
                    <li><strong>Role:</strong> <?= secureString($user['rol'] ?? ''); ?></li>
                    <li><strong>Status:</strong> <?= $user['is_active'] ? 'Active' : 'Inactive'; ?></li>
                    <li><strong>Registered:</strong> <?= secureString($user['date_registered'] ?? ''); ?></li>
                    <li><strong>Last login:</strong> <?= secureString($user['date_last_login'] ?? ''); ?></li>
                </ul>
            <?php endif; ?>

            <?php if($active_tab === 'settings'): ?>
                <div style="margin: 20px 0;"></div>
                <small><i>Not found...</i></small>
                <form method="post" action="?tab=settings">
                    <h2>Update Profile</h2>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?= secureString($user['name'] ?? ''); ?>" placeholder="Enter your name" minlength="3" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?= secureString($user['email'] ?? ''); ?>" placeholder="Enter your email" minlength="4" required>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" minlength="8" required>
                    <button type="submit" name="action" value="update-profile" class="boton">Update</button>
                </form>
                <hr style="margin: 20px 0;">
                <form method="post" action="?tab=settings">
                    <h2>Change Password</h2>
                    <label for="current-password">Current Password:</label>
                    <input type="password" id="current-password" name="current-password" placeholder="Enter your current password" minlength="8" required>
                    <label for="new-password">New Password:</label>
                    <input type="password" id="new-password" name="new-password" placeholder="Enter your new password" minlength="8" required>
                    <label for="confirm-password">Confirm Password:</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your new password" minlength="8" required>
                    <button type="submit" name="action" value="update-password" class="boton">Update</button>
                </form>
                <hr style="margin: 20px 0;">
                <form method="post" action="?tab=settings" style="background-color: #f8d7da; padding: 20px; border-radius: 5px;">
                    <h2>Delete Account</h2>
                    <p>Deleting your account is permanent and cannot be undone.</p>
                    <select name="confirm_delete" style="width:100%; max-width: 100%;" required>
                        <option value="">No, I do not want to delete my account</option>
                        <option value="yes">Yes, I want to delete my account</option>
                    </select>
                    <button type="submit" name="action" value="delete-account" class="boton" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
                </form>
            <?php endif; ?>

            <?php if($active_tab === 'activity' && !empty($user["history"])): ?>
                <div style="margin: 20px 0;"></div>
                <ul style="list-style: none;">
                    <?php foreach(array_reverse($user["history"]) as $key => $event): ?>
                        <li><?= secureString($event[0]); ?>: <?= secureString($event[1]); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>