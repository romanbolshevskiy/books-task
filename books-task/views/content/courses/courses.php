<?php   //include_once ROOT. '/components/Cart.php'; // підключення моделі 
        include ROOT . '/views/layout/header.php'; ?>
        
        <section>
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 padding-right">
                        <div class="features_items"><!--features_items-->
                            <div class="courses">
                                <?php    echo "<h2 class='title text-center'>All Books</h2>";
                               
                                 //PaGINATIoN
                                if(!$books_list_all){ echo "<h4>There are no information in this page</h4>";}
                                else { 
                                    foreach ($books_list_all as  $course){  ?>
                                   
                                        <div class="course">  
                                           <img src="/images/courses/course9.png">
                                            <h3><?php echo $course['title']; ?></h3>
                                            
                                            <p>Author: </p>
                                            <p><b><?php echo $course['author']; ?> </b></p>
                                            <p>Year: <?php echo $course['year'] ; ?> </p>
                                            <p>Pages: <?php echo $course['pages'] ; ?></p>
                                            
                                        </div>

                                    <?php } 
                                }  
                                echo "<div class='clear'>";
                                echo $pagination->get();
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