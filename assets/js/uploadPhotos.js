function uploadImageQuadrosDosSonhos(element) {
    var input = document.createElement('input');
    input.type = 'file';
    input.accept = 'image/*';

    input.click();

    input.onchange = function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var uploadedImage = document.createElement('img');
            uploadedImage.src = e.target.result;
            uploadedImage.classList.add('uploadedImage', 'imagemCusto');

            var imageId = 'uploadedImage_' + Date.now(); 
            uploadedImage.id = imageId;

            element.innerHTML = '';
            element.appendChild(uploadedImage);
            localStorage.setItem(imageId, e.target.result);
        };

        reader.readAsDataURL(file);
    };
}

window.onload = function() {
    for (var i = 1; i <= 4; i++) {
        var uploadedImageSrc = localStorage.getItem('uploadedImage_boxImage_' + i);
        if (uploadedImageSrc) {
            var uploadedImage = document.createElement('img');
            uploadedImage.src = uploadedImageSrc;
            uploadedImage.classList.add('uploadedImage', 'imagemCusto');
            document.getElementById('boxImage_' + i).appendChild(uploadedImage);
        }
    }
};



function uploadTudoPorVoces(element) {
    var input = document.createElement('input');
    input.type = 'file';
    input.accept = 'image/*';

    input.click();

    input.onchange = function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var uploadedImage = document.createElement('img');
            uploadedImage.src = e.target.result;
            uploadedImage.classList.add('uploadedImage', 'imagemCustoTudo');

            var imageId = 'uploadedImage_' + Date.now(); 
            uploadedImage.id = imageId;

            element.innerHTML = '';
            element.appendChild(uploadedImage);
            localStorage.setItem(imageId, e.target.result);
        };

        reader.readAsDataURL(file);
    };
}

window.onload = function() {
    for (var i = 1; i <= 4; i++) {
        var uploadedImageSrc = localStorage.getItem('uploadedImage_boxImage_' + i);
        if (uploadedImageSrc) {
            var uploadedImage = document.createElement('img');
            uploadedImage.src = uploadedImageSrc;
            uploadedImage.classList.add('uploadedImage', 'imagemCusto');
            document.getElementById('boxImage_' + i).appendChild(uploadedImage);
        }
    }
};


function uploadMuralVisualizacao(element) {
    var input = document.createElement('input');
    input.type = 'file';
    input.accept = 'image/*';

    input.click();

    input.onchange = function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var uploadedImage = document.createElement('img');
            uploadedImage.src = e.target.result;
            uploadedImage.classList.add('uploadedImage', 'imagemCustomMural');

            var imageId = 'uploadedImage_' + Date.now(); 
            uploadedImage.id = imageId;

            element.innerHTML = '';
            element.appendChild(uploadedImage);
            localStorage.setItem(imageId, e.target.result);
        };

        reader.readAsDataURL(file);
    };
}

window.onload = function() {
    for (var i = 1; i <= 4; i++) {
        var uploadedImageSrc = localStorage.getItem('uploadedImage_boxImage_' + i);
        if (uploadedImageSrc) {
            var uploadedImage = document.createElement('img');
            uploadedImage.src = uploadedImageSrc;
            uploadedImage.classList.add('uploadedImage', 'imagemCusto');
            document.getElementById('boxImage_' + i).appendChild(uploadedImage);
        }
    }
};