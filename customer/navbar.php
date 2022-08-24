<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
       
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
         <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
        
        <link rel = "icon" href = "images/logo.png" type = "image/png">
    </head>
    <body>
       
        <!-- header -->
        <header class = "header" id = "header">
<img src="../img/newLG.png"  style="width: 45px;height: 45px;">
            <div class = "head-top"  style="margin-top: -45px; margin-left: 50px;">
        
                <div class = "site-name" >

                    <!--<span style="font-size:30px;
                    font-family: merienda;"> H2Order</span>-->

                    <img src="../img/H2.png">
                </div>
                <div class = "site-nav">
                    <span id = "nav-btn"><i class = "fas fa-bars"></i></span>
                </div>
            </div>

           
        </header>
        <!-- end of header -->

        <!-- side navbar -->
        <div class = "sidenav" id = "sidenav">
            <span class = "cancel-btn" id = "cancel-btn">
                <i class = "fas fa-times"></i>
            </span>

            <ul class = "navbar">
                <li>
                <a href = "../customer/home.php">
                    <i class='fa fa-home '  style="color:black;text-shadow: 2px 2px white;font-size: 20px;">
                    </i>  Home</a>
                </li>

                  <li>
                    <a href = "../customer/list_of_merchants.php">
                <i class='fas fa-clipboard-list' style="color:black;text-shadow: 2px 2px white;font-size: 20px;">
                    </i>&nbsp List of Merchants</a>
                </li>

                 <li>
                    <a href = "../customer/cart.php">
                <i class='fas fa-cart-plus' style="color:black;text-shadow: 2px 2px white;font-size: 20px;">
                    </i> Cart List</a>
                </li>

                  <li>
                <a href = "../customer/purchase.php">
                    <i class='bx bxs-purchase-tag' style="color:black;text-shadow: 2px 2px white;font-size: 20px;">
                    </i> Purchase List</a>
                </li>

                  <li>
                <a href = "../customer/purchase_history.php">
                    <i class='bx bxs-calendar' style="color:black;text-shadow: 2px 2px white;font-size: 20px;">
                    </i> Purchase History</a>
                </li>

                <li>
                <a href = "../customer/settings.php">
                <i class='fas fa-cog'  style="color:black;text-shadow: 2px 2px white;font-size: 20px;">
                    </i>&nbsp Account Settings</a>
                </li>

                <li>
                <a href = "../customer/logout.php">
                    <i class='fas fa-power-off' style="color:black;text-shadow: 2px 2px white;font-size: 20px;">
                    </i> Logout</a>
                </li>

           
        </div>
        <!-- end of side navbar -->

        <!-- fullscreen modal -->
        <div id = "modal"></div>
        <!-- end of fullscreen modal -->

        
        
      <style>
         


:root{
    --transition: all 0.7s ease;
    --yellow: #f9d342;
    --dark: #292826;
}
*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    font-family: "Poppins", sans-serif;
   
}
html{
    scroll-behavior: smooth;
}

.btn{
    font-size: 16px;
    text-transform: uppercase;
    font-weight: 600;
    border: none;
    border-radius: 5px;
    padding: 10px;
    width: 140px;
    display: block;
    margin: 15px auto;
    cursor: pointer;
    transition: var(--transition);
}
.btn:hover{
    opacity: 0.85;
}
.flex{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}


/* header */
.header{
    background: no-repeat;
    min-height: 8vh;
   
    
    padding: 10px;
    display: flex;
    flex-direction: column;
    align-content: stretch;
    
}
.head-top{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.head-top span{
    cursor: pointer;
    letter-spacing: 2px;
    transition: var(--transition);
    align-items: center;
}
.head-top span:hover{
    color: black;
}
.head-bottom{
    flex: 1;
    text-align: center;
    width: 80vw;
    margin: 0 auto;
}
.head-bottom h2{
    padding: 22px 0;
    font-size: 45px;
    border-bottom: 1px solid #fff;
}
.head-bottom p{
    opacity: 0.7;
    font-size: 20px;
    margin: 45px auto;
    width: 60vw;
}
.head-btn{
    margin: 20px 0;
    font-size: 20px;
    font-weight: bold;
    border: 3px solid black;
    background: transparent;
    padding: 13px 20px;
    background: rgba(0, 0, 0, 0.3);
    color: black;
    cursor: pointer;
    transition: var(--transition);
}
.head-btn:hover{
    background: transparent;
}
@media(max-width: 500px){
    .head-btn{
        font-size: 17px;
    }
    .head-bottom h2{
        font-size: 28px;
    }
    .head-bottom p{
        font-size: 17px;
        margin: 20px auto;
    }
}

/* side nav */
.sidenav{
    background: #ecf0f3;
    color: #666;
    position: fixed;
    top: 0;
    bottom: 0;
    right: -100%;
    width: 300px;
    padding: 20px;
    transition: var(--transition);
    z-index: 10;
}

/********/
.sidenav.show{
    right: 0;
}
/*************/
.cancel-btn{
    position: absolute;
    right: 25px;
    font-size: 22px;
    cursor: pointer;
    transition: var(--transition);
}
.cancel-btn:hover{
    opacity: 0.7;
}
.navbar{
    margin-top: 5px;
    list-style: none;
    padding: 20px;

}
.navbar li a{
    color: black;
    text-transform: capitalize;
    text-decoration: none;
    padding: 10px 0;
    display: block;
   border-radius: 10px;
    opacity: 0.8;
    letter-spacing: 1.5px;
    transition: var(--transition);
    width: 200px;
    font-weight: 500;
}
.navbar li a:hover{
    padding-left: 12px;
    box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
}

@media(max-width: 400px){
    .sidenav{
        width: 100vw;
    }
}


.showModal{
    position: fixed;
    background: transparent;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 5;
}
      </style>

<script type="text/javascript">
    const navBtn = document.getElementById('nav-btn');
const cancelBtn = document.getElementById('cancel-btn');
const sideNav = document.getElementById('sidenav');
const modal = document.getElementById('modal');

navBtn.addEventListener("click", function(){
    sideNav.classList.add('show');
    modal.classList.add('showModal');
});

cancelBtn.addEventListener('click', function(){
    sideNav.classList.remove('show');
    modal.classList.remove('showModal');
});

window.addEventListener('click', function(event){
    if(event.target === modal){
        sideNav.classList.remove('show');
        modal.classList.remove('showModal');
    }
});
</script>

    </body>
</html>