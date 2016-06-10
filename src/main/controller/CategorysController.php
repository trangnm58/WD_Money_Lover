<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categorys Controller
 *
 * @property \App\Model\Table\CategorysTable $Categorys
 */
class CategorysController extends AppController
{
	/**
     * Add category into Database
     *
     * @param Category $newCategory
     * @return Id of that category added
     */
    public function addCategory(Category $newCategory)
    {
    	$categorysTable = new CategorysTable();    	
    	$categorysTable.insert($newCategory);    		    	
    }

    /**
     * Updates categoy info
     *
     * @param Cateogry $category
     * @return boolean variable, it is true if set successfully
     */
    public function updateCategoryInfo(Category $newCategory)
    {
    	$categorysTable = new CategorysTable();
    	if ($categorysTable.update($newCategory)) {
    		return true;
    	} else {
    		return false;
    	}

    }
    /**
     * Merge to category1 object to category2 object and all transaction and other info of category 1 to become category2
     *
     * @param Category $category1 and $category2
     * @return boolean variable, it is true if set successfully
     */
    public function mergeCategory (Category $cate1, Category $cate2)
    {
        $categorysTable = new CategorysTable();

    	$conn = new mysqli_connect("localhost","moneylover","12345678","moneylover");
    	if(!conn) {
    		return false;
    	} else {
    		$sql1 = "UPDATE recurring_transactions SET category_id = $cate2.getId() WHERE category_id = $cate1.getId()";
    		$sql2 = "UPDATE transactions SET category_id = $cate2.getId() WHERE category_id = $cate1.getId()";


	        if (mysqli_query($conn,$sql1) && mysqli_query($conn, $sql2)) {  
                $categorysTable.delete($cate1.getId());          
		        $conn->close();
		        return true;
		    } else {
	        return false;
	       	}
    	}    	
        
    }

	/**
     * Removes a Category object as a record from categorys table in moneylover database
     * @param id of a category
     * @return id of category object removed successfully
     */
    public function removeCategory($_id)
    {
    	$categorysTable = new CategorysTable();
        $categorysTable.delete($_id);    	
    }
}