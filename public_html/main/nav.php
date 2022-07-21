<?php
require_once("../php/Controllers/CategoryController.php");
$category = new CategoryController;
?>
<!-- menu -->
<nav class="menu">
    <!-- <div class="flex align-center">
        <label for="parent">
            <svg viewBox="0 0 100 80" width="40" height="40">
                <rect width="100" height="20"></rect>
                <rect y="30" width="100" height="20"></rect>
                <rect y="60" width="100" height="20"></rect>
            </svg>
        </label>
        <span class="pl-2">Categorias</span>
    </div>
    <input type="checkbox" id="touch"> -->

    <ul id="menu">
        <li class="parent hamburguer">
            <a href="#">
                <svg viewBox="0 0 100 80" width="40" height="40">
                    <rect width="100" height="20"></rect>
                    <rect y="30" width="100" height="20"></rect>
                    <rect y="60" width="100" height="20"></rect>
                </svg>
            </a>
            <ul class="child">
                <?php
                foreach ($category->fetchSubcategories() as $key => $cat) {
                    echo "
                        <li class='parent'><a href='#'>" . $cat['name'] . " <span class='expand'></span></a>
                        <ul class='child'>
                    ";
                    foreach ($category->fetchSubcategories($cat['id']) as $key => $subcategory) {
                        echo "<li><a href='#'>" . $subcategory['name'] . "</a></li>";
                    }

                    echo "</ul></li>";
                }
                ?>
            </ul>
    </ul>

</nav>