<?php

use yii\widgets\ListView;
?>
<section class="new-list">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post-1">
                    <img class="img-responsive" src="images/list.jpg">
                </div>
                <div class="post-2">
                    <h1> <?= $post->cb0->first_name ? $post->cb0->first_name : " " ?></h1>
                    <p><?= $post->cb0->college ? $post->cb0->college : " " ?></p>
                    <p><?= $post->cb0->mbbs_year ? $post->cb0->mbbs_year : " " ?></p>
                </div>

                <div class="post-3">
                    <p>It is a long established fact that a reader
                        Lorem Ipsum</p>
                    <span class="dates">Posted Today:11:20pm</span>
                </div>
            </div>
        </div>

    </div>
</section>



<section class="allposts">
    <div class="container">
        <div class="row">
            <div class="col-md-8 viewpost">

                <div class="posted">
                    <h6><?= $post->heading ? $post->heading . ',' : "" ?></h6>
                    <?= $post->con_text ? $post->con_text : "NO CONTENT" ?>

                    <!--    <div class="posed">
                            <a href="#"><img class="img-responsive cens" src="images/vv.jpg"></a>
                            <a href="#"><img class="play" src="images/blues.png"></a>
                        </div>-->




                </div>
            </div>

            <div class="col-md-4 chapterz">
                <div class="answerk">
                    <h6>Related Posts</h6>
                    <?=
                    ListView::widget([
                        'dataProvider' => $rpost,
                        'itemView' => '_postRelated',
                        'summary' => '',
                    ]);
                    ?>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="mbbs-answer">
    <div class="container">
        <div class="row">


            <div class="col-md-8 col-sm-8 col-xs-12 ">
                <h6>Comments</h6>
                <div class="answer-main">

                    <div class="answerd">
                        <div class="answer-left">
                            <img class="ans" src="images/de.jpg">
                            <h2>sasha</h2>
                            <p>Calicut university</p>
                            <p>1 Year</p>
                        </div>
                        <div class="answer-right">
                            <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit, aliua. Lorem ipsum ? </h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in elit ipsum. Mauris et suscipit velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat, sapien ut scelerisque euismod, augue urna euismod sem, id porttitor mauris sem nec justo. Donec nisi felis, ultrices in mi sed, hendrerit sodales risus. Integer suscipit lacus sit amet arcu sodales egestas. </p>

                            <span class="june">June 12 2016 - 7 :05: 30 Am</span>
                        </div>
                    </div>


                    <div class="answerd">
                        <div class="answer-left">
                            <img class="ans" src="images/de.jpg">
                            <h2>sasha</h2>
                            <p>Calicut university</p>
                            <p>1 Year</p>
                        </div>
                        <div class="answer-right">
                            <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit, aliua. Lorem ipsum ? </h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in elit ipsum. Mauris et suscipit velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat, sapien ut scelerisque euismod, augue urna euismod sem, id porttitor mauris sem nec justo. Donec nisi felis, ultrices in mi sed, hendrerit sodales risus. Integer suscipit lacus sit amet arcu sodales egestas. </p>

                            <span class="june">June 12 2016 - 7 :05: 30 Am</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php

