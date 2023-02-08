function new_ingredient() {
    const template = document.querySelector("#ingredient-template");
    const clone = template.content.cloneNode(true);
    document.getElementById("new-ingredients").appendChild(clone);
}

function delete_ingredient() {
    const box = document.getElementById('delete-ingredient');
    box.addEventListener('click', (event) => {
        event.target.parentNode.remove();
    });
}