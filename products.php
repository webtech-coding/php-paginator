<?php
include('resources/database/items.php');
include('resources/database/paginator.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paginator-products</title>
    <link rel="stylesheet" href="resources/styles/main.css">
    
</head>
<body>
    <h1>Paginator</h1>
    <?php
        $page=(empty($_GET['page'] || $_GET['page']==0 || isset($_GET['page'])))?1:$_GET['page'];
        $products=new Products();
        $total=$products->count_Items();
        $paginator=new Paginator($page,2,$total);
        $offset=$paginator->itemOffset();
        $products=($products->get_Items(2,$offset));
    ?>

    <div class="products">
        <?php
           foreach ($products as $product): ?>
            <div class="item">
               <h2><?= $product['title']?></h2>
               <img src="<?=$product['image']?>">
               <p><?=$product['description']?></p>
            </div>
        <?php endforeach?>
    </div>
    <div class="paginator">
        <?php if($paginator->isPrevious()):?>
            <a href="products.php?page=<?=$paginator->previous_page()?>">Previous</a>
        <?php endif ?>
        <?php if($paginator->isNext()):?>
            <a href="products.php?page=<?=$paginator->next_page()?>">Next</a>
        <?php endif ?>
        
       
    </div>

   

    <script src="resources/js/scripts/index.js"></script>
</body>
</html>