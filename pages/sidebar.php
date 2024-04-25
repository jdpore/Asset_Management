<aside id="sidebar" class="expand">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="fa-solid fa-computer"></i>
        </button>
        <div class="sidebar-logo">
            <a href="#">AMS</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item mb-5">
            <a class="sidebar-link">
                <i class="fa-solid fa-user"></i>
                <span>
                    <?php echo $user_full_name ?>
                </span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-caption">
                <span>Users</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="employee_data.php" class="sidebar-link">
                <i class="fa-solid fa-users"></i>
                <span>Employee Data</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="user_management.php" class="sidebar-link">
                <i class="fa-solid fa-users-gear"></i>
                <span>User Management</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-caption">
                <span>Assets</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="asset_management.php" class="sidebar-link">
                <i class="fa-solid fa-list-check"></i>
                <span>Asset Management</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="inventory.php" class="sidebar-link">
                <i class="fa-solid fa-box-open"></i>
                <span>Inventory</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-caption">
                <span>Accountability</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="accountability_forms.php" class="sidebar-link">
                <i class="fa-brands fa-wpforms"></i>
                <span>Accountability Forms</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="tracking_records.php" class="sidebar-link">
                <i class="fa-solid fa-database"></i>
                <span>Tracking Records</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="print_pull_out.php" class="sidebar-link">
                <i class="fa-solid fa-rotate-left"></i>
                <span>Pull Out Form</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-caption">
                <span>Archives</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="logs.php" class="sidebar-link">
                <i class="fa-solid fa-note-sticky"></i>
                <span>Logs</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="history.php" class="sidebar-link">
                <i class="fa-solid fa-clock-rotate-left"></i>
                <span>History</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-caption">
                <span>Customize</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="categories.php" class="sidebar-link">
                <i class="fa-solid fa-table-list"></i>
                <span>Categories</span>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
        <a href="../php/logout.php?logout='yes'" class="sidebar-link" onclick="return confirm('Logout Account?')">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>