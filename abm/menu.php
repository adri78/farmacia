
<?php

$Menu='<li><a href="abmZonas.php">ABM Zonas </a></li>
                <li><a href="abmFarma.php">ABM Farmacias</a></li>
                <li><a href="collapsible.html">Javascript</a></li>
                <li><a href="mobile.html">Mobile</a></li>';
?>

   <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Colfarmabrowm</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
<?php echo $Menu ; ?>
            </ul>
         </div>
   </nav>

   <ul class="sidenav" id="mobile-demo">
<?php echo $Menu ; ?>
    </ul>