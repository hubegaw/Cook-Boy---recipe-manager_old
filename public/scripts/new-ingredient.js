document.getElementById("add-ingredient").onclick = function () {
    var div = document.createElement(`<div class="new-ingredient">
                <input name="ingredient[]" type="text" id="ingredient" required placeholder="ingredient" minlength="3" maxlength="20">
                    <input name="quantity[]" type="number" id="quantity" required placeholder="quantity" min="0" max="99">
                        <select>
                            <?php if(isset($measures)) foreach($measures as $measure):?>
                            <option><?=$measure?></option>
                            <?php endforeach;?>
                        </select>
                </div>`);
    document.getElementById("ingredients").appendChild(div);
}