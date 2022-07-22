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
                        <li class='parent'><a href='index.php?c=Product&a=fetchByCategory&category_id=" . $cat['id'] . "'>" . $cat['name'] . " <span class='expand'></span></a>
                        <ul class='child'>
                    ";
                    foreach ($category->fetchSubcategories($cat['id']) as $key => $subcategory) {
                        echo "<li><a href='index.php?c=Product&a=fetchByCategory&category_id=" . $subcategory['id'] . "'>" . $subcategory['name'] . "</a></li>";
                    }

                    echo "</ul></li>";
                }
                ?>
            </ul>
    </ul>
    <div class="btn-home">
        <i class="material-icons w3-xxxlarge">home</i>
    </div>

</nav>