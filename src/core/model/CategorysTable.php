<?php
    namespace core\model;
	use \PDO;
    require_once 'src/core/model/PDOData.php';
	require_once 'src/main/model/Category.php';

    class CategorysTable
    {
        /**
         * insert Category object as a record into categorys table in moneylover database
         * @param Category $newCategory
         * @return id of category
         */
        
        public function insert(Category $category)
        {        
            $conn = &PDOData::connect();

            $stmt = $conn->prepare("INSERT INTO request (name, icon, group_id, customer_id) VALUES (:name, :icon, :group_id, :customer_id)");

            $stmt->bindParam(':name', $category.getName());
            $stmt->bindParam(':icon', $category.getIcon());
            $stmt->bindParam(':group_id', $category.getGroupId());
            $stmt->bindParam(':customer_id', $category.getCustomerId());
                    
            $stmt->execute();

            $categoryId = $conn->lastInsertId();

            PDOData::disconnect();

            return $categoryId;
        }

        /**
         * Updates a Category object as a record on categoryss table in moneylover database
         * @param Category $newCategory     
         */    

        public function update(Category $category)
        {
            
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("UPDATE request SET  name =  :from_address, icon = :icon, group_id = :group_id, WHERE  id = :id and customer_id = :customer_id");
            $stmt->bindParam(':name', $category.getName());
            $stmt->bindParam(':id', $category.getId());
            $stmt->bindParam(':icon', $category.getIcon());
            $stmt->bindParam(':group_id', $category.getGroupId());
            $stmt->bindParam(':customer_id', $category.getCustomerId());
            $stmt->execute();

            PDOData::disconnect();
            return true;
        }
        /**
         * Deletes a Category object as a record from categorys table in moneylover database
         * @param id of a category     
         */
        
        public function delete($categoryId)
        {   
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("DELETE FROM categorys WHERE id = :id");                
            $stmt->bindParam(':id', $categoryId);
            $stmt->execute();

            PDOData::disconnect();
            return true;
        }

        /**
         * Get info of a Category object as a record from categorys table in moneylover database
         * @param id of a customer
         * @return array as json has properties: id, account_id, name, description, icon, amount, unit_id and created_at
         */
        public function getCategorys($customerId)
        {

            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM categorys WHERE customer_id = :customer_id OR customer_id IS NULL");
            $stmt->bindParam(':customer_id', $customerId);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row;
            }

            PDOData::disconnect();
            return $result;
        }

        public function filter($categoryId)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM categorys WHERE id = :id");
            $stmt->bindParam(':id', $categoryId);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            PDOData::disconnect();
            return json_encode($result);
                
        }

    }
?>