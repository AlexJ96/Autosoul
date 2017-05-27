  var typingTimer;
  var doneTypingInterval = 1000;

  $(function() {
      $('input[name="topic_search"]').on("keyup", function(){
          if (typingTimer)
              clearTimeout(typingTimer);
                                     
          typingTimer = setTimeout(doneTyping(0), doneTypingInterval);
      });
  });

  $(function() {
      $('input[name="topic_search"]').on("keydown", function(){
          clearTimeout(typingTimer);
      });
  });

  $(function() {
      $('input[name="topics_search"]').on("keyup", function(){
          if (typingTimer)
              clearTimeout(typingTimer);
                           
          typingTimer = setTimeout(doneTyping(1), doneTypingInterval);
      });
  });

  $(function() {
      $('input[name="topics_search"]').on("keydown", function(){
          clearTimeout(typingTimer);
      });
  });

  function doneTyping(id) {
      var topicToSearch = id == 0 ? $('input[name="topic_search"]').val() : $('input[name="topics_search"]').val();

      $.ajax(
             {
             url: "topics_json.php?action=search&topic=" + topicToSearch,
             dataType: "text",
 
             success: function(data)
             {
                  if (id == 0) {
                      if(data == 0)
                          $('.add-new-topic').show();
                      else
                          $('.add-new-topic').hide();
                  } else {
                      if(data == 0)
                          $('.add-new-topics').show();
                      else
                          $('.add-new-topics').hide();
                  }
             }
      });
  }

  $(function() {
    $('.add-new-topic').click(function() {
      var topicToAdd = $('input[name="topic_search"]').val();
                
      $.ajax(
             {
             url: "topics_json.php?action=add&topic=" + topicToAdd,
             dataType: "text",
                       
             success: function(add)
             {
              if(add == 1)
                  $('.add-new-topic').hide();
              else
                  alert("unsuccessful");
              }
      });
    });
  });

  $(function() {
    $('.add-new-topics').click(function() {
      var topicToAdd = $('input[name="topics_search"]').val();
                
        $.ajax(                           
        {
          url: "topics_json.php?action=add&topic=" + topicToAdd,
          dataType: "text",
                        
            success: function(add) {
              if(add == 1)
                $('.add-new-topics').hide();
              else
                alert("unsuccessful");
            }
        });
    });
  });
