

function displayFeature() {
    const template = document.querySelector("#feature-template");

    const clone = template.content.cloneNode(true);

    const img = clone.querySelector("img");
    img.src = "public/img/common/default-dish.png";
    img.alt = "default-dish-image";

    const span = clone.querySelector("span");
    span.text = "";

    const div = clone.querySelector("div[class='feature-text']")
    div.text = "";

    recipeContainer.appendChild(clone);
}