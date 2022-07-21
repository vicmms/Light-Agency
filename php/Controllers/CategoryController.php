<?php
require_once("../php/Models/Category.php");

class CategoryController
{

    private $category;

    function __construct()
    {
        $this->category = new Category();
    }
    // show categories
    function index()
    {
        return $this->category->fetchParents();
    }
    function fetchSubcategories($parent_id = null)
    {
        return $this->category->fetchSubcategories($parent_id);
    }
}
