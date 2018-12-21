<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <a class="navbar-brand" href="index">
        <img src="./image/logo2.png" class="img-fluid" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav ">
            <?php
            $profilePage = 'manage_user';
            if(isset($_SESSION['memberID']))
                if($_SESSION['memberID'] == 0)
                    $profilePage = 'admin';
            if(isset($_SESSION['name'])) {
                if(isset($_SESSION['memberID']) and $_SESSION['memberID'] ==0){
                     echo '<li class="nav-item ">
                                <a class="nav-link" href="admin"><i class="fas fa-cogs"></i> Admin Page</a>
                         </li>';
                }else{
                echo '
                    <li class="nav-item ">
                        <a class="nav-link" href="manage_user"><i class="fas fa-user-cog"></i> '.$_SESSION['name'].'</a>
                    </li>';
                }
                echo '<li class="nav-item ">
                        <a class="nav-link" href="do_logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    </li>';
            }
            else
                echo '<li class="nav-item ">
                        <a class="nav-link" href="login"><i class="fas fa-sign-in-alt"></i>Login</a>
                    </li>' ;
            ?>
            <li class="nav-item ">
                <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i>*<?php echo $_SESSION['shopping_cart']?></a>
            </li>
            <li class="nav-item ">
                <div class="search-bar">
                    <input type="text" placeholder="..." required/>
                    <div class="search-icon"></div>
                </div>
            </li>
        </ul>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav ">
            <li class="nav-item ">
                <a class="nav-link " href="index">Home<span class="sr-only active">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="products">Products</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="promotions">Promotions</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo $profilePage;?>">Profile</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">Contacts</a>
            </li>
        </ul>
    </div>
</nav>