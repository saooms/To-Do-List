//#region btns
addCardbtn = document.getElementsByClassName("addcard");
//#endregion

//#region function binding
for(var i = 0; i < addCardbtn.length; i++) {
    var btn = addCardbtn[i];
    btn.onclick = function() {
        addCard();
    }
}
//#endregion

function addCard() {
    document.getElementById("cardmaker").className += "visible";
    document.getElementById("lists").className += "hidden"
    console.log("hello?");
}

console.log("hi?");