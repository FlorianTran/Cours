/*function increase(className, maxStock, productId){
    var oldval=parseInt(document.getElementById(className).value);
    if (document.getElementById(className).value <= maxStock-1){
    document.getElementById(className).value=parseInt(document.getElementById(className).value)+1;
    console.log(productId+"/"+document.getElementById(className).value);
    $.post("<?php echo base_url().'index.php/Product/increaseCartQty/';?>"+productId+"/"+oldval,
    function(data) {
        alert(data+"a");
    }, 'json');
}}

function decrease(className){
if(parseInt(document.getElementById(className).value) >1){
    document.getElementById(className).value=parseInt(document.getElementById(className).value)-1;
    console.log(parseInt(document.getElementById(className).value));
}}*/



function increase(className, maxStock, productId) {
    var oldval = parseInt(document.getElementById(className).value);
    if (document.getElementById(className).value <= maxStock - 1) {
        document.getElementById(className).value = parseInt(document.getElementById(className).value) + 1;
        $.post(baseUrl+'index.php/Product/increaseCartQty/' + productId + "/" + oldval,
            function(data) {
                alert(data + "a");
            }, 'json'
        );
    }
}

function decrease(className, productId) {

    var oldval = parseInt(document.getElementById(className).value);
    if (parseInt(document.getElementById(className).value) > 1) {
        document.getElementById(className).value = parseInt(document.getElementById(className).value) - 1;
        $.post(baseUrl+'index.php/Product/decreaseCartQty/'+ productId + "/" + oldval,
            function(data) {
                alert(data + "a");
            }, 'json'
        );
    }
}

function updateCookieValue(e, productId, productMaxQty) {
    console.log(productId);
    console.log(e.target.value);
    if (parseInt(e.target.value) > parseInt(productMaxQty)) {
        e.target.value = productMaxQty;
    } else if (parseInt(e.target.value) == 0) {
        e.target.value = 1;
    } else {
        $.post(baseUrl+'index.php/Product/updateCartQty/' + productId + "/" + e.target.value,
            function(data) {
                alert(data + "a");
            }, 'json'
        );
    }
}

// obj.addEventListener("change", updateCookieValue);
const overlay = document.getElementById("overlay");
function openNav() {
    document.getElementById("sidenavcart").style.transform = "translateX(0px)"
    document.getElementById("overlay").classList.add("isVisible")
    document.body.classList.add("notScrollable")
    
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("sidenavcart").style.transform = "translateX(400px)"
    document.getElementById("overlay").classList.remove("isVisible")
    document.body.classList.remove("notScrollable")
}

document.addEventListener("click", (e) => {
    let clickedElem = e.target;
    let overlay = document.getElementById("overlay");
    if (clickedElem == overlay) {
        closeNav();
    }
});