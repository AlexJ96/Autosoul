$(function() {
    $('.post-article').click(function() {
        submitArticle(new Date().toISOString().slice(0, 19).replace('T', ' '), 2);
    });
});

$(function() {
    $('.draft-button').click(function() {
        submitArticle(new Date().toISOString().slice(0, 19).replace('T', ' '), 0);
    });
});

$(function() {
    $('.schedule-button-popup').click(function() {
        var date = document.getElementById('datepicker').value;
        var time = document.getElementById('timepicker').value;
        time += ":00";
        dateTime = date + " " + time;

        submitArticle(dateTime, 1);
    });
});

$(function() {
    $('.post-article-edit').click(function() {
        updateArticle(article_id, new Date().toISOString().slice(0, 19).replace('T', ' '), 2);
    });
});

$(function() {
    $('.draft-button-edit').click(function() {
        updateArticle(article_id, new Date().toISOString().slice(0, 19).replace('T', ' '), 0);
    });
});

$(function() {
    $('.schedule-button-popup-edit').click(function() {
        var date = document.getElementById('datepicker').value;
        var time = document.getElementById('timepicker').value;
        time += ":00";
        dateTime = date + " " + time;

        updateArticle(article_id, dateTime, 1);
    });
});


function updateArticle(article_id, dateTime, status) {
    var title = $('input[name="title"]').val();
    var subTitle = $('input[name="sub-title"]').val();
    var articleContent = $('#markItUp').val();
    var featuredImage = $('.publish-featured').css('background-image').replace('url(','').replace(')','');
    var mainTopic = $('input[name="topic_search"]').val();
    var topics = [ $('input[name="topics_search"]').val() ];
    var tags = [];
    var imageGallery = [];
    var date = dateTime;
    $('input[type="checkbox"]').each(function(index) {
        if($(this).is(':checked')) {
            topics[index+1] = $(this).attr('data');
        }   
    });
    $('input[name="tags"]').each(function(index) {
        tags[index] = $(this).attr('value');
    });
    $('img[name="gallery-images"]').each(function(index) {
        imageGallery[index] = $(this).attr('src');
    });

    $.ajax( 
    {
        type: "POST",
        url: "update-article.php",
        data: { articleId: article_id, title: title, subTitle: subTitle, articleContent: articleContent, featuredImage: featuredImage, mainTopic: mainTopic, topics: topics, tags: tags, imageGallery: imageGallery, dateTime: date, status: status },
        success: function(data) {
            alert(data);
            window.location.reload();
        }
    });
}

function submitArticle(dateTime, status) {
    var title = $('input[name="title"]').val();
    var subTitle = $('input[name="sub-title"]').val();
    var articleContent = $('#markItUp').val();
    var featuredImage = $('.publish-featured').css('background-image').replace('url(','').replace(')','');
    var mainTopic = $('input[name="topic_search"]').val();
    var topics = [ $('input[name="topics_search"]').val() ];
    var tags = [];
    var imageGallery = [];
    var date = dateTime;
    $('input[type="checkbox"]').each(function(index) {
        if($(this).is(':checked')) {
            topics[index+1] = $(this).attr('data');
        }   
    });
    $('input[name="tags"]').each(function(index) {
        tags[index] = $(this).attr('value');
    });
    $('img[name="gallery-images"]').each(function(index) {
        imageGallery[index] = $(this).attr('src');
    });

    $.ajax( 
    {
        type: "POST",
        url: "submit-article.php",
        data: { title: title, subTitle: subTitle, articleContent: articleContent, featuredImage: featuredImage, mainTopic: mainTopic, topics: topics, tags: tags, imageGallery: imageGallery, dateTime: date, status: status },
        success: function(data) {
            window.location.reload();
            alert(data);
        }
    });

}