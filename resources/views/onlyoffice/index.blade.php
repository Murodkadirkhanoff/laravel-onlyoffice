<!DOCTYPE html>
<html>
<head>
    <title>OnlyOffice Editor</title>
    <script type="text/javascript" src="{{env('ONLYOFFICE_HOST')}}/web-apps/apps/api/documents/api.js"></script>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        #placeholder {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="placeholder"></div>
    <script type="text/javascript">
        var config = {
            "document": @json($config['document']),
            "documentType": @json($config['documentType']),
            "editorConfig": @json($config['editorConfig']),
            "token": "{{ $config['token'] }}"
        };

        var docEditor = new DocsAPI.DocEditor("placeholder", config);
    </script>
</body>
</html>
