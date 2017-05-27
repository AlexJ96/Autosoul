var addedImages = [ ];

$(function() {
  $('.choose-gallery-main').click(function(){
    $('.choose-gallery').click();
  });
});

$(function() {
  $('.publish-photo-gallery-images').on('click', '.photo-gallery-delete-image', function() {
    var n = $(this).attr('id');
    var element = document.getElementById('photo-gallery-delete-' + n);
    element.parentNode.removeChild(element);
    addedImages[n] = "";

  });
});

$(function() {
  $('.publish-photo-gallery-images').on('click', '.photo-gallery-add-plus', function() {
    $('.choose-gallery').click();
  });
});

$(function() {
  $('.choose-gallery').change(function(e) {
    for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
      var file = e.originalEvent.srcElement.files[i];
      
      var reader = new FileReader();
      reader.onloadend = function() {
        addImage(reader.result);
      }
      reader.readAsDataURL(file);
    }
  });
});

function addImage(url) {
  document.getElementById('publish-upload-photo').style.display = "none";
  addedImages[addedImages.length] = url;
  $('.publish-photo-gallery-images').empty();
  $('.publish-photo-gallery-images').prepend("<div id='photo-gallery-add' class='photo-gallery-add'><p class='photo-gallery-add-plus'> + </p> </div>");
  for (i = 0; i < addedImages.length; i++) {
    if (addedImages[i] == "")
      continue;
    $('.publish-photo-gallery-images').prepend("<div class='photo-gallery-delete' id='photo-gallery-delete-"+i+"'> <img class='photo-gallery-delete-image' id='"+i+"' src='../resources/images/admin/cancel-featured.png'/> <img name='gallery-images' id='photo-gallery-image-" + i + "' src='" + addedImages[i] + "'/> </div>");
  }
}