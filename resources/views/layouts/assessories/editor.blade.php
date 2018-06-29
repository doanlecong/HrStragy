<script>
    var editor_config = {
        path_absolute: "",
        selector: "textarea[id=content]",
        theme: 'modern',
        plugins: 'print preview searchreplace emoticons autolink ' +
        'directionality codesample visualblocks visualchars fullscreen ' +
        'image link media template codesample  code table charmap hr pagebreak ' +
        'nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount ' +
        'imagetools contextmenu colorpicker textpattern help',
        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | emoticons | fontsizeselect | fontselect ',// fontselect
        fontsize_formats: '8pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 17pt 18pt 19pt 20pt 22pt 24pt 26pt 28pt 30pt 32pt 34pt 36pt 38pt 40pt',
        image_advtab: true,
        templates: [
            {title: 'Website Template', content: 'Test 1'},
            {title: 'Mobile Template', content: 'Test 2'},
            {title: 'Logo Template', content: 'Test 3'}
        ],
        codesample_languages: [
            {text: 'HTML/XML', value: 'markup'},
            {text: 'JavaScript', value: 'javascript'},
            {text: 'CSS', value: 'css'},
            {text: 'PHP', value: 'php'},
            {text: 'Ruby', value: 'ruby'},
            {text: 'Python', value: 'python'},
            {text: 'Java', value: 'java'},
            {text: 'C', value: 'c'},
            {text: 'C#', value: 'csharp'},
            {text: 'C++', value: 'cpp'},
            {text: "jsx", value: "jsx"},
            {text: "JSON", value: "json"}
        ],
        content_css: [
            '//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,700,900,900i&amp;subset=vietnamese',
            '//fonts.googleapis.com/css?family=Lobster&amp;subset=vietnamese',
            '//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,900&amp;subset=vietnamese',
            '//www.tinymce.com/css/codepen.min.css'
        ],
        font_formats:  'Roboto=roboto, avant garde cursive times; Playfair=playfair display , serif ;Lobster=lobster, cursive ; Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats',
        relative_urls: false,
        height: 600,
        allow_script_urls: true,
        file_browser_callback: function (field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>