function increase(className, maxStock, productId){
    var oldval=parseInt(document.getElementById(className).value);
    if (document.getElementById(className).value <= maxStock-1){
    document.getElementById(className).value=parseInt(document.getElementById(className).value)+1;
    console.log(productId+"/"+document.getElementById(className).value);
    $.post("<?php echo base_url().'index.php/Product/increaseCartQty/';?>"+productId+"/"+oldval,
       function(data) {
            alert(data+"a");
       }, 'json');
}
}





function decrease(className){
if(parseInt(document.getElementById(className).value) >1){
    document.getElementById(className).value=parseInt(document.getElementById(className).value)-1;
    console.log(parseInt(document.getElementById(className).value));
}
}