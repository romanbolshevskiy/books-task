<?php   //include_once ROOT. '/components/Cart.php'; // підключення моделі 
        include ROOT . '/views/layout/header.php'; ?>
        
        <section>
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 padding-right">
                        <div class="features_items"><!--features_items-->
                            <div class="courses">
                                <h3>Вміст файлу</h3>
                               
                                <?php
                                foreach ($content  as $k=>$v) { // читаем построчно  
                                    $line = explode ('  ', $v); //string
                                    for($i=0;$i<=count($line);$i++){
                                        echo $line[$i]."<br>";
                                    } 
                                }

                                ?>
                               
                            </div>
                        </div><!--features_items-->

                    </div>
                </div>
            </div>
        </section>

       <?php  include ROOT. '/views/layout/footer.php'; // підключення моделі  ?>
    </body>
</html>