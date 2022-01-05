<!-- main wrapper end -->
<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/SmoothScroll.min.js"></script>
    <script src="assets/js/swiper.min.js"></script> 
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/ui_range_slider.js"></script>
    <script src="assets/js/custom.js"></script>

    <script>
        // addToCart({id:'unique',name:"p12"})
        // removeFromCart()
        function addToCart(item)
        {
             
            var cartItems = localStorage.getItem('cartItems');
            if(cartItems)
            {
                var cartItemsObj = JSON.parse(cartItems);
                var len = Object.keys(cartItemsObj).length;
                localStorage.setItem('cartItems', JSON.stringify({...cartItemsObj,[item.id]:item}));
            }else
            {
                localStorage.setItem('cartItems', JSON.stringify({[item.id]:item}));
            }
            addCartBtnToRemoveBtn(item.id,item);
        }
        function removeFromCart(item_id)
        { 
            var cartItems = localStorage.getItem('cartItems');
            if(cartItems)
            {
                var cartItemsObj = JSON.parse(cartItems);
                var item = cartItemsObj[item_id];
                delete cartItemsObj[item_id];
                localStorage.setItem('cartItems', JSON.stringify(cartItemsObj));
                removeCartBtnToAddBtn(item_id,item);
            }

        }
        function EmptyCart()
        {

        }
        function searchCartItems(id)
        {
            var cartItems = localStorage.getItem('cartItems');
            if(cartItems)
            {
                var cartItemsObj = JSON.parse(cartItems);
                var item =  cartItemsObj[item_id];
               if(item)
               {

               }else
               {
                
               }
            }
        }


        function addCartBtnToRemoveBtn(id,item)
        {
            $("#cartBtn-"+id).replaceWith(`<button style="margin-left:20px" id="removeCart-${id}" class="btn btn-danger"onclick='removeFromCart(${id},${JSON.stringify(item)})' >Remove</button>`);
            
        }
        function removeCartBtnToAddBtn(id,item)
        {
            $("#removeCart-"+id).replaceWith(`   <button style="margin-left:20px"  id="cartBtn-${id}" class="cv-price-cart" onclick='addToCart(${item})' >
                            Add to Cart
                            <i style="margin-left:0px" class="fas fa-cart-plus" aria-hidden="true"></i>
                        </button>`);
        }

        function retriveCart()
        {
            var cartItems = localStorage.getItem('cartItems');
            if(cartItems)
            {
                var cartItemsObj = JSON.parse(cartItems);
                var items = Object.values(cartItemsObj);
                items.map(function(item){
                    console.log(item)
                    var inHtml =`<div  class="cv-product-box cv-product-item cv-hand">
                                        <div class="cv-product-img">
                                            <img style="height:200px;width:auto" src="${item.img}" alt="image" class="img-fluid" />
                                            <div class="cv-product-button">
                                                <a href="product-single?token=${item.id}" class="cv-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 461.312 461.312">
                                                        <g>
                                                            <path d="M230.656,156.416c-40.96,0-74.24,33.28-74.24,74.24s33.28,74.24,74.24,74.24s74.24-33.28,74.24-74.24
                                                        S271.616,156.416,230.656,156.416z M225.024,208.64c-9.216,0-16.896,7.68-16.896,16.896h-24.576
                                                        c0.512-23.04,18.944-41.472,41.472-41.472V208.64z"></path>
                                                        </g>
                                                        <g>
                                                            <path d="M455.936,215.296c-25.088-31.232-114.688-133.12-225.28-133.12S30.464,184.064,5.376,215.296
                                                        c-7.168,8.704-7.168,21.504,0,30.72c25.088,31.232,114.688,133.12,225.28,133.12s200.192-101.888,225.28-133.12
                                                        C463.104,237.312,463.104,224.512,455.936,215.296z M230.656,338.176c-59.392,0-107.52-48.128-107.52-107.52
                                                        s48.128-107.52,107.52-107.52s107.52,48.128,107.52,107.52S290.048,338.176,230.656,338.176z"></path>
                                                        </g>
                                                    </svg> View detail</a>
                                                <a href="tel:345678945678" class="cv-btn">
                                                <i style="margin-left:0px" class="fa fa-phone" aria-hidden="true"></i>
                                                    Call for Quote</a>
                                            </div>
                                        </div>
                                        <div class="cv-product-data">
                                            <a href="javascript:;" class="cv-price-title">${item.name}</a>
                                            <p class="cv-pdoduct-price">$${item.price}</p>
                                            <button class="cv-btn">
                                            <i style="margin-left:0px" class="fas fa-cart-plus" aria-hidden="true"></i>
                                            Remove from Cart</button>
                                            <!-- <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></p> -->
                                        </div>
                                    </div>`; 

                                    $("#cartbody").append(inHtml);
                })

            } 
        }
    </script>
</body>