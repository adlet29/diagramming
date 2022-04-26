<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Application</title>
    <link rel="icon" href="/sink/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/build/package/rappid.css">
    <link rel="stylesheet" type="text/css" href="/sink/css/style.css">
    <link rel="stylesheet" type="text/css" href="/sink/css/theme-picker.css">

    <!-- theme-specific application CSS  -->
    <link rel="stylesheet" type="text/css" href="/sink/css/style.dark.css">
    <link rel="stylesheet" type="text/css" href="/sink/css/style.material.css">
    <link rel="stylesheet" type="text/css" href="/sink/css/style.modern.css">
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
        app.graph.fromJSON(JSON.parse(App.config.sampleGraphs.emergencyProcedure));
    });
</script>

<!-- Local file warning: -->
<div id="message-fs" style="display: none;">
    <p>The application was open locally using the file protocol. It is recommended to access it trough a <b>Web server</b>.</p>
    <p>Please see <a href="README.md">instructions</a>.</p>
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

</body>
</html>
