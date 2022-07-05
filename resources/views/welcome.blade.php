<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <!--为移动端量身打造的一套属性，页面禁止缩放，并且铺满全屏，末尾的minimal-ui是ios7.1为<meta>新增的属性，让网页隐藏顶部地址栏，达到一个全屏显示的效果，不过该属性在ios8版本又给移除了，逗比。-->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">

    <!--禁止页面缓存-->
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">

    <!-- safar浏览器全屏显示 -->
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- 浏览器顶部颜色 -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- 数字号码不被显示为拨号链接 -->
    <meta name="format-detection" content="telephone=no">


    <!-- UC默认竖屏，UC强制全屏 -->
    <meta name="full-screen" content="yes">
    <meta name="browsermode" content="application">

    <!-- QQ浏览器强制竖屏 QQ浏览器强制全屏 -->
    <meta name="x5-orientation" content="portrait">
    <meta name="x5-fullscreen" content="true">
    <meta name="x5-page-mode" content="app">
    <title>申请星球</title>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"
          integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.2/dist/jquery.min.js">
    </script>
    <script type="text/javascript" src="https://app.fanfancity.com/public/static/dest/js/libs/magjs-x.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
            integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <!-- form: -->
        <section>
            <div class="col-lg-8 col-lg-offset-2">
                <div class="page-header">
                    <h2>申请星球!</h2>
                </div>

                <form id='star' onsubmit="return false" action="##" class="form-horizontal"
                      data-bv-message="This value is not valid"
                      data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                      data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                      data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">



                    <input type="hidden" class="form-control" id="username" name="username"
                           data-bv-trigger="blur"
                           data-bv-message="The username is not valid"
                           required data-bv-notempty-message="The username is required and cannot be empty"
                           pattern="[a-zA-Z0-9_\.]+"
                           data-bv-regexp-message="The username can only consist of alphabetical, number, dot and underscore"
                           minlength="5"
                           data-bv-stringlength-message="The username must have at least 5 characters"/>



                    <div class="form-group">
                        <label class="col-lg-3 control-label" id="xemail">邮箱</label>
                        <div class="col-lg-5">
                            <input class="form-control" name="usermail" type="email" required
                                   data-bv-emailaddress-message="The input is not a valid email address"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label" id="xstarname">星球名</label>
                        <div class="col-lg-5">
                            <input class="form-control" name="starname" type="url" required
                                   data-bv-uri-message="The input is not a valid website address"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" id="xstarcategory">星球分类</label>
                        <div class="col-lg-5">
                            <input class="form-control" name="starcategory" type="url" required
                                   data-bv-uri-message="The input is not a valid website address"/>
                        </div>
                    </div>
                    <label class="col-lg-3 control-label" id="xstaricon">上传星球logo</label><br>
                    <img id="headimg" src="/upload/images/dd.png" style="cursor:pointer;" height="100px;"
                         width="100px;">
                    <input  style="display: none;" type="file" class="file" name="file[]" id="fileInput" multiple="multiple" accept="image/png, image/jpeg, image/gif, image/jpg">
                    <input type="hidden" name="staricon" id="logo" value=""/>


                    <script type="text/javascript">
                        $("#headimg").click(function () {
                            addhead('fileInput');
                        });

                        function addhead(obj) {
                            $("#" + obj).click();
                        }
                        //图片上传预览功能
                        $(".file").change(function() {
                                var formData = new FormData();
                                formData.append('image', $('#fileInput')[0].files[0]);
                                $.ajax({
                                    url: "api/star/image",
                                    type: "POST",
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function (data) {
                                        if(data){
                                            console.log(data);
                                            var imgObjPreview = document.getElementById("headimg");
                                            imgObjPreview.src =window.location.href+data.data.src;
                                            $('#logo').val(data.data.url);
                                        }
                                    },
                                    error: function () {
                                        alert("上传失败！");

                                    }
                            })
                        });
                       </script>


                    <div class="form-group">
                        <label class="col-lg-3 control-label">星球介绍</label>
                        <div class="col-lg-5">
                            <textarea class="form-control" name="stardetail" rows="10" data-bv-stringlength
                                      data-bv-stringlength-max="100"
                                      data-bv-stringlength-message="The bio must be less than 100 characters long"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" id="xreason">申请原因</label>
                        <div class="col-lg-5">
                            <textarea class="form-control" name="starreason" rows="10" data-bv-stringlength
                                      data-bv-stringlength-max="100"
                                      data-bv-stringlength-message="The bio must be less than 100 characters long"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                            <input type="button" value="提交" onclick="starpost()" class="btn btn-primary"/>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- :form -->
    </div>
</div>

<script>
    $(function(){
        mag.ready(function(){
            mag.showNavigation();
            mag.addRefreshComponent();
            mag.toLogin(function(rs){
                $('#username').val(rs.name);
            });

        })
    });

    function starpost() {
        $.ajax({
            url: "/api/star/add",
            type: "post",
            dataType: "json",
            data: $('#star').serialize(),
            success: function (result) {
                if (result['code'] == 478) {
                    alert('请仔细检查后再提交!');
                    if ($('#exusermail')) {
                        $('#exusermail').remove();
                        if (result.data.usermail) {
                            var xmail = '<label id="exusermail" style="color:red">' + result.data.usermail + '</label>';
                            $('#xemail').after(xmail);
                        }
                    }
                    if ($('#exstarreason')) {
                        $('#exstarreason').remove();
                        if (result.data.starreason) {
                            var xreason = '<label id="exstarreason" style="color:red">' + result.data.starreason + '</label>';
                            $('#xreason').after(xreason);
                        }
                    }
                    if ($('#exstarname')) {
                        $('#exstarname').remove();
                        if (result.data.starname) {
                            var xstarname = '<label id="exstarname" style="color:red">' + result.data.starname + '</label>';
                            $('#xstarname').after(xstarname);
                        }
                    }
                    if ($('#exstarcategory')) {
                        $('#exstarcategory').remove();
                        if (result.data.starcategory) {
                            var xstarcategory = '<label id="exstarcategory" style="color:red">' + result.data.starcategory + '</label>';
                            $('#xstarcategory').after(xstarcategory);
                        }
                    }
                    if ($('#exstaricon')) {
                        $('#exstaricon').remove();
                        if (result.data.staricon) {
                            var xstaricon = '<label id="exstaricon" style="color:red">' + result.data.staricon + '</label>';
                            $('#xstaricon').after(xstaricon);
                        }
                    }
                }
                if (result['success'] == 'postyes') {
                    alert("上传成功,等待管理员审核,通过后会联系您")
                    window.location.reload();
                }

            }
        })
    }

</script>
</body>
</html>
