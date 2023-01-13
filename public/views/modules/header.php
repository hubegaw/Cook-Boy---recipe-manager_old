<div class="header flexbox">
    <a class="logo-container flexbox" href="home">
        <img src="public/img/header/logo.png" alt="Cook Boy logo">
        <div class="app-name">Cook Boy</div>
    </a>
    <nav class="navigation flexbox">
        <label for="search-bar">
            <input class="search-bar" name="search-bar" type="text" placeholder="Find a recipe">
        </label>
        <a href="categories">Categories</a>
        <a href="my_recipes">My recipes</a>
        <a href="add_recipe">Add recipe</a>
    </nav>
    <div id="parent-settings">Hello, <?php echo $_SESSION['name']?>!
        <div id="settings">
            <a href="settings">Settings</a>
            <form action="logout" method="GET">
                <button>Log out</button>
            </form>
        </div>
    </div>
</div>