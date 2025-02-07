<?php
namespace App\Controllers;
use App\Models\Tag;
use http\Exception;
class TagController
{
    public function addtag(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submittags'])) {
            $tags = explode(',', $_POST['tags']);
            try {
                foreach ($tags as $tag) {
                    $tag = trim($tag);
                    if (!empty($tag)) {
                        $tag = new Tag(null, $tag);

                        if ($tag->AddTag()){
                            header('Location: /ZILOM_MVC/public/admin/listtags');
                        }
                    }
                }
            } catch (\PDOException $e) {
                echo "Error Adding Tags: " . $e->getMessage();
            }
        }

    }
    public function deletetag(){
        if(isset($_GET['idTag'])){
            $idTag = $_GET['idTag'];
        }

        try{
            $tag = new Tag($idTag,null);
            if($tag->DeleteTag()){
                header("Location: /ZILOM_MVC/public/admin/listtags");
                exit;
            } else {
                echo "<script>alert('Error deleting the Tag.');</script>";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}