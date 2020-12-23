<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['cart'])) {
        addToCart();
    }
    function addToCart()
    {
        if (isset($_REQUEST['cart'])) {
            include ("../add_to_cart.php");
            addCart($_POST['bookID'], $_POST['quan']);
        }

    }
    if (isset($_REQUEST['edit']) || isset($_REQUEST['delete'])) {
        if (isset($_REQUEST['edit'])) {
            $value = $_REQUEST['edit'];
            $id = $_REQUEST['bookID'];
            include ('../edit_book.php');
            editBook($id);
            
        } elseif (isset($_REQUEST['delete'])) {
            $value = $_REQUEST['delete'];
            $id = $_REQUEST['bookID'];
        }
        redirect($value, $id);
        
    }
    function redirect($value, $id)
    {
        if ($value == 'Edit') {
            
            echo "<script>";
            echo "location.replace('../edit_book.php');";
            echo "</script>";
        } elseif ($value == 'Delete') {
            include '../delete_book.php';
            delete($id);
            echo "<script>";
            echo "location.replace('../index.php');";
            echo "</script>";
        }
    }
?>