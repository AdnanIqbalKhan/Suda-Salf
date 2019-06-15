<?php
session_start();
if(isset($_SESSION["user"])){

    switch ($_SERVER['PHP_SELF']) {
        case '/login.php':
        case '/register.php':
            header("Location: /index.php");
            break;
        case '/about.php':
        case '/index.php':
        case '/category.php':
        case '/subcategory.php':
        case '/contact.php':
        case '/newProducts.php':
        case '/saleProducts.php':
        case '/single.php':
        case '/checkout.php':
        case '/orderhistory.php':
        case '/profile.php':
            if($_SESSION["user_type"]=="Admin"){
                header("Location: /admin/index.php");
            }else if($_SESSION["user_type"]=="Shopkeeper"){
                header("Location: /shopkeeper/index.php");
            }
            break;        
        case '/shopkeeper/index.php':
        case '/shopkeeper/shopProducts.php':
        case '/shopkeeper/select.php':
        case '/shopkeeper/profile.php':
            if($_SESSION["user_type"]=="Admin"){
                header("Location: /admin/index.php");
            }else if($_SESSION["user_type"]=="Customer"){
                header("Location: /index.php");
            }
            break;
        case '/admin/index.php':
        case '/admin/feedback.php':
        case '/admin/user.php':
        case '/admin/profile.php':
            if($_SESSION["user_type"]=="Shopkeeper"){
                header("Location: /shopkeeper/index.php");
            }else if($_SESSION["user_type"]=="Customer"){
                header("Location: /index.php");
            }
            break;
        default:
            header("Location: /index.php");
    }
    
}else{
    //not login
    switch ($_SERVER['PHP_SELF']) {
        case '/about.php':
        case '/index.php':
        case '/category.php':
        case '/subcategory.php':
        case '/contact.php':
        case '/newProducts.php':
        case '/saleProducts.php':
        case '/single.php':
        case '/login.php':
        case '/register.php':
        case '/faq.php':
            break;
        case '/checkout.php':
        case '/admin/index.php':
        case '/admin/feedback.php':
        case '/admin/user.php':
        case '/shopkeeper/index.php':
        case '/orderhistory.php':
        case '/profile.php':
            header("Location: /login.php");
            break;
        default:
            header("Location: /index.php");
    }
}

?>