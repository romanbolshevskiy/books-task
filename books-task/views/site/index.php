        <?php include ROOT . '/views/layout/header.php'; ?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                           <div class="panel-group category-products">
                                <div class="search">
                                 
                                    <h2><p><b> Форма для загрузки файлов </b></p></h2>
                                    <form action="/" method="post" enctype="multipart/form-data">
                                      <input type="file" name="filename"><br> 
                                      <input type="submit" value="Загрузить"><br>
                                    </form>
                                    <hr>
                                    <h4><a href="/upload/" style="  padding: 3%;  text-align:  center;  background: lightblue;  color: brown;  border-radius:  10px;   display:  block;">Залити дані з файлу в  бд!</a></h4>

                                    <hr>
                                    <h4><a href="/read/" style="  padding: 3%;  text-align:  center;  background: lightblue;  color: brown;  border-radius:  10px;   display:  block;">Переглянути зміст файла!</a></h4>
                                </div>
                           </div>

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">

                        <hr/>

                        <div class="recommended_items"><!--recommended_items-->
                            <h2 class="title text-center">All books</h2>

                            <div class="slider"   >
                                <?php 
                                    if(!$booksAll){
                                        echo "<h2>There arent any books</h2>";
                                    }
                                    else{
                                    foreach ($booksAll as $course){
                                 
                                    $path = 'images/courses/course'.$course['id_c'].'.png';
                                    $file = "/".$path;
                                    if (file_exists($_SERVER['DOCUMENT_ROOT'].$file)) {
                                        $file1 = $file;
                                    }
                                    else {  
                                        $file1 = '/images/courses/none.png';
                                    }   
                                    ?>
                                    <div class="item">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="/images/courses/course9.png">
                                                    <h2><?php echo $course['title']; ?></h2>
                                                    
                                                    <p>Author:</p>
                                                    <p><b><?php echo $course['author']; ?> </b></p>
                                                    <p>Year: <?php echo $course['year'] ; ?> </p>
                                                    <p>Pages: <?php echo $course['pages'] ; ?></p>
                                                
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                } ?>
                            </div>

                            <a class="left recommended-item-control" id="prev"> < </a>
                            <a class="right recommended-item-control" id="next"> > </a>

                        </div><!--/recommended_items-->
                 
                        <hr/>

 
                    </div>
                </div>

            </div>
        </section>
        <script type="text/javascript">
                                
          

        </script>
       <?php  include ROOT. '/views/layout/footer.php'; // підключення моделі  ?>
    </body>
</html>