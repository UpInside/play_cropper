<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="node_modules/cropperjs/dist/cropper.min.css">
    <link rel="stylesheet" href="_cdn/css/app.css">
</head>
<body>

<div class="container">
    <div class="content">
        <section class="form_user_cropper">
            <img src="uploads/person.jpg" class="j_cropper">

            <div class="form_user_cropper_preview">
                <img src="" alt="" class="j_cropper_preview rounded" style="display: none;">
            </div>

            <div class="form_user_cropper_action">
                <button class="btn j_cropper_generate_thumb">Gerar Arquivo</button>
            </div>
        </section>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="node_modules/cropperjs/dist/cropper.min.js"></script>
<script>
    $(function () {
        var image = $('.j_cropper')[0];

        var cropper = new Cropper(image, {
            aspectRatio: 1 / 1,
            crop(event) {
                console.log(event.detail.x);
                console.log(event.detail.y);
                console.log(event.detail.width);
                console.log(event.detail.height);
                console.log(event.detail.rotate);
                console.log(event.detail.scaleX);
                console.log(event.detail.scaleY);

                var data = cropper.getCroppedCanvas({
                    maxWidth: 250,
                    maxHeight: 250
                }).toDataURL('image/png');

                $('.j_cropper_preview').attr('src', data).show();

                //console.log(data);

            },
        });

        $('.j_cropper_generate_thumb').on('click', function(){

            $.post('controller.php', {data: $('.j_cropper_preview').attr('src')}, function(){

            }, 'json');
        });

    });
</script>
</body>
</html>