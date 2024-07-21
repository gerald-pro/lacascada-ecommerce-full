<?php
 echo cloudinary()->getVideoTag($publicId ?? '')->setAttributes(['controls', 'loop', 'preload'])->fallback('Your browser does not support HTML5 video tagsssss.')->scale($width ?? '', $height ?? '');
?><?php /**PATH C:\laragon\www\lacascada-ecommerce\vendor\cloudinary-labs\cloudinary-laravel\resources\views\components\video.blade.php ENDPATH**/ ?>