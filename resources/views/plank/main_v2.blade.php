<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Application</title>
    <link rel="icon" href="/sink/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/build/package/rappid.css">
    <link rel="stylesheet" type="text/css" href="/sink/css/style.css">
    <link rel="stylesheet" type="text/css" href="/sink/css/theme-picker.css">

    <!-- theme-specific application CSS  -->
    <link rel="stylesheet" type="text/css" href="/sink/css/style.dark.css">
    <link rel="stylesheet" type="text/css" href="/sink/css/style.material.css">
    <link rel="stylesheet" type="text/css" href="/sink/css/style.modern.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div id="app">
    <div class="app-header">
        <div class="app-title">
            <h1>Платформа</h1>
        </div>
        <div class="toolbar-container"></div>
    </div>
    <div class="app-body">
        <div class="stencil-container"></div>
        <div class="paper-container"></div>
        <div class="inspector-container"></div>
        <div class="navigator-container"></div>
    </div>
</div>

<!-- JointJS+ dependencies: -->
<script src="/node_modules/jquery/dist/jquery.js"></script>
<script src="/node_modules/lodash/lodash.js"></script>
<script src="/node_modules/backbone/backbone.js"></script>
<script src="/node_modules/graphlib/dist/graphlib.core.js"></script>
<script src="/node_modules/dagre/dist/dagre.core.js"></script>

<script src="/build/package/rappid.js"></script>

<!--[if IE 9]>
<script>
    // `-ms-user-select: none` doesn't work in IE9
    document.onselectstart = function() { return false; };
</script>
<![endif]-->

<!-- Application files:  -->
<script src="/sink/js/config/halo.js"></script>
<script src="/sink/js/config/selection.js"></script>
<script src="/sink/js/config/inspector.js"></script>
<script src="/sink/js/config/stencil.js"></script>
<script src="/sink/js/config/toolbar.js"></script>
<script src="/sink/js/config/sample-graphs.js"></script>
<script src="/sink/js/views/main.js"></script>
<script src="/sink/js/views/theme-picker.js"></script>
<script src="/sink/js/models/joint.shapes.app.js"></script>
<script src="/sink/js/views/navigator.js"></script>

<script>
    joint.setTheme('dark');
    app = new App.MainView({ el: '#app' });
    themePicker = new App.ThemePicker({ mainView: app });
    themePicker.render().$el.appendTo(document.body);

    window.addEventListener('load', function() {
        @php
            echo "app.graph.fromJSON($graph);";
        @endphp
    });

</script>

<!-- Local file warning: -->
<div id="message-fs" style="display: none;">
    <p>The application was open locally using the file protocol. It is recommended to access it trough a <b>Web server</b>.</p>
    <p>Please see <a href="README.md">instructions</a>.</p>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Сохранить виртуальную лабараторию</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="ajax-save-paper">
                    <input type="hidden" id="task_id" name="task_id" value="{{ $task_id }}">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Название</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Например: Ответ к лабе #1" required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Описание</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    (function() {
        var fs = (document.location.protocol === 'file:');
        var ff = (navigator.userAgent.toLowerCase().indexOf('firefox') !== -1);
        if (fs && !ff) {
            (new joint.ui.Dialog({
                width: 300,
                type: 'alert',
                title: 'Local File',
                content: $('#message-fs').show()
            })).open();
        }
    })();
</script>

<script>
    $(document).ready(function (e) {
        $('#ajax-save-paper').submit(function(e) {
            event.preventDefault();
            var task_id = $('#task_id').val();
            var name = $('#formGroupExampleInput').val();
            var description = $('#exampleFormControlTextarea1').val();
            console.log(JSON.stringify(app.graph));
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url("paper/save") }}",
                data: {
                    task_id: task_id,
                    name: name,
                    description: description,
                    graph: JSON.stringify(app.graph)
                },
                success: (data) => {
                    if (data.success)
                    {
                        alert('Success')
                    } else if (data.warning) {
                        alert('Error')
                    } else {
                        alert('Error')
                    }
                },
                error: function(data){
                    alert('Error')
                }
            });
        });
    });
</script>

<script src="/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
