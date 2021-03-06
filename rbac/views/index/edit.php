<?php
/*$this->registerCssFile('plugins/jstree/dist/themes/default/style.min.css', ['depends' => 'backend\themes\music\assets\AdminAsset']);
$this->registerJsFile('plugins/jstree/dist/jstree.min.js', ['depends' => 'backend\themes\music\assets\AdminAsset']);
$this->registerJsFile('plugins/bootstrap-toastr/toastr.js', ['depends' => 'backend\themes\music\assets\AdminAsset']);
$this->registerCssFile('plugins/bootstrap-toastr/toastr.css', ['depends' => 'backend\themes\music\assets\AdminAsset']);
$this->registerJsFile('js/app.min.js', ['depends' => 'backend\themes\music\assets\AdminAsset']);

$js =
    <<<EOF


EOF;

$valid = <<<EOT
    function show_msg(msg,type){
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "positionClass": "toast-top-center",
          "onclick": null,
          "showDuration": "1000",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };
        if(type=='n'){
            toastr.warning(msg,'出错了');
        }else if(type=='y'){
            toastr.success(msg,' 提交成功');
        }
    }
    $(".validform").Validform({
        tiptype:function(msg){},
        ajaxPost:true,
        callback:function(data){
        show_msg(data.info,data.status);
        }
    });
EOT;

$this->registerJs($js, 3);
$this->registerJs($valid, 3);*/
?>
<link href="<?= ASSET_HOST?>/plugins/jstree/dist/themes/default/style.min.css" rel="stylesheet">

<div class="modal-dialog">
    <div class="modal-content">
        <div class="portlet box blue-madison">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Portlet
                </div>
                <div class="actions">
                    <!--  <a href="javascript:;" class="btn yellow"><i class="fa fa-fullscreen"></i>全屏 </a>-->
                    <a href="javascript:;" class="btn green" data-dismiss="modal"><i class="fa fa-compress"></i>  </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="<?= \yii\helpers\Url::to(['/admin/user/index/edit']); ?>" class="form-horizontal validform"
                      method="post">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>"
                           value="<?= Yii::$app->request->csrfToken ?>">
                    <input id="ids" name="permissions" type="hidden">
                    <input id="id" name="id" value="<?= Yii::$app->request->get('id')?>" type="hidden">

                    <div class="form-body ">
                        <div class="form-group">

                            <div class="col-md-12">
                                <section class="panel panel-default">
                                    <header class="panel-heading bg-light">
                                        <ul class="nav nav-tabs nav-justified">
                                            <li class="active"><a href="#info" data-toggle="tab">基本信息</a></li>
                                            <li class=""><a href="#role" data-toggle="tab">角色</a></li>
                                            <li class=""><a href="#permisssion" data-toggle="tab">权限</a></li>
                                        </ul>
                                    </header>
                                    <div class="panel-body ">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="info">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">用户名称</label>
                                                    <div class="col-md-4">
                                                        <input type="text" name="User[username]" value="<?= $user->username?>"  class="form-control"
                                                               placeholder="用户名称">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">邮箱</label>
                                                    <div class="col-md-4">
                                                        <input type="text" name="User[email]" value="<?= $user->email?>" class="form-control"
                                                               placeholder="邮箱">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="role">

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">角色</label>
                                                    <div class="col-md-4">
                                                        <?php foreach ($roles as $role):?>
                                                        <div class="checkbox i-checks">
                                                            <label>
                                                                <input name="name[]" type="checkbox" value="<?= $role['name']?>" <?php if(isset($role['state'])) echo 'checked'?>>
                                                                <i></i>
                                                                <?= $role['name']?>
                                                            </label>
                                                        </div>
                                                        <?php endforeach;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="permisssion">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">权限</label>
                                                    <div class="col-md-4">
                                                        <div id="tree"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </section>
                            </div>
                        </div>
                        <div id="msg"></div>

                    </div>
                    <div class="form-actions fluid">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green submit">Submit</button>
                                <button type="button" class="btn default">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>
<script src="<?= ASSET_HOST?>/plugins/bootstrap-toastr/toastr.js"></script>
<script src="<?= ASSET_HOST?>/js/app.min.js"></script>
<script>
    <?php
    echo file_get_contents(ASSET_HOST.'/plugins/jstree/dist/jstree.min.js')
    ?>

    var tree = $('#tree').jstree({
        'plugins': ["checkbox"],
        'core': {'data': [<?= $permissions?>]}
    });
    var d;
    // var d = tree.get_selected
    $('#tree').on("changed.jstree", function (e, data) {
        d = data.selected;
    });

    $('.submit').click(function () {
        $('#ids').val(d)
    })

    function show_msg(msg, type) {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "positionClass": "toast-top-center",
            "onclick": null,
            "showDuration": "1000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        if (type == 'n') {
            console.log('no')
            toastr.warning(msg, '出错了');
        } else if (type == 'y') {
            toastr.success(msg, ' 提交成功');
        }
    }

    $(".validform").Validform({
        tiptype:function(msg,o,cssctl){
            var objtip=$("#msg");
            cssctl(objtip,o.type);
            objtip.text(msg);
            console.log(o);
            console.log(cssctl);
        },
        ajaxPost: true,
        callback: function (data) {
            if(data.status=='y'){
                window.location.reload();
            }
        }
    });
</script>
