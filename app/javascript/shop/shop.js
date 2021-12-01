function addtocart(productoid){
    $.get('../shopcontroller/addtocart', { productoid:productoid}, function(response){

        console.log(response);
    })
    
}