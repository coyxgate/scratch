<?php
/**
 * This layout is about the mobile adaptive layout.
 * User: Coy QIU
 * Date: 16/4/7
 * Time: 4:02pm
 */


/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">

        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <script type="text/javascript">
            function loading(canvas, options) {
                this.canvas = canvas;
                if (options) {
                    this.radius = options.radius || 12;
                    this.circleLineWidth = options.circleLineWidth || 4;
                    this.circleColor = options.circleColor || 'lightgray';
                    this.moveArcColor = options.moveArcColor || 'gray';
                } else {
                    this.radius = 12;
                    this.circelLineWidth = 4;
                    this.circleColor = 'lightgray';
                    this.moveArcColor = 'gray';
                }
            }
            loading.prototype = {
                show: function() {
                    var canvas = this.canvas;
                    if (!canvas.getContext) return;
                    if (canvas.__loading) return;
                    canvas.__loading = this;
                    var ctx = canvas.getContext('2d');
                    var radius = this.radius;
                    var me = this;
                    var rotatorAngle = Math.PI * 1.5;
                    var step = Math.PI / 6;
                    canvas.loadingInterval = setInterval(function() {
                            ctx.clearRect(0, 0, canvas.width, canvas.height);
                            var lineWidth = me.circleLineWidth;
                            var center = {
                                x: canvas.width / 2,
                                y: canvas.height / 2
                            };

                            ctx.beginPath();
                            ctx.lineWidth = lineWidth;
                            ctx.strokeStyle = me.circleColor;
                            ctx.arc(center.x, center.y + 20, radius, 0, Math.PI * 2);
                            ctx.closePath();
                            ctx.stroke();
                            //在圆圈上面画小圆
                            ctx.beginPath();
                            ctx.strokeStyle = me.moveArcColor;
                            ctx.arc(center.x, center.y + 20, radius, rotatorAngle, rotatorAngle + Math.PI * .45);
                            ctx.stroke();
                            rotatorAngle += step;

                        },
                        100);
                },
                hide: function() {
                    var canvas = this.canvas;
                    canvas.__loading = false;
                    if (canvas.loadingInterval) {
                        window.clearInterval(canvas.loadingInterval);
                    }
                    var ctx = canvas.getContext('2d');
                    if (ctx) ctx.clearRect(0, 0, canvas.width, canvas.height);
                }
            };
        </script>
        <?php $this->head() ?>
    </head>
    <body data-role="page" class="activity-scratch-card-winning">
    <?php $this->beginBody() ?>

    <div class="wrap">
        <div class="container">
            <?= $content ?>
        </div>
    </div>


    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; XGATE Corp. Ltd. <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>

    <script type="text/javascript">
        window.sncode = "null";
        window.prize = "谢谢参与";

        var zjl = false;
        var num = 0;
        var goon = true;
        $(function() {
            $("#scratchpad").wScratchPad({
                width: 150,
                height: 40,
                color: "#a9a9a7",
                scratchMove: function() {
                    num++;
                    if (num == 2) {
                        //一等奖机率10% 二等奖20% 三等奖30% 幸运奖40%
                        var randNum = Math.round(Math.random()*99+1)
                        if(randNum>=1 && randNum<=10){
                            var award = "一等奖";
                            zjl = true;
                        }
                        if(randNum>=11 && randNum<=30){
                            var award = "二等奖";
                            zjl = true;
                        }
                        if(randNum>=31 && randNum<=60){
                            var award = "三等奖";
                            zjl = true;
                        }
                        if(randNum>=61 && randNum<=100){
                            var award = "谢谢参与";
                        }
                        document.getElementById('prize').innerHTML = award;
                        $("#theAward").html(award);
                    }

                    if (zjl && num > 10 && goon) {

                        //$("#zjl").fadeIn();
                        goon = false;

                        $("#zjl").slideToggle(500);
                        //$("#outercont").slideUp(500)
                    }
                }
            });

            //$("#prize").html("谢谢参与");
            //loadingObj.hide();
            //$(".loading-mask").remove();
        });

        $("#save-btn").bind("click", function() {
            var btn = $(this);
            var tel = $("#tel").val();
            if (tel == '') {
                alert("请输入手机号");
                return
            }

            var submitData = {
                tid: 438,
                code: $("#sncode").text(),
                tel: tel,
                action: "setTel"
            };
            $.post('index.php?ac=acw', submitData,
                function(data) {
                    if (data.success == true) {
                        alert(data.msg);
                        return
                    } else {}
                },
                "json")
        });

        // 保存数据
        $("#save-btnn").bind("click", function() {
            //var btn = $(this);
            var submitData = {
                tid: 438,
                code: $("#sncode").text(),
                parssword: $("#parssword").val(),
                action: "setTel"
            };
            $.post('index.php?ac=acw', submitData,
                function(data) {
                    if (data.success == true) {
                        alert(data.msg);
                        if (data.changed == true) {
                            window.location.href = location.href;
                        }
                        return
                    } else {}
                },
                "json")
        });
    </script>
    </body>
    </html>
<?php $this->endPage() ?>