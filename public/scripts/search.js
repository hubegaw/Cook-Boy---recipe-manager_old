const search = document.querySelector('input[placeholder="keyword"]');
const recipeContainer = document.querySelector('.recipes-container');

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (recipes) {
            recipeContainer.innerHTML = "";
            loadRecipes(recipes)
        });
    }
});

function loadRecipes(recipes) {
    recipes.forEach(recipe => {
        console.log(recipe);
        createRecipe(recipe);
    });
}

function createRecipe(recipe) {
    const template = document.querySelector("#recipe-template");

    const clone = template.content.cloneNode(true);
    const a = clone.querySelector("a");
    a.href = "my_recipes/" + recipe.id;

    const img = clone.querySelector("img");
    img.src = "public/img/common/default-dish.png";
    img.alt = "default-dish-image";

    const divName = clone.querySelector(".name");
    divName.innerHTML = recipe.title;

    const divTime = clone.querySelector(".time");
    divTime.innerHTML = recipe.time;

    const divPortions = clone.querySelector(".portions");
    divPortions.innerHTML = recipe.portions;

    recipeContainer.appendChild(clone);
}