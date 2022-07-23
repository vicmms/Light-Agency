<?php
require_once("../php/Models/Category.php");
$category = new Category;
?>
<!-- menu -->
<nav class="menu">
    <ul id="menu">
        <li class="parent hamburguer">
            <a href="#" class="btn">
                <i class="material-icons w3-xxxlarge">menu</i>
            </a>
            <ul class="child">
                <?php
                foreach ($category->fetchParents() as $key => $cat) {
                    echo "
                        <li class='parent'><a href='index.php?c=Product&a=fetchByCategory&category_id=" . $cat['id'] . "&category_name=" . $cat['name'] . "'>" . $cat['name'] . " <span class='expand'></span></a>
                        <ul class='child'>
                    ";
                    foreach ($category->fetchSubcategories($cat['id']) as $key => $subcategory) {
                        echo "<li><a href='index.php?c=Product&a=fetchByCategory&category_id=" . $subcategory['id'] . "&category_name=" . $subcategory['name'] . "'>" . $subcategory['name'] . "</a></li>";
                    }

                    echo "</ul></li>";
                }
                ?>
            </ul>
    </ul>
    <div class="btn-home">
        <a href="index.php"><i class="material-icons icon-large">home</i></a>
    </div>

</nav>