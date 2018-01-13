<!--/sidebar-->
<?php
function rec($data,$seviye)
{
    $seviye++;
    echo "<ul>";
    foreach ($data as $x)
    {
        echo "<li>";
        echo $seviye ."-".$x->name."<br>";
        echo "</li>";
        rec($x->sub,$seviye);

    }
    echo "</ul>";
}
rec($cat,0);
?>
<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h4">Mark Stephen</h1>
            <p>Web Designer</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li><a href="#bir" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Dropdown </a>
            <ul id="bir" class="collapse list-unstyled">
                <li><a href="#Page1" aria-expanded="false" data-toggle="collapse">Page1</a>
                    <ul id="page1" class="collapse list-unstyled">
                        <a href="#">Page11</a>

                    </ul>
                </li>
                <li><a href="#Page2">Page2</a></li>
                <li><a href="#Page3">Page3</a></li>
                <li><a href="#Page4">Page4</a></li>
            </ul>
        </li>
        <li> <a href="tables.html"> <i class="icon-grid"></i>Tables </a></li>
        <li> <a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts </a></li>
        <li> <a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>
        <li> <a href="login.html"> <i class="icon-interface-windows"></i>Login Page</a></li>
    </ul><span class="heading">Extras</span>
</nav>