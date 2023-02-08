<div class="hamburger-menu">
    <button class="dropdown" onclick="openMenu()"></button>
    <ul id="menu-box" class="hidden">
        <li>
            <img src="public/img/menu-mobile/jigsaw.png" class="icon" alt="categories">
            <a href="categories">Categories</a>
        </li>
        <li>
            <img src="public/img/menu-mobile/book.png" class="icon" alt="my recipes">
            <a href="my_recipes">My recipes</a>
        </li>
        <li>
            <img src="public/img/common/add.png" class="icon" alt="add recipe">
            <a href="add_recipe">Add recipe</a>
        </li>
        <li>
            <img src="public/img/menu-mobile/user.png" class="icon" alt="add recipe">
            <a href="settings">settings</a>
        </li>
        <li>
            <img src="public/img/menu-mobile/logout.png" class="icon" alt="logout">
            <form action="logout" method="GET">
                <button id="logout-btn">Log out</button>
            </form>
        </li>
    </ul>
</div>