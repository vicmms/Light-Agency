<!-- menu -->
<nav class="menu">
<<<<<<< Updated upstream
    <div class="flex align-center">
        <label for="touch">
            <svg viewBox="0 0 100 80" width="40" height="40">
                <rect width="100" height="20"></rect>
                <rect y="30" width="100" height="20"></rect>
                <rect y="60" width="100" height="20"></rect>
            </svg>
        </label>
        <span class="pl-2">Categorias</span>
    </div>
    <input type="checkbox" id="touch">

    <ul class="slide">
        <li><a href="#">Lorem Ipsum</a></li>
        <li><a href="#">Lorem Ipsum</a></li>
        <li><a href="#">Lorem Ipsum</a></li>
        <li><a href="#">Lorem Ipsum</a></li>
        <li><a href="#">Lorem Ipsum</a></li>
        <li><a href="#">Lorem Ipsum</a></li>
        <li><a href="#">Lorem Ipsum</a></li>
    </ul>
=======
    <ul id="menu">
        <li class="parent hamburguer">
            <a href="#" class="btn">
                <i class="material-icons w3-xxxlarge">menu</i>
            </a>
            <ul class="child">
                <?php
                foreach ($category->fetchSubcategories() as $key => $cat) {
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

>>>>>>> Stashed changes
</nav>