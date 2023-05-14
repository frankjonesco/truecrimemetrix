<x-layout>

    <img id="image" src="{{$article->getFullImage()}}" alt="" style="height:500px;">
    <form action="{{url('dashboard/articles/'.$article->hex.'/images/render')}}" method="POST" class="flex justify-between">
        @csrf
        <input type="hidden" name="x" id="imgX">
        <input type="hidden" name="y" id="imgY">
        <input type="hidden" name="w" id="imgW">
        <input type="hidden" name="h" id="imgH">
        <a href="/dashboard/articles/{{$article->hex}}/images/upload">
            <button type="button" class="btn btn-gray">
                <i class="fa-solid fa-arrow-left mr-1.5"></i> 
                Upload a different image
            </button>
        </a>
        <button type="submit" class="btn btn-black">
            <i class="fa-solid fa-crop mr-1.5"></i> 
            Crop image
        </button>
    </form>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/cropperjs/0.8.1/cropper.min.js'></script>

    <script>
        const image = document.getElementById('image');
        const cropper = new Cropper(image, {
            viewMode: 2,
            aspectRatio: 867 / 423,
            autoCropArea: 0.8,
            movable: false,
            scalable: false,
            zoomable: false,
            crop(event) {
                document.getElementById('imgX').value=event.detail.x;
                document.getElementById('imgY').value=event.detail.y;
                document.getElementById('imgW').value=event.detail.width;
                document.getElementById('imgH').value=event.detail.height;
                // console.log(event.detail.x);
                // console.log(event.detail.y);
                // console.log(event.detail.width);
                // console.log(event.detail.height);
                // console.log(event.detail.rotate);
                // console.log(event.detail.scaleX);
                // console.log(event.detail.scaleY);
            },
        });
    </script>

</x-layout>
