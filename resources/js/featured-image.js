$(function() {
  $('.choose-featured-main').click(function(){
    $('.choose-featured').click();
  });
});

$(function() {
  $('.choose-featured').change(function(e) {
    for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
      var file = e.originalEvent.srcElement.files[i];
      
      var reader = new FileReader();
      reader.onloadend = function() {
        uploadImage(reader.result);
      }
      reader.readAsDataURL(file);
    }
  });
});

$(function() {
  $('.edit-featured').click(function() {
    $('.choose-featured').click();
  });
});

$(function() {
  $('.cancel-featured').click(function() {
    document.getElementById('publish-featured-image').style.display = "block";
    document.getElementById('choose-featured-main').style.display = "block";
    document.getElementById('cancel-featured').style.display = "none";
    document.getElementById('edit-featured').style.display = "none";
  document.getElementById('publish-featured').style.backgroundImage = "none";
  });
});

function uploadImage(url) {
  document.getElementById('publish-featured').style.backgroundImage = "url('" + url + "')";
  document.getElementById('publish-featured-image').style.display = "none";
  document.getElementById('choose-featured-main').style.display = "none";
  document.getElementById('cancel-featured').style.display = "block";
  document.getElementById('edit-featured').style.display = "block";
}