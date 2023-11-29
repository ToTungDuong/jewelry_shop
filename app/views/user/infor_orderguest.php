<div class="wrapper">
<?php
@include('partials/header.php');
?>
    <main class="">
      <div class="container">
        <div class="title_main_product text-center slogan">
          <h2 class="slogan fs-1 py-5">
            Search Order
          </h2>
        </div>
        <div class="intro_product">
          <p class="text-center">
          Please enter the order number that we gave you when completing your order. If you forget the code, don't worry, contact us by phone number: <span class = "fw-bold">0866617666</span> or email: <span class = "fw-bold">tod25504@gmail.com</span> .</p>
        </div>
          </p>
          <form action="?controller=home&action=searchOrderGuest" class="d-flex" method="POST">
                <div class="input-group rounded mt-2">
                    <input type="text" class="form-control rounded" name="search_query" placeholder="Search by id order" aria-label="Search" aria-describedby="search-addon" />
                </div>
                <button type="submit" class="btn btn_big mt-2 text-light">Search</button>
        </form>
        </div>
        <div class="product_list py-5">
          <div class="container">
          <?php if (empty($search_results)): ?>
            <p>No order found matching your search query.</p>
            <?php else: ?>
                <table class="table vm no-th-brd pro-of-month">
                    <thead>
                        <tr>
                            <!-- colspan = '2' - chieu rong cua cot -->
                            <th>ID</th>
                            <th>Guest Name</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Status</th> 
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        foreach($search_results as $order){
                    ?>
                            <tr>
                            <td><?= $order['order_id'] ?></td>
                            <td>
                                <h6><?= $order['guest_name'] ?></h6>
                            </td>
                            <td>$<?= $order['total_amount'] ?></td>
                            <td><?= $order['order_date'] ?></td>
                            <td><?= $order['order_status'] ?></td>
                            
                            <td>
                            <a href="?controller=home&action=detailOrderGuest&order_id=<?= $order['order_id'] ?>" class="btn btn_2 btn-outline-search"> Detail </a></td>
                            </tr>
                    <?php        
                        }
                    ?>
                    </tbody>
                </table>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </main>
<?php
@include('partials/footer.php');
?>
</div>