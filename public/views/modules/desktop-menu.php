<div id="parent-settings">Hello, <?php echo $_SESSION['name']?>!
    <div id="settings">
        <a href="settings">Settings</a>
        <form action="logout" method="GET">
            <button id="logout-btn">Log out</button>
        </form>
    </div>
</div>